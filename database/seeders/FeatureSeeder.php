<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeatureSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('features')->truncate();

        DB::table('features')->insert([
            ['title' => 'Practical Consultancy',      'description' => 'Solutions that are usable, implementable, and adapted to real operational contexts.',                                                             'icon' => 'fa-solid fa-gears',           'sort_order' => 1, 'is_active' => 1, 'created_at' => '2026-05-26 23:30:31', 'updated_at' => '2026-05-26 23:30:31'],
            ['title' => 'Standards-Based Approach',   'description' => 'Engagements aligned with ISO management systems, national regulations, and international industry best practice.',                                  'icon' => 'fa-solid fa-ruler-combined',  'sort_order' => 2, 'is_active' => 1, 'created_at' => '2026-05-26 23:30:31', 'updated_at' => '2026-05-26 23:30:31'],
            ['title' => 'Client-Focused Delivery',    'description' => 'Responsive communication, clear deliverables, and commitment to client success.',                                                                   'icon' => 'fa-solid fa-handshake',       'sort_order' => 3, 'is_active' => 1, 'created_at' => '2026-05-26 23:30:31', 'updated_at' => '2026-05-26 23:30:31'],
            ['title' => 'Integrated Service Offering','description' => 'HSE, environmental, sustainability, ISO, and resilience services that work together.',                                                              'icon' => 'fa-solid fa-layer-group',     'sort_order' => 4, 'is_active' => 1, 'created_at' => '2026-05-26 23:30:31', 'updated_at' => '2026-05-26 23:30:31'],
            ['title' => 'Capacity Building Focus',    'description' => 'NOVAREX builds internal capability so clients maintain standards independently.',                                                                    'icon' => 'fa-solid fa-graduation-cap', 'sort_order' => 5, 'is_active' => 1, 'created_at' => '2026-05-26 23:30:31', 'updated_at' => '2026-05-26 23:30:31'],
            ['title' => 'Regional Expertise',         'description' => 'Understanding of the East African regulatory landscape and operational context.',                                                                    'icon' => 'fa-solid fa-earth-africa',   'sort_order' => 6, 'is_active' => 1, 'created_at' => '2026-05-26 23:30:31', 'updated_at' => '2026-05-26 23:30:31'],
        ]);
    }
}
