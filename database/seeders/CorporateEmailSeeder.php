<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CorporateEmailSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('corporate_emails')->truncate();

        DB::table('corporate_emails')->insert([
            ['email' => 'info@novarex.co.tz',       'label' => 'General Enquiries',                       'person_name' => '',                'department' => 'General',              'sort_order' => 1,  'is_active' => 1, 'created_at' => '2026-05-26 23:28:13', 'updated_at' => '2026-05-26 23:28:13'],
            ['email' => 'md@novarex.co.tz',          'label' => 'Managing Director',                       'person_name' => '',                'department' => 'Management',           'sort_order' => 2,  'is_active' => 1, 'created_at' => '2026-05-26 23:28:13', 'updated_at' => '2026-05-26 23:28:13'],
            ['email' => 'hr@novarex.co.tz',          'label' => 'Human Resources & Administration',        'person_name' => '',                'department' => 'Administration',       'sort_order' => 3,  'is_active' => 0, 'created_at' => '2026-05-26 23:28:13', 'updated_at' => '2026-05-27 15:33:26'],
            ['email' => 'bd@novarex.co.tz',          'label' => 'Business Development / Business Director','person_name' => '',                'department' => 'Business Development', 'sort_order' => 4,  'is_active' => 0, 'created_at' => '2026-05-26 23:28:13', 'updated_at' => '2026-05-28 14:58:26'],
            ['email' => 'Support@novarex.co.tz',     'label' => 'Technical Support & System Assistance',   'person_name' => '',                'department' => 'Technical Support',    'sort_order' => 5,  'is_active' => 0, 'created_at' => '2026-05-28 14:54:35', 'updated_at' => '2026-05-28 15:28:19'],
            ['email' => 'jmakunga@novarex.co.tz',    'label' => 'Team Email',                              'person_name' => 'John Makunga',    'department' => 'Team',                 'sort_order' => 6,  'is_active' => 0, 'created_at' => '2026-05-26 23:28:13', 'updated_at' => '2026-05-28 14:59:29'],
            ['email' => 'vmaboko@novarex.co.tz',     'label' => 'Team Email',                              'person_name' => 'Veronica Maboko', 'department' => 'Team',                 'sort_order' => 7,  'is_active' => 0, 'created_at' => '2026-05-26 23:28:13', 'updated_at' => '2026-05-28 15:09:52'],
            ['email' => 'vmakunga@novarex.co.tz',    'label' => 'Team Email',                              'person_name' => 'Veronica Makunga','department' => 'Team',                 'sort_order' => 9,  'is_active' => 0, 'created_at' => '2026-05-26 23:28:13', 'updated_at' => '2026-05-28 15:09:27'],
            ['email' => 'sosmakunga@novarex.co.tz',  'label' => 'Team Email',                              'person_name' => 'Sospeter Makunga','department' => 'Team',                 'sort_order' => 10, 'is_active' => 0, 'created_at' => '2026-05-28 15:08:10', 'updated_at' => '2026-05-28 15:08:10'],
        ]);
    }
}
