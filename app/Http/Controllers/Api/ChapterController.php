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

    public function index(Request $request): JsonResponse
    {
        $language = $this->resolveLanguage($request);

        $cacheKey = "chapters.quran.{$language->code}";
        $cacheStart = microtime(true);
        $cacheHit = Cache::has($cacheKey);

        $data = Cache::rememberForever($cacheKey, function () use ($request) {
            $chapters = Chapter::with([
                'names',
                'revelationPlace.translations.language',
                'prostrations',
            ])
                ->orderBy('number')
                ->get();

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
        $request->attributes->set('cache_time', round((microtime(true) - $cacheStart) * 1000, 2) . 'ms');
    }
}
