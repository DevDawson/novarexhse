<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ProfileLink extends Model
{
    protected $fillable = ['title', 'url', 'icon', 'description', 'sort_order', 'is_active', 'clicks'];

    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', 1)->orderBy('sort_order')->orderByDesc('id');
    }

    public function incrementClicks(): void
    {
        $this->increment('clicks');
    }
}
