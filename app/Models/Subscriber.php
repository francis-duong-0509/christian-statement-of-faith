<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'name',
        'status',
        'subscribed_at',
        'unsubscribed_at',
        'ip_address',
        'user_agent',
        'locale',
    ];

    protected $casts = [
        'subscribed_at' => 'datetime',
        'unsubscribed_at' => 'datetime',
    ];

    // ==========================================================
    // SCOPES
    // ==========================================================
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeUnsubscribed($query)
    {
        return $query->where('status', 'unsubscribed');
    }

    public function scopeByLocale($query, string $locale)
    {
        return $query->where('locale', $locale);
    }

    // ==========================================================
    // ACCESSORS
    // ==========================================================
    public function getIsActiveAttribute(): bool
    {
        return $this->status === 'active';
    }

    public function getDisplayNameAttribute(): string
    {
        return $this->name ?? $this->email;
    }

    // ==========================================================
    // METHODS
    // ==========================================================
    public function active(): void
    {
        $this->update([
            'status' => 'active',
            'subscribed_at' => now(),
        ]);
    }

    public function unsubscribe(): void
    {
        $this->update([
            'status' => 'unsubscribed',
            'unsubscribed_at' => now(),
        ]);
    }
}
