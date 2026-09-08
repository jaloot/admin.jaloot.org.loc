<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChapterResource extends JsonResource
{
    private const DEFAULT_LANG = 'ar';
    private const ALLOWED_LANGS = ['ar', 'en', 'fr'];

    public function toArray(Request $request): array
    {
        $lang = $this->resolveLang($request);

        return [
            'id' => $this->number,
            'name' => $this->names?->{$lang} ?? $this->names?->{self::DEFAULT_LANG},
            'name_complex' => $this->names?->complex,
            'slug' => $this->slug,
            'revelation' => [
                'place' => $this->revelationPlace->place,
                'type' => $this->revelationPlace?->translations
                    ->first(
                        fn($translation) =>
                        $translation->language?->code === $lang
                    )?->name,
                'order' => $this->revelation_order,
            ],
            'verses_count' => $this->verses_count,
            'pages' => [
                'start' => $this->start_page,
                'end' => $this->end_page,
            ],
            'basmala' => [
                'included' => $this->has_basmala,
                'is_verse' => $this->basmala_as_verse,
            ],
            // 'prostrations' => ProstrationResource::collection($this->prostrations)->resolve($request),
            // 'verses' => VerseResource::collection($this->verses)->resolve($request),
        ];
    }

    private function resolveLang(Request $request): string
    {
        $lang = $request->query('lang', self::DEFAULT_LANG);

        return in_array($lang, self::ALLOWED_LANGS, true) ? $lang : self::DEFAULT_LANG;
    }
}
