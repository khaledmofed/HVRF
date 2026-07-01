<?php

namespace Database\Seeders;

use App\Models\RoadmapYear;
use Illuminate\Database\Seeder;

class RoadmapSeeder extends Seeder
{
    public function run(): void
    {

        $years = [
            // ── CONNECTION PILLAR (Y1-Y3) ────────────────────────────
            [
                'pillar' => 'connection', 'year_number' => 1, 'year_label' => 'Year 1', 'sort_order' => 1,
                'goal'         => 'Launch pilot communities and establish connection infrastructure',
                'projects_json' => ['Community Platform beta', 'First local pilot communities', 'Intergenerational program pilot', 'Volunteer matching system'],
                'kpis_json'    => ['500 active community members', '10 pilot communities', '100 mentor-mentee pairs', '5 partner organizations'],

                'goal_ja'          => 'パイロットコミュニティを立ち上げ、つながりインフラを確立する',
                'projects_json_ja' => ['コミュニティプラットフォームベータ版', '最初の地域パイロットコミュニティ', '世代間プログラムパイロット', 'ボランティアマッチングシステム'],
                'kpis_json_ja'     => ['アクティブコミュニティメンバー500名', 'パイロットコミュニティ10か所', 'メンターとメンティーのペア100組', 'パートナー組織5団体'],
                'year_label_ja'    => '第1年',

                'goal_ko'          => '파일럿 커뮤니티 출시 및 연결 인프라 구축',
                'projects_json_ko' => ['커뮤니티 플랫폼 베타', '첫 번째 지역 파일럿 커뮤니티', '세대 간 프로그램 파일럿', '자원봉사 매칭 시스템'],
                'kpis_json_ko'     => ['활성 커뮤니티 구성원 500명', '파일럿 커뮤니티 10개', '멘토-멘티 쌍 100개', '파트너 조직 5개'],
                'year_label_ko'    => '1년차',

                'goal_es'          => 'Lanzar comunidades piloto y establecer infraestructura de conexión',
                'projects_json_es' => ['Beta de la Plataforma Comunitaria', 'Primeras comunidades piloto locales', 'Piloto del programa intergeneracional', 'Sistema de emparejamiento de voluntarios'],
                'kpis_json_es'     => ['500 miembros activos de la comunidad', '10 comunidades piloto', '100 pares mentor-aprendiz', '5 organizaciones asociadas'],
                'year_label_es'    => 'Año 1',

                'goal_zh_tw'          => '啟動試點社區並建立連結基礎設施',
                'projects_json_zh_tw' => ['社區平台測試版', '首批地方試點社區', '跨代計劃試點', '志願者配對系統'],
                'kpis_json_zh_tw'     => ['500名活躍社區成員', '10個試點社區', '100對導師學員配對', '5個合作夥伴組織'],
                'year_label_zh_tw'    => '第1年',

                'goal_vi'          => 'Ra mắt cộng đồng thí điểm và xây dựng cơ sở hạ tầng kết nối',
                'projects_json_vi' => ['Nền tảng cộng đồng phiên bản thử nghiệm', 'Cộng đồng thí điểm địa phương đầu tiên', 'Thí điểm chương trình liên thế hệ', 'Hệ thống ghép cặp tình nguyện viên'],
                'kpis_json_vi'     => ['500 thành viên cộng đồng hoạt động', '10 cộng đồng thí điểm', '100 cặp cố vấn-học viên', '5 tổ chức đối tác'],
                'year_label_vi'    => 'Năm 1',
            ],
            [
                'pillar' => 'connection', 'year_number' => 2, 'year_label' => 'Year 2', 'sort_order' => 2,
                'goal'         => 'Scale to city-level networks and expand human support systems',
                'projects_json' => ['City-level community expansion', 'Human Support Networks launch', 'Elderly care program rollout', 'Family support circles'],
                'kpis_json'    => ['5,000 active members', '3 city-level networks', '50 elderly care volunteers', '200 family support participants'],

                'goal_ja'          => '都市レベルのネットワークに拡大し、人間支援システムを拡張する',
                'projects_json_ja' => ['都市レベルのコミュニティ拡張', 'ヒューマンサポートネットワーク開始', '高齢者ケアプログラムの展開', '家族サポートサークル'],
                'kpis_json_ja'     => ['アクティブメンバー5,000名', '都市レベルネットワーク3か所', '高齢者ケアボランティア50名', '家族サポート参加者200名'],
                'year_label_ja'    => '第2年',

                'goal_ko'          => '도시 수준 네트워크로 확장 및 인간 지원 시스템 확대',
                'projects_json_ko' => ['도시 수준 커뮤니티 확장', '인간 지원 네트워크 출시', '노인 돌봄 프로그램 출시', '가족 지원 서클'],
                'kpis_json_ko'     => ['활성 구성원 5,000명', '도시 수준 네트워크 3개', '노인 돌봄 자원봉사자 50명', '가족 지원 참가자 200명'],
                'year_label_ko'    => '2년차',

                'goal_es'          => 'Escalar a redes a nivel de ciudad y expandir sistemas de apoyo humano',
                'projects_json_es' => ['Expansión comunitaria a nivel de ciudad', 'Lanzamiento de Redes de Apoyo Humano', 'Despliegue del programa de cuidado de ancianos', 'Círculos de apoyo familiar'],
                'kpis_json_es'     => ['5.000 miembros activos', '3 redes a nivel de ciudad', '50 voluntarios de cuidado de ancianos', '200 participantes de apoyo familiar'],
                'year_label_es'    => 'Año 2',

                'goal_zh_tw'          => '擴展至城市級網絡並擴大人類支援系統',
                'projects_json_zh_tw' => ['城市級社區擴展', '人類支援網絡啟動', '長者護理計劃推廣', '家庭支援圈'],
                'kpis_json_zh_tw'     => ['5,000名活躍成員', '3個城市級網絡', '50名長者護理志願者', '200名家庭支援參與者'],
                'year_label_zh_tw'    => '第2年',

                'goal_vi'          => 'Mở rộng lên mạng lưới cấp thành phố và mở rộng hệ thống hỗ trợ con người',
                'projects_json_vi' => ['Mở rộng cộng đồng cấp thành phố', 'Ra mắt Mạng Lưới Hỗ Trợ Con Người', 'Triển khai chương trình chăm sóc người cao tuổi', 'Vòng tròn hỗ trợ gia đình'],
                'kpis_json_vi'     => ['5.000 thành viên hoạt động', '3 mạng lưới cấp thành phố', '50 tình nguyện viên chăm sóc người cao tuổi', '200 người tham gia hỗ trợ gia đình'],
                'year_label_vi'    => 'Năm 2',
            ],
            [
                'pillar' => 'connection', 'year_number' => 3, 'year_label' => 'Year 3', 'sort_order' => 3,
                'goal'         => 'Build global human connection infrastructure',
                'projects_json' => ['Global community network launch', 'Cross-cultural connection programs', 'International intergenerational exchange', 'Human connection impact report'],
                'kpis_json'    => ['50,000 global members', '20+ cities', '1,000 active mentors', 'Published impact report'],

                'goal_ja'          => 'グローバルな人間のつながりインフラを構築する',
                'projects_json_ja' => ['グローバルコミュニティネットワーク開始', '異文化交流プログラム', '国際世代間交流', '人間のつながりインパクトレポート'],
                'kpis_json_ja'     => ['グローバルメンバー50,000名', '20以上の都市', 'アクティブメンター1,000名', 'インパクトレポート発行'],
                'year_label_ja'    => '第3年',

                'goal_ko'          => '글로벌 인간 연결 인프라 구축',
                'projects_json_ko' => ['글로벌 커뮤니티 네트워크 출시', '교차 문화 연결 프로그램', '국제 세대 간 교류', '인간 연결 영향 보고서'],
                'kpis_json_ko'     => ['글로벌 구성원 50,000명', '20개 이상 도시', '활성 멘토 1,000명', '영향 보고서 출판'],
                'year_label_ko'    => '3년차',

                'goal_es'          => 'Construir infraestructura global de conexión humana',
                'projects_json_es' => ['Lanzamiento de la red comunitaria global', 'Programas de conexión intercultural', 'Intercambio intergeneracional internacional', 'Informe de impacto de conexión humana'],
                'kpis_json_es'     => ['50.000 miembros globales', 'Más de 20 ciudades', '1.000 mentores activos', 'Informe de impacto publicado'],
                'year_label_es'    => 'Año 3',

                'goal_zh_tw'          => '建立全球人類連結基礎設施',
                'projects_json_zh_tw' => ['全球社區網絡啟動', '跨文化連結計劃', '國際跨代交流', '人類連結影響報告'],
                'kpis_json_zh_tw'     => ['50,000名全球成員', '20個以上城市', '1,000名活躍導師', '發布影響報告'],
                'year_label_zh_tw'    => '第3年',

                'goal_vi'          => 'Xây dựng cơ sở hạ tầng kết nối con người toàn cầu',
                'projects_json_vi' => ['Ra mắt mạng lưới cộng đồng toàn cầu', 'Chương trình kết nối liên văn hóa', 'Trao đổi liên thế hệ quốc tế', 'Báo cáo tác động kết nối con người'],
                'kpis_json_vi'     => ['50.000 thành viên toàn cầu', 'Hơn 20 thành phố', '1.000 cố vấn hoạt động', 'Báo cáo tác động được xuất bản'],
                'year_label_vi'    => 'Năm 3',
            ],

            // ── PURPOSE PILLAR (Y4-Y9) ───────────────────────────────
            [
                'pillar' => 'purpose', 'year_number' => 4, 'year_label' => 'Year 4', 'sort_order' => 4,
                'goal'         => 'Launch contribution recognition and first stewardship missions',
                'projects_json' => ['Human Contribution Network launch', 'First local stewardship missions', 'Contribution tracking platform', 'Legacy documentation pilot'],
                'kpis_json'    => ['1,000 recognized contributors', '10 stewardship missions', '500 legacy stories', '5 institutional partners'],

                'goal_ja'          => '貢献認定を開始し、最初のスチュワードシップミッションを実施する',
                'projects_json_ja' => ['人間貢献ネットワーク開始', '最初の地域スチュワードシップミッション', '貢献追跡プラットフォーム', 'レガシー文書化パイロット'],
                'kpis_json_ja'     => ['認定貢献者1,000名', 'スチュワードシップミッション10件', 'レガシーストーリー500件', '機関パートナー5団体'],
                'year_label_ja'    => '第4年',

                'goal_ko'          => '기여 인정 시작 및 첫 번째 청지기 미션 실행',
                'projects_json_ko' => ['인간 기여 네트워크 출시', '첫 번째 지역 청지기 미션', '기여 추적 플랫폼', '유산 문서화 파일럿'],
                'kpis_json_ko'     => ['인정된 기여자 1,000명', '청지기 미션 10개', '유산 이야기 500개', '기관 파트너 5개'],
                'year_label_ko'    => '4년차',

                'goal_es'          => 'Lanzar reconocimiento de contribución y primeras misiones de administración',
                'projects_json_es' => ['Lanzamiento de la Red de Contribución Humana', 'Primeras misiones de administración local', 'Plataforma de seguimiento de contribución', 'Piloto de documentación de legado'],
                'kpis_json_es'     => ['1.000 contribuidores reconocidos', '10 misiones de administración', '500 historias de legado', '5 socios institucionales'],
                'year_label_es'    => 'Año 4',

                'goal_zh_tw'          => '啟動貢獻認可並執行首批管理任務',
                'projects_json_zh_tw' => ['人類貢獻網絡啟動', '首批地方管理任務', '貢獻追蹤平台', '遺產記錄試點'],
                'kpis_json_zh_tw'     => ['1,000名獲認可貢獻者', '10項管理任務', '500個遺產故事', '5個機構合作夥伴'],
                'year_label_zh_tw'    => '第4年',

                'goal_vi'          => 'Ra mắt công nhận đóng góp và các nhiệm vụ quản lý đầu tiên',
                'projects_json_vi' => ['Ra mắt Mạng Lưới Đóng Góp Con Người', 'Các nhiệm vụ quản lý địa phương đầu tiên', 'Nền tảng theo dõi đóng góp', 'Thí điểm tài liệu di sản'],
                'kpis_json_vi'     => ['1.000 người đóng góp được công nhận', '10 nhiệm vụ quản lý', '500 câu chuyện di sản', '5 đối tác tổ chức'],
                'year_label_vi'    => 'Năm 4',
            ],
            [
                'pillar' => 'purpose', 'year_number' => 5, 'year_label' => 'Year 5', 'sort_order' => 5,
                'goal'         => 'Expand to regional partnerships and scale stewardship ecosystem',
                'projects_json' => ['Regional stewardship partnerships', 'Human Legacy Platform launch', 'Purpose grants', 'Cross-region mission coordination'],
                'kpis_json'    => ['10,000 contributors', '50 regional missions', '5,000 legacy stories', '20 institutional partners'],

                'goal_ja'          => '地域パートナーシップに拡大し、スチュワードシップエコシステムを拡大する',
                'projects_json_ja' => ['地域スチュワードシップパートナーシップ', '人間のレガシープラットフォーム開始', '目的助成金', '地域間ミッション調整'],
                'kpis_json_ja'     => ['貢献者10,000名', '地域ミッション50件', 'レガシーストーリー5,000件', '機関パートナー20団体'],
                'year_label_ja'    => '第5年',

                'goal_ko'          => '지역 파트너십으로 확장 및 청지기 생태계 규모 확대',
                'projects_json_ko' => ['지역 청지기 파트너십', '인간 유산 플랫폼 출시', '목적 보조금', '지역 간 미션 조정'],
                'kpis_json_ko'     => ['기여자 10,000명', '지역 미션 50개', '유산 이야기 5,000개', '기관 파트너 20개'],
                'year_label_ko'    => '5년차',

                'goal_es'          => 'Expandir a asociaciones regionales y escalar el ecosistema de administración',
                'projects_json_es' => ['Asociaciones de administración regional', 'Lanzamiento de la Plataforma de Legado Humano', 'Subvenciones de propósito', 'Coordinación de misiones entre regiones'],
                'kpis_json_es'     => ['10.000 contribuidores', '50 misiones regionales', '5.000 historias de legado', '20 socios institucionales'],
                'year_label_es'    => 'Año 5',

                'goal_zh_tw'          => '擴展至地區合作夥伴關係並擴大管理生態系統',
                'projects_json_zh_tw' => ['地區管理合作夥伴關係', '人類遺產平台啟動', '目的補助金', '跨地區任務協調'],
                'kpis_json_zh_tw'     => ['10,000名貢獻者', '50項地區任務', '5,000個遺產故事', '20個機構合作夥伴'],
                'year_label_zh_tw'    => '第5年',

                'goal_vi'          => 'Mở rộng quan hệ đối tác khu vực và mở rộng quy mô hệ sinh thái quản lý',
                'projects_json_vi' => ['Quan hệ đối tác quản lý khu vực', 'Ra mắt Nền Tảng Di Sản Con Người', 'Học bổng mục đích', 'Điều phối nhiệm vụ liên khu vực'],
                'kpis_json_vi'     => ['10.000 người đóng góp', '50 nhiệm vụ khu vực', '5.000 câu chuyện di sản', '20 đối tác tổ chức'],
                'year_label_vi'    => 'Năm 5',
            ],
            [
                'pillar' => 'purpose', 'year_number' => 6, 'year_label' => 'Year 6', 'sort_order' => 6,
                'goal'         => 'Establish global stewardship ecosystem and publish stewardship model',
                'projects_json' => ['Global stewardship network', 'International legacy archive', 'Purpose economy framework', 'Annual stewardship summit'],
                'kpis_json'    => ['100,000+ contributors globally', 'Global mission network', 'Recognized institution status', 'Published stewardship model'],

                'goal_ja'          => 'グローバルなスチュワードシップエコシステムを確立し、スチュワードシップモデルを発表する',
                'projects_json_ja' => ['グローバルスチュワードシップネットワーク', '国際レガシーアーカイブ', '目的経済フレームワーク', '年次スチュワードシップサミット'],
                'kpis_json_ja'     => ['グローバル貢献者100,000名以上', 'グローバルミッションネットワーク', '認定機関ステータス', 'スチュワードシップモデル発表'],
                'year_label_ja'    => '第6年',

                'goal_ko'          => '글로벌 청지기 생태계 구축 및 청지기 모델 발표',
                'projects_json_ko' => ['글로벌 청지기 네트워크', '국제 유산 아카이브', '목적 경제 프레임워크', '연간 청지기 정상회담'],
                'kpis_json_ko'     => ['전 세계 기여자 100,000명 이상', '글로벌 미션 네트워크', '공인 기관 지위', '청지기 모델 출판'],
                'year_label_ko'    => '6년차',

                'goal_es'          => 'Establecer un ecosistema global de administración y publicar el modelo de administración',
                'projects_json_es' => ['Red global de administración', 'Archivo de legado internacional', 'Marco de economía de propósito', 'Cumbre anual de administración'],
                'kpis_json_es'     => ['Más de 100.000 contribuidores globalmente', 'Red de misión global', 'Estado de institución reconocida', 'Modelo de administración publicado'],
                'year_label_es'    => 'Año 6',

                'goal_zh_tw'          => '建立全球管理生態系統並發布管理模型',
                'projects_json_zh_tw' => ['全球管理網絡', '國際遺產檔案館', '目的經濟框架', '年度管理峰會'],
                'kpis_json_zh_tw'     => ['全球超過100,000名貢獻者', '全球任務網絡', '獲認可機構地位', '發布管理模型'],
                'year_label_zh_tw'    => '第6年',

                'goal_vi'          => 'Thiết lập hệ sinh thái quản lý toàn cầu và công bố mô hình quản lý',
                'projects_json_vi' => ['Mạng lưới quản lý toàn cầu', 'Kho lưu trữ di sản quốc tế', 'Khuôn khổ kinh tế mục đích', 'Hội nghị thượng đỉnh quản lý hàng năm'],
                'kpis_json_vi'     => ['Hơn 100.000 người đóng góp toàn cầu', 'Mạng lưới nhiệm vụ toàn cầu', 'Tư cách tổ chức được công nhận', 'Mô hình quản lý được xuất bản'],
                'year_label_vi'    => 'Năm 6',
            ],
            [
                'pillar' => 'purpose', 'year_number' => 7, 'year_label' => 'Year 7', 'sort_order' => 7,
                'goal'         => 'Establish ethics council and publish first AI governance standards',
                'projects_json' => ['AI Ethics Research Lab', 'Human Oversight Framework', 'Ethics council', 'First AI governance standards'],
                'kpis_json'    => ['Ethics council established', 'Governance framework published', '10 industry signatories', '5 government partnerships'],

                'goal_ja'          => '倫理委員会を設立し、最初のAIガバナンス基準を発表する',
                'projects_json_ja' => ['AI倫理研究所', '人間の監視フレームワーク', '倫理委員会', '最初のAIガバナンス基準'],
                'kpis_json_ja'     => ['倫理委員会の設立', 'ガバナンスフレームワークの発行', '業界署名者10社', '政府パートナーシップ5件'],
                'year_label_ja'    => '第7年',

                'goal_ko'          => '윤리 위원회 설립 및 첫 번째 AI 거버넌스 기준 발표',
                'projects_json_ko' => ['AI 윤리 연구소', '인간 감독 프레임워크', '윤리 위원회', '첫 번째 AI 거버넌스 기준'],
                'kpis_json_ko'     => ['윤리 위원회 설립', '거버넌스 프레임워크 발행', '산업계 서명자 10개', '정부 파트너십 5개'],
                'year_label_ko'    => '7년차',

                'goal_es'          => 'Establecer consejo de ética y publicar primeros estándares de gobernanza de IA',
                'projects_json_es' => ['Laboratorio de Investigación de Ética de IA', 'Marco de Supervisión Humana', 'Consejo de ética', 'Primeros estándares de gobernanza de IA'],
                'kpis_json_es'     => ['Consejo de ética establecido', 'Marco de gobernanza publicado', '10 signatarios de la industria', '5 asociaciones gubernamentales'],
                'year_label_es'    => 'Año 7',

                'goal_zh_tw'          => '建立倫理委員會並發布首批AI治理標準',
                'projects_json_zh_tw' => ['AI倫理研究實驗室', '人類監督框架', '倫理委員會', '首批AI治理標準'],
                'kpis_json_zh_tw'     => ['倫理委員會成立', '治理框架發布', '10個行業簽署方', '5個政府合作夥伴關係'],
                'year_label_zh_tw'    => '第7年',

                'goal_vi'          => 'Thành lập hội đồng đạo đức và công bố tiêu chuẩn quản trị AI đầu tiên',
                'projects_json_vi' => ['Phòng Thí Nghiệm Nghiên Cứu Đạo Đức AI', 'Khuôn Khổ Giám Sát Con Người', 'Hội đồng đạo đức', 'Tiêu chuẩn quản trị AI đầu tiên'],
                'kpis_json_vi'     => ['Hội đồng đạo đức được thành lập', 'Khuôn khổ quản trị được công bố', '10 người ký kết từ ngành công nghiệp', '5 quan hệ đối tác chính phủ'],
                'year_label_vi'    => 'Năm 7',
            ],
            [
                'pillar' => 'purpose', 'year_number' => 8, 'year_label' => 'Year 8', 'sort_order' => 8,
                'goal'         => 'Scale industry partnerships and host AI Governance Summit',
                'projects_json' => ['AI Governance Summit', 'Industry partnership program', 'Cross-border governance', 'Human Oversight audit'],
                'kpis_json'    => ['500+ summit attendees', '25 industry partners', '15 government delegations', 'Published audit standards'],

                'goal_ja'          => '業界パートナーシップを拡大し、AIガバナンスサミットを開催する',
                'projects_json_ja' => ['AIガバナンスサミット', '業界パートナーシッププログラム', '国境を越えたガバナンス', '人間監視監査'],
                'kpis_json_ja'     => ['サミット参加者500名以上', '業界パートナー25社', '政府代表団15団体', '監査基準の発表'],
                'year_label_ja'    => '第8年',

                'goal_ko'          => '산업 파트너십 확장 및 AI 거버넌스 정상회담 개최',
                'projects_json_ko' => ['AI 거버넌스 정상회담', '산업 파트너십 프로그램', '국경을 초월한 거버넌스', '인간 감독 감사'],
                'kpis_json_ko'     => ['정상회담 참석자 500명 이상', '산업 파트너 25개', '정부 대표단 15개', '감사 기준 발표'],
                'year_label_ko'    => '8년차',

                'goal_es'          => 'Escalar asociaciones industriales y albergar la Cumbre de Gobernanza de IA',
                'projects_json_es' => ['Cumbre de Gobernanza de IA', 'Programa de asociación industrial', 'Gobernanza transfronteriza', 'Auditoría de Supervisión Humana'],
                'kpis_json_es'     => ['Más de 500 asistentes a la cumbre', '25 socios industriales', '15 delegaciones gubernamentales', 'Estándares de auditoría publicados'],
                'year_label_es'    => 'Año 8',

                'goal_zh_tw'          => '擴大行業合作夥伴關係並舉辦AI治理峰會',
                'projects_json_zh_tw' => ['AI治理峰會', '行業合作夥伴計劃', '跨境治理', '人類監督審計'],
                'kpis_json_zh_tw'     => ['峰會出席者500名以上', '25個行業合作夥伴', '15個政府代表團', '發布審計標準'],
                'year_label_zh_tw'    => '第8年',

                'goal_vi'          => 'Mở rộng quan hệ đối tác ngành và tổ chức Hội Nghị Thượng Đỉnh Quản Trị AI',
                'projects_json_vi' => ['Hội Nghị Thượng Đỉnh Quản Trị AI', 'Chương trình đối tác ngành', 'Quản trị xuyên biên giới', 'Kiểm toán Giám Sát Con Người'],
                'kpis_json_vi'     => ['Hơn 500 người tham dự hội nghị', '25 đối tác ngành', '15 phái đoàn chính phủ', 'Tiêu chuẩn kiểm toán được xuất bản'],
                'year_label_vi'    => 'Năm 8',
            ],
            [
                'pillar' => 'purpose', 'year_number' => 9, 'year_label' => 'Year 9', 'sort_order' => 9,
                'goal'         => 'HVRF recognized globally as institution for human value in the age of AI',
                'projects_json' => ['Global governance institution', 'International policy influence', 'Annual World Human Value Report', 'Human-AI coexistence framework'],
                'kpis_json'    => ['Recognized by 50+ governments', 'Annual summit 2,000+ attendees', 'Policy influence 3+ regions', 'Published global standard'],

                'goal_ja'          => 'HVRFがAI時代の人間の価値のための機関として世界的に認められる',
                'projects_json_ja' => ['グローバルガバナンス機関', '国際政策への影響力', '年次世界人間価値レポート', '人間とAIの共存フレームワーク'],
                'kpis_json_ja'     => ['50以上の政府に認定', '年次サミット参加者2,000名以上', '3つ以上の地域への政策影響', 'グローバル基準の発表'],
                'year_label_ja'    => '第9年',

                'goal_ko'          => 'HVRF가 AI 시대 인간 가치 기관으로 세계적으로 인정받음',
                'projects_json_ko' => ['글로벌 거버넌스 기관', '국제 정책 영향력', '연간 세계 인간 가치 보고서', '인간-AI 공존 프레임워크'],
                'kpis_json_ko'     => ['50개 이상 정부 인정', '연간 정상회담 2,000명 이상 참석', '3개 이상 지역 정책 영향', '글로벌 기준 발표'],
                'year_label_ko'    => '9년차',

                'goal_es'          => 'HVRF reconocida globalmente como institución para el valor humano en la era de la IA',
                'projects_json_es' => ['Institución de gobernanza global', 'Influencia en políticas internacionales', 'Informe Anual Mundial del Valor Humano', 'Marco de coexistencia humano-IA'],
                'kpis_json_es'     => ['Reconocida por más de 50 gobiernos', 'Cumbre anual con más de 2.000 asistentes', 'Influencia política en 3+ regiones', 'Estándar global publicado'],
                'year_label_es'    => 'Año 9',

                'goal_zh_tw'          => 'HVRF在AI時代作為人類價值機構獲得全球認可',
                'projects_json_zh_tw' => ['全球治理機構', '國際政策影響力', '年度世界人類價值報告', '人類與AI共存框架'],
                'kpis_json_zh_tw'     => ['獲50個以上政府認可', '年度峰會2,000名以上出席者', '3個以上地區政策影響', '發布全球標準'],
                'year_label_zh_tw'    => '第9年',

                'goal_vi'          => 'HVRF được công nhận toàn cầu là tổ chức vì giá trị con người trong thời đại AI',
                'projects_json_vi' => ['Tổ chức quản trị toàn cầu', 'Ảnh hưởng chính sách quốc tế', 'Báo Cáo Giá Trị Con Người Thế Giới Hàng Năm', 'Khuôn khổ cùng tồn tại giữa con người và AI'],
                'kpis_json_vi'     => ['Được công nhận bởi hơn 50 chính phủ', 'Hội nghị hàng năm hơn 2.000 người tham dự', 'Ảnh hưởng chính sách 3+ khu vực', 'Tiêu chuẩn toàn cầu được xuất bản'],
                'year_label_vi'    => 'Năm 9',
            ],
        ];

        foreach ($years as $year) {
            RoadmapYear::updateOrCreate(
                ['pillar' => $year['pillar'], 'year_number' => $year['year_number']],
                array_merge($year, ['updated_at' => now()])
            );
        }
    }
}
