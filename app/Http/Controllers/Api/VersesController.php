<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Verse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VersesController extends Controller
{
    private const DEFAULT_LANG = 'ar';

    public function index(Request $request): JsonResponse
    {
        $language = $this->resolveLanguage($request);

        $verse = Verse::query()
            ->whereHas('tafsirVerses', function ($query) use ($language) {
                $query->where('language_id', $language->id);
            })
            ->with([
                'chapter.names',
                'tafsirVerses' => fn($query) => $query
                    ->where('language_id', $language->id)
                    ->with('tafsir'),
            ])
            ->inRandomOrder()
            ->first();


        if (! $verse) {
            return response()->json([
                'message' => 'No verse found.',
            ], 404);
        }

        $chapter = $verse->chapter;
        $chapterName = $chapter?->names;

        $tafsirs = $verse->tafsirVerses
            ->filter(fn($tafsirVerse) => $tafsirVerse->tafsir !== null)
            ->map(fn($tafsirVerse) => [
                'title' => $tafsirVerse->tafsir->title,
                'author' => $tafsirVerse->tafsir->author,
                'book_name' => $tafsirVerse->tafsir->book_name,
                'text' => $tafsirVerse->text,
            ])
            ->values();

        return response()->json([
            'lang' => $language->name,
            'recitation' => $verse->Transmission?->name,

            'chapter' => [
                'number' => $chapter?->number,
                'slug' => $chapter?->slug,
                'name' => $chapterName?->{$language->code} ?? $chapterName?->ar,
            ],

            'verse' => [
                'number' => $verse->number,
                'text' => $verse->text,
                'text_simple' => $verse->text_simple,
                'juz' => $verse->juz,
                'page' => $verse->page,
            ],

            'tafsirs' => $tafsirs,
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
}
