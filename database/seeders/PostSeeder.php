<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('posts')->truncate();

        DB::table('posts')->insert([
            [
                'title'          => 'Building a stronger safety culture',
                'slug'           => 'building-a-stronger-safety-culture',
                'excerpt'        => 'A practical look at how organizations can strengthen HSE performance through leadership, systems, and continuous learning.',
                'content'        => '<p><i>Strong HSE performance starts with leadership commitment, clear systems, practical training, and regular review. NOVAREX supports organizations with the tools and advisory needed to move from written compliance to everyday practice.</i></p>',
                'featured_image' => '',
                'status'         => 'published',
                'published_at'   => '2026-05-27 02:30:31',
                'created_at'     => '2026-05-26 23:30:31',
                'updated_at'     => '2026-05-29 13:20:41',
            ],
        ]);
    }
}
