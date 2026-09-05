<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('tafsir_verses', function (Blueprint $table) {
            $table->id();

            $table->foreignId('chapter_id')
                ->constrained('chapters')
                ->cascadeOnDelete();

            $table->foreignId('verse_id')
                ->constrained('verses')
                ->cascadeOnDelete();

            $table->text('text')->nullable();

            $table->foreignId('language_id')
                ->constrained('languages')
                ->restrictOnDelete();

            $table->foreignId('tafsir_id')
                ->constrained('tafsirs')
                ->cascadeOnDelete();

            $table->timestamps();

            $table->unique([
                'verse_id',
                'language_id',
                'tafsir_id',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tafsir_verses');
    }
};
