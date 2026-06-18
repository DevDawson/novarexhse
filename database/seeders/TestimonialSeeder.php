<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('testimonials')->truncate();

        DB::table('testimonials')->insert([
            [
                'name'       => 'Operations Lead',
                'position'   => 'Client Representative',
                'company'    => 'Industrial Client',
                'quote'      => 'NOVAREX helped us translate compliance requirements into practical actions our teams could maintain.',
                'image'      => null,
                'sort_order' => 1,
                'is_active'  => 1,
                'created_at' => '2026-05-26 23:30:31',
                'updated_at' => '2026-05-26 23:30:31',
            ],
            [
                'name'       => 'Project Coordinator',
                'position'   => 'Sustainability Team',
                'company'    => 'Environmental Project',
                'quote'      => 'Their technical guidance was clear, professional, and grounded in real operating conditions.',
                'image'      => null,
                'sort_order' => 2,
                'is_active'  => 1,
                'created_at' => '2026-05-26 23:30:31',
                'updated_at' => '2026-05-26 23:30:31',
            ],
        ]);
    }
}
