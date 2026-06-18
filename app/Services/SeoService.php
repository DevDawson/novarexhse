<?php

namespace App\Services;

use App\Models\WorkingDay;

class SeoService
{
    public static function siteUrl(): string
    {
        $proto = request()->isSecure() ? 'https' : 'http';
        return rtrim($proto . '://' . request()->getHost(), '/');
    }

    public static function canonical(string $path = '/'): string
    {
        return static::siteUrl() . '/' . ltrim($path, '/');
    }

    public static function title(string $pageTitle, array $settings, bool $isHome = false): string
    {
        $siteName = $settings['website_name'] ?? 'NOVAREX HSE & Sustainability Ltd';
        if ($isHome) {
            return $settings['meta_title'] ?? ($siteName . ' | HSE & Sustainability Consultancy, Mwanza Tanzania');
        }
        return $pageTitle . ' | ' . ($settings['website_short_name'] ?? 'NOVAREX');
    }

    public static function ogTags(array $meta): string
    {
        $site  = static::siteUrl();
        $image = !empty($meta['image'])
            ? (str_starts_with($meta['image'], 'http') ? $meta['image'] : $site . '/' . ltrim($meta['image'], '/'))
            : $site . '/assets/logo.png';

        $tags = '';
        $ogMap = [
            'og:type'        => $meta['og_type']   ?? 'website',
            'og:site_name'   => $meta['site_name'] ?? 'NOVAREX HSE & Sustainability Ltd',
            'og:title'       => $meta['title']     ?? '',
            'og:description' => $meta['description'] ?? '',
            'og:url'         => $meta['canonical'] ?? static::canonical(),
            'og:image'       => $image,
            'og:image:width' => '1200',
            'og:image:height'=> '630',
            'og:locale'      => 'en_TZ',
        ];
        foreach ($ogMap as $prop => $content) {
            if ($content !== '') {
                $tags .= '<meta property="' . e($prop) . '" content="' . e((string)$content) . '">' . "\n";
            }
        }
        $twitterMap = [
            'twitter:card'        => 'summary_large_image',
            'twitter:title'       => $meta['title']       ?? '',
            'twitter:description' => $meta['description'] ?? '',
            'twitter:image'       => $image,
        ];
        foreach ($twitterMap as $name => $content) {
            if ($content !== '') {
                $tags .= '<meta name="' . e($name) . '" content="' . e((string)$content) . '">' . "\n";
            }
        }
        return $tags;
    }

