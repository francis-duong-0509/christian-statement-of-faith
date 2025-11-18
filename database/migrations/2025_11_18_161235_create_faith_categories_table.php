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
        Schema::create('faith_categories', function (Blueprint $table) {
            $table->id();

            $table->string('name_vi', 255);
            $table->string('name_en', 255);

            $table->string('slug_vi', 255)->unique();
            $table->string('slug_en', 255)->unique();

            $table->text('description_vi')->nullable();
            $table->text('description_en')->nullable();

            $table->integer('order')->default(0);

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faith_categories');
    }
};
