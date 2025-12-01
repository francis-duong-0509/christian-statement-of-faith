<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FaithStatement extends Model
{
    use HasFactory;

    protected $fillable = [
        'faith_category_id',
        'title_vi',
        'title_en',
        'slug_vi',
        'slug_en',
        'content_vi',
        'content_en',
        'scripture_references_en',
        'scripture_references_vi',
        'image',
        'order',
        'is_active',
        'meta_title_vi',
        'meta_title_en',
        'meta_description_vi',
        'meta_description_en',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
        'scripture_references_en' => 'array',
        'scripture_references_vi' => 'array',
    ];

    // ==========================================================
    // RELATIONSHIPS
    // ==========================================================

    public function category(): BelongsTo
    {
        return $this->belongsTo(FaithCategory::class, 'faith_category_id');
    }

    // ==========================================================
    // SCOPES (Query Helpers)
    // ==========================================================

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('faith_category_id', $categoryId);
    }

    // ==========================================================
    // ACCESSORS (Dynamic Attributes)
    // ==========================================================

    public function getTitleAttribute()
    {
        $locale = app()->getLocale(); // 'vi' or 'en'
        return $this->{"title_$locale"};
    }

    public function getSlugAttribute()
    {
        $locale = app()->getLocale(); // 'vi' or 'en'
        return $this->{"slug_$locale"};
    }

    public function getContentAttribute()
    {
        $locale = app()->getLocale(); // 'vi' or 'en'
        return $this->{"content_$locale"};
    }

    public function getMetaTitleAttribute()
    {
        $locale = app()->getLocale(); // 'vi' or 'en'
        return $this->{"meta_title_$locale"};
    }

    public function getMetaDescriptionAttribute()
    {
        $locale = app()->getLocale(); // 'vi' or 'en'
        return $this->{"meta_description_$locale"};
    }

    public function getScriptureReferencesAttribute(): ?array
    {
        $locale = app()->getLocale();
        return $this->{"scripture_references_{$locale}"};
    }

    public function hasScriptureReferences(): bool
    {
        $references = $this->scripture_references;
        return !empty($references) && is_array($references);
    }

    /**
     * Get the image URL for use with asset()
     * Returns path like: uploads/faith/statement/filename.jpg
     */
    public function getImageUrlAttribute(): ?string
    {
        if (!$this->attributes['image'] ?? null) {
            return null;
        }

        $value = $this->attributes['image'];

        // If already has uploads/ prefix, return as-is
        if (str_starts_with($value, 'uploads/')) {
            return $value;
        }

        // Otherwise prepend uploads/
        return 'uploads/' . $value;
    }
}
