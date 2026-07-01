<?php

namespace Database\Seeders;

use App\Models\VisionSlide;
use Illuminate\Database\Seeder;

class VisionSlideSeeder extends Seeder
{
    public function run(): void
    {
        if (VisionSlide::count() > 0) return;
        VisionSlide::truncate();

        $slides = [
            [
                'tag'         => 'Human Dignity',
                'title'       => 'The Human at the Center',
                'description' => 'In an age of autonomous intelligence, human worth transcends economic output. Every person remains a node of irreplaceable connection, wisdom, and meaning.',
                'pill_label'  => 'Core Principle',
                'pill_icon'   => 'bi-heart-pulse-fill',
                'sort_order'  => 1,
                'is_active'   => true,

                'tag_ja' => '人間の尊厳', 'title_ja' => '中心にいる人間',
                'description_ja' => '自律型インテリジェンスの時代において、人間の価値は経済的生産を超えています。すべての人は、代替不可能なつながり、知恵、意味のノードであり続けます。',
                'pill_label_ja' => '核心原則',

                'tag_ko' => '인간 존엄성', 'title_ko' => '중심에 있는 인간',
                'description_ko' => '자율 지능 시대에 인간의 가치는 경제적 생산을 초월합니다. 모든 사람은 대체 불가능한 연결, 지혜, 의미의 노드로 남아 있습니다.',
                'pill_label_ko' => '핵심 원칙',

                'tag_es' => 'Dignidad Humana', 'title_es' => 'El Humano en el Centro',
                'description_es' => 'En una era de inteligencia autónoma, el valor humano trasciende la producción económica. Cada persona sigue siendo un nodo de conexión, sabiduría y significado irremplazables.',
                'pill_label_es' => 'Principio Central',

                'tag_zh_tw' => '人類尊嚴', 'title_zh_tw' => '以人類為中心',
                'description_zh_tw' => '在自主智能時代，人類的價值超越了經濟產出。每個人仍然是不可替代的連結、智慧和意義的節點。',
                'pill_label_zh_tw' => '核心原則',

                'tag_vi' => 'Phẩm Giá Con Người', 'title_vi' => 'Con Người Ở Trung Tâm',
                'description_vi' => 'Trong thời đại trí tuệ tự chủ, giá trị con người vượt xa sản lượng kinh tế. Mỗi người vẫn là một nút kết nối, trí tuệ và ý nghĩa không thể thay thế.',
                'pill_label_vi' => 'Nguyên Tắc Cốt Lõi',
            ],
            [
                'tag'         => 'AI Partnership',
                'title'       => 'Intelligence Meets Humanity',
                'description' => 'Artificial intelligence and human wisdom are not opposites. At their intersection lives a new civilisation — one where machines amplify what is uniquely human.',
                'pill_label'  => 'Our Approach',
                'pill_icon'   => 'bi-diagram-3-fill',
                'sort_order'  => 2,
                'is_active'   => true,

                'tag_ja' => 'AIパートナーシップ', 'title_ja' => 'インテリジェンスと人性の出会い',
                'description_ja' => '人工知能と人間の知恵は対立するものではありません。その交差点には新しい文明が生まれ、機械が固有の人間性を増幅する世界が実現します。',
                'pill_label_ja' => '私たちのアプローチ',

                'tag_ko' => 'AI 파트너십', 'title_ko' => '지능과 인류의 만남',
                'description_ko' => '인공지능과 인간의 지혜는 반대가 아닙니다. 그 교차점에는 기계가 고유하게 인간적인 것을 증폭시키는 새로운 문명이 살고 있습니다.',
                'pill_label_ko' => '우리의 접근법',

                'tag_es' => 'Asociación con IA', 'title_es' => 'La Inteligencia Se Encuentra con la Humanidad',
                'description_es' => 'La inteligencia artificial y la sabiduría humana no son opuestos. En su intersección vive una nueva civilización — una donde las máquinas amplían lo que es únicamente humano.',
                'pill_label_es' => 'Nuestro Enfoque',

                'tag_zh_tw' => 'AI夥伴關係', 'title_zh_tw' => '智能與人性的相遇',
                'description_zh_tw' => '人工智能與人類智慧並非對立。在它們的交匯處孕育著新文明——機器放大人類獨特性的世界。',
                'pill_label_zh_tw' => '我們的方法',

                'tag_vi' => 'Quan Hệ Đối Tác AI', 'title_vi' => 'Trí Tuệ Gặp Gỡ Nhân Loại',
                'description_vi' => 'Trí tuệ nhân tạo và sự khôn ngoan của con người không phải là đối lập. Ở giao điểm của chúng tồn tại một nền văn minh mới — nơi máy móc khuếch đại những gì là độc đáo của con người.',
                'pill_label_vi' => 'Cách Tiếp Cận Của Chúng Tôi',
            ],
            [
                'tag'         => 'Future Vision',
                'title'       => 'A Future Worth Building',
                'description' => 'We do not merely adapt to the future — we shape it. A civilisation where every human being finds purpose, dignity, and belonging in a world transformed by AI.',
                'pill_label'  => 'Our Mission',
                'pill_icon'   => 'bi-globe2',
                'sort_order'  => 3,
                'is_active'   => true,

                'tag_ja' => '未来のビジョン', 'title_ja' => '構築する価値のある未来',
                'description_ja' => '私たちは単に未来に適応するのではなく、それを形作ります。AIによって変革された世界でも、すべての人間が目的、尊厳、帰属を見出す文明。',
                'pill_label_ja' => '私たちのミッション',

                'tag_ko' => '미래 비전', 'title_ko' => '구축할 가치 있는 미래',
                'description_ko' => '우리는 단순히 미래에 적응하는 것이 아니라 그것을 형성합니다. AI로 변화된 세상에서 모든 인간이 목적, 존엄성, 소속감을 찾는 문명.',
                'pill_label_ko' => '우리의 미션',

                'tag_es' => 'Visión Futura', 'title_es' => 'Un Futuro que Vale la Pena Construir',
                'description_es' => 'No nos limitamos a adaptarnos al futuro — lo moldeamos. Una civilización donde cada ser humano encuentra propósito, dignidad y pertenencia en un mundo transformado por la IA.',
                'pill_label_es' => 'Nuestra Misión',

                'tag_zh_tw' => '未來願景', 'title_zh_tw' => '值得建構的未來',
                'description_zh_tw' => '我們不僅僅是適應未來——我們塑造它。在一個被AI改變的世界裡，每個人都能找到目的、尊嚴和歸屬感的文明。',
                'pill_label_zh_tw' => '我們的使命',

                'tag_vi' => 'Tầm Nhìn Tương Lai', 'title_vi' => 'Một Tương Lai Đáng Xây Dựng',
                'description_vi' => 'Chúng ta không chỉ thích nghi với tương lai — chúng ta định hình nó. Một nền văn minh nơi mỗi con người tìm thấy mục đích, phẩm giá và sự thuộc về trong thế giới được AI biến đổi.',
                'pill_label_vi' => 'Sứ Mệnh Của Chúng Tôi',
            ],
        ];

        foreach ($slides as $slide) {
            VisionSlide::create($slide);
        }
    }
}
