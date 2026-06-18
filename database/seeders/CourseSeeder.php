<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('courses')->truncate();

        DB::table('courses')->insert([
            [
                'code'        => '01 / HSE',
                'title'       => 'Workplace HSE Systems',
                'description' => 'HSE systems development, safe work procedures, toolbox talks, and safety culture building for operational teams.',
                'image'       => null,
                'duration'    => 'On request',
                'price'       => 'On request',
                'mode'        => 'Awareness & Implementation',
                'sort_order'  => 1,
                'is_active'   => 1,
                'created_at'  => '2026-05-26 23:30:31',
                'updated_at'  => '2026-05-26 23:30:31',
            ],
            [
                'code'        => '02 / RISK',
                'title'       => 'Hazard Identification & Risk Assessment',
                'description' => 'Application of HIRA and JSA methodologies, risk control frameworks, site inspections, and operational hazard awareness programs to identify, evaluate, and control workplace hazards.',
                'image'       => '',
                'duration'    => 'On request',
                'price'       => 'On request',
                'mode'        => 'Technical Skills',
                'sort_order'  => 2,
                'is_active'   => 1,
                'created_at'  => '2026-05-26 23:30:31',
                'updated_at'  => '2026-06-04 06:09:21',
            ],
            [
                'code'        => '03 / AUDIT',
                'title'       => 'Safety Audits & Inspections',
                'description' => 'Compliance review techniques, site inspection methodology, ISO 19011 audit principles, internal and lead auditor practices for ISO 9001, 14001, 45001 & 50001, incident investigation, nonconformity reporting, and safety reporting competence.',
                'image'       => '',
                'duration'    => 'On request',
                'price'       => 'On request',
                'mode'        => 'ISO Internal & Lead Auditor Training',
                'sort_order'  => 3,
                'is_active'   => 1,
                'created_at'  => '2026-05-26 23:30:31',
                'updated_at'  => '2026-06-13 06:56:54',
            ],
            [
                'code'        => '04 / ISO',
                'title'       => 'ISO Management Systems Awareness & Implementation Training',
                'description' => 'ISO 9001, 14001, 45001 & 50001 awareness, system implementation requirements, documentation control, and operational competency development for effective management system performance.',
                'image'       => '',
                'duration'    => 'On request',
                'price'       => 'On request',
                'mode'        => 'ISO 9001 / 14001 / 45001 / 50001',
                'sort_order'  => 4,
                'is_active'   => 1,
                'created_at'  => '2026-05-26 23:30:31',
                'updated_at'  => '2026-06-13 06:46:43',
            ],
            [
                'code'        => '05 / ESG',
                'title'       => 'Sustainability & ESG Awareness',
                'description' => 'Introduction to Environmental, Social and Governance (ESG) principles, sustainability concepts, ESG risk management, reporting frameworks, stakeholder engagement, and practical ESG implementation within organizations and projects.',
                'image'       => '',
                'duration'    => 'On request',
                'price'       => 'On request',
                'mode'        => 'ESG Fundamentals',
                'sort_order'  => 5,
                'is_active'   => 1,
                'created_at'  => '2026-05-26 23:30:31',
                'updated_at'  => '2026-06-03 06:59:15',
            ],
            [
                'code'        => '06 / ENV',
                'title'       => 'Environmental Compliance Training',
                'description' => 'Environmental management systems, regulatory compliance, environmental impact assessment, pollution sources and pathways, pollution control technologies, environmental monitoring, waste and emission management, emergency response, and performance improvement.',
                'image'       => '',
                'duration'    => 'On request',
                'price'       => 'On request',
                'mode'        => 'Regulatory Compliance',
                'sort_order'  => 6,
                'is_active'   => 1,
                'created_at'  => '2026-05-26 23:30:31',
                'updated_at'  => '2026-06-13 07:12:57',
            ],
            [
                'code'        => '08 / DRR',
                'title'       => 'Disaster Preparedness & Resilience',
                'description' => 'Emergency preparedness and response planning, pollution incident control, spill prevention and containment, crisis response protocols, environmental emergency management, business continuity planning, and organizational resilience building.',
                'image'       => '',
                'duration'    => 'On request',
                'price'       => 'On request',
                'mode'        => 'Resilience & Response',
                'sort_order'  => 8,
                'is_active'   => 1,
                'created_at'  => '2026-05-26 23:30:31',
                'updated_at'  => '2026-06-13 07:21:04',
            ],
        ]);
    }
}
