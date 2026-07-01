<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;

class ProgramsSeeder extends Seeder
{
    public function run(): void
    {
        if (Program::count() > 0) return;
        Program::truncate();

        $programs = [
            // ── CONNECTION ──────────────────────────────────────────────
            [
                'pillar' => 'connection', 'sort_order' => 1, 'is_active' => true,
                'title'       => 'Elder Companion Systems',
                'description' => 'AI-assisted but human-centered care networks that ensure our elderly population remains connected, cared for, and dignified. Technology serves as a bridge, not a replacement, for human warmth.',
                'features_json' => [
                    ['title' => 'Health Monitoring',       'description' => 'Gentle AI-powered health tracking with human caregivers at the center.',       'items' => ['Real-time vitals monitoring', 'Medication reminders', 'Emergency alert systems']],
                    ['title' => 'Emotional Companionship', 'description' => 'Connecting isolated elders with volunteers, family, and community.',              'items' => ['Daily check-in calls', 'Story-sharing sessions', 'Community activities']],
                    ['title' => 'Family Connection',       'description' => 'Tools that make it easy for families to stay close across distances.',            'items' => ['Video call facilitation', 'Memory sharing platforms', 'Family milestone tracking']],
                ],
                'how_involved_json' => ['Fund local pilots', 'Partner with healthcare systems', 'Subsidize access for low-income families', 'Train volunteer networks', 'Build open technology infrastructure'],

                'title_ja' => '高齢者コンパニオンシステム',
                'description_ja' => 'AI支援だが人間中心のケアネットワークで、高齢者がつながり、ケアされ、尊厳を保てるようにします。技術は人間の温かさの代替ではなく、橋渡しとして機能します。',
                'features_json_ja' => [
                    ['title' => '健康モニタリング',       'description' => '人間の介護者を中心に、優しいAI駆動の健康追跡。',            'items' => ['リアルタイムバイタル監視', '服薬リマインダー', '緊急アラートシステム']],
                    ['title' => '感情的コンパニオンシップ', 'description' => '孤立した高齢者をボランティア、家族、コミュニティとつなぐ。', 'items' => ['毎日のチェックインコール', 'ストーリー共有セッション', 'コミュニティ活動']],
                    ['title' => '家族のつながり',          'description' => '家族が距離を超えて親密に保つための簡単なツール。',         'items' => ['ビデオ通話支援', '記憶共有プラットフォーム', '家族の節目追跡']],
                ],
                'how_involved_json_ja' => ['地域パイロットへの資金援助', '医療システムとのパートナーシップ', '低所得家族へのアクセス補助', 'ボランティアネットワークのトレーニング', 'オープン技術インフラの構築'],

                'title_ko' => '노인 동반자 시스템',
                'description_ko' => 'AI 지원이지만 인간 중심의 케어 네트워크로 노인 인구가 연결되고 돌봄을 받으며 존엄성을 유지할 수 있도록 합니다.',
                'features_json_ko' => [
                    ['title' => '건강 모니터링',   'description' => '인간 간병인을 중심으로 한 부드러운 AI 건강 추적.', 'items' => ['실시간 활력 징후 모니터링', '약 복용 알림', '비상 알림 시스템']],
                    ['title' => '감정적 동반자십', 'description' => '고립된 노인을 자원봉사자, 가족, 커뮤니티와 연결.', 'items' => ['일일 체크인 통화', '이야기 공유 세션', '커뮤니티 활동']],
                    ['title' => '가족 연결',       'description' => '가족이 거리를 초월하여 가까이 지낼 수 있는 도구.', 'items' => ['화상통화 지원', '기억 공유 플랫폼', '가족 이정표 추적']],
                ],
                'how_involved_json_ko' => ['지역 시범 사업 자금 지원', '의료 시스템과 파트너십', '저소득 가족 접근 보조', '자원봉사 네트워크 교육', '개방형 기술 인프라 구축'],

                'title_es' => 'Sistemas de Compañía para Personas Mayores',
                'description_es' => 'Redes de cuidado asistidas por IA pero centradas en el ser humano que garantizan que nuestra población anciana permanezca conectada, cuidada y con dignidad.',
                'features_json_es' => [
                    ['title' => 'Monitoreo de Salud',       'description' => 'Seguimiento de salud suave impulsado por IA con cuidadores humanos al centro.', 'items' => ['Monitoreo de signos vitales en tiempo real', 'Recordatorios de medicamentos', 'Sistemas de alerta de emergencia']],
                    ['title' => 'Compañía Emocional',       'description' => 'Conectar a los mayores aislados con voluntarios, familia y comunidad.',          'items' => ['Llamadas diarias de seguimiento', 'Sesiones de intercambio de historias', 'Actividades comunitarias']],
                    ['title' => 'Conexión Familiar',        'description' => 'Herramientas que facilitan que las familias permanezcan cerca a pesar de las distancias.', 'items' => ['Facilitación de videollamadas', 'Plataformas de memoria compartida', 'Seguimiento de hitos familiares']],
                ],
                'how_involved_json_es' => ['Financiar proyectos piloto locales', 'Asociarse con sistemas de salud', 'Subsidiar acceso para familias de bajos ingresos', 'Capacitar redes de voluntarios', 'Construir infraestructura tecnológica abierta'],

                'title_zh_tw' => '長者陪伴系統',
                'description_zh_tw' => 'AI輔助但以人為中心的護理網絡，確保我們的老年人口保持連結、受到照顧並保有尊嚴。技術作為橋樑，而非人類溫情的替代品。',
                'features_json_zh_tw' => [
                    ['title' => '健康監測',   'description' => '以人類照護者為中心的溫和AI健康追蹤。', 'items' => ['即時生命體徵監測', '用藥提醒', '緊急警報系統']],
                    ['title' => '情感陪伴',   'description' => '將孤立的長者與志願者、家人和社區連結。', 'items' => ['每日問候通話', '故事分享活動', '社區活動']],
                    ['title' => '家庭連結',   'description' => '讓家人跨越距離保持親密的工具。', 'items' => ['視訊通話協助', '記憶分享平台', '家庭里程碑追蹤']],
                ],
                'how_involved_json_zh_tw' => ['資助地方試點', '與醫療系統合作', '補貼低收入家庭', '培訓志願者網絡', '建立開放技術基礎設施'],

                'title_vi' => 'Hệ Thống Đồng Hành Người Cao Tuổi',
                'description_vi' => 'Mạng lưới chăm sóc được AI hỗ trợ nhưng lấy con người làm trung tâm, đảm bảo người cao tuổi được kết nối, chăm sóc và có phẩm giá.',
                'features_json_vi' => [
                    ['title' => 'Theo Dõi Sức Khỏe',  'description' => 'Theo dõi sức khỏe nhẹ nhàng bằng AI với người chăm sóc ở trung tâm.', 'items' => ['Theo dõi dấu hiệu sinh tồn thời gian thực', 'Nhắc nhở uống thuốc', 'Hệ thống cảnh báo khẩn cấp']],
                    ['title' => 'Đồng Hành Cảm Xúc', 'description' => 'Kết nối người cao tuổi cô đơn với tình nguyện viên, gia đình và cộng đồng.', 'items' => ['Cuộc gọi hỏi thăm hàng ngày', 'Phiên chia sẻ câu chuyện', 'Hoạt động cộng đồng']],
                    ['title' => 'Kết Nối Gia Đình',  'description' => 'Công cụ giúp gia đình dễ dàng gần gũi dù xa cách.', 'items' => ['Hỗ trợ gọi video', 'Nền tảng chia sẻ ký ức', 'Theo dõi cột mốc gia đình']],
                ],
                'how_involved_json_vi' => ['Tài trợ thí điểm địa phương', 'Đối tác với hệ thống y tế', 'Trợ cấp cho gia đình thu nhập thấp', 'Đào tạo mạng lưới tình nguyện viên', 'Xây dựng cơ sở hạ tầng công nghệ mở'],
            ],
            [
                'pillar' => 'connection', 'sort_order' => 2, 'is_active' => true,
                'title'       => 'Community Restoration Platform',
                'description' => 'Local missions built around volunteering, mentorship, and neighborhood collaboration. Contribution is gamified through scoring systems and local reputation that make giving back socially rewarding.',
                'features_json' => [
                    ['title' => 'Local Mission Hub',    'description' => 'A platform connecting residents with local needs and opportunities.',            'items' => ['Neighborhood missions', 'Skill-matching', 'Impact tracking']],
                    ['title' => 'Contribution Scoring', 'description' => 'Making community contribution visible and valued.',                               'items' => ['Contribution points', 'Community recognition', 'Local reputation badges']],
                    ['title' => 'Mentorship Networks',  'description' => 'Connecting experienced community members with those who need guidance.',          'items' => ['Mentor matching', 'Structured programs', 'Progress tracking']],
                ],
                'how_involved_json' => ['Partner with local governments', 'Seed community hubs', 'Create recognition systems', 'Fund platform development', 'Build global coordination network'],

                'title_ja' => 'コミュニティ再生プラットフォーム',
                'description_ja' => 'ボランティア、メンターシップ、近隣協力を中心とした地域ミッション。貢献はスコアリングシステムと地域の評判によってゲーミフィケーションされ、社会的に報酬を与えます。',
                'features_json_ja' => [
                    ['title' => '地域ミッションハブ',    'description' => '住民を地域のニーズと機会につなぐプラットフォーム。',         'items' => ['近隣ミッション', 'スキルマッチング', '影響追跡']],
                    ['title' => '貢献スコアリング',      'description' => 'コミュニティへの貢献を可視化し価値付ける。',                  'items' => ['貢献ポイント', 'コミュニティ認定', '地域評価バッジ']],
                    ['title' => 'メンターシップネットワーク', 'description' => '経験豊かなコミュニティメンバーをガイダンスが必要な人とつなぐ。', 'items' => ['メンターマッチング', '構造化プログラム', '進捗追跡']],
                ],
                'how_involved_json_ja' => ['地方自治体とのパートナーシップ', 'コミュニティハブへの種まき', '認定システムの作成', 'プラットフォーム開発への資金援助', 'グローバル調整ネットワークの構築'],

                'title_ko' => '커뮤니티 복원 플랫폼',
                'description_ko' => '자원봉사, 멘토십, 이웃 협력을 중심으로 한 지역 미션. 기여는 사회적으로 보람 있게 만드는 스코어링 시스템과 지역 명성을 통해 게임화됩니다.',
                'features_json_ko' => [
                    ['title' => '지역 미션 허브',   'description' => '주민을 지역 요구와 기회에 연결하는 플랫폼.',        'items' => ['이웃 미션', '스킬 매칭', '임팩트 추적']],
                    ['title' => '기여 스코어링',    'description' => '커뮤니티 기여를 가시화하고 가치 있게 만들기.',      'items' => ['기여 포인트', '커뮤니티 인정', '지역 명성 배지']],
                    ['title' => '멘토십 네트워크', 'description' => '경험 있는 커뮤니티 구성원을 지도가 필요한 사람과 연결.', 'items' => ['멘토 매칭', '구조화된 프로그램', '진행 상황 추적']],
                ],
                'how_involved_json_ko' => ['지방 정부와 파트너십', '커뮤니티 허브 씨앗 뿌리기', '인정 시스템 구축', '플랫폼 개발 자금 지원', '글로벌 조정 네트워크 구축'],

                'title_es' => 'Plataforma de Restauración Comunitaria',
                'description_es' => 'Misiones locales construidas alrededor del voluntariado, la mentoría y la colaboración vecinal. La contribución se gamifica a través de sistemas de puntuación y reputación local.',
                'features_json_es' => [
                    ['title' => 'Centro de Misiones Locales', 'description' => 'Una plataforma que conecta a los residentes con necesidades y oportunidades locales.', 'items' => ['Misiones vecinales', 'Coincidencia de habilidades', 'Seguimiento de impacto']],
                    ['title' => 'Puntuación de Contribución', 'description' => 'Hacer visible y valorada la contribución comunitaria.', 'items' => ['Puntos de contribución', 'Reconocimiento comunitario', 'Insignias de reputación local']],
                    ['title' => 'Redes de Mentoría',          'description' => 'Conectar a miembros experimentados de la comunidad con quienes necesitan orientación.', 'items' => ['Emparejamiento de mentores', 'Programas estructurados', 'Seguimiento de progreso']],
                ],
                'how_involved_json_es' => ['Asociarse con gobiernos locales', 'Sembrar centros comunitarios', 'Crear sistemas de reconocimiento', 'Financiar desarrollo de plataformas', 'Construir red de coordinación global'],

                'title_zh_tw' => '社區復興平台',
                'description_zh_tw' => '圍繞志願服務、導師制和鄰里協作建立的地方任務。貢獻通過評分系統和地方聲譽進行遊戲化，使回饋社會在社交上具有回報性。',
                'features_json_zh_tw' => [
                    ['title' => '地方任務中心', 'description' => '連接居民與地方需求和機會的平台。', 'items' => ['鄰里任務', '技能匹配', '影響追蹤']],
                    ['title' => '貢獻評分',     'description' => '使社區貢獻可見且有價值。', 'items' => ['貢獻積分', '社區認可', '地方聲譽徽章']],
                    ['title' => '導師網絡',     'description' => '將有經驗的社區成員與需要指導的人連結。', 'items' => ['導師配對', '結構化計劃', '進度追蹤']],
                ],
                'how_involved_json_zh_tw' => ['與地方政府合作', '播種社區中心', '建立認可系統', '資助平台開發', '建立全球協調網絡'],

                'title_vi' => 'Nền Tảng Phục Hồi Cộng Đồng',
                'description_vi' => 'Các nhiệm vụ địa phương được xây dựng xung quanh tình nguyện, cố vấn và hợp tác khu phố. Đóng góp được trò chơi hóa thông qua hệ thống điểm số và danh tiếng địa phương.',
                'features_json_vi' => [
                    ['title' => 'Trung Tâm Nhiệm Vụ Địa Phương', 'description' => 'Nền tảng kết nối cư dân với nhu cầu và cơ hội địa phương.', 'items' => ['Nhiệm vụ khu phố', 'Ghép cặp kỹ năng', 'Theo dõi tác động']],
                    ['title' => 'Chấm Điểm Đóng Góp',           'description' => 'Làm cho đóng góp cộng đồng trở nên hữu hình và có giá trị.', 'items' => ['Điểm đóng góp', 'Công nhận cộng đồng', 'Huy hiệu danh tiếng địa phương']],
                    ['title' => 'Mạng Lưới Cố Vấn',             'description' => 'Kết nối thành viên cộng đồng có kinh nghiệm với những người cần hướng dẫn.', 'items' => ['Ghép cặp cố vấn', 'Chương trình có cấu trúc', 'Theo dõi tiến độ']],
                ],
                'how_involved_json_vi' => ['Đối tác với chính quyền địa phương', 'Gieo mầm trung tâm cộng đồng', 'Tạo hệ thống công nhận', 'Tài trợ phát triển nền tảng', 'Xây dựng mạng lưới điều phối toàn cầu'],
            ],
            [
                'pillar' => 'connection', 'sort_order' => 3, 'is_active' => true,
                'title'       => 'Family Strengthening Programs',
                'description' => 'AI tools for parenting, emotional wellness, family communication, and education support — keeping families strong and connected in a fast-changing world.',
                'features_json' => [
                    ['title' => 'Parenting Support',  'description' => 'Evidence-based AI tools that help parents navigate modern challenges.',     'items' => ['Personalized parenting advice', 'Child development tracking', 'Expert resource access']],
                    ['title' => 'Emotional Wellness', 'description' => 'Family mental health tools that normalize and support emotional wellbeing.', 'items' => ['Family check-in routines', 'Conflict resolution guides', 'Wellness activity suggestions']],
                    ['title' => 'Education Support',  'description' => "Helping families become active partners in their children's education.",    'items' => ['Learning progress tracking', 'Homework help tools', 'Teacher communication platforms']],
                ],
                'how_involved_json' => ['Subsidize family access', 'Partner with schools and pediatricians', 'Fund research on family outcomes', 'Create content and curriculum', 'Build support communities'],

                'title_ja' => '家族強化プログラム',
                'description_ja' => '育児、感情的健康、家族コミュニケーション、教育支援のためのAIツール — 急変する世界で家族を強くつながり続けさせます。',
                'features_json_ja' => [
                    ['title' => '育児支援',   'description' => '親が現代の課題をナビゲートするのに役立つ証拠に基づくAIツール。', 'items' => ['パーソナライズド育児アドバイス', '子供の発達追跡', '専門家リソースアクセス']],
                    ['title' => '感情的健康', 'description' => '感情的な健康を普通化し支援する家族メンタルヘルスツール。',       'items' => ['家族チェックインルーティン', '紛争解決ガイド', '健康活動提案']],
                    ['title' => '教育支援',   'description' => '家族が子どもの教育に積極的に参加できるよう支援します。',         'items' => ['学習進捗追跡', '宿題支援ツール', '教師コミュニケーションプラットフォーム']],
                ],
                'how_involved_json_ja' => ['家族アクセスの補助', '学校と小児科医とのパートナーシップ', '家族の結果に関する研究への資金援助', 'コンテンツとカリキュラムの作成', 'サポートコミュニティの構築'],

                'title_ko' => '가족 강화 프로그램',
                'description_ko' => '빠르게 변화하는 세상에서 가족을 강하고 연결된 상태로 유지하는 육아, 감정 건강, 가족 소통, 교육 지원을 위한 AI 도구.',
                'features_json_ko' => [
                    ['title' => '육아 지원',    'description' => '부모가 현대의 도전을 극복하는 데 도움이 되는 증거 기반 AI 도구.', 'items' => ['맞춤형 육아 조언', '아이 발달 추적', '전문가 리소스 접근']],
                    ['title' => '감정적 건강', 'description' => '감정적 안녕을 정상화하고 지원하는 가족 정신 건강 도구.',          'items' => ['가족 체크인 루틴', '갈등 해결 가이드', '웰니스 활동 제안']],
                    ['title' => '교육 지원',    'description' => '가족이 자녀 교육의 적극적인 파트너가 되도록 돕습니다.',           'items' => ['학습 진행 상황 추적', '숙제 도움 도구', '교사 소통 플랫폼']],
                ],
                'how_involved_json_ko' => ['가족 접근 보조', '학교 및 소아과 의사와 파트너십', '가족 결과 연구 자금 지원', '콘텐츠 및 교육과정 개발', '지원 커뮤니티 구축'],

                'title_es' => 'Programas de Fortalecimiento Familiar',
                'description_es' => 'Herramientas de IA para la crianza, el bienestar emocional, la comunicación familiar y el apoyo educativo — manteniendo a las familias fuertes y conectadas en un mundo que cambia rápidamente.',
                'features_json_es' => [
                    ['title' => 'Apoyo a la Crianza',  'description' => 'Herramientas de IA basadas en evidencia que ayudan a los padres a navegar los desafíos modernos.', 'items' => ['Consejos de crianza personalizados', 'Seguimiento del desarrollo infantil', 'Acceso a recursos de expertos']],
                    ['title' => 'Bienestar Emocional', 'description' => 'Herramientas de salud mental familiar que normalizan y apoyan el bienestar emocional.',              'items' => ['Rutinas de registro familiar', 'Guías de resolución de conflictos', 'Sugerencias de actividades de bienestar']],
                    ['title' => 'Apoyo Educativo',     'description' => 'Ayudar a las familias a convertirse en socios activos en la educación de sus hijos.',                 'items' => ['Seguimiento del progreso de aprendizaje', 'Herramientas de ayuda con tareas', 'Plataformas de comunicación con maestros']],
                ],
                'how_involved_json_es' => ['Subsidiar el acceso familiar', 'Asociarse con escuelas y pediatras', 'Financiar investigación sobre resultados familiares', 'Crear contenido y currículo', 'Construir comunidades de apoyo'],

                'title_zh_tw' => '家庭強化計劃',
                'description_zh_tw' => '用於育兒、情感健康、家庭溝通和教育支援的AI工具——在快速變化的世界中保持家庭強大和連結。',
                'features_json_zh_tw' => [
                    ['title' => '育兒支援',   'description' => '基於證據的AI工具，幫助父母應對現代挑戰。', 'items' => ['個性化育兒建議', '兒童發展追蹤', '專家資源訪問']],
                    ['title' => '情感健康',   'description' => '使情感健康正常化並提供支持的家庭心理健康工具。', 'items' => ['家庭簽到例行程序', '衝突解決指南', '健康活動建議']],
                    ['title' => '教育支援',   'description' => '幫助家庭成為子女教育的積極合作夥伴。', 'items' => ['學習進度追蹤', '作業輔助工具', '教師溝通平台']],
                ],
                'how_involved_json_zh_tw' => ['補貼家庭使用', '與學校和兒科醫生合作', '資助家庭成果研究', '開發內容和課程', '建立支援社區'],

                'title_vi' => 'Chương Trình Tăng Cường Gia Đình',
                'description_vi' => 'Các công cụ AI cho việc nuôi dạy con, sức khỏe cảm xúc, giao tiếp gia đình và hỗ trợ giáo dục — giữ cho các gia đình mạnh mẽ và kết nối trong thế giới thay đổi nhanh chóng.',
                'features_json_vi' => [
                    ['title' => 'Hỗ Trợ Nuôi Con', 'description' => 'Công cụ AI dựa trên bằng chứng giúp cha mẹ điều hướng các thách thức hiện đại.', 'items' => ['Lời khuyên nuôi con được cá nhân hóa', 'Theo dõi phát triển trẻ em', 'Truy cập tài nguyên chuyên gia']],
                    ['title' => 'Sức Khỏe Cảm Xúc', 'description' => 'Công cụ sức khỏe tâm thần gia đình bình thường hóa và hỗ trợ sức khỏe cảm xúc.', 'items' => ['Thói quen kiểm tra gia đình', 'Hướng dẫn giải quyết xung đột', 'Gợi ý hoạt động sức khỏe']],
                    ['title' => 'Hỗ Trợ Giáo Dục', 'description' => 'Giúp gia đình trở thành đối tác tích cực trong việc học của con cái.', 'items' => ['Theo dõi tiến độ học tập', 'Công cụ giúp bài tập', 'Nền tảng giao tiếp với giáo viên']],
                ],
                'how_involved_json_vi' => ['Trợ cấp quyền truy cập gia đình', 'Đối tác với trường học và bác sĩ nhi khoa', 'Tài trợ nghiên cứu kết quả gia đình', 'Tạo nội dung và chương trình giảng dạy', 'Xây dựng cộng đồng hỗ trợ'],
            ],

            // ── PURPOSE ──────────────────────────────────────────────
            [
                'pillar' => 'purpose', 'sort_order' => 1, 'is_active' => true,
                'title'       => 'Contribution Network',
                'description' => 'A platform where humans can mentor, teach, create, volunteer, and solve local problems. Human contribution becomes socially visible, tracked, and rewarded — creating a new economy of purpose.',
                'features_json' => [
                    ['title' => 'Contribution Marketplace', 'description' => 'A space where skills and needs are matched across communities.',    'items' => ['Skill listing', 'Need posting', 'AI-assisted matching']],
                    ['title' => 'Social Visibility',        'description' => 'Making contribution visible and celebrated at all levels.',         'items' => ['Public contribution profiles', 'Community leaderboards', 'Impact stories']],
                    ['title' => 'Reward Systems',           'description' => 'Creating tangible and social rewards for human contribution.',      'items' => ['Contribution tokens', 'Recognition programs', 'Access to opportunities']],
                ],
                'how_involved_json' => ['Build and maintain the platform', 'Partner with organizations and employers', 'Create contribution recognition standards', 'Fund contributor grants', 'Build global contributor network'],

                'title_ja' => '貢献ネットワーク',
                'description_ja' => '人間がメンタリング、教育、創造、ボランティア、地域問題解決ができるプラットフォーム。人間の貢献は社会的に可視化、追跡、報酬化され、目的の新しい経済を創造します。',
                'features_json_ja' => [
                    ['title' => '貢献マーケットプレイス', 'description' => 'コミュニティ全体でスキルとニーズがマッチングされるスペース。', 'items' => ['スキルリスティング', 'ニーズ投稿', 'AIアシストマッチング']],
                    ['title' => 'ソーシャル可視性',      'description' => 'すべてのレベルで貢献を可視化し祝う。',                         'items' => ['公開貢献プロフィール', 'コミュニティリーダーボード', '影響ストーリー']],
                    ['title' => '報酬システム',           'description' => '人間の貢献に対する有形的・社会的報酬を作成する。',              'items' => ['貢献トークン', '表彰プログラム', '機会へのアクセス']],
                ],
                'how_involved_json_ja' => ['プラットフォームの構築と維持', '組織と雇用主とのパートナーシップ', '貢献認定基準の作成', '貢献者助成金への資金援助', 'グローバル貢献者ネットワークの構築'],

                'title_ko' => '기여 네트워크',
                'description_ko' => '인간이 멘토링, 교육, 창작, 자원봉사, 지역 문제 해결을 할 수 있는 플랫폼. 인간의 기여가 사회적으로 가시화, 추적, 보상되어 목적의 새로운 경제를 창조합니다.',
                'features_json_ko' => [
                    ['title' => '기여 마켓플레이스', 'description' => '커뮤니티 전반에서 기술과 필요가 매칭되는 공간.', 'items' => ['기술 등록', '필요 게시', 'AI 지원 매칭']],
                    ['title' => '사회적 가시성',    'description' => '모든 수준에서 기여를 가시화하고 축하하기.',       'items' => ['공개 기여 프로필', '커뮤니티 리더보드', '임팩트 스토리']],
                    ['title' => '보상 시스템',      'description' => '인간 기여에 대한 유형적 및 사회적 보상 만들기.', 'items' => ['기여 토큰', '인정 프로그램', '기회 접근']],
                ],
                'how_involved_json_ko' => ['플랫폼 구축 및 유지', '조직 및 고용주와 파트너십', '기여 인정 기준 개발', '기여자 보조금 지원', '글로벌 기여자 네트워크 구축'],

                'title_es' => 'Red de Contribución',
                'description_es' => 'Una plataforma donde los humanos pueden orientar, enseñar, crear, ser voluntarios y resolver problemas locales. La contribución humana se vuelve socialmente visible, rastreada y recompensada.',
                'features_json_es' => [
                    ['title' => 'Mercado de Contribución', 'description' => 'Un espacio donde las habilidades y necesidades se emparejan en comunidades.', 'items' => ['Listado de habilidades', 'Publicación de necesidades', 'Emparejamiento asistido por IA']],
                    ['title' => 'Visibilidad Social',      'description' => 'Hacer la contribución visible y celebrada en todos los niveles.',              'items' => ['Perfiles de contribución pública', 'Tablas de clasificación comunitaria', 'Historias de impacto']],
                    ['title' => 'Sistemas de Recompensa',  'description' => 'Crear recompensas tangibles y sociales por la contribución humana.',            'items' => ['Tokens de contribución', 'Programas de reconocimiento', 'Acceso a oportunidades']],
                ],
                'how_involved_json_es' => ['Construir y mantener la plataforma', 'Asociarse con organizaciones y empleadores', 'Crear estándares de reconocimiento de contribución', 'Financiar becas para contribuidores', 'Construir red global de contribuidores'],

                'title_zh_tw' => '貢獻網絡',
                'description_zh_tw' => '一個人類可以指導、教學、創造、志願服務和解決地方問題的平台。人類貢獻變得在社會上可見、被追蹤和獎勵——創造目的的新經濟。',
                'features_json_zh_tw' => [
                    ['title' => '貢獻市場', 'description' => '在社區中匹配技能和需求的空間。', 'items' => ['技能列表', '需求發布', 'AI輔助配對']],
                    ['title' => '社會可見性', 'description' => '在各個層面使貢獻可見並受到慶祝。', 'items' => ['公開貢獻檔案', '社區排行榜', '影響故事']],
                    ['title' => '獎勵系統', 'description' => '為人類貢獻創造有形和社會獎勵。', 'items' => ['貢獻代幣', '認可計劃', '機會訪問']],
                ],
                'how_involved_json_zh_tw' => ['建立和維護平台', '與組織和雇主合作', '制定貢獻認可標準', '資助貢獻者補助', '建立全球貢獻者網絡'],

                'title_vi' => 'Mạng Lưới Đóng Góp',
                'description_vi' => 'Một nền tảng nơi con người có thể cố vấn, dạy học, sáng tạo, tình nguyện và giải quyết vấn đề địa phương. Đóng góp của con người trở nên hữu hình về mặt xã hội, được theo dõi và khen thưởng.',
                'features_json_vi' => [
                    ['title' => 'Thị Trường Đóng Góp', 'description' => 'Không gian kỹ năng và nhu cầu được ghép cặp trong cộng đồng.', 'items' => ['Danh sách kỹ năng', 'Đăng nhu cầu', 'Ghép cặp có AI hỗ trợ']],
                    ['title' => 'Khả Năng Hiển Thị Xã Hội', 'description' => 'Làm cho đóng góp trở nên hữu hình và được tôn vinh ở mọi cấp độ.', 'items' => ['Hồ sơ đóng góp công khai', 'Bảng xếp hạng cộng đồng', 'Câu chuyện tác động']],
                    ['title' => 'Hệ Thống Khen Thưởng', 'description' => 'Tạo ra phần thưởng hữu hình và xã hội cho đóng góp con người.', 'items' => ['Token đóng góp', 'Chương trình công nhận', 'Quyền truy cập cơ hội']],
                ],
                'how_involved_json_vi' => ['Xây dựng và duy trì nền tảng', 'Đối tác với tổ chức và nhà tuyển dụng', 'Tạo tiêu chuẩn công nhận đóng góp', 'Tài trợ học bổng người đóng góp', 'Xây dựng mạng lưới người đóng góp toàn cầu'],
            ],
            [
                'pillar' => 'purpose', 'sort_order' => 2, 'is_active' => true,
                'title'       => 'Human Legacy Platform',
                'description' => 'An intergenerational wisdom system to preserve stories, values, memories, life lessons, and mentorship — ensuring human wisdom survives and flows across generations.',
                'features_json' => [
                    ['title' => 'Story Preservation', 'description' => 'Capturing and preserving personal and family histories.',                       'items' => ['Guided story recording', 'AI-assisted transcription', 'Family archive system']],
                    ['title' => 'Wisdom Transfer',    'description' => 'Structured systems for passing knowledge between generations.',                 'items' => ['Mentorship programs', 'Life lessons library', 'Values documentation tools']],
                    ['title' => 'Memory Systems',     'description' => 'Technology that helps families maintain living memory of loved ones.',          'items' => ['Interactive memory albums', 'Voice and video preservation', 'Legacy messages']],
                ],
                'how_involved_json' => ['Fund platform development', 'Partner with cultural institutions', 'Create preservation standards', 'Build community around legacy', 'Ensure long-term archive access'],

                'title_ja' => '人間の遺産プラットフォーム',
                'description_ja' => '世代間の知恵システムで、物語、価値観、記憶、人生の教訓、メンターシップを保存し、人間の知恵が世代を超えて生き続けるようにします。',
                'features_json_ja' => [
                    ['title' => '物語保存',   'description' => '個人と家族の歴史を記録・保存する。',                            'items' => ['ガイド付き物語録音', 'AI支援文字起こし', '家族アーカイブシステム']],
                    ['title' => '知恵の伝達', 'description' => '世代間で知識を伝えるための構造化されたシステム。',               'items' => ['メンターシッププログラム', '人生の教訓ライブラリ', '価値観文書化ツール']],
                    ['title' => '記憶システム', 'description' => '家族が愛する人の生きた記憶を維持するのに役立つ技術。',         'items' => ['インタラクティブ記憶アルバム', '音声・映像保存', 'レガシーメッセージ']],
                ],
                'how_involved_json_ja' => ['プラットフォーム開発への資金援助', '文化機関とのパートナーシップ', '保存基準の作成', 'レガシーを中心としたコミュニティ構築', '長期アーカイブアクセスの確保'],

                'title_ko' => '인간 유산 플랫폼',
                'description_ko' => '세대 간 지혜 시스템으로 이야기, 가치, 기억, 인생 교훈, 멘토십을 보존하여 인간의 지혜가 세대를 넘어 살아남고 흐를 수 있도록 합니다.',
                'features_json_ko' => [
                    ['title' => '이야기 보존', 'description' => '개인 및 가족 역사를 포착하고 보존하기.', 'items' => ['안내된 이야기 녹음', 'AI 지원 전사', '가족 아카이브 시스템']],
                    ['title' => '지혜 전달',   'description' => '세대 간 지식을 전달하는 구조화된 시스템.', 'items' => ['멘토십 프로그램', '인생 교훈 라이브러리', '가치 문서화 도구']],
                    ['title' => '기억 시스템', 'description' => '가족이 사랑하는 사람의 살아있는 기억을 유지하는 기술.', 'items' => ['인터랙티브 기억 앨범', '음성 및 비디오 보존', '레거시 메시지']],
                ],
                'how_involved_json_ko' => ['플랫폼 개발 자금 지원', '문화 기관과 파트너십', '보존 기준 개발', '유산 중심 커뮤니티 구축', '장기 아카이브 접근 보장'],

                'title_es' => 'Plataforma de Legado Humano',
                'description_es' => 'Un sistema de sabiduría intergeneracional para preservar historias, valores, recuerdos, lecciones de vida y mentoría — asegurando que la sabiduría humana sobreviva y fluya a través de las generaciones.',
                'features_json_es' => [
                    ['title' => 'Preservación de Historias', 'description' => 'Capturar y preservar historias personales y familiares.',                          'items' => ['Grabación guiada de historias', 'Transcripción asistida por IA', 'Sistema de archivo familiar']],
                    ['title' => 'Transferencia de Sabiduría', 'description' => 'Sistemas estructurados para transmitir conocimiento entre generaciones.',          'items' => ['Programas de mentoría', 'Biblioteca de lecciones de vida', 'Herramientas de documentación de valores']],
                    ['title' => 'Sistemas de Memoria',        'description' => 'Tecnología que ayuda a las familias a mantener la memoria viva de sus seres queridos.', 'items' => ['Álbumes de memoria interactivos', 'Preservación de voz y video', 'Mensajes de legado']],
                ],
                'how_involved_json_es' => ['Financiar el desarrollo de la plataforma', 'Asociarse con instituciones culturales', 'Crear estándares de preservación', 'Construir comunidad alrededor del legado', 'Garantizar acceso al archivo a largo plazo'],

                'title_zh_tw' => '人類傳承平台',
                'description_zh_tw' => '跨代智慧系統，保存故事、價值觀、記憶、人生教訓和導師制——確保人類智慧跨越世代存活和流傳。',
                'features_json_zh_tw' => [
                    ['title' => '故事保存', 'description' => '捕捉和保存個人和家庭歷史。', 'items' => ['引導式故事錄製', 'AI輔助轉錄', '家庭檔案系統']],
                    ['title' => '智慧傳承', 'description' => '在世代之間傳遞知識的結構化系統。', 'items' => ['導師計劃', '人生教訓圖書館', '價值觀記錄工具']],
                    ['title' => '記憶系統', 'description' => '幫助家庭維持對親人活生生記憶的技術。', 'items' => ['互動記憶相冊', '聲音和視頻保存', '遺產訊息']],
                ],
                'how_involved_json_zh_tw' => ['資助平台開發', '與文化機構合作', '制定保存標準', '圍繞傳承建立社區', '確保長期檔案訪問'],

                'title_vi' => 'Nền Tảng Di Sản Con Người',
                'description_vi' => 'Hệ thống trí tuệ liên thế hệ để bảo tồn câu chuyện, giá trị, ký ức, bài học cuộc sống và cố vấn — đảm bảo trí tuệ con người tồn tại và lưu truyền qua các thế hệ.',
                'features_json_vi' => [
                    ['title' => 'Bảo Tồn Câu Chuyện', 'description' => 'Ghi lại và bảo tồn lịch sử cá nhân và gia đình.', 'items' => ['Ghi chép câu chuyện được hướng dẫn', 'Chuyển đổi văn bản có AI hỗ trợ', 'Hệ thống lưu trữ gia đình']],
                    ['title' => 'Truyền Tải Trí Tuệ', 'description' => 'Các hệ thống có cấu trúc để truyền kiến thức giữa các thế hệ.', 'items' => ['Chương trình cố vấn', 'Thư viện bài học cuộc sống', 'Công cụ tài liệu hóa giá trị']],
                    ['title' => 'Hệ Thống Ký Ức',    'description' => 'Công nghệ giúp gia đình duy trì ký ức sống của người thân.', 'items' => ['Album ký ức tương tác', 'Bảo tồn giọng nói và video', 'Tin nhắn di sản']],
                ],
                'how_involved_json_vi' => ['Tài trợ phát triển nền tảng', 'Đối tác với các tổ chức văn hóa', 'Tạo tiêu chuẩn bảo tồn', 'Xây dựng cộng đồng xung quanh di sản', 'Đảm bảo quyền truy cập lưu trữ dài hạn'],
            ],
            [
                'pillar' => 'purpose', 'sort_order' => 3, 'is_active' => true,
                'title'       => 'Human Stewardship Missions',
                'description' => 'Organized missions around environment, elderly care, education, and local communities — where AI coordinates logistics and humans contribute their unique capacity for care and wisdom.',
                'features_json' => [
                    ['title' => 'Environmental Stewardship', 'description' => 'Missions to protect and restore local and global environments.',             'items' => ['Local cleanup missions', 'Conservation projects', 'Environmental monitoring']],
                    ['title' => 'Community Care',            'description' => 'Human-led missions to care for vulnerable community members.',               'items' => ['Elder support missions', 'Youth mentorship', 'Crisis response teams']],
                    ['title' => 'Education Missions',        'description' => 'Ensuring quality education reaches every community member.',                 'items' => ['Tutoring programs', 'Literacy initiatives', 'Skills training workshops']],
                ],
                'how_involved_json' => ['Design and launch missions', 'AI-coordinate logistics', 'Partner with local organizations', 'Fund mission participants', 'Measure and report impact'],

                'title_ja' => '人間のスチュワードシップミッション',
                'description_ja' => '環境、高齢者ケア、教育、地域コミュニティを中心とした組織化されたミッション — AIが物流を調整し、人間がケアと知恵の独自の能力を提供します。',
                'features_json_ja' => [
                    ['title' => '環境スチュワードシップ', 'description' => '地域と地球環境を保護・回復するミッション。',                  'items' => ['地域清掃ミッション', '保全プロジェクト', '環境モニタリング']],
                    ['title' => 'コミュニティケア',      'description' => '脆弱なコミュニティメンバーを支援する人間主導のミッション。', 'items' => ['高齢者サポートミッション', '青少年メンターシップ', '危機対応チーム']],
                    ['title' => '教育ミッション',        'description' => 'すべてのコミュニティメンバーに質の高い教育が届くことを確保する。', 'items' => ['個別指導プログラム', '識字率向上活動', 'スキルトレーニングワークショップ']],
                ],
                'how_involved_json_ja' => ['ミッションの設計と立ち上げ', 'AI物流調整', '地元組織とのパートナーシップ', 'ミッション参加者への資金援助', '影響の測定と報告'],

                'title_ko' => '인간 스튜어드십 미션',
                'description_ko' => '환경, 노인 돌봄, 교육, 지역 사회를 중심으로 조직된 미션 — AI가 물류를 조정하고 인간이 돌봄과 지혜의 고유한 능력을 기여합니다.',
                'features_json_ko' => [
                    ['title' => '환경 스튜어드십', 'description' => '지역 및 지구 환경을 보호하고 복원하는 미션.', 'items' => ['지역 청소 미션', '보전 프로젝트', '환경 모니터링']],
                    ['title' => '커뮤니티 케어',   'description' => '취약한 커뮤니티 구성원을 돌보는 인간 주도 미션.', 'items' => ['노인 지원 미션', '청소년 멘토십', '위기 대응 팀']],
                    ['title' => '교육 미션',       'description' => '모든 커뮤니티 구성원이 양질의 교육을 받을 수 있도록 보장.', 'items' => ['개인 지도 프로그램', '문해력 이니셔티브', '기술 훈련 워크숍']],
                ],
                'how_involved_json_ko' => ['미션 설계 및 시작', 'AI 물류 조정', '지역 조직과 파트너십', '미션 참가자 자금 지원', '영향 측정 및 보고'],

                'title_es' => 'Misiones de Administración Humana',
                'description_es' => 'Misiones organizadas en torno al medio ambiente, el cuidado de ancianos, la educación y las comunidades locales — donde la IA coordina la logística y los humanos contribuyen con su capacidad única de cuidado y sabiduría.',
                'features_json_es' => [
                    ['title' => 'Administración Ambiental', 'description' => 'Misiones para proteger y restaurar entornos locales y globales.', 'items' => ['Misiones de limpieza local', 'Proyectos de conservación', 'Monitoreo ambiental']],
                    ['title' => 'Cuidado Comunitario',      'description' => 'Misiones lideradas por humanos para cuidar a los miembros vulnerables de la comunidad.', 'items' => ['Misiones de apoyo a ancianos', 'Mentoría juvenil', 'Equipos de respuesta a crisis']],
                    ['title' => 'Misiones Educativas',      'description' => 'Asegurar que la educación de calidad llegue a cada miembro de la comunidad.', 'items' => ['Programas de tutoría', 'Iniciativas de alfabetización', 'Talleres de formación en habilidades']],
                ],
                'how_involved_json_es' => ['Diseñar y lanzar misiones', 'AI coordina la logística', 'Asociarse con organizaciones locales', 'Financiar participantes de misiones', 'Medir e informar el impacto'],

                'title_zh_tw' => '人類管理任務',
                'description_zh_tw' => '圍繞環境、老年護理、教育和地方社區組織的任務——AI協調物流，人類貢獻其獨特的關懷和智慧能力。',
                'features_json_zh_tw' => [
                    ['title' => '環境管理', 'description' => '保護和恢復地方和全球環境的任務。', 'items' => ['地方清潔任務', '保育項目', '環境監測']],
                    ['title' => '社區關懷', 'description' => '人類主導的關懷脆弱社區成員的任務。', 'items' => ['長者支援任務', '青年導師制', '危機應對團隊']],
                    ['title' => '教育任務', 'description' => '確保每個社區成員都能獲得優質教育。', 'items' => ['輔導計劃', '識字倡議', '技能培訓工作坊']],
                ],
                'how_involved_json_zh_tw' => ['設計和啟動任務', 'AI協調物流', '與地方組織合作', '資助任務參與者', '測量和報告影響'],

                'title_vi' => 'Nhiệm Vụ Quản Lý Con Người',
                'description_vi' => 'Các nhiệm vụ có tổ chức xung quanh môi trường, chăm sóc người cao tuổi, giáo dục và cộng đồng địa phương — nơi AI điều phối hậu cần và con người đóng góp khả năng chăm sóc và trí tuệ độc đáo của họ.',
                'features_json_vi' => [
                    ['title' => 'Quản Lý Môi Trường', 'description' => 'Nhiệm vụ bảo vệ và phục hồi môi trường địa phương và toàn cầu.', 'items' => ['Nhiệm vụ dọn dẹp địa phương', 'Dự án bảo tồn', 'Giám sát môi trường']],
                    ['title' => 'Chăm Sóc Cộng Đồng', 'description' => 'Nhiệm vụ do con người lãnh đạo để chăm sóc các thành viên cộng đồng dễ bị tổn thương.', 'items' => ['Nhiệm vụ hỗ trợ người cao tuổi', 'Cố vấn thanh niên', 'Đội ứng phó khủng hoảng']],
                    ['title' => 'Nhiệm Vụ Giáo Dục', 'description' => 'Đảm bảo giáo dục chất lượng tiếp cận mọi thành viên cộng đồng.', 'items' => ['Chương trình gia sư', 'Sáng kiến xóa mù chữ', 'Hội thảo đào tạo kỹ năng']],
                ],
                'how_involved_json_vi' => ['Thiết kế và khởi động nhiệm vụ', 'AI điều phối hậu cần', 'Đối tác với tổ chức địa phương', 'Tài trợ người tham gia nhiệm vụ', 'Đo lường và báo cáo tác động'],
            ],
        ];

        foreach ($programs as $program) {
            Program::create(array_merge($program, ['updated_at' => now()]));
        }
    }
}
