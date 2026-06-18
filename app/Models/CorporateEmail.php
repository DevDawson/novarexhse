<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class CorporateEmail extends Model
{
    protected $fillable = ['email', 'label', 'person_name', 'department', 'sort_order', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', 1)->orderBy('sort_order')->orderByDesc('id');
    }
}
