<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = ['setting_key', 'setting_value'];

    public $timestamps = false;

    const UPDATED_AT = 'updated_at';

    public static function get(string $key, string $default = ''): string
    {
        return (string) static::where('setting_key', $key)->value('setting_value') ?? $default;
    }

    public static function set(string $key, string $value): void
    {
        static::updateOrCreate(
            ['setting_key' => $key],
            ['setting_value' => $value]
        );
    }

    public static function getAllAsArray(): array
    {
        return static::all()->pluck('setting_value', 'setting_key')->toArray();
    }
}
