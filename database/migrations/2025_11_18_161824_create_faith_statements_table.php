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
        Schema::create('faith_statements', function (Blueprint $table) {
            $table->id();

            $table->foreignId('faith_category_id')
                ->constrained('faith_categories')
                ->onDelete('cascade'); // If category is deleted, delete all statements in that category

            $table->string('title_vi', 255);
            $table->string('title_en', 255);

            $table->string('slug_vi', 255)->unique();
            $table->string('slug_en', 255)->unique();

            $table->longText('content_vi');
            $table->longText('content_en');

            // Store scripture references as JSON
            // Example: ["John 17:3", "John 17:4", "Romans 10:9"]
            $table->json('scripture_references')->nullable();

            $table->integer('order')->default(0);

            $table->boolean('is_active')->default(true);

            // SEO (2 languages)
            $table->string('meta_title_vi')->nullable();
            $table->string('meta_title_en')->nullable();
            $table->text('meta_description_vi')->nullable();
            $table->text('meta_description_en')->nullable();

            $table->timestamps();

            $table->index('faith_category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faith_statements');
    }
};