    public static function jsonLd(array $schemas): string
    {
        if (empty($schemas)) return '';
        $out = '';
        foreach ($schemas as $schema) {
            $out .= '<script type="application/ld+json">' . "\n"
                  . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT)
                  . "\n</script>\n";
        }
        return $out;
    }

    public static function schemaOrganisation(array $settings): array
    {
        $site    = static::siteUrl();
        $lat     = (float)($settings['map_latitude']  ?? -2.487815);
        $lng     = (float)($settings['map_longitude'] ?? 32.9318983);
        $logoUrl = !empty($settings['logo'])
            ? (str_starts_with($settings['logo'], 'http') ? $settings['logo'] : $site . '/storage/' . ltrim($settings['logo'], '/'))
            : $site . '/assets/logo.png';

        return [
            '@context'      => 'https://schema.org',
            '@type'         => ['LocalBusiness', 'ProfessionalService', 'Organization'],
            '@id'           => $site . '/#organization',
            'name'          => $settings['website_name'] ?? 'NOVAREX HSE & Sustainability Ltd',
            'alternateName' => $settings['website_short_name'] ?? 'NOVAREX',
            'description'   => $settings['meta_description'] ?? '',
            'url'           => $site,
            'logo'          => ['@type' => 'ImageObject', 'url' => $logoUrl, 'width' => 300, 'height' => 300],
            'image'         => $logoUrl,
            'telephone'     => $settings['phone'] ?? '',
            'email'         => $settings['email'] ?? '',
            'address'       => [
                '@type'           => 'PostalAddress',
                'streetAddress'   => 'Nyasaka A, Opposite EDANA Hotel - PPF Pasiansi / Kilimani Secondary School Junction',
                'addressLocality' => 'Mwanza',
                'addressRegion'   => 'Mwanza',
                'addressCountry'  => 'TZ',
            ],
            'geo'           => ['@type' => 'GeoCoordinates', 'latitude' => $lat, 'longitude' => $lng],
            'areaServed'    => [
                ['@type' => 'Country', 'name' => 'Tanzania'],
                ['@type' => 'AdministrativeArea', 'name' => 'East Africa'],
            ],
            'openingHours'  => ['Mo-Fr 08:30-17:30', 'Sa 08:30-14:00'],
            'sameAs'        => array_values(array_filter([$settings['linkedin'] ?? '', $settings['facebook'] ?? ''])),
        ];
    }

    public static function schemaWebsite(array $settings): array
    {
        $site = static::siteUrl();
        return [
            '@context'    => 'https://schema.org',
            '@type'       => 'WebSite',
            '@id'         => $site . '/#website',
            'url'         => $site,
            'name'        => $settings['website_name'] ?? 'NOVAREX HSE & Sustainability Ltd',
            'description' => $settings['meta_description'] ?? '',
            'publisher'   => ['@id' => $site . '/#organization'],
            'inLanguage'  => 'en-TZ',
        ];
    }

    public static function schemaServices(array $services, array $settings): array
    {
        $site    = static::siteUrl();
        $schemas = [];
        foreach ($services as $service) {
            if (empty($service['title'])) continue;
            $schemas[] = [
                '@context'    => 'https://schema.org',
                '@type'       => 'Service',
                'name'        => $service['title'],
                'description' => $service['description'] ?? '',
                'provider'    => ['@id' => $site . '/#organization'],
                'areaServed'  => ['@type' => 'Country', 'name' => 'Tanzania'],
                'serviceType' => 'HSE & Sustainability Consultancy',
            ];
        }
        return $schemas;
    }

    public static function schemaFaq(array $faqs): array
    {
        if (empty($faqs)) return [];
        $items = [];
        foreach ($faqs as $faq) {
            if (empty($faq['question'])) continue;
            $items[] = [
                '@type'          => 'Question',
                'name'           => $faq['question'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['answer'] ?? ''],
            ];
        }
        if (empty($items)) return [];
        return [['@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => $items]];
    }

    public static function schemaBreadcrumb(array $crumbs): array
    {
        $items = [];
        foreach ($crumbs as $i => $crumb) {
            $items[] = ['@type' => 'ListItem', 'position' => $i + 1, 'name' => $crumb['name'], 'item' => $crumb['url']];
        }
        return [['@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => $items]];
    }

    public static function schemaArticle(array $post, array $settings): array
    {
        $site    = static::siteUrl();
        $logoUrl = !empty($settings['logo'])
            ? (str_starts_with($settings['logo'], 'http') ? $settings['logo'] : $site . '/storage/' . ltrim($settings['logo'], '/'))
            : $site . '/assets/logo.png';
        $imgUrl  = !empty($post['featured_image'])
            ? $site . '/storage/' . ltrim($post['featured_image'], '/')
            : $logoUrl;

        return [[
            '@context'         => 'https://schema.org',
            '@type'            => 'Article',
            'headline'         => $post['title'] ?? '',
            'description'      => $post['excerpt'] ?? '',
            'image'            => $imgUrl,
            'datePublished'    => $post['published_at'] ?? $post['created_at'] ?? '',
            'dateModified'     => $post['updated_at']   ?? $post['published_at'] ?? '',
            'author'           => ['@id' => $site . '/#organization'],
            'publisher'        => ['@id' => $site . '/#organization'],
            'mainEntityOfPage' => ['@type' => 'WebPage', '@id' => $site . '/blog/' . ($post['slug'] ?? '')],
        ]];
    }

    public static function workingStatus(array $workingDays): array
    {
        $now     = now();
        $dayName = $now->format('l');
        $timeNow = (int) $now->format('Hi');

        foreach ($workingDays as $day) {
            if (strcasecmp((string) ($day['day_name'] ?? ''), $dayName) !== 0) continue;
            if (!(int) ($day['is_open'] ?? 0)) {
                return ['open' => false, 'label' => 'Closed Today', 'day' => $dayName];
            }
            $open  = (int) str_replace(':', '', (string) ($day['open_time']  ?? '0830'));
            $close = (int) str_replace(':', '', (string) ($day['close_time'] ?? '1730'));
            if ($timeNow >= $open && $timeNow < $close) {
                return ['open' => true, 'label' => 'Open Now', 'closes_at' => $day['close_time'] ?? '', 'day' => $dayName];
            }
            if ($timeNow < $open) {
                return ['open' => false, 'label' => 'Opens at ' . ($day['open_time'] ?? ''), 'day' => $dayName];
            }
            return ['open' => false, 'label' => 'Closed for the Day', 'day' => $dayName];
        }
        return ['open' => false, 'label' => 'Closed', 'day' => $dayName];
    }
}
