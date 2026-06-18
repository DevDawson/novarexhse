<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentSectionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('content_sections')->upsert(
            [
                [
                    'section_key'      => 'hero',
                    'eyebrow'          => 'HSE & Sustainability Consultancy - Mwanza, Tanzania',
                    'title'            => "Build Safer,\r\nCompliant\r\n& Sustainable\r\nOperations.",
                    'subtitle'         => 'NOVAREX HSE & Sustainability Ltd provides expert HSE management systems, ISO auditing, compliance, and sustainability consultancy services. We partner with organizations to improve operational excellence, strengthen governance, reduce risks, and foster a culture of safety and continuous improvement while protecting people, preserving the environment, and building a more sustainable future.',
                    'content'          => '',
                    'button_text'      => 'Request Consultation',
                    'button_url'       => '#contact',
                    'image'            => '',
                    'background_image' => '',
                    'extra_json'       => '[]',
                    'updated_at'       => now(),
                ],
                [
                    'section_key'      => 'about',
                    'eyebrow'          => 'About NOVAREX',
                    'title'            => 'Professional consultancy built on protection, performance, and sustainability excellence.',
                    'subtitle'         => 'NOVAREX is an Environment, Health, Safety and Risk Management consultancy delivering practical advisory, technical support, training, auditing, and compliance services. We support organizations in strengthening environmental stewardship, improving occupational health and safety performance, enhancing risk management systems, and achieving regulatory and ISO compliance for sustainable operational excellence.',
                    'content'          => 'To provide practical and implementable solutions aligned with ISO standards, regulatory requirements, and international best practice, enabling organizations to achieve compliance, enhance operational performance, and strengthen resilience across their systems and operations.',
                    'button_text'      => '',
                    'button_url'       => '',
                    'image'            => '',
                    'background_image' => '',
                    'extra_json'       => '{"mission":"To deliver professional environment, health, safety, and risk management solutions that protect people, preserve the environment, and build resilient organizations across industries through practical, compliant, and effective systems-based approaches.","vision":"To be a trusted leader in Environment, Health, Safety and Risk Management consultancy, delivering innovative, standards-based solutions that enhance workplace safety, strengthen environmental performance, and support sustainable development outcomes.","commitment":"To provide practical and implementable solutions aligned with ISO standards, regulatory requirements, and international best practice, supporting organizations in achieving compliance, improving performance, and strengthening operational resilience."}',
                    'updated_at'       => now(),
                ],
            ],
            ['section_key'],
            ['eyebrow','title','subtitle','content','button_text','button_url','image','background_image','extra_json','updated_at']
        );
    }
}
