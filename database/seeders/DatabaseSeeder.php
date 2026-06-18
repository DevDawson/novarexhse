<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            SettingsSeeder::class,
            WorkingDaySeeder::class,
            ContentSectionSeeder::class,
            ServiceSeeder::class,
            CourseSeeder::class,
            FeatureSeeder::class,
            SectorSeeder::class,
            FaqSeeder::class,
            TestimonialSeeder::class,
            PostSeeder::class,
            CorporateEmailSeeder::class,
            ProfileLinkSeeder::class,
        ]);
    }
}
