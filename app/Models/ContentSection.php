<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentSection extends Model
{
    protected $fillable = [
        'section_key', 'eyebrow', 'title', 'subtitle', 'content',
        'button_text', 'button_url', 'image', 'background_image', 'extra_json',
    ];

    public $timestamps = false;

    const UPDATED_AT = 'updated_at';

    protected $casts = [
        'extra_json' => 'array',
    ];

    public static function getSection(string $key): array
    {
        $row = static::where('section_key', $key)->first();
        if (!$row) {
            return [];
        }
        $data = $row->toArray();
        $extra = $row->extra_json ?? [];
        return array_merge($data, $extra);
    }
}
