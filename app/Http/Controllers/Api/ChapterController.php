<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ChapterResource;
use App\Models\Chapter;
use App\Models\Language;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ChapterController extends Controller
{
    private const DEFAULT_LANG = 'ar';
    private const TOTAL_CHAPTERS = 114;
    private const LIMIT_CHAPTERS = 3;

    public function index(Request $request): JsonResponse
    {
        $language = $this->resolveLanguage($request);

        $start = $request->integer('start', 1);
        $limit = $request->integer('limit', self::TOTAL_CHAPTERS);

        $numbers = $this->numbers($start, $limit);

        $cacheKey = sprintf('chapters.quran.%1$s-[%2$s,%3$s]', $language->code, $start ?? '-', $limit ?? 'all');

        $cacheStart = microtime(true);
        $cacheHit = Cache::has($cacheKey);

        $data = Cache::rememberForever($cacheKey, function () use ($request, $numbers) {

            $query = Chapter::with([
                'names',
                'revelationPlace.translations.language',
                'prostrations',
            ]);

            if ($numbers === null) {
                $chapters = $query
                    ->orderBy('number')
                    ->get();
            } else {
                $chapters = $query
                    ->whereIn('number', $numbers)
                    ->get()
                    ->sortBy(
                        fn($chapter) => array_search(
                            $chapter->number,
                            $numbers
                        )
                    )
                    ->values();
            }

            return ChapterResource::collection($chapters)->resolve($request);
        });

        $this->setCacheMetadata(
            $request,
            $cacheKey,
            $cacheHit,
            $cacheStart
        );

        return response()->json([
            'language' => $this->languageData($language),
            'chapters' => $data,
        ]);
    }

    public function show(Request $request, Chapter $chapter): JsonResponse
    {
        $identifier = $request->route('chapter');

        if ($identifier === null || $identifier === '') {
            return response()->json([
                'status' => 422,
                'error' => 'missing_parameters',
                'message' => 'The chapter identifier is required.',
                'documentation_url' => config('app.doc_url'),
            ], 422);
        }

        $language = $this->resolveLanguage($request);
        $textSimple = $request->boolean('text_simple');

        $pagedRaw = $request->query('paged');
        $paged = null;

        if ($pagedRaw !== null) {
            if (!ctype_digit((string) $pagedRaw)) {
                return response()->json([
                    'status' => 422,
                    'error' => 'invalid_parameter',
                    'message' => 'The paged parameter must be a positive integer.',
                    'documentation_url' => config('app.doc_url'),
                ], 422);
            }

            $paged = (int) $pagedRaw;
        }

        $metaCacheKey = sprintf('chapter.meta.%s.%s', $chapter->slug, $language->code);

        $meta = Cache::rememberForever($metaCacheKey, function () use ($chapter, $request) {
            $chapter->load(['names', 'revelationPlace']);

            $request->attributes->set('include_verses', false);
            $request->attributes->set('show_text_basmala', true);

            return (new ChapterResource($chapter))->resolve($request);
        });

        if ($paged !== null) {
            $pagesStart = $meta['pages']['start'] ?? null;
            $pagesEnd = $meta['pages']['end'] ?? null;

            if ($pagesStart !== null && ($paged < $pagesStart || $paged > $pagesEnd)) {
                return response()->json([
                    'status' => 422,
                    'error' => 'invalid_parameter',
                    'message' => sprintf(
                        'The paged parameter must be between %d and %d for this chapter.',
                        $pagesStart,
                        $pagesEnd
                    ),
                    'documentation_url' => config('app.doc_url'),
                ], 422);
            }
        }

        $versesCacheKey = sprintf(
            'chapter.%s.%s.S%s.%s',
            $chapter->slug,
            $language->code,
            $textSimple ? 'T' : 'F',
            $paged !== null ? "P{$paged}" : 'all'
        );

        $versesCacheStart = microtime(true);
        $versesCacheHit = Cache::has($versesCacheKey);

        $verses = Cache::rememberForever($versesCacheKey, function () use ($chapter, $request, $paged) {
            $chapter->load([
                'verses' => function ($query) use ($paged) {
                    if ($paged !== null) {
                        $query->where('page', $paged);
                    }

                    $query->orderBy('number');
                },
            ]);

            $request->attributes->set('include_verses', true);
            // Basmala uniquement affichée sur la première page de la sourate
            $request->attributes->set(
                'show_text_basmala',
                $paged === null || $paged === ($chapter->pages['start'] ?? null)
            );

            $resolved = (new ChapterResource($chapter))->resolve($request);

            return $resolved['verses'] ?? [];
        });

        $this->setCacheMetadata($request, $versesCacheKey, $versesCacheHit, $versesCacheStart);

        return response()->json([
            'language' => $this->languageData($language),
            ...$meta,
            'verses' => $verses,
            'pagination' => $paged !== null ? [
                'page' => $paged,
                'start' => $meta['pages']['start'] ?? null,
                'end' => $meta['pages']['end'] ?? null,
                'has_previous' => $paged > ($meta['pages']['start'] ?? $paged),
                'has_next' => $paged < ($meta['pages']['end'] ?? $paged),
                'previous_page' => $paged > ($meta['pages']['start'] ?? $paged) ? $paged - 1 : null,
                'next_page' => $paged < ($meta['pages']['end'] ?? $paged) ? $paged + 1 : null,
            ] : null,
        ]);
    }

    private function resolveLanguage(Request $request): Language
    {
        $code = $request->query('lang', self::DEFAULT_LANG);

        return Language::query()
            ->where('code', $code)
            ->first()
            ?? Language::query()
            ->where('code', self::DEFAULT_LANG)
            ->firstOrFail();
    }

    private function languageData(Language $language): array
    {
        return [
            'code' => $language->code,
            'direction' => $language->direction,
        ];
    }

    private function setCacheMetadata(
        Request $request,
        string $cacheKey,
        bool $cacheHit,
        float $cacheStart
    ): void {
        $request->attributes->set('cache_store', config('cache.default'));
        $request->attributes->set('cache_key', $cacheKey);
        $request->attributes->set('cache_hit', $cacheHit);
        $request->attributes->set(
            'cache_time',
            round((microtime(true) - $cacheStart) * 1000, 2) . 'ms'
        );
    }

    private function numbers(?int $start, ?int $limit): ?array
    {
        if ($start === null) {
            return null;
        }

        if ($start < 1 || $start > self::TOTAL_CHAPTERS) {
            return null;
        }

        $limit = $limit ?? self::LIMIT_CHAPTERS;

        if ($limit < 1) {
            return null;
        }

        return collect(range(0, $limit - 1))
            ->map(
                fn($i) => (($start - 1 + $i) % self::TOTAL_CHAPTERS) + 1
            )
            ->toArray();
    }
}
