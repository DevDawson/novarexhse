<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['stat_1_value',              '1'],
            ['stat_1_label',              'Years of Experience'],
            ['stat_2_value',              '3'],
            ['stat_2_label',              'Projects Delivered'],
            ['stat_3_value',              '20'],
            ['stat_3_label',              'Sustainable Solutions'],
            ['stat_4_value',              '20'],
            ['stat_4_label',              'Expert Consultants'],
            ['expertise_title',           'Our Expertise'],
            ['expertise_content',         'NOVAREX is backed by a team of highly competent professionals with internationally recognized qualifications in Occupational Health & Safety, Environmental, Quality, Energy Management Systems, and Sustainability from globally respected institutions, including OSHA Tanzania, SGS, IOSH, NEBOSH and CQI/IRCA - enabling us to deliver practical, compliant, and results-driven solutions across diverse industries.'],
            ['links_title',               'NOVAREX Links'],
            ['links_intro',               'Official NOVAREX HSE & Sustainability Ltd links, contacts, and social profiles.'],
            ['map_latitude',              '-2.487815'],
            ['map_longitude',             '32.931898333333336'],
            ['terms_title',               'Terms & Conditions'],
            ['terms_content',             '<p>By using this website, you agree to use NOVAREX HSE &amp; Sustainability Ltd information and services responsibly. Content on this website is provided for general information and professional engagement purposes. Specific consultancy, training, audit, and compliance work is governed by written proposals, contracts, or engagement terms agreed with NOVAREX.</p><p>Users must not misuse this website, attempt unauthorized access, copy content for misleading purposes, or submit false information through inquiry forms. NOVAREX may update website content, services, and terms when necessary.</p>'],
            ['privacy_title',             'Privacy Policy'],
            ['privacy_content',           '<p>NOVAREX respects your privacy. Information submitted through contact forms, email, phone, or other official channels is used to respond to inquiries, prepare proposals, deliver services, and maintain professional communication.</p><p>We do not sell personal information. We may retain inquiry and communication records for business, legal, quality, and compliance purposes. Website analytics may be used to understand page performance and improve user experience.</p>'],
            ['active_theme',              'saas'],
            ['cookie_enabled',            '1'],
            ['cookie_title',              'Cookie Notice'],
            ['cookie_message',            'We use essential cookies and basic analytics to improve your browsing experience and understand website performance.'],
            ['workplace_policy_title',    'Occupational Health & Safety Policy'],
            ['workplace_policy_content',  "NOVAREX HSE & Sustainability Ltd is committed to fostering a responsible, secure, and well-managed working environment for all employees, contractors, and stakeholders. We ensure that all activities are conducted in compliance with applicable laws, regulations, and internationally recognized HSE principles. We are committed to the prevention of work-related injury and ill health and to the continuous improvement of our occupational health and safety performance.\r\n\r\nOur approach prioritizes risk identification and mitigation, continuous awareness, and responsible environmental practice while ensuring the provision of safe working conditions, appropriate resources, and training. We encourage active consultation and participation of workers, accountability, discipline, and a strong culture of safety and respect across all operations."],
            ['website_name',              'NOVAREX HSE & Sustainability Ltd'],
            ['website_short_name',        'NOVAREX'],
            ['website_subtitle',          'HSE & Sustainability Ltd'],
            ['website_tagline',           'Protecting People. Preserving Environment. Building Sustainability.'],
            ['logo',                      ''],
            ['favicon',                   ''],
            ['email',                     'info@novarex.co.tz'],
            ['phone',                     '+255 755 676 826'],
            ['phone_alt',                 '+255 788 245 844'],
            ['address',                   'Nyasaka A, Opposite EDANA Hotel - PPF Pasiansi / Kilimani Secondary School Junction, Ilemela District, Mwanza, Tanzania.'],
            ['footer_address',            'Nyasaka A, Ilemela District<br>Mwanza, Tanzania'],
            ['location',                  'Mwanza, Tanzania'],
            ['business_hours',            'Mon - Fri: 08:30 - 17:30 EAT, Sat: 09:00 - 14:00 EAT'],
            ['whatsapp',                  '255755676826'],
            ['linkedin',                  'https://linkedin.com/company/novarex-hse-sustainability-ltd'],
            ['facebook',                  'https://www.facebook.com/novarexhsesustainability'],
            ['instagram',                 'https://www.instagram.com/novarextz'],
            ['map_query',                 'Nyasaka A Opposite EDANA Hotel Pasiansi Kilimani Secondary School Junction Mwanza'],
            ['footer_content',            'Professional HSE & Sustainability Consultancy - Mwanza, Tanzania'],
            ['meta_title',                'NOVAREX HSE & Sustainability Ltd - Protecting People. Preserving Environment.'],
            ['meta_description',          'NOVAREX HSE & Sustainability Ltd - Professional HSE, Environmental, ISO, and Sustainability consultancy based in Mwanza, Tanzania.'],
            ['meta_keywords',             'HSE consultancy, sustainability, ISO, environmental consultancy, Mwanza Tanzania'],
        ];

        foreach ($settings as [$key, $value]) {
            DB::table('site_settings')->updateOrInsert(
                ['setting_key' => $key],
                ['setting_value' => $value]
            );
        }
    }
}
