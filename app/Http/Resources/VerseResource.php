<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VerseResource extends JsonResource
{
    private const DEFAULT_LANG = 'ar';
    private const ALLOWED_LANGS = ['ar', 'en', 'fr', 'es'];

    public function toArray(Request $request): array
    {
        $lang = $this->resolveLang($request);

        $translations = $this->tafsirVerses
            ->filter(
                fn($translation) =>
                $translation->language?->code === $lang
            )
            ->map(fn($translation) => [
                'title' => $translation->tafsir?->title,
                'author' => $translation->tafsir?->author,
                'book_name' => $translation->tafsir?->book_name,
                'text' => $translation->text,
            ])
            ->values()
            ->toArray();

        return [
            'number' => $this->number,
            'text' => $this->when(
                $lang === self::DEFAULT_LANG,
                $this->text
            ),
            'text_simple' => $this->when(
                $request->boolean('text_simple'),
                $this->text_simple
            ),
            'transliteration' => $this->when(
                $lang !== self::DEFAULT_LANG,
                $this->transliteration
            ),
            'translations' => $this->when(
                $lang !== self::DEFAULT_LANG,
                $translations
            ),
            'line' => $this->line,
            'juz' => $this->juz,
            'page' => $this->page,
        ];
    }

    private function resolveLang(Request $request): string
    {
        $lang = $request->query('lang', self::DEFAULT_LANG);

        return in_array($lang, self::ALLOWED_LANGS, true)
            ? $lang
            : self::DEFAULT_LANG;
    }
}
