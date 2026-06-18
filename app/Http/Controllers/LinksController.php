<?php

namespace App\Http\Controllers;

use App\Models\AnalyticsEvent;
use App\Models\ProfileLink;
use App\Services\SeoService;
use App\Services\SettingsService;
use Illuminate\Http\Request;

class LinksController extends Controller
{
    public function index(Request $request)
    {
        AnalyticsEvent::track('page_view', '/links', $request->ip(), $request->userAgent());

        $settings = SettingsService::all();
        $links    = ProfileLink::active()->orderBy('sort_order')->orderByDesc('id')->get();

        $seoTitle = SeoService::title($settings['links_title'] ?? 'NOVAREX Links', $settings, false);
        $seoDesc  = $settings['links_intro'] ?? 'Official NOVAREX HSE & Sustainability Ltd links, contacts, and social profiles.';
        $canonical = SeoService::canonical('links');

        $seo = [
            'title'       => $seoTitle,
            'description' => $seoDesc,
            'canonical'   => $canonical,
            'metaTags'    => SeoService::ogTags([
                'title'       => $seoTitle,
                'description' => $seoDesc,
                'canonical'   => $canonical,
                'site_name'   => $settings['website_name'] ?? 'NOVAREX',
            ]),
            'jsonLd' => SeoService::jsonLd(array_merge(
                [SeoService::schemaOrganisation($settings)],
                SeoService::schemaBreadcrumb([
                    ['name' => 'Home',  'url' => SeoService::canonical('')],
                    ['name' => 'Links', 'url' => $canonical],
                ])
            )),
        ];

        return theme_view('links', compact('settings', 'links', 'seo'));
    }
}
