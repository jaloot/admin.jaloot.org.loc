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

        $cacheKey = "chapters.lang.{$lang}";

        $data = Cache::remember($cacheKey, now()->addDays(30), function () use ($request) {
            $chapters = Chapter::with([
                'names',
                'revelationPlace.translations.language',
                'prostrations',
            ])
                ->orderBy('number')
                ->get();

            return ChapterResource::collection($chapters)->resolve($request);
        });

        return response()->json($data);
    }

    public function show(Request $request, Chapter $chapter): JsonResponse
    {
        $lang = $this->resolveLang($request);

        $cacheKey = "chapter.{$chapter->id}.{$lang}";

        $data = Cache::remember($cacheKey, now()->addDays(30), function () use ($chapter, $request) {
            $chapter->load([
                'names',
                'revelationPlace',
                'prostrations',
            ]);

            return (new ChapterResource($chapter))->resolve($request);
        });

        return response()->json($data);
    }

    private function resolveLang(Request $request): string
    {
        $lang = $request->query('lang', self::DEFAULT_LANG);

        return in_array($lang, self::ALLOWED_LANGS, true) ? $lang : self::DEFAULT_LANG;
    }
}