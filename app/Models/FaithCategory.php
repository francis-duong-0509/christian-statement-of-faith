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
}
