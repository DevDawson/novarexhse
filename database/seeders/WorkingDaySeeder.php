<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkingDaySeeder extends Seeder
{
    public function run(): void
    {
        $days = [
            ['day_name' => 'Monday',    'open_time' => '08:30', 'close_time' => '17:30', 'is_open' => 1, 'sort_order' => 1],
            ['day_name' => 'Tuesday',   'open_time' => '08:30', 'close_time' => '17:30', 'is_open' => 1, 'sort_order' => 2],
            ['day_name' => 'Wednesday', 'open_time' => '08:30', 'close_time' => '17:30', 'is_open' => 1, 'sort_order' => 3],
            ['day_name' => 'Thursday',  'open_time' => '08:30', 'close_time' => '17:30', 'is_open' => 1, 'sort_order' => 4],
            ['day_name' => 'Friday',    'open_time' => '08:30', 'close_time' => '17:30', 'is_open' => 1, 'sort_order' => 5],
            ['day_name' => 'Saturday',  'open_time' => '09:00', 'close_time' => '14:00', 'is_open' => 1, 'sort_order' => 6],
            ['day_name' => 'Sunday',    'open_time' => null,    'close_time' => null,    'is_open' => 0, 'sort_order' => 7],
        ];

        foreach ($days as $day) {
            DB::table('working_days')->updateOrInsert(
                ['day_name' => $day['day_name']],
                $day
            );
        }
    }
}
