<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = ['name', 'company', 'email', 'phone', 'service', 'message', 'is_read'];

    public $timestamps = false;

    const CREATED_AT = 'created_at';

    protected $casts = [
        'is_read'    => 'boolean',
        'created_at' => 'datetime',
    ];
}
