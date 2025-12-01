<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FaithCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_vi',
        'name_en',
        'slug_vi',
        'slug_en',
        'description_vi',
        'description_en',
        'scripture_references_vi',
        'scripture_references_en',
        'banner_image',
        'order',
        'is_active',
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

    public function statements(): HasMany
    {
        return $this->hasMany(FaithStatement::class, 'faith_category_id');
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

    // ==========================================================
    // ACCESSORS (Dynamic Attribute)
    // ==========================================================

    public function getNameAttribute(): string
    {
        $locale = app()->getLocale(); // 'vi' or 'en'
        return $this->{"name_$locale"} ?? $this->name_en;
    }

    public function getSlugAttribute(): string
    {
        $locale = app()->getLocale(); // 'vi' or 'en'
        return $this->{"slug_$locale"} ?? $this->slug_en;
    }

    public function getDescriptionAttribute(): string
    {
        $locale = app()->getLocale(); // 'vi' or 'en'
        return $this->{"description_$locale"} ?? $this->description_en;
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
     * Get the banner image URL for use with asset()
     * Returns path like: uploads/faith/category/filename.jpg
     */
    public function getBannerImageUrlAttribute(): ?string
    {
        if (!$this->attributes['banner_image'] ?? null) {
            return null;
        }

        $value = $this->attributes['banner_image'];

        // If already has uploads/ prefix, return as-is
        if (str_starts_with($value, 'uploads/')) {
            return $value;
        }

        // Otherwise prepend uploads/
        return 'uploads/' . $value;
    }
}
