<?php

namespace Database\Seeders;

use App\Models\HeroSection;
use Illuminate\Database\Seeder;

class HeroSeeder extends Seeder
{
    public function run(): void
    {
        HeroSection::updateOrCreate(
            ['id' => 1],
            [
                // English
                'quote_text'           => "In an age where intelligence and labor become automated, humanity's greatest value will come from meaning, wisdom, creativity, ethics, connection, and stewardship.",
                'headline'             => 'Human Value Reserve Foundation',
                'subheadline'          => 'Ensuring humanity thrives with dignity, meaning, and shared prosperity in the age of autonomous intelligence.',
                'cta_primary_label'    => 'Explore Our Mission',
                'cta_primary_url'      => '#about',
                'cta_secondary_label'  => 'Join the Movement',
                'cta_secondary_url'    => '#join',
                'is_active'            => true,

                // Japanese 🇯🇵
                'quote_text_ja'          => '知能と労働が自動化される時代において、人類の最大の価値は意味、知恵、創造性、倫理、つながり、そして管理から生まれます。',
                'headline_ja'            => 'ヒューマン・バリュー・リザーブ財団',
                'subheadline_ja'         => '自律型インテリジェンスの時代に、尊厳、意味、共有繁栄をもって人類が繁栄できるよう確保します。',
                'cta_primary_label_ja'   => 'ミッションを探る',
                'cta_secondary_label_ja' => '運動に参加する',

                // Korean 🇰🇷
                'quote_text_ko'          => '지능과 노동이 자동화되는 시대에, 인류의 가장 큰 가치는 의미, 지혜, 창의성, 윤리, 연결, 그리고 관리에서 나올 것입니다.',
                'headline_ko'            => '인간 가치 보존 재단',
                'subheadline_ko'         => '자율 지능 시대에 인류가 존엄성, 의미, 공유 번영을 누리며 번성할 수 있도록 보장합니다.',
                'cta_primary_label_ko'   => '우리의 미션 탐색',
                'cta_secondary_label_ko' => '운동에 참여',

                // Spanish 🇪🇸
                'quote_text_es'          => 'En una era donde la inteligencia y el trabajo se automatizan, el mayor valor de la humanidad provendrá del significado, la sabiduría, la creatividad, la ética, la conexión y la administración.',
                'headline_es'            => 'Fundación de Reserva de Valor Humano',
                'subheadline_es'         => 'Asegurando que la humanidad prospere con dignidad, significado y prosperidad compartida en la era de la inteligencia autónoma.',
                'cta_primary_label_es'   => 'Explorar Nuestra Misión',
                'cta_secondary_label_es' => 'Únete al Movimiento',

                // Traditional Chinese 🇹🇼
                'quote_text_zh_tw'          => '在智能與勞動走向自動化的時代，人類最大的價值將來自意義、智慧、創造力、倫理、連結和管理。',
                'headline_zh_tw'            => '人類價值儲備基金會',
                'subheadline_zh_tw'         => '確保人類在自主智能時代以尊嚴、意義和共同繁榮的方式蓬勃發展。',
                'cta_primary_label_zh_tw'   => '探索我們的使命',
                'cta_secondary_label_zh_tw' => '加入運動',

                // Vietnamese 🇻🇳
                'quote_text_vi'          => 'Trong một thời đại mà trí tuệ và lao động ngày càng được tự động hóa, giá trị lớn nhất của nhân loại sẽ đến từ ý nghĩa, sự khôn ngoan, sáng tạo, đạo đức, kết nối và quản lý.',
                'headline_vi'            => 'Quỹ Dự Trữ Giá Trị Con Người',
                'subheadline_vi'         => 'Đảm bảo nhân loại phát triển với phẩm giá, ý nghĩa và sự thịnh vượng chung trong kỷ nguyên trí tuệ tự chủ.',
                'cta_primary_label_vi'   => 'Khám Phá Sứ Mệnh',
                'cta_secondary_label_vi' => 'Tham Gia Phong Trào',

                'updated_at' => now(),
            ]
        );
    }
}
