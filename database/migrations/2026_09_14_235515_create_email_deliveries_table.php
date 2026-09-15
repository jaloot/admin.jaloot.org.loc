<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('email_deliveries', function (Blueprint $table) {
            $table->id();

            $table->foreignId('email_campaign_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('email');

            $table->string('status')->default('pending');
            // pending, sending, sent, failed

            $table->text('error')->nullable();

            $table->timestamp('sent_at')->nullable();

            $table->unsignedInteger('attempts')->default(0);

            $table->timestamps();

            $table->index(['email_campaign_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('email_deliveries');
    }
};