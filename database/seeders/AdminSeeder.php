<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('admins')->insertOrIgnore([
            'name'          => 'Administrator',
            'email'         => 'admin@novarex.co.tz',
            // Password: admin123 (bcrypt from original project)
            'password_hash' => '$2y$12$BpEAZ54JbJbyDXLVsRCrgetDg6GaLL/wa7kR.tj9RwFYeXoEeTcbO',
            'status'        => 'active',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
    }
}
