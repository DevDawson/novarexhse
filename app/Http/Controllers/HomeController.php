<?php

namespace App\Http\Controllers;

use App\Models\AnalyticsEvent;
use App\Models\ContentSection;
use App\Models\CorporateEmail;
use App\Models\Course;
use App\Models\Faq;
use App\Models\Feature;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\Sector;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\WorkingDay;
use App\Services\SeoService;
use App\Services\SettingsService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        AnalyticsEvent::track('page_view', '/', $request->ip(), $request->userAgent());

        $settings       = SettingsService::all();
        $services       = Service::active()->get();
        $courses        = Course::active()->get();
        $features       = Feature::active()->get();
        $testimonials   = Testimonial::active()->get();
        $gallery        = Gallery::active()->get();
        $sectors        = Sector::active()->get();
        $faqs           = Faq::active()->get();
        $posts          = Post::published()->orderByDesc('published_at')->limit(3)->get();
        $corporateEmails = CorporateEmail::active()->get();
        $workingDays    = WorkingDay::orderBy('sort_order')->get();
        $hero           = ContentSection::getSection('hero');
        $about          = ContentSection::getSection('about');

        // Computed contact/map values
        $waNumber     = preg_replace('/[^0-9]/', '', (string) ($settings['whatsapp'] ?? ''));
        $waUrl        = $waNumber ? 'https://wa.me/' . $waNumber : '#contact';
        $phoneDigits  = preg_replace('/[^0-9+]/', '', (string) ($settings['phone'] ?? ''));
        $mapEmbedUrl  = SettingsService::mapEmbedUrl($settings);
        $mapSearchUrl = SettingsService::mapSearchUrl($settings);
        $mapDirectionsUrl = SettingsService::mapDirectionsUrl($settings);
        $lat = trim($settings['map_latitude'] ?? '');
        $lng = trim($settings['map_longitude'] ?? '');
        $mapCoordinates = (is_numeric($lat) && is_numeric($lng))
            ? round((float) $lat, 4) . ', ' . round((float) $lng, 4)
            : '';

        // 5 hero stats — 5th is live analytics count
        $totalViews = AnalyticsEvent::where('event_type', 'page_view')->count();
        $homeStats = [
            ['value' => (int)($settings['stat_1_value'] ?? 5),  'label' => $settings['stat_1_label'] ?? 'Years of Experience',  'accent' => 'blue'],
            ['value' => (int)($settings['stat_2_value'] ?? 10), 'label' => $settings['stat_2_label'] ?? 'Projects Delivered',    'accent' => 'green'],
            ['value' => (int)($settings['stat_3_value'] ?? 40), 'label' => $settings['stat_3_label'] ?? 'Sustainable Solutions', 'accent' => 'blue'],
            ['value' => (int)($settings['stat_4_value'] ?? 20), 'label' => $settings['stat_4_label'] ?? 'Expert Consultants',    'accent' => 'green'],
            ['value' => $totalViews,                             'label' => 'Total Website Views',                                'accent' => 'blue'],
        ];

        // Capabilities marquee items (services + sectors + courses + expertise)
        $marqueeItems = [];
        foreach ($services->take(8) as $svc) {
            if (!empty($svc->title)) {
                $marqueeItems[] = ['icon' => $svc->icon ?? 'fa-solid fa-layer-group', 'label' => $svc->title];
            }
        }
        foreach ($sectors->take(7) as $sec) {
            if (!empty($sec->title)) {
                $marqueeItems[] = ['icon' => $sec->icon ?? 'fa-solid fa-industry', 'label' => $sec->title];
            }
        }
        foreach ($courses->take(4) as $crs) {
            if (!empty($crs->title)) {
                $marqueeItems[] = ['icon' => $crs->icon ?? 'fa-solid fa-person-chalkboard', 'label' => $crs->title];
            }
        }
        if (!empty($settings['expertise_title'])) {
            $marqueeItems[] = ['icon' => 'fa-solid fa-user-shield', 'label' => $settings['expertise_title']];
        }

        // Hero title with word highlighting
        $heroTitle = (string) ($hero['title'] ?? '');
        $heroTitle = str_replace('Compliant',  '<span class="word-blue">Compliant</span>',  $heroTitle);
        $heroTitle = str_replace('Sustainable', '<span class="word-green">Sustainable</span>', $heroTitle);

        // Hero background style
        $heroStyle = !empty($hero['background_image'])
            ? 'style="background-image: linear-gradient(90deg, rgba(5,13,26,.92), rgba(5,13,26,.68)), url(' . asset('storage/' . $hero['background_image']) . '); background-size: cover; background-position: center;"'
            : '';

        // Working status for SEO / footer badge (server-side fallback)
        $seoStatus = SeoService::workingStatus($workingDays->toArray());

        // SEO
        $seoTitle = SeoService::title('', $settings, true);
        $seoDesc  = (string) ($settings['meta_description'] ?? '');
        $ogImage  = !empty($hero['background_image'])
            ? asset('storage/' . $hero['background_image'])
            : asset('assets/logo.png');

        $seo = [
            'title'       => $seoTitle,
            'description' => $seoDesc,
            'canonical'   => SeoService::canonical('/'),
            'metaTags'    => SeoService::ogTags([
                'title'       => $seoTitle,
                'description' => $seoDesc,
                'image'       => $ogImage,
                'canonical'   => SeoService::canonical('/'),
                'site_name'   => $settings['website_name'] ?? 'NOVAREX HSE & Sustainability Ltd',
            ]),
            'jsonLd' => SeoService::jsonLd(array_merge(
                [SeoService::schemaOrganisation($settings)],
                [SeoService::schemaWebsite($settings)],
                SeoService::schemaServices($services->toArray(), $settings),
                SeoService::schemaFaq($faqs->toArray()),
                SeoService::schemaBreadcrumb([['name' => 'Home', 'url' => SeoService::canonical('/')]])
            )),
        ];

        return view('home', compact(
            'settings', 'services', 'courses', 'features', 'testimonials', 'gallery',
            'sectors', 'faqs', 'posts', 'corporateEmails', 'workingDays',
            'hero', 'about', 'homeStats', 'marqueeItems', 'heroTitle', 'heroStyle',
            'waUrl', 'phoneDigits', 'mapEmbedUrl', 'mapSearchUrl', 'mapDirectionsUrl',
            'mapCoordinates', 'seoStatus', 'seo'
        ));
    }
}
