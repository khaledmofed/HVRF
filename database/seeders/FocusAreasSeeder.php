<?php

namespace Database\Seeders;

use App\Models\FocusArea;
use Illuminate\Database\Seeder;

class FocusAreasSeeder extends Seeder
{
    public function run(): void
    {
        $areas = [
            [
                'number' => 1, 'icon_name' => 'bi-people-fill', 'sort_order' => 1, 'is_active' => true,
                'title'       => 'Human Connection Systems',
                'description' => 'Building and sustaining meaningful human relationships in an increasingly automated world. We invest in platforms and systems that foster community, belonging, and genuine human bonds across generations.',
                'examples_json' => ['Community platforms', 'Elder care networks', 'Family support AI', 'Mentorship networks', 'Neighborhood collaboration tools'],

                'title_ja' => '人間のつながりシステム',
                'description_ja' => 'ますます自動化される世界で、意味のある人間関係を構築・維持します。世代を超えて、コミュニティ、帰属感、真の人間的絆を育むプラットフォームとシステムに投資します。',
                'examples_json_ja' => ['コミュニティプラットフォーム', '高齢者ケアネットワーク', 'ファミリーサポートAI', 'メンターシップネットワーク', '近隣協力ツール'],

                'title_ko' => '인간 연결 시스템',
                'description_ko' => '점점 자동화되는 세상에서 의미 있는 인간 관계를 구축하고 유지합니다. 세대를 초월하여 커뮤니티, 소속감, 진정한 인간 유대를 육성하는 플랫폼과 시스템에 투자합니다.',
                'examples_json_ko' => ['커뮤니티 플랫폼', '노인 케어 네트워크', '가족 지원 AI', '멘토십 네트워크', '이웃 협력 도구'],

                'title_es' => 'Sistemas de Conexión Humana',
                'description_es' => 'Construyendo y sosteniendo relaciones humanas significativas en un mundo cada vez más automatizado. Invertimos en plataformas y sistemas que fomentan la comunidad, la pertenencia y los vínculos humanos genuinos entre generaciones.',
                'examples_json_es' => ['Plataformas comunitarias', 'Redes de cuidado de ancianos', 'IA de apoyo familiar', 'Redes de mentoría', 'Herramientas de colaboración vecinal'],

                'title_zh_tw' => '人際連結系統',
                'description_zh_tw' => '在日益自動化的世界中建立和維繫有意義的人際關係。我們投資於跨世代培育社群、歸屬感和真實人際紐帶的平台和系統。',
                'examples_json_zh_tw' => ['社群平台', '長者照護網絡', '家庭支援AI', '導師網絡', '鄰里協作工具'],

                'title_vi' => 'Hệ Thống Kết Nối Con Người',
                'description_vi' => 'Xây dựng và duy trì các mối quan hệ con người có ý nghĩa trong thế giới ngày càng tự động hóa. Chúng tôi đầu tư vào các nền tảng và hệ thống nuôi dưỡng cộng đồng, sự thuộc về và mối liên kết con người thực sự qua các thế hệ.',
                'examples_json_vi' => ['Nền tảng cộng đồng', 'Mạng lưới chăm sóc người cao tuổi', 'AI hỗ trợ gia đình', 'Mạng lưới cố vấn', 'Công cụ hợp tác xóm làng'],
            ],
            [
                'number' => 2, 'icon_name' => 'bi-bullseye', 'sort_order' => 2, 'is_active' => true,
                'title'       => 'Human Purpose Infrastructure',
                'description' => 'Creating systems where humans can mentor, teach, create, volunteer, and solve local problems — making human contribution socially visible, rewarded, and central to society.',
                'examples_json' => ['Mentorship platforms', 'Teaching networks', 'Creative contribution systems', 'Volunteer mission coordination', 'Local problem-solving hubs'],

                'title_ja' => '人間の目的インフラ',
                'description_ja' => '人間がメンタリング、教育、創造、ボランティア、地域の問題解決ができるシステムを構築し、人間の貢献を社会的に可視化、報酬化、社会の中心に据えます。',
                'examples_json_ja' => ['メンターシッププラットフォーム', '教育ネットワーク', 'クリエイティブ貢献システム', 'ボランティアミッションコーディネーション', '地域問題解決ハブ'],

                'title_ko' => '인간 목적 인프라',
                'description_ko' => '인간이 멘토링, 교육, 창작, 자원봉사, 지역 문제 해결을 할 수 있는 시스템을 만들어 인간의 기여를 사회적으로 가시화하고 보상하며 사회의 중심으로 만듭니다.',
                'examples_json_ko' => ['멘토십 플랫폼', '교육 네트워크', '창의적 기여 시스템', '자원봉사 미션 조정', '지역 문제 해결 허브'],

                'title_es' => 'Infraestructura de Propósito Humano',
                'description_es' => 'Creando sistemas donde los humanos pueden orientar, enseñar, crear, hacer voluntariado y resolver problemas locales, haciendo que la contribución humana sea socialmente visible, recompensada y central para la sociedad.',
                'examples_json_es' => ['Plataformas de mentoría', 'Redes de enseñanza', 'Sistemas de contribución creativa', 'Coordinación de misiones voluntarias', 'Centros de resolución de problemas locales'],

                'title_zh_tw' => '人類目的基礎設施',
                'description_zh_tw' => '創建讓人類能夠指導、教學、創造、志願服務和解決地方問題的系統，使人類貢獻在社會上可見、受到獎勵並成為社會核心。',
                'examples_json_zh_tw' => ['導師平台', '教學網絡', '創意貢獻系統', '志願任務協調', '地方問題解決中心'],

                'title_vi' => 'Cơ Sở Hạ Tầng Mục Đích Con Người',
                'description_vi' => 'Tạo ra các hệ thống nơi con người có thể cố vấn, dạy học, sáng tạo, tình nguyện và giải quyết các vấn đề địa phương — làm cho đóng góp của con người được xã hội nhìn nhận, khen thưởng và trở thành trung tâm của xã hội.',
                'examples_json_vi' => ['Nền tảng cố vấn', 'Mạng lưới giảng dạy', 'Hệ thống đóng góp sáng tạo', 'Điều phối nhiệm vụ tình nguyện', 'Trung tâm giải quyết vấn đề địa phương'],
            ],
            [
                'number' => 3, 'icon_name' => 'bi-robot', 'sort_order' => 3, 'is_active' => true,
                'title'       => 'Human Enhancement',
                'description' => 'Deploying AI as a copilot for human capability — not a replacement. We fund tools that make humans smarter, healthier, and more capable through thoughtful AI augmentation.',
                'examples_json' => ['AI copilots for professionals', 'AI-enhanced education', 'AI healthcare tools', 'Accessibility technology', 'Cognitive enhancement platforms'],

                'title_ja' => '人間強化',
                'description_ja' => 'AIを人間の能力のコパイロットとして活用し、代替ではなく補完します。思慮深いAI拡張を通じて、人間をよりスマートに、健康に、有能にするツールを資金援助します。',
                'examples_json_ja' => ['プロフェッショナル向けAIコパイロット', 'AI強化教育', 'AI医療ツール', 'アクセシビリティ技術', '認知強化プラットフォーム'],

                'title_ko' => '인간 향상',
                'description_ko' => 'AI를 인간 능력의 공동 조종사로 배치하며 대체가 아닌 보완으로 활용합니다. 사려 깊은 AI 증강을 통해 인간을 더 스마트하고, 건강하고, 유능하게 만드는 도구에 자금을 지원합니다.',
                'examples_json_ko' => ['전문가용 AI 코파일럿', 'AI 강화 교육', 'AI 의료 도구', '접근성 기술', '인지 강화 플랫폼'],

                'title_es' => 'Mejora Humana',
                'description_es' => 'Implementando la IA como copiloto de la capacidad humana, no como reemplazo. Financiamos herramientas que hacen a los humanos más inteligentes, saludables y capaces a través de una aumentación IA reflexiva.',
                'examples_json_es' => ['Copilotos de IA para profesionales', 'Educación mejorada por IA', 'Herramientas de salud con IA', 'Tecnología de accesibilidad', 'Plataformas de mejora cognitiva'],

                'title_zh_tw' => '人類增強',
                'description_zh_tw' => '將AI部署為人類能力的副駕駛——而非替代品。我們資助通過深思熟慮的AI增強使人類更聰明、更健康、更有能力的工具。',
                'examples_json_zh_tw' => ['專業人士AI副駕駛', 'AI增強教育', 'AI醫療工具', '無障礙技術', '認知增強平台'],

                'title_vi' => 'Nâng Cao Năng Lực Con Người',
                'description_vi' => 'Triển khai AI như một phi công phụ cho khả năng con người — không phải là sự thay thế. Chúng tôi tài trợ các công cụ giúp con người thông minh hơn, khỏe mạnh hơn và có năng lực hơn thông qua tăng cường AI chu đáo.',
                'examples_json_vi' => ['AI đồng hành cho chuyên gia', 'Giáo dục được AI tăng cường', 'Công cụ y tế AI', 'Công nghệ tiếp cận', 'Nền tảng nâng cao nhận thức'],
            ],
            [
                'number' => 4, 'icon_name' => 'bi-palette-fill', 'sort_order' => 4, 'is_active' => true,
                'title'       => 'Human Creativity Economy',
                'description' => 'Ensuring that human creativity — art, storytelling, design, music, innovation — thrives and is valued in an age of AI-generated content. We build ecosystems that celebrate and monetize genuine human expression.',
                'examples_json' => ['Creator ecosystems', 'Artist grants & funding', 'AI-human collaboration tools', 'Creative marketplaces', 'Authenticity certification systems'],

                'title_ja' => '人間の創造性経済',
                'description_ja' => 'AI生成コンテンツの時代に、人間の創造性（芸術、ストーリーテリング、デザイン、音楽、イノベーション）が繁栄し、価値を持つことを確保します。',
                'examples_json_ja' => ['クリエイターエコシステム', 'アーティスト助成金と資金調達', 'AI-人間コラボレーションツール', 'クリエイティブマーケットプレイス', '真正性認証システム'],

                'title_ko' => '인간 창의성 경제',
                'description_ko' => 'AI 생성 콘텐츠 시대에 인간의 창의성(예술, 스토리텔링, 디자인, 음악, 혁신)이 번성하고 가치 있게 여겨지도록 보장합니다.',
                'examples_json_ko' => ['크리에이터 에코시스템', '아티스트 보조금 및 자금 조달', 'AI-인간 협업 도구', '창의적 마켓플레이스', '진정성 인증 시스템'],

                'title_es' => 'Economía de la Creatividad Humana',
                'description_es' => 'Asegurando que la creatividad humana — arte, narrativa, diseño, música, innovación — prospere y sea valorada en una era de contenido generado por IA.',
                'examples_json_es' => ['Ecosistemas de creadores', 'Becas y financiación para artistas', 'Herramientas de colaboración IA-humano', 'Mercados creativos', 'Sistemas de certificación de autenticidad'],

                'title_zh_tw' => '人類創造力經濟',
                'description_zh_tw' => '確保人類創造力——藝術、故事、設計、音樂、創新——在AI生成內容時代蓬勃發展並受到重視。我們建立慶祝和變現真實人類表達的生態系統。',
                'examples_json_zh_tw' => ['創作者生態系統', '藝術家補助和資金', 'AI-人類協作工具', '創意市場', '真實性認證系統'],

                'title_vi' => 'Nền Kinh Tế Sáng Tạo Con Người',
                'description_vi' => 'Đảm bảo sự sáng tạo của con người — nghệ thuật, kể chuyện, thiết kế, âm nhạc, đổi mới — phát triển và được đánh giá cao trong thời đại nội dung do AI tạo ra.',
                'examples_json_vi' => ['Hệ sinh thái nhà sáng tạo', 'Tài trợ và tài trợ cho nghệ sĩ', 'Công cụ hợp tác AI-người', 'Thị trường sáng tạo', 'Hệ thống chứng nhận tính xác thực'],
            ],
            [
                'number' => 5, 'icon_name' => 'bi-shield-check', 'sort_order' => 5, 'is_active' => true,
                'title'       => 'Ethics & Governance',
                'description' => 'Shaping the rules and norms of AI development to ensure it serves humanity. We advocate for transparent, aligned, and accountable AI systems through policy, research, and public engagement.',
                'examples_json' => ['AI transparency initiatives', 'Alignment research', 'Governance frameworks', 'Accountability systems', 'Public AI literacy programs'],

                'title_ja' => '倫理とガバナンス',
                'description_ja' => '人類に奉仕するAI開発のルールと規範を形作ります。政策、研究、公的関与を通じて、透明性のある、整合的な、責任あるAIシステムを支持します。',
                'examples_json_ja' => ['AI透明性イニシアチブ', 'アライメント研究', 'ガバナンスフレームワーク', 'アカウンタビリティシステム', 'AI公共リテラシープログラム'],

                'title_ko' => '윤리 및 거버넌스',
                'description_ko' => '인류를 위해 봉사하도록 AI 개발의 규칙과 규범을 형성합니다. 정책, 연구, 공적 참여를 통해 투명하고 정렬되며 책임 있는 AI 시스템을 지지합니다.',
                'examples_json_ko' => ['AI 투명성 이니셔티브', '정렬 연구', '거버넌스 프레임워크', '책임 시스템', '공공 AI 리터러시 프로그램'],

                'title_es' => 'Ética y Gobernanza',
                'description_es' => 'Moldeando las reglas y normas del desarrollo de IA para garantizar que sirva a la humanidad. Abogamos por sistemas de IA transparentes, alineados y responsables a través de políticas, investigación y participación pública.',
                'examples_json_es' => ['Iniciativas de transparencia de IA', 'Investigación de alineación', 'Marcos de gobernanza', 'Sistemas de responsabilidad', 'Programas de alfabetización pública en IA'],

                'title_zh_tw' => '倫理與治理',
                'description_zh_tw' => '塑造AI開發的規則和規範，以確保其服務於人類。我們通過政策、研究和公眾參與倡導透明、對齊和負責任的AI系統。',
                'examples_json_zh_tw' => ['AI透明度倡議', '對齊研究', '治理框架', '問責系統', '公眾AI素養計劃'],

                'title_vi' => 'Đạo Đức và Quản Trị',
                'description_vi' => 'Định hình các quy tắc và chuẩn mực phát triển AI để đảm bảo nó phục vụ nhân loại. Chúng tôi ủng hộ các hệ thống AI minh bạch, phù hợp và có trách nhiệm thông qua chính sách, nghiên cứu và tham gia công cộng.',
                'examples_json_vi' => ['Sáng kiến minh bạch AI', 'Nghiên cứu căn chỉnh', 'Khung quản trị', 'Hệ thống trách nhiệm', 'Chương trình biết đọc biết viết AI công cộng'],
            ],
        ];

        foreach ($areas as $area) {
            FocusArea::updateOrCreate(
                ['number' => $area['number']],
                array_merge($area, ['updated_at' => now()])
            );
        }
    }
}
