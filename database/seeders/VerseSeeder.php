<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Verse;

class VerseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(
            database_path('data/verses.json')
        );

        $verses = json_decode($json, true);

        foreach ($verses as $verse) {
            Verse::create([
                'chapter_id' => $verse['chapter'],
                'number' => $verse['number'],
                'text' => $verse['text'],
                'line' => $verse['line'],
                'juz' => $verse['juz'],
                'page' => $verse['page'],
                'transmission_id' => $verse['transmission_id'],
                'language_id' => 1,
            ]);
        }       
    }
}
