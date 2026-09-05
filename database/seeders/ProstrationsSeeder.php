<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prostration;

class ProstrationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(
            database_path('data/sajdas.json')
        );

        $prostrations = json_decode($json, true);

        foreach ($prostrations as $prostration) {
            Prostration::create([
                'chapter_id'=> $prostration['chapter'],
                'verse_id' => $prostration['verse'],
                'recommended' => $prostration['recommended'],
                'obligatory' => $prostration['obligatory'],
            ]);
        }
    }
}
