<?php

namespace Database\Seeders;

use App\Models\Chapter;
use Illuminate\Database\Seeder;

class ChapterSeeder extends Seeder
{
    public function run(): void
    {
        $json = file_get_contents(
            database_path('data/chapters.json')
        );

        $chapters = json_decode($json, true);

        foreach ($chapters as $chapter) {
            Chapter::updateOrCreate(
                ['id' => $chapter['id']],
                [
                    'number' => $chapter['number'],
                    'slug' => $chapter['slug'],
                    'has_basmala' => $chapter['has_basmala'],
                    'basmala_as_verse' => $chapter['basmala_as_verse'],
                    'revelation_order' => $chapter['revelation_order'],
                    'revelation_place_id' => $chapter['revelation_place_id'],
                    'has_sajda' => $chapter['has_sajda'],
                    'verses_count' => $chapter['verses_count'],
                    'start_page' => $chapter['start_page'],
                    'end_page' => $chapter['end_page'],
                ]
            );
        }
    }
}