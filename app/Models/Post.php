<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'excerpt', 'content', 'featured_image', 'status', 'published_at'];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published')->orderByDesc('published_at')->orderByDesc('id');
    }

    public static function makeUniqueSlug(string $text, int $ignoreId = 0): string
    {
        $base = Str::slug($text);
        if ($base === '') {
            $base = bin2hex(random_bytes(4));
        }
        $candidate = $base;
        $counter = 2;

        while (
            static::where('slug', $candidate)
                ->when($ignoreId > 0, fn ($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $candidate = $base . '-' . $counter++;
        }

        return $candidate;
    }
}
