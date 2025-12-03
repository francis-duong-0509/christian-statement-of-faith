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
        Schema::create('subscribers', function (Blueprint $table) {
            $table->id();

            // Core fields
            $table->string('email')->unique();
            $table->string('name')->nullable();
            
            // Status tracking
            $table->enum('status', ['pending', 'active', 'unsubscribed'])->default('active');
            $table->timestamp('subscribed_at')->nullable();
            $table->timestamp('unsubscribed_at')->nullable();

            // Analytics & spam prevention
            $table->string('ip_address', 45)->nullable();
            $table->string('user_agent')->nullable();

            // Locale preference (for bilingual emails)
            $table->string('licale', 2)->default('en');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscribers');
    }
};
