<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ChapterName;

class ChapterNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(
            database_path('data/chapter_names.json')
        );

        $names = json_decode($json, true);

        foreach($names as $name) {
            ChapterName::updateOrCreate(
                ['chapter_id' => $name['id']],
                [
                    'ar' => $name['ar'],
                    'en' => $name['en'],
                    'es' => $name['es'],
                    'fr' => $name['fr'],
                    'complex' => $name['complex'],
                ]
            );
        }
    }
}
