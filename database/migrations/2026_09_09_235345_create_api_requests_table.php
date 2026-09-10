<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('api_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('api_key_id')
                ->nullable()
                ->constrained('api_keys')
                ->nullOnDelete();
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();
            $table->string('endpoint');
            $table->string('method', 10);
            $table->unsignedSmallInteger('status_code');
            $table->ipAddress('ip')->nullable();
            $table->text('user_agent')->nullable();
            $table->unsignedInteger('response_time')->nullable();
            $table->timestamps();
            $table->index([
                'user_id',
                'created_at',
            ]);
            $table->index([
                'api_key_id',
                'created_at',
            ]);
            $table->index('status_code');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('api_requests');
    }
};