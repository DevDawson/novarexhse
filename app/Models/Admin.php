<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable implements FilamentUser
{
    protected $fillable = ['name', 'email', 'password_hash', 'status', 'last_login'];

    protected $hidden = ['password_hash'];

    protected $casts = [
        'last_login' => 'datetime',
    ];

    // Laravel auth expects 'password' column; we have 'password_hash'
    public function getAuthPassword(): string
    {
        return $this->password_hash;
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->status === 'active';
    }
}
