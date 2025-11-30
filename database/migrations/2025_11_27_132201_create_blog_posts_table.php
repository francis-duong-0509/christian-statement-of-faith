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
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();

            // Relationships
            $table->foreignId('blog_category_id')
                ->constrained('blog_categories')
                ->restrictOnDelete();

            $table->foreignId('author_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            // Core content
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->longText('content');

            // Media
            $table->string('featured_image')->nullable();
            $table->string('og_image')->nullable();

            // Status flags
            $table->boolean('is_outstanding')->default(false);
            $table->boolean('is_draft')->default(true);
            $table->boolean('is_active')->default(true);

            // Publishing
            $table->timestamp('published_at')->nullable();

            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            // Metrics
            $table->unsignedBigInteger('views_count')->default(0);
            $table->integer('order')->default(0);

            $table->timestamps();

            // Indexes for performance
            $table->index('slug');
            $table->index(['is_draft', 'is_active', 'published_at']);
            $table->index(['blog_category_id', 'is_active']);
            $table->index('is_outstanding');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};
