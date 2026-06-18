<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sectors')->truncate();

        DB::table('sectors')->insert([
            ['title' => 'Mining',                                  'description' => 'HSE, environmental, compliance, and sustainability support for mining operations.',              'icon' => 'fa-solid fa-mountain',         'sort_order' => 1, 'is_active' => 1, 'created_at' => '2026-05-26 23:28:13', 'updated_at' => '2026-05-26 23:28:13'],
            ['title' => 'Oil, Gas, and Energy',                    'description' => 'Risk, safety, energy management, and operational compliance services.',                          'icon' => 'fa-solid fa-bolt',             'sort_order' => 2, 'is_active' => 1, 'created_at' => '2026-05-26 23:28:13', 'updated_at' => '2026-05-26 23:28:13'],
            ['title' => 'Logistics, Transport and Infrastructure', 'description' => 'Operational safety, transport risk, and infrastructure compliance advisory.',                    'icon' => 'fa-solid fa-truck-fast',       'sort_order' => 3, 'is_active' => 1, 'created_at' => '2026-05-26 23:28:13', 'updated_at' => '2026-05-26 23:28:13'],
            ['title' => 'Constructions and Infrastructure',        'description' => 'Construction HSE systems, site inspections, audits, and contractor compliance.',                 'icon' => 'fa-solid fa-person-digging',   'sort_order' => 4, 'is_active' => 1, 'created_at' => '2026-05-26 23:28:13', 'updated_at' => '2026-05-26 23:28:13'],
            ['title' => 'Hospitals and Healthcare Facilities',     'description' => 'Healthcare safety, environmental controls, emergency preparedness, and compliance.',             'icon' => 'fa-solid fa-hospital',         'sort_order' => 5, 'is_active' => 1, 'created_at' => '2026-05-26 23:28:13', 'updated_at' => '2026-05-26 23:28:13'],
            ['title' => 'Hotels/Hospitality',                      'description' => 'Hospitality safety, environmental responsibility, training, and compliance programs.',           'icon' => 'fa-solid fa-hotel',            'sort_order' => 6, 'is_active' => 1, 'created_at' => '2026-05-26 23:28:13', 'updated_at' => '2026-05-26 23:28:13'],
            ['title' => 'NGOs and Development Projects',           'description' => 'Safeguards, ESG, environmental and social management support for development programs.',         'icon' => 'fa-solid fa-people-group',     'sort_order' => 7, 'is_active' => 1, 'created_at' => '2026-05-26 23:28:13', 'updated_at' => '2026-05-26 23:28:13'],
        ]);
    }
}
