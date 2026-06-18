<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('services')->truncate();

        DB::table('services')->insert([
            [
                'title'       => 'HSE / HSSE Consulting',
                'description' => 'NOVAREX delivers end-to-end HSSE consulting focused on strengthening workplace safety systems, regulatory compliance, and operational risk control. We support organizations in developing and implementing safety management systems, conducting risk assessments, site inspections, incident investigations, and corrective actions, alongside HSE audits and performance reviews to improve safety culture and operational integrity.',
                'tag'         => 'Health & Safety',
                'icon'        => 'fa-solid fa-helmet-safety',
                'image'       => '',
                'accent'      => 'blue',
                'sort_order'  => 1,
                'is_active'   => 1,
                'created_at'  => '2026-05-26 23:30:31',
                'updated_at'  => '2026-06-04 14:12:05',
            ],
            [
                'title'       => 'ISO Management Systems',
                'description' => 'We provide ISO consultancy for ISO 9001, ISO 14001, ISO 45001, and ISO 50001, supporting organizations in building structured and effective management systems. Services include system design, documentation, implementation, integration, internal auditing, compliance support, and certification readiness to ensure sustained conformity and continual improvement.',
                'tag'         => 'ISO Standards',
                'icon'        => 'fa-solid fa-certificate',
                'image'       => '',
                'accent'      => 'blue',
                'sort_order'  => 2,
                'is_active'   => 1,
                'created_at'  => '2026-05-26 23:30:31',
                'updated_at'  => '2026-06-13 06:20:14',
            ],
            [
                'title'       => 'Environmental Management & Pollution Control',
                'description' => 'NOVAREX provides Environmental Management & Pollution Control services focused on compliance, prevention, and sustainability. Our services include environmental impact assessments, pollution control, waste and hazardous material management, environmental monitoring, regulatory compliance audits, ISO 14001 support, and environmental risk management to reduce impacts and ensure sustainable operations.',
                'tag'         => 'Environmental Compliance',
                'icon'        => 'fa-solid fa-leaf',
                'image'       => '',
                'accent'      => 'green',
                'sort_order'  => 3,
                'is_active'   => 1,
                'created_at'  => '2026-05-26 23:30:31',
                'updated_at'  => '2026-06-13 06:30:04',
            ],
            [
                'title'       => 'ESG Advisory & Sustainability Services',
                'description' => 'We support organizations in integrating Environmental, Social, and Governance (ESG) principles into strategy, operations, and decision-making. Our services include ESG risk screening, ESG strategy development, stakeholder engagement, sustainability reporting, compliance monitoring, and integration of ESG considerations into project planning and execution.',
                'tag'         => 'ESG & Sustainability',
                'icon'        => 'fa-solid fa-seedling',
                'image'       => '',
                'accent'      => 'green',
                'sort_order'  => 4,
                'is_active'   => 1,
                'created_at'  => '2026-05-26 23:30:31',
                'updated_at'  => '2026-06-13 06:10:03',
            ],
            [
                'title'       => 'Fire, Emergency & Disaster Risk Management',
                'description' => 'NOVAREX provides Fire, Emergency & Disaster Risk Management services focused on prevention, preparedness, response, and recovery. Our services include fire risk assessments, fire prevention and control planning, emergency evacuation planning, fire safety audits and compliance inspections, emergency response system development, crisis and disaster preparedness planning, and business continuity support to strengthen organizational safety and resilience.',
                'tag'         => 'Fire Risk & Safety',
                'icon'        => 'fa-solid fa-cloud-bolt',
                'image'       => '',
                'accent'      => 'blue',
                'sort_order'  => 5,
                'is_active'   => 1,
                'created_at'  => '2026-05-26 23:30:31',
                'updated_at'  => '2026-06-13 06:13:50',
            ],
            [
                'title'       => 'Incident Investigation and Root Cause Analysis',
                'description' => 'We deliver structured incident investigation services to determine the root causes of incidents and prevent recurrence. Using established methods such as Root Cause Analysis (RCA), 5 Whys, and cause-and-effect analysis, we evaluate incidents including injuries, near-misses, equipment failures, environmental events, and operational disruptions, and develop actionable corrective measures.',
                'tag'         => 'Incident Investigation',
                'icon'        => 'fa-solid fa-magnifying-glass',
                'image'       => '',
                'accent'      => 'blue',
                'sort_order'  => 6,
                'is_active'   => 1,
                'created_at'  => '2026-06-04 13:41:32',
                'updated_at'  => '2026-06-13 06:15:54',
            ],
            [
                'title'       => 'Training, Auditing & Compliance Support',
                'description' => 'We offer tailored training, internal auditor and lead auditor development, auditing, and compliance services across HSE, ISO, ESG, and environmental domains. Our programs include internal audits, lead auditor training, compliance assessments, and capacity-building initiatives designed to strengthen organizational competence, improve system performance, and ensure continuous regulatory compliance and improvement.',
                'tag'         => 'Capacity Building',
                'icon'        => 'fa-solid fa-chalkboard-user',
                'image'       => '',
                'accent'      => 'green',
                'sort_order'  => 7,
                'is_active'   => 1,
                'created_at'  => '2026-05-26 23:30:31',
                'updated_at'  => '2026-06-13 06:34:01',
            ],
        ]);
    }
}
