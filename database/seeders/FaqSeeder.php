<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('faqs')->truncate();

        DB::table('faqs')->insert([
            ['question' => 'What services does NOVAREX provide?',                     'answer' => 'NOVAREX provides HSE consulting, ISO management systems, environmental and climate risk advisory, EIA/ESIA support, ESG and sustainability services, training, audits, and compliance support.',                                                           'sort_order' => 1, 'is_active' => 1, 'created_at' => '2026-05-26 23:28:13', 'updated_at' => '2026-05-26 23:28:13'],
            ['question' => 'Does NOVAREX offer professional training?',               'answer' => 'Yes. NOVAREX provides professional awareness, implementation, internal auditing, and capacity-building programs aligned with HSE, ISO, environmental, ESG, and resilience needs.',                                                                         'sort_order' => 2, 'is_active' => 1, 'created_at' => '2026-05-26 23:28:13', 'updated_at' => '2026-05-26 23:28:13'],
            ['question' => 'Can NOVAREX support ISO implementation?',                 'answer' => 'Yes. We support ISO 9001, ISO 14001, ISO 45001, and ISO 50001 aligned systems, documentation, internal audits, implementation, and certification readiness.',                                                                                             'sort_order' => 3, 'is_active' => 1, 'created_at' => '2026-05-26 23:28:13', 'updated_at' => '2026-05-26 23:28:13'],
            ['question' => 'How much do NOVAREX services cost?',                      'answer' => 'Our pricing varies based on the scope, complexity, and duration of the project; contact us for a customized quotation.',                                                                                                                                    'sort_order' => 4, 'is_active' => 1, 'created_at' => '2026-06-03 05:53:36', 'updated_at' => '2026-06-03 05:54:22'],
            ['question' => 'How can I request a proposal?',                           'answer' => 'You can request a proposal by completing our contact form, emailing info@novarex.co.tz, or contacting NOVAREX via WhatsApp or phone.',                                                                                                                     'sort_order' => 5, 'is_active' => 1, 'created_at' => '2026-05-26 23:28:13', 'updated_at' => '2026-06-03 05:56:24'],
            ['question' => 'How long does an ISO implementation project take?',       'answer' => "Project timelines vary depending on your organization's size and readiness, but most implementations take several weeks to a few months.",                                                                                                                  'sort_order' => 6, 'is_active' => 1, 'created_at' => '2026-06-03 05:57:25', 'updated_at' => '2026-06-03 05:57:25'],
            ['question' => 'Does NOVAREX offer professional training?',               'answer' => 'Yes, we provide professional training programs designed to enhance skills, compliance, and organizational performance.',                                                                                                                                     'sort_order' => 7, 'is_active' => 1, 'created_at' => '2026-06-03 05:58:07', 'updated_at' => '2026-06-03 05:58:07'],
            ['question' => 'Does NOVAREX provide ongoing support after certification?','answer' => 'Yes, we offer continued support, monitoring, and improvement services to help maintain compliance and certification requirements.',                                                                                                                         'sort_order' => 8, 'is_active' => 1, 'created_at' => '2026-06-03 05:59:03', 'updated_at' => '2026-06-03 05:59:03'],
        ]);
    }
}
