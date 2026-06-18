<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\SettingsService;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $settings   = SettingsService::all();
        $baseUrl    = rtrim($settings['site_url'] ?? url('/'), '/');
        $posts      = Post::published()->orderByDesc('published_at')->get(['slug', 'published_at', 'updated_at']);

        $staticUrls = [
            ['loc' => $baseUrl . '/',                    'priority' => '1.0', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . '/links',               'priority' => '0.6', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl . '/terms',               'priority' => '0.3', 'changefreq' => 'yearly'],
            ['loc' => $baseUrl . '/privacy',             'priority' => '0.3', 'changefreq' => 'yearly'],
            ['loc' => $baseUrl . '/cookie-policy',       'priority' => '0.3', 'changefreq' => 'yearly'],
            ['loc' => $baseUrl . '/workplace-policy',    'priority' => '0.3', 'changefreq' => 'yearly'],
        ];

        $xml = view('sitemap', compact('staticUrls', 'posts', 'baseUrl'))->render();

        return response($xml, 200, ['Content-Type' => 'application/xml']);
    }
}
