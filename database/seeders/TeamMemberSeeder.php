<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {

        $members = [
            [
                'name'       => 'Sofia Martinez',
                'role'       => 'Head of Community',
                'bio'        => 'Community builder with a deep belief in the power of local action and human connection.',
                'photo_url'  => 'https://randomuser.me/api/portraits/women/68.jpg',
                'linkedin_url' => null,
                'sort_order' => 1,
                'is_active'  => true,

                'role_ja' => 'コミュニティ責任者',
                'bio_ja'  => '地域の行動と人間のつながりの力を深く信じるコミュニティビルダー。',
                'role_ko' => '커뮤니티 책임자',
                'bio_ko'  => '지역 행동과 인간 연결의 힘을 깊이 믿는 커뮤니티 빌더.',
                'role_es' => 'Directora de Comunidad',
                'bio_es'  => 'Constructora de comunidades con una profunda creencia en el poder de la acción local y la conexión humana.',
                'role_zh_tw' => '社群負責人',
                'bio_zh_tw'  => '深信地方行動與人際連結力量的社群建設者。',
                'role_vi' => 'Trưởng Bộ Phận Cộng Đồng',
                'bio_vi'  => 'Người xây dựng cộng đồng với niềm tin sâu sắc vào sức mạnh của hành động địa phương và kết nối con người.',
            ],
            [
                'name'       => 'Dr. Benjamin Reid',
                'role'       => 'Head of Research',
                'bio'        => 'Futurist and researcher studying the intersection of AI, society, and the human future.',
                'photo_url'  => 'https://randomuser.me/api/portraits/men/32.jpg',
                'linkedin_url' => null,
                'sort_order' => 2,
                'is_active'  => true,

                'role_ja' => '研究責任者',
                'bio_ja'  => 'AIと社会、そして人間の未来の交差点を研究する未来学者・研究者。',
                'role_ko' => '연구 책임자',
                'bio_ko'  => 'AI, 사회, 그리고 인간의 미래의 교차점을 연구하는 미래학자이자 연구자.',
                'role_es' => 'Director de Investigación',
                'bio_es'  => 'Futurista e investigador que estudia la intersección de la IA, la sociedad y el futuro humano.',
                'role_zh_tw' => '研究負責人',
                'bio_zh_tw'  => '研究人工智能、社會與人類未來交匯點的未來學家與研究員。',
                'role_vi' => 'Trưởng Bộ Phận Nghiên Cứu',
                'bio_vi'  => 'Nhà tương lai học và nghiên cứu viên nghiên cứu giao điểm của AI, xã hội và tương lai con người.',
            ],
            [
                'name'       => 'Liling Chen',
                'role'       => 'Head of Education',
                'bio'        => 'Education innovator empowering the next generation with skills, wisdom, and values.',
                'photo_url'  => 'https://randomuser.me/api/portraits/women/44.jpg',
                'linkedin_url' => null,
                'sort_order' => 3,
                'is_active'  => true,

                'role_ja' => '教育責任者',
                'bio_ja'  => 'スキル、知恵、価値観で次世代を育成する教育イノベーター。',
                'role_ko' => '교육 책임자',
                'bio_ko'  => '기술, 지혜, 가치관으로 다음 세대를 역량 강화하는 교육 혁신가.',
                'role_es' => 'Directora de Educación',
                'bio_es'  => 'Innovadora en educación que empodera a la próxima generación con habilidades, sabiduría y valores.',
                'role_zh_tw' => '教育負責人',
                'bio_zh_tw'  => '以技能、智慧和價值觀賦能下一代的教育創新者。',
                'role_vi' => 'Trưởng Bộ Phận Giáo Dục',
                'bio_vi'  => 'Nhà đổi mới giáo dục trao quyền cho thế hệ tiếp theo với kỹ năng, sự khôn ngoan và các giá trị.',
            ],
        ];

        foreach ($members as $member) {
            TeamMember::updateOrCreate(
                ['name' => $member['name']],
                array_merge($member, ['updated_at' => now()])
            );
        }
    }
}
