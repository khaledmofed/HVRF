<?php

namespace Database\Seeders;

use App\Models\AboutSection;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    public function run(): void
    {
        AboutSection::updateOrCreate(
            ['id' => 1],
            [
                // English
                'philosophy_title' => 'Our Core Philosophy',
                'philosophy_body'  => '"Human value transcends pure economic output. While AI will outperform humans in speed, memory, repetitive tasks, and data analysis, humans uniquely possess meaning, wisdom, creativity, ethics, connection, and stewardship. HVRF exists to protect and amplify these irreplaceable human qualities as the age of autonomous intelligence unfolds."',
                'vision_title'     => 'Our Vision',
                'vision_body'      => 'To ensure humanity thrives with dignity, meaning, and shared prosperity in the age of autonomous intelligence.',
                'mission_title'    => 'Our Mission',
                'mission_body'     => 'To invest in technologies, systems, and communities that amplify uniquely human strengths alongside the rise of AI; building a world where human contribution is recognized, rewarded, and celebrated.',

                // Japanese 🇯🇵
                'philosophy_title_ja' => '私たちの核心理念',
                'philosophy_body_ja'  => '「人間の価値は純粋な経済的生産を超えています。AIが速度、記憶、反復タスク、データ分析において人間を凌駕する一方で、人間は意味、知恵、創造性、倫理、つながり、管理という固有の資質を持っています。HVRFは自律型インテリジェンスの時代が展開する中で、これらの代替不可能な人間の資質を守り増幅するために存在します。」',
                'vision_title_ja'     => '私たちのビジョン',
                'vision_body_ja'      => '自律型インテリジェンスの時代に、尊厳、意味、共有繁栄をもって人類が繁栄することを確保する。',
                'mission_title_ja'    => '私たちのミッション',
                'mission_body_ja'     => 'AIの台頭と並行して、固有の人間の強みを増幅する技術、システム、コミュニティへの投資；人間の貢献が認識され、報われ、祝われる世界を構築する。',

                // Korean 🇰🇷
                'philosophy_title_ko' => '우리의 핵심 철학',
                'philosophy_body_ko'  => '"인간의 가치는 순수한 경제적 생산을 초월합니다. AI가 속도, 기억, 반복 작업, 데이터 분석에서 인간을 능가할지라도, 인간은 고유하게 의미, 지혜, 창의성, 윤리, 연결, 청지기 정신을 지닙니다. HVRF는 자율 지능 시대가 전개되는 가운데 이러한 대체 불가능한 인간의 자질을 보호하고 증폭하기 위해 존재합니다."',
                'vision_title_ko'     => '우리의 비전',
                'vision_body_ko'      => '자율 지능 시대에 인류가 존엄성, 의미, 공유 번영을 누리며 번성할 수 있도록 보장합니다.',
                'mission_title_ko'    => '우리의 미션',
                'mission_body_ko'     => 'AI의 부상과 함께 고유한 인간의 강점을 증폭시키는 기술, 시스템, 커뮤니티에 투자하여 인간의 기여가 인정받고 보상받으며 축하받는 세상을 만듭니다.',

                // Spanish 🇪🇸
                'philosophy_title_es' => 'Nuestra Filosofía Central',
                'philosophy_body_es'  => '"El valor humano trasciende la producción económica pura. Si bien la IA superará a los humanos en velocidad, memoria, tareas repetitivas y análisis de datos, los humanos poseen de manera única el significado, la sabiduría, la creatividad, la ética, la conexión y la administración. HVRF existe para proteger y amplificar estas cualidades humanas irremplazables a medida que se desarrolla la era de la inteligencia autónoma."',
                'vision_title_es'     => 'Nuestra Visión',
                'vision_body_es'      => 'Asegurar que la humanidad prospere con dignidad, significado y prosperidad compartida en la era de la inteligencia autónoma.',
                'mission_title_es'    => 'Nuestra Misión',
                'mission_body_es'     => 'Invertir en tecnologías, sistemas y comunidades que amplíen las fortalezas únicamente humanas junto con el surgimiento de la IA; construyendo un mundo donde la contribución humana sea reconocida, recompensada y celebrada.',

                // Traditional Chinese 🇹🇼
                'philosophy_title_zh_tw' => '我們的核心理念',
                'philosophy_body_zh_tw'  => '「人類的價值超越了純粹的經濟產出。雖然人工智能在速度、記憶、重複性任務和數據分析方面將超越人類，但人類獨特地擁有意義、智慧、創造力、倫理、連結和管理能力。HVRF的存在是為了在自主智能時代展開之際，保護和放大這些不可替代的人類品質。」',
                'vision_title_zh_tw'     => '我們的願景',
                'vision_body_zh_tw'      => '確保人類在自主智能時代以尊嚴、意義和共同繁榮的方式蓬勃發展。',
                'mission_title_zh_tw'    => '我們的使命',
                'mission_body_zh_tw'     => '投資於在人工智能崛起的同時放大人類獨特優勢的技術、系統和社區；建立一個人類貢獻被認可、回報和慶祝的世界。',

                // Vietnamese 🇻🇳
                'philosophy_title_vi' => 'Triết Lý Cốt Lõi Của Chúng Tôi',
                'philosophy_body_vi'  => '"Giá trị con người vượt xa sản lượng kinh tế thuần túy. Trong khi AI sẽ vượt trội hơn con người về tốc độ, trí nhớ, các nhiệm vụ lặp đi lặp lại và phân tích dữ liệu, con người sở hữu một cách độc đáo ý nghĩa, sự khôn ngoan, sáng tạo, đạo đức, kết nối và quản lý. HVRF tồn tại để bảo vệ và khuếch đại những phẩm chất con người không thể thay thế này khi kỷ nguyên trí tuệ tự chủ triển khai."',
                'vision_title_vi'     => 'Tầm Nhìn Của Chúng Tôi',
                'vision_body_vi'      => 'Đảm bảo nhân loại phát triển với phẩm giá, ý nghĩa và sự thịnh vượng chung trong kỷ nguyên trí tuệ tự chủ.',
                'mission_title_vi'    => 'Sứ Mệnh Của Chúng Tôi',
                'mission_body_vi'     => 'Đầu tư vào các công nghệ, hệ thống và cộng đồng khuếch đại điểm mạnh riêng của con người bên cạnh sự trỗi dậy của AI; xây dựng một thế giới nơi đóng góp của con người được công nhận, khen thưởng và tôn vinh.',

                'updated_at' => now(),
            ]
        );
    }
}
