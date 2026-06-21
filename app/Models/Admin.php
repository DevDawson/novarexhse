<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Admin extends Authenticatable implements FilamentUser
{
    protected $fillable = ['name', 'email', 'password_hash', 'status', 'last_login'];

    protected $hidden = ['password_hash'];

    protected $casts = [
        'last_login' => 'datetime',
    ];

    // Laravel auth expects 'password' column; we use 'password_hash'
    public function getAuthPassword(): string
    {
        return $this->password_hash;
    }

    // Called by Filament's password reset flow to save the new password
    public function resetPassword(string $password): void
    {
        $this->password_hash = Hash::make($password);
        $this->save();
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->status === 'active';
    }
}
