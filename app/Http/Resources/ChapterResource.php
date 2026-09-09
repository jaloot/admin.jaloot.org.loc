<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Basmala;

class ChapterResource extends JsonResource
{
    private const DEFAULT_LANG = 'ar';
    private const ALLOWED_LANGS = ['ar', 'en', 'fr'];

    public function toArray(Request $request): array
    {
        $lang = $this->resolveLang($request);

        $data = [
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
            'basmala' => $this->getBasmala($request , $lang),
            'prostrations' => ProstrationResource::collection($this->prostrations)->resolve($request),
        ];

        if ($request->attributes->get('include_verses', false)) {
            $data['verses'] = VerseResource::collection(
                $this->verses
            )->resolve($request);
        }

        return $data;
    }

    private function getBasmala(Request $request, string $lang): array
    {
        $included = $this->has_basmala === true
            && $this->basmala_as_verse === false;

        $data = [
            'included' => $included,
            'is_verse' => $this->basmala_as_verse,
        ];

        if ($request->attributes->get('show_text_basmala', false)) {
            $data['value'] = $included
                ? Basmala::query()
                ->whereHas(
                    'language',
                    fn($query) => $query->where('code', $lang)
                )
                ->value('value')
                : null;
        }

        return $data;
    }

    private function resolveLang(Request $request): string
    {
        $lang = $request->query('lang', self::DEFAULT_LANG);

        return in_array($lang, self::ALLOWED_LANGS, true) ? $lang : self::DEFAULT_LANG;
    }
}
