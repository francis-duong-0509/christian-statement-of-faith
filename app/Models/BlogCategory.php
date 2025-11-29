<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BlogCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    // ==========================================================
    // RELATIONSHIPS
    // ==========================================================

    /**
     * Get all posts belonging to this category
     */
    public function posts(): HasMany
    {
        return $this->hasMany(BlogPost::class, 'blog_category_id');
    }

    /**
     * Get only active posts
     */
    public function activePosts(): HasMany
    {
        return $this->hasMany(BlogPost::class, 'blog_category_id')
            ->where('is_active', true);
    }

    /**
     * Get only published posts (not drafts)
     */
    public function publishedPosts(): HasMany
    {
        return $this->hasMany(BlogPost::class, 'blog_category_id')
            ->published();
    }

    // ==========================================================
    // SCOPES (Query Helpers)
    // ==========================================================

    /**
     * Scope to get only active categories
     * Usage: BlogCategory::active()->get()
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to order categories by 'order' field
     * Usage: BlogCategory::ordered()->get()
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    // ==========================================================
    // HELPER METHODS
    // ==========================================================

    public function getPublishedPostsCountAttribute(): int
    {
        return $this->publishedPosts()->count();
    }
}
