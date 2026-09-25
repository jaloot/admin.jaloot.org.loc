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

        $cacheKey = sprintf(
            'chapter.%s.%s.S%s',
            $chapter->slug,
            $language->code,
            $textSimple ? 'T' : 'F'
        );

        $cacheStart = microtime(true);
        $cacheHit = Cache::has($cacheKey);

        $data = Cache::rememberForever($cacheKey, function () use ($chapter, $request) {
            $chapter->load([
                'names',
                'revelationPlace',
                'verses',
            ]);

            $request->attributes->set('include_verses', true);
            $request->attributes->set('show_text_basmala', true);

            return (new ChapterResource($chapter))->resolve($request);
        });

        $this->setCacheMetadata(
            $request,
            $cacheKey,
            $cacheHit,
            $cacheStart
        );

        return response()->json([
            'language' => $this->languageData($language),
            ...$data,
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
