<?php

namespace Database\Seeders;

use App\Models\Chapter;
use Illuminate\Database\Seeder;

class ChapterSeederUpdateSlug extends Seeder
{
    public function run(): void
    {
        $json = file_get_contents(
            database_path('data/chapters-slug.json')
        );

        $chapters = json_decode($json, true);

        foreach ($chapters as $chapter) {
            Chapter::where('number', $chapter['chapter_id'])
                ->update([
                    'slug' => $chapter['chapter_slug'],
                ]);
        }
    }
}