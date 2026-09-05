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
        Schema::create('verses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chapter_id')
                ->constrained('chapters')
                ->cascadeOnDelete();
            $table->unsignedSmallInteger('number');
            $table->text('text');
            $table->unsignedSmallInteger('line')->nullable();
            $table->unsignedTinyInteger('juz');
            $table->unsignedSmallInteger('page');
            $table->foreignId('transmission_id')
                ->constrained('transmissions')
                ->restrictOnDelete();
            $table->timestamps();
            $table->unique([
                'chapter_id',
                'number',
                'transmission_id',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verses');
    }
};
