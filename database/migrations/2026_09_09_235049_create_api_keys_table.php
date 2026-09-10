<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('api_keys', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->string('api_key', 64)
                ->unique();
            $table->string('api_secret_hash', 64);
            $table->ipAddress('ip')->nullable();
            $table->string('email');
            $table->boolean('send_key')
                ->default(false);
            $table->text('agent')->nullable();
            $table->timestamp('user_registered')
                ->useCurrent();
            $table->timestamps();
            $table->index('user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('api_keys');
    }
};
