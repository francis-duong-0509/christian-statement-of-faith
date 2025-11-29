<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\returnArgument;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_category_id',
        'author_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'og_image',
        'is_outstanding',
        'is_draft',
        'is_active',
        'published_at',
        'meta_title',
        'meta_description',
        'views_count',
        'order',
    ];

    protected $casts = [
        'is_outstanding' => 'boolean',
        'is_draft' => 'boolean',
        'is_active' => 'boolean',
        'published_at' => 'datetime',
        'views_count' => 'integer',
        'order' => 'integer',
    ];

    // ==========================================================
    // RELATIONSHIPS
    // ==========================================================

    /**
     * Get the category that owns this post
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }

    /**
     * Get the author (user) that owns this post
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    // ==========================================================
    // SCOPES (Query Helpers)
    // ==========================================================

    /**
     * Scope to get only active posts
     * Usage: BlogPost::active()->get()
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to get only published posts (not drafts & published date passed)
     * Usage: BlogPost::published()->get()
     */
    public function scopePublished($query)
    {
        return $query->where('is_draft', false)
            ->where('is_active', true)
            ->where('published_at', '<=', now());
    }

    public function scopeDraft($query)
    {
        return $query->where('is_draft', true);
    }

    public function scopeOutstanding($query)
    {
        return $query->where('is_outstanding', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('published_at', 'desc');
    }

    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('blog_category_id', $categoryId);
    }

    public function scopePopular($query)
    {
        return $query->orderBy('views_count', 'desc');
    }

    // ==========================================================
    // HELPER METHODS
    // ==========================================================

    public function isPublished(): bool
    {
        return !$this->is_draft
            && $this->is_active
            && $this->published_at
            && $this->published_at->isPast();
    }

    public function incrementViews(): void
    {
        DB::table('blog_posts')
            ->where('id', $this->id)
            ->increment('views_count');
    }

    public function getFormattedDateAttribute(): string
    {
        return $this->published_at?->format('F d, Y') ?? 'Not Published';
    }

    public function getReadingTimeAttribute(): string
    {
        $wordCount = str_word_count(strip_tags($this->content));
        $minutes = ceil($wordCount / 200);

        return $minutes . ' phút đọc';
    }
}
