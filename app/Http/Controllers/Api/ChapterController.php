<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ChapterResource;
use App\Models\Chapter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ChapterController extends Controller
{
    private const ALLOWED_LANGS = ['ar', 'en', 'fr'];
    private const DEFAULT_LANG = 'ar';

    public function index(Request $request): JsonResponse
    {
        $lang = $this->resolveLang($request);
        $cacheKey = "chapters.quran.{$lang}";
        $fromCache = Cache::has($cacheKey);
        $cacheStart = microtime(true);

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

        $request->attributes->set('cache_key', $cacheKey);
        $request->attributes->set('cache_hit', $fromCache);
        $request->attributes->set('cache_time', round((microtime(true) - $cacheStart) * 1000, 2) . 'ms');

        return response()->json($data);
    }

    public function show(Request $request, Chapter $chapter): JsonResponse
    {
        $lang = $this->resolveLang($request);
        $slug = $chapter->slug;
        $textSimple = $request->boolean('text_simple');
        $cacheKey = "chapter.{$slug}.{$lang}.S" . ($textSimple ? 'T' : 'F');
        $fromCache = Cache::has($cacheKey);
        $cacheStart = microtime(true);

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

        $request->attributes->set('cache_key', $cacheKey);
        $request->attributes->set('cache_hit', $fromCache);
        $request->attributes->set('cache_time', round((microtime(true) - $cacheStart) * 1000, 2) . 'ms');


        return response()->json($data);
    }

    private function resolveLang(Request $request): string
    {
        $lang = $request->query('lang', self::DEFAULT_LANG);

        return in_array($lang, self::ALLOWED_LANGS, true) ? $lang : self::DEFAULT_LANG;
    }
}
