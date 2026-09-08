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
        Schema::create('basmalas', function (Blueprint $table) {
            $table->id();
            $table->mediumText('value');
            $table->foreignId('language_id')
                ->constrained('languages')
                ->cascadeOnDelete();
            $table->timestamps();

            $table->unique('language_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basmalas');
    }
};
