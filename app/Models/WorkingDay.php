<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkingDay extends Model
{
    protected $fillable = ['day_name', 'open_time', 'close_time', 'is_open', 'sort_order', 'note'];

    public $timestamps = false;

    const UPDATED_AT = 'updated_at';

    protected $casts = ['is_open' => 'boolean'];
}
