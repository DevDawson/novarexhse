<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileLinkSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('profile_links')->truncate();

        DB::table('profile_links')->insert([
            ['title' => 'Website',     'url' => 'https://novarex.co.tz/',                                                         'icon' => 'fa-solid fa-globe',              'description' => 'Official NOVAREX website',        'sort_order' => 1,  'is_active' => 1, 'clicks' => 0, 'created_at' => '2026-05-26 23:28:13', 'updated_at' => now()],
            ['title' => 'WhatsApp',    'url' => 'https://wa.me/255755676826',                                                      'icon' => 'fa-brands fa-whatsapp',          'description' => 'Chat with NOVAREX',               'sort_order' => 4,  'is_active' => 1, 'clicks' => 0, 'created_at' => '2026-05-26 23:28:13', 'updated_at' => now()],
            ['title' => 'LinkedIn',    'url' => 'https://linkedin.com/company/novarex-hse-sustainability-ltd',                     'icon' => 'fa-brands fa-linkedin',          'description' => 'Connect with us on LinkedIn',     'sort_order' => 7,  'is_active' => 1, 'clicks' => 0, 'created_at' => '2026-05-26 23:28:13', 'updated_at' => now()],
            ['title' => 'Email',       'url' => 'mailto:info@novarex.co.tz',                                                       'icon' => 'fa-solid fa-envelope',           'description' => 'General inquiries',               'sort_order' => 2,  'is_active' => 1, 'clicks' => 0, 'created_at' => '2026-05-26 23:28:13', 'updated_at' => now()],
            ['title' => 'Google Maps', 'url' => 'https://www.google.com/maps/search/?api=1&query=-2.487815%2C32.931898333333336',  'icon' => 'fa-solid fa-map-location-dot',   'description' => 'Find NOVAREX office',             'sort_order' => 10, 'is_active' => 1, 'clicks' => 0, 'created_at' => '2026-05-26 23:28:13', 'updated_at' => now()],
            ['title' => 'Instagram',   'url' => 'https://www.instagram.com/novarextz/',                                            'icon' => 'fa-brands fa-instagram',         'description' => '',                                'sort_order' => 6,  'is_active' => 1, 'clicks' => 0, 'created_at' => '2026-05-28 15:56:30', 'updated_at' => now()],
            ['title' => 'Facebook',    'url' => 'https://www.facebook.com/novarexhsesustainability',                               'icon' => 'fa-brands fa-square-facebook',   'description' => '',                                'sort_order' => 5,  'is_active' => 1, 'clicks' => 0, 'created_at' => '2026-05-29 07:28:09', 'updated_at' => now()],
            ['title' => 'Email',       'url' => 'mailto:md@novarex.co.tz',                                                         'icon' => 'fa-solid fa-envelope',           'description' => 'Managing Director',               'sort_order' => 3,  'is_active' => 1, 'clicks' => 0, 'created_at' => '2026-05-29 08:15:43', 'updated_at' => now()],
            ['title' => 'X.com',       'url' => 'https://x.com/novarexhsesustainability',                                          'icon' => 'fa-brands fa-x-twitter',         'description' => '',                                'sort_order' => 8,  'is_active' => 1, 'clicks' => 0, 'created_at' => '2026-05-29 08:23:14', 'updated_at' => now()],
            ['title' => 'TikTok',      'url' => 'https://www.tiktok.com/@novarexhsesustainability',                                'icon' => 'fa-brands fa-tiktok',            'description' => '',                                'sort_order' => 9,  'is_active' => 1, 'clicks' => 0, 'created_at' => '2026-05-29 08:53:02', 'updated_at' => now()],
        ]);
    }
}
