<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnalyticsEvent extends Model
{
    protected $fillable = ['event_type', 'path', 'page_title', 'referrer', 'user_agent', 'ip_hash'];

    public $timestamps = false;

    const CREATED_AT = 'created_at';

    protected $casts = ['created_at' => 'datetime'];

    public static function track(string $path, string $title = '', string $type = 'page_view'): void
    {
        try {
            $ip = request()->ip() ?? '';
            static::create([
                'event_type' => $type,
                'path'       => mb_substr($path, 0, 255),
                'page_title' => mb_substr($title, 0, 190),
                'referrer'   => mb_substr((string) request()->header('referer', ''), 0, 255),
                'user_agent' => mb_substr((string) request()->userAgent(), 0, 255),
                'ip_hash'    => $ip !== '' ? hash('sha256', $ip . 'novarex') : null,
            ]);
        } catch (\Throwable) {
            // Non-critical — never break page load
        }
    }
}
