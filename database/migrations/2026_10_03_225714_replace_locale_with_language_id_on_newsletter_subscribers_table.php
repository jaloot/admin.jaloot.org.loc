<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('newsletter_subscribers', function (Blueprint $table) {
            $table->foreignId('language_id')
                ->nullable()
                ->after('name')
                ->constrained('languages')
                ->nullOnDelete();

            $table->dropColumn('locale');
        });
    }

    public function down(): void
    {
        Schema::table('newsletter_subscribers', function (Blueprint $table) {
            $table->string('locale', 5)
                ->default('ar')
                ->after('name');

            $table->dropForeign(['language_id']);
            $table->dropColumn('language_id');
        });
    }
};