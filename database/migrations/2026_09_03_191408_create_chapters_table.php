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
        Schema::create('chapters', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('number')->unique();
            $table->string('slug', 100)->unique();
            $table->boolean('has_basmala')->default(true);
            $table->boolean('basmala_as_verse')->default(false);
            $table->unsignedSmallInteger('revelation_order')->nullable();

            $table->foreignId('revelation_place_id')
                ->constrained('revelation_places')
                ->restrictOnDelete();
                
            $table->unsignedSmallInteger('verses_count');
            $table->unsignedSmallInteger('start_page');
            $table->unsignedSmallInteger('end_page');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chapters');
    }
};
