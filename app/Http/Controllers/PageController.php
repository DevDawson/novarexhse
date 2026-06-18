<?php

namespace App\Http\Controllers;

use App\Models\AnalyticsEvent;
use App\Services\SeoService;
use App\Services\SettingsService;
use Illuminate\Http\Request;

class PageController extends Controller
{
    private const PAGES = [
        'terms'            => ['title_key' => 'terms_title',            'content_key' => 'terms_content',            'path' => '/terms'],
        'privacy'          => ['title_key' => 'privacy_title',          'content_key' => 'privacy_content',          'path' => '/privacy'],
        'workplace-policy' => ['title_key' => 'workplace_policy_title', 'content_key' => 'workplace_policy_content', 'path' => '/workplace-policy'],
    ];

    public function show(Request $request, string $slug)
    {
        if (!isset(self::PAGES[$slug])) {
            abort(404);
        }

        $meta     = self::PAGES[$slug];
        $settings = SettingsService::all();

        AnalyticsEvent::track('page_view', $meta['path'], $request->ip(), $request->userAgent());

        $title   = (string) ($settings[$meta['title_key']] ?? $slug);
        $content = (string) ($settings[$meta['content_key']] ?? '');

        // Append additional policy sections on the workplace-policy page
        if ($slug === 'workplace-policy') {
            $content .= <<<HTML

<h2 class="section-heading mt-5">Quality Management Policy</h2>

<p>
NOVAREX HSE &amp; Sustainability Ltd is committed to consistently delivering professional, accurate, and value-driven services in HSE, environmental, and sustainability consulting. We uphold high standards of quality through structured processes, competent personnel, and continuous improvement practices. Our objective is to exceed client expectations by ensuring reliability, integrity, and efficiency in all project deliverables while maintaining compliance with applicable standards and best practices.
</p>

<h2 class="section-heading mt-5">Sustainability Policy</h2>

<p>
NOVAREX is committed to advancing sustainable development by integrating environmental stewardship, social responsibility, and ethical business practices into our operations, services, and decision-making processes. We support sustainable solutions that promote resource efficiency, regulatory compliance, environmental protection, continual improvement, and long-term value for clients, communities, and stakeholders.
</p>

HTML;
        }

        $canonical = SeoService::canonical(ltrim($meta['path'], '/'));
        $seoTitle  = SeoService::title($title, $settings, false);
        $seoDesc   = strip_tags(mb_substr($content, 0, 155));

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
                    ['name' => $title,  'url' => $canonical],
                ])
            )),
        ];

        return theme_view('page', compact('settings', 'title', 'content', 'slug', 'seo'));
    }
}
