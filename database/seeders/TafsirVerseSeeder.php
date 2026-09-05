<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chapter;
use App\Models\Verse;
use App\Models\TafsirVerse;

class TafsirVerseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(
            database_path('data/tafasser.json')
        );

        $tafasser = json_decode(
            $json,
            true,
            512,
            JSON_THROW_ON_ERROR
        );

        // Chapter.number => Chapter.id
        $chapters = Chapter::pluck('id', 'number');

        // chapter_id:number => Verse.id
        $verses = Verse::query()
            ->where('language_id', 1)
            ->get([
                'id',
                'chapter_id',
                'number',
            ])
            ->mapWithKeys(function ($verse) {
                return [
                    $verse->chapter_id . ':' . $verse->number => $verse->id,
                ];
            });

        foreach ($tafasser as $tafsirVerse) {

            $chapterNumber = (int) $tafsirVerse['sora'];
            $verseNumber   = (int) $tafsirVerse['aya'];
            $tafsirId      = (int) $tafsirVerse['id_tafasser'];

            // sora => Chapter.id
            $chapterId = $chapters[$chapterNumber] ?? null;

            if (!$chapterId) {
                throw new \RuntimeException(
                    "Chapter {$chapterNumber} introuvable."
                );
            }

            // sora + aya => Verse.id
            $verseId = $verses["{$chapterId}:{$verseNumber}"] ?? null;

            if (!$verseId) {
                throw new \RuntimeException(
                    "Verse introuvable : sora={$chapterNumber}, aya={$verseNumber}"
                );
            }

            TafsirVerse::updateOrCreate(
                [
                    'verse_id'    => $verseId,
                    'language_id' => 1,
                    'tafsir_id'   => $tafsirId,
                ],
                [
                    'chapter_id' => $chapterId,
                    'text'       => $tafsirVerse['text'],
                ]
            );
        }
    }
}