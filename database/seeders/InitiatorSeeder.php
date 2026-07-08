<?php

namespace Database\Seeders;

use App\Models\Initiator;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class InitiatorSeeder extends Seeder
{
    public function run(): void
    {
        $initiators = [
            ['name' => 'SV Angel', 'logo_url' => 'sv-angel.png', 'website_url' => 'https://svangel.com'],
            ['name' => 'Silicon Valley Academy of Artificial Intelligence', 'logo_url' => 'svaai.png', 'website_url' => 'https://svai.academy/'],
            ['name' => 'OpenAI', 'logo_url' => 'openai.webp', 'website_url' => 'https://openai.com'],
            ['name' => 'Anthropic', 'logo_url' => 'anthropic.webp', 'website_url' => 'https://anthropic.com'],
            ['name' => 'Microsoft', 'logo_url' => 'microsoft.png', 'website_url' => 'https://microsoft.com'],
            ['name' => 'Google DeepMind', 'logo_url' => 'google-deepmind.svg', 'website_url' => 'https://deepmind.google'],
            ['name' => 'Aeterna Foundation', 'logo_url' => 'aeterna-foundation.png', 'website_url' => 'https://aeternax.net/'],
            ['name' => 'Salesforce (Agentforce)', 'logo_url' => 'salesforce.svg', 'website_url' => 'https://www.salesforce.com'],
            ['name' => 'Cognition AI', 'logo_url' => 'cognition-ai.png', 'website_url' => 'https://cognition.ai'],
            ['name' => 'Sierra', 'logo_url' => 'sierra.png', 'website_url' => 'https://sierra.ai'],
            ['name' => 'AWS', 'logo_url' => 'aws.webp', 'website_url' => 'https://aws.amazon.com'],
            ['name' => 'IBMi', 'logo_url' => 'ibmi.webp', 'website_url' => 'https://www.ibm.com'],
            ['name' => 'Glean', 'logo_url' => 'glean.svg', 'website_url' => 'https://glean.com'],
            ['name' => 'Harvey AI', 'logo_url' => 'harvey-ai.png', 'website_url' => 'https://harvey.ai'],
            ['name' => 'Moveworks', 'logo_url' => 'moveworks.svg', 'website_url' => 'https://moveworks.com'],
            ['name' => 'Aisera', 'logo_url' => 'aisera.webp', 'website_url' => 'https://aisera.com'],
            ['name' => 'CrewAI', 'logo_url' => 'crewai.png', 'website_url' => 'https://crewai.com'],
            ['name' => 'Beam AI', 'logo_url' => 'beam-ai.png', 'website_url' => 'https://beam.ai'],
        ];

        foreach ($initiators as $index => $initiator) {
            Initiator::updateOrCreate(
                ['name' => $initiator['name']],
                array_merge($initiator, [
                    'logo_url'   => '/images/initiators/' . $initiator['logo_url'],
                    'sort_order' => $index + 1,
                    'is_active'  => true,
                    'updated_at' => now(),
                ])
            );
        }

        $header = [
            'initiators_label'          => 'Backed By',
            'initiators_heading'        => 'Our Initiators',
            'initiators_subtitle'       => "Leading AI labs, enterprises, and visionaries helping shape HVRF's mission.",

            'initiators_label_ja'       => '協力企業',
            'initiators_heading_ja'     => '私たちのイニシエーター',
            'initiators_subtitle_ja'    => 'HVRFの使命を形作ることに協力する、主要なAI研究機関、企業、そして先見者たち。',

            'initiators_label_ko'       => '후원 기업',
            'initiators_heading_ko'     => '우리의 이니시에이터',
            'initiators_subtitle_ko'    => 'HVRF의 사명을 형성하는 데 도움을 주는 선도적인 AI 연구소, 기업, 그리고 비전가들.',

            'initiators_label_es'       => 'Respaldado Por',
            'initiators_heading_es'     => 'Nuestros Iniciadores',
            'initiators_subtitle_es'    => 'Laboratorios de IA líderes, empresas y visionarios que ayudan a dar forma a la misión de HVRF.',

            'initiators_label_zh_tw'    => '支持夥伴',
            'initiators_heading_zh_tw'  => '我們的發起夥伴',
            'initiators_subtitle_zh_tw' => '協助塑造 HVRF 使命的頂尖人工智慧實驗室、企業與遠見者。',

            'initiators_label_vi'       => 'Được Hậu Thuẫn Bởi',
            'initiators_heading_vi'     => 'Các Nhà Sáng Lập',
            'initiators_subtitle_vi'    => 'Các phòng thí nghiệm AI hàng đầu, doanh nghiệp và những nhà tầm nhìn giúp định hình sứ mệnh của HVRF.',
        ];

        foreach ($header as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value, 'group' => 'initiators', 'updated_at' => now()]);
        }
    }
}
