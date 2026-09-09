<?php

namespace Database\Seeders;

use App\Models\Verse;
use Illuminate\Database\Seeder;

class SimpleVerseSeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('data/simple-verses-ar.txt');

        if (! file_exists($path)) {
            $this->command->error("File not found: {$path}");
            return;
        }

        $lines = file(
            $path,
            FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES
        );

        foreach ($lines as $index => $text) {
            Verse::where('id', $index + 1)
                ->update([
                    'text_simple' => trim($text),
                ]);
        }

        $this->command->info(
            count($lines) . ' simple verses imported successfully.'
        );
    }
}