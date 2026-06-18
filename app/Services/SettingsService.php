<?php

namespace App\Services;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Cache;

class SettingsService
{
    private static array $defaults = [
        'website_name'            => 'NOVAREX HSE & Sustainability Ltd',
        'website_short_name'      => 'NOVAREX',
        'website_subtitle'        => 'HSE & Sustainability Ltd',
        'website_tagline'         => 'Protecting People. Preserving Environment. Building Sustainability.',
        'logo'                    => '',
        'favicon'                 => '',
        'email'                   => 'info@novarex.co.tz',
        'phone'                   => '+255 755 676 826',
        'phone_alt'               => '+255 788 245 844',
        'address'                 => 'Nyasaka A, Opposite EDANA Hotel - PPF Pasiansi / Kilimani Secondary School Junction, Ilemela District, Mwanza, Tanzania.',
        'footer_address'          => 'Nyasaka A, Ilemela District<br>Mwanza, Tanzania',
        'location'                => 'Mwanza, Tanzania',
        'business_hours'          => 'Mon - Sat: 08:30 - 17:30 EAT,  Sat: 08:30 - 14:00 EAT',
        'whatsapp'                => '255755676826',
        'linkedin'                => 'https://linkedin.com/company/novarex-hse-sustainability-ltd',
        'facebook'                => '',
        'instagram'               => '',
        'map_query'               => 'Nyasaka A Opposite EDANA Hotel Pasiansi Kilimani Secondary School Junction Mwanza',
        'map_latitude'            => '-2.487815',
        'map_longitude'           => '32.931898333333336',
        'footer_content'          => 'Professional HSE & Sustainability Consultancy - Mwanza, Tanzania',
        'stat_1_value'            => '5',
        'stat_1_label'            => 'Years of Experience',
        'stat_2_value'            => '10',
        'stat_2_label'            => 'Projects Delivered',
        'stat_3_value'            => '40',
        'stat_3_label'            => 'Sustainable Solutions',
        'stat_4_value'            => '20',
        'stat_4_label'            => 'Expert Consultants',
        'expertise_title'         => 'Our Expertise',
        'expertise_content'       => 'NOVAREX is backed by a team of highly competent professionals with internationally recognized qualifications in Occupational Health & Safety, Environmental, Quality, Energy Management Systems, and Sustainability from globally respected institutions, including OSHA Tanzania, SGS, IOSH, NEBOSH and CQI/IRCA - enabling us to deliver practical, compliant, and results-driven solutions across diverse industries.',
        'links_title'             => 'NOVAREX Links',
        'links_intro'             => 'Official NOVAREX HSE & Sustainability Ltd links, contacts, and social profiles.',
        'terms_title'             => 'Terms & Conditions',
        'terms_content'           => '<p>By using this website, you agree to use NOVAREX HSE & Sustainability Ltd information and services responsibly.</p>',
        'privacy_title'           => 'Privacy Policy',
        'privacy_content'         => '<p>NOVAREX respects your privacy. Information submitted through official channels is used to respond to inquiries, prepare proposals, deliver services, and maintain professional communication.</p>',
        'cookie_enabled'          => '1',
        'cookie_title'            => 'Cookie Notice',
        'cookie_message'          => 'We use essential cookies and basic analytics to improve your browsing experience and understand website performance.',
        'workplace_policy_title'  => 'NOVAREX Workplace Policy',
        'workplace_policy_content'=> 'NOVAREX HSE & Sustainability Ltd is committed to providing a safe, healthy, and environmentally responsible workplace.',
        'meta_title'              => 'NOVAREX HSE & Sustainability Ltd - Protecting People. Preserving Environment.',
        'meta_description'        => 'NOVAREX HSE & Sustainability Ltd - Professional HSE, Environmental, ISO, and Sustainability consultancy based in Mwanza, Tanzania.',
        'meta_keywords'           => 'HSE consultancy, sustainability, ISO, environmental consultancy, Mwanza Tanzania',
    ];

    public static function all(): array
    {
        return Cache::remember('site_settings', 300, function () {
            $db = SiteSetting::getAllAsArray();
            return array_merge(static::$defaults, $db);
        });
    }

    public static function get(string $key, string $default = ''): string
    {
        return (string) (static::all()[$key] ?? $default);
    }

    public static function set(string $key, string $value): void
    {
        SiteSetting::set($key, $value);
        Cache::forget('site_settings');
    }

    public static function setMany(array $data): void
    {
        foreach ($data as $key => $value) {
            SiteSetting::set((string) $key, (string) $value);
        }
        Cache::forget('site_settings');
    }

    public static function defaults(): array
    {
        return static::$defaults;
    }

    public static function mapUrl(array $settings): string
    {
        $lat = trim($settings['map_latitude'] ?? '');
        $lng = trim($settings['map_longitude'] ?? '');
        if (is_numeric($lat) && is_numeric($lng)) {
            return $lat . ',' . $lng;
        }
        return trim($settings['map_query'] ?? '');
    }

    public static function mapEmbedUrl(array $settings): string
    {
        return 'https://www.google.com/maps?q=' . rawurlencode(static::mapUrl($settings)) . '&z=17&output=embed';
    }

    public static function mapSearchUrl(array $settings): string
    {
        return 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode(static::mapUrl($settings));
    }

    public static function mapDirectionsUrl(array $settings): string
    {
        return 'https://www.google.com/maps/dir/?api=1&destination=' . rawurlencode(static::mapUrl($settings));
    }
}
