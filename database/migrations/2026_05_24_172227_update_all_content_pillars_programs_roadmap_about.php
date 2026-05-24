<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

return new class extends Migration
{
    public function up(): void
    {
        // ── Focus Areas ───────────────────────────────────────────────
        DB::table('focus_areas')->delete();
        DB::table('focus_areas')->insert([
            [
                'number'       => 1,
                'title'        => 'Human Enhancement & Wisdom',
                'description'  => 'Build human judgment rather than only information access. AI may know facts faster than humans, but wisdom means understanding consequences, making ethical tradeoffs, seeing long-term effects, and applying judgment under uncertainty.',
                'examples_json' => json_encode(['HVRF AI Academy', 'Human Wisdom Archive', 'AI + Human Mentorship Network']),
                'icon_name'    => 'lightbulb',
                'sort_order'   => 1,
                'is_active'    => true,
                'updated_at'   => now(),
            ],
            [
                'number'       => 2,
                'title'        => 'Human Connection Systems',
                'description'  => 'Technology may increase efficiency while reducing human interaction. Future risks include loneliness, social fragmentation, and isolation. We build systems that restore and deepen human bonds across every community.',
                'examples_json' => json_encode(['Community Platform', 'Intergenerational Program', 'Human Support Networks']),
                'icon_name'    => 'people',
                'sort_order'   => 2,
                'is_active'    => true,
                'updated_at'   => now(),
            ],
            [
                'number'       => 3,
                'title'        => 'Human Creativity Economy',
                'description'  => 'Human-created meaning becomes increasingly valuable. AI can generate content endlessly — but human creativity flows from life experience, culture, struggle, and emotion. We fund and amplify what machines cannot replicate.',
                'examples_json' => json_encode(['Creator Grant Program', 'AI + Human Creation Studio', 'Culture Preservation Initiative']),
                'icon_name'    => 'palette',
                'sort_order'   => 3,
                'is_active'    => true,
                'updated_at'   => now(),
            ],
            [
                'number'       => 4,
                'title'        => 'Human Purpose & Stewardship',
                'description'  => 'Stewardship means caring for things beyond individual self-interest: environment, communities, future generations, and shared resources. This may become one of the most important human roles in an automated world.',
                'examples_json' => json_encode(['Human Contribution Network', 'Stewardship Missions', 'Human Legacy Platform']),
                'icon_name'    => 'shield-check',
                'sort_order'   => 4,
                'is_active'    => true,
                'updated_at'   => now(),
            ],
            [
                'number'       => 5,
                'title'        => 'Ethics & Governance',
                'description'  => 'AI may optimize what can be done. Humans decide what should be done. We build the frameworks, standards, and institutions that ensure AI development remains aligned with human values and the long-term good.',
                'examples_json' => json_encode(['AI Ethics Research Lab', 'Human Oversight Framework', 'AI Governance Summit']),
                'icon_name'    => 'balance-scale',
                'sort_order'   => 5,
                'is_active'    => true,
                'updated_at'   => now(),
            ],
        ]);

        // ── Programs ──────────────────────────────────────────────────
        DB::table('programs')->delete();
        DB::table('programs')->insert([
            // pillar = connection (Human Connection Systems)
            [
                'pillar'          => 'connection',
                'title'           => 'Community Platform',
                'description'     => 'A digital and physical platform where people can volunteer, mentor, collaborate, and solve local problems together. Rebuilding the social fabric one community at a time.',
                'features_json'   => json_encode(['Volunteer matching system', 'Local project boards', 'Mentorship pairing', 'Community challenges & events']),
                'how_involved_json' => json_encode(['Join as a volunteer', 'Post a local project', 'Become a mentor', 'Partner as an organization']),
                'sort_order'      => 1,
                'is_active'       => true,
                'updated_at'      => now(),
            ],
            [
                'pillar'          => 'connection',
                'title'           => 'Intergenerational Program',
                'description'     => 'Bridging the gap between youth, elderly, and professionals through structured connection programs. Experience flows both ways — wisdom down, energy up.',
                'features_json'   => json_encode(['Youth-elder pairing', 'Professional mentorship circles', 'Shared learning sessions', 'Life story exchanges']),
                'how_involved_json' => json_encode(['Enroll as a youth participant', 'Share your experience as an elder', 'Mentor as a professional', 'Host a local session']),
                'sort_order'      => 2,
                'is_active'       => true,
                'updated_at'      => now(),
            ],
            [
                'pillar'          => 'connection',
                'title'           => 'Human Support Networks',
                'description'     => 'Structured support systems for families, elderly care, and local communities. When technology isolates, we build the human safety nets that hold society together.',
                'features_json'   => json_encode(['Family support circles', 'Elderly care networks', 'Local community hubs', 'Crisis support systems']),
                'how_involved_json' => json_encode(['Join a support circle', 'Volunteer for elderly care', 'Sponsor a local hub', 'Refer someone in need']),
                'sort_order'      => 3,
                'is_active'       => true,
                'updated_at'      => now(),
            ],
            // pillar = purpose (Human Purpose & Stewardship)
            [
                'pillar'          => 'purpose',
                'title'           => 'Human Contribution Network',
                'description'     => 'A recognition and reward system for those who teach, mentor, volunteer, and lead their communities. We believe contribution should be counted, celebrated, and compensated.',
                'features_json'   => json_encode(['Contribution tracking', 'Impact scoring', 'Recognition rewards', 'Community leadership grants']),
                'how_involved_json' => json_encode(['Log your contributions', 'Nominate a contributor', 'Sponsor contribution rewards', 'Partner for recognition programs']),
                'sort_order'      => 1,
                'is_active'       => true,
                'updated_at'      => now(),
            ],
            [
                'pillar'          => 'purpose',
                'title'           => 'Stewardship Missions',
                'description'     => 'Organized missions focused on education, environment, local development, and elderly support. Real projects with real impact, led by people who care about the future.',
                'features_json'   => json_encode(['Education initiatives', 'Environmental projects', 'Local development missions', 'Elderly support programs']),
                'how_involved_json' => json_encode(['Join a mission', 'Lead a local project', 'Fund a stewardship initiative', 'Partner as an institution']),
                'sort_order'      => 2,
                'is_active'       => true,
                'updated_at'      => now(),
            ],
            [
                'pillar'          => 'purpose',
                'title'           => 'Human Legacy Platform',
                'description'     => 'A living archive that preserves stories, values, and knowledge for future generations. Every life contains wisdom worth keeping — we build the tools to capture and share it.',
                'features_json'   => json_encode(['Story recording tools', 'Values documentation', 'Knowledge preservation archive', 'Legacy sharing network']),
                'how_involved_json' => json_encode(['Record your story', 'Contribute to archives', 'Sponsor preservation projects', 'Partner with cultural institutions']),
                'sort_order'      => 3,
                'is_active'       => true,
                'updated_at'      => now(),
            ],
        ]);

        // ── Roadmap Years ─────────────────────────────────────────────
        DB::table('roadmap_years')->delete();
        DB::table('roadmap_years')->insert([
            // pillar = connection  (Phase 1: Foundation, Years 1–3)
            [
                'pillar'       => 'connection',
                'year_number'  => 1,
                'year_label'   => 'Year 1',
                'goal'         => 'Launch pilot communities and establish connection infrastructure',
                'projects_json' => json_encode(['Community Platform beta launch', 'First local pilot communities', 'Intergenerational program pilot', 'Volunteer matching system']),
                'kpis_json'    => json_encode(['500 active community members', '10 pilot communities', '100 mentor-mentee pairs', '5 partner organizations']),
                'sort_order'   => 1,
                'updated_at'   => now(),
            ],
            [
                'pillar'       => 'connection',
                'year_number'  => 2,
                'year_label'   => 'Year 2',
                'goal'         => 'Scale to city-level networks and deepen support systems',
                'projects_json' => json_encode(['City-level community expansion', 'Human Support Networks launch', 'Elderly care program rollout', 'Family support circles']),
                'kpis_json'    => json_encode(['5,000 active members', '3 city-level networks', '50 elderly care volunteers', '200 family support participants']),
                'sort_order'   => 2,
                'updated_at'   => now(),
            ],
            [
                'pillar'       => 'connection',
                'year_number'  => 3,
                'year_label'   => 'Year 3',
                'goal'         => 'Build global human connection infrastructure',
                'projects_json' => json_encode(['Global community network launch', 'Cross-cultural connection programs', 'International intergenerational exchange', 'Human connection impact report']),
                'kpis_json'    => json_encode(['50,000 global members', '20+ cities covered', '1,000 active mentors', 'Published impact report']),
                'sort_order'   => 3,
                'updated_at'   => now(),
            ],
            // pillar = purpose  (Phase 2: Growth, Years 4–6)
            [
                'pillar'       => 'purpose',
                'year_number'  => 4,
                'year_label'   => 'Year 4',
                'goal'         => 'Launch contribution recognition and first stewardship missions',
                'projects_json' => json_encode(['Human Contribution Network launch', 'First local stewardship missions', 'Contribution tracking platform', 'Legacy documentation pilot']),
                'kpis_json'    => json_encode(['1,000 recognized contributors', '10 stewardship missions launched', '500 legacy stories collected', '5 institutional partners']),
                'sort_order'   => 4,
                'updated_at'   => now(),
            ],
            [
                'pillar'       => 'purpose',
                'year_number'  => 5,
                'year_label'   => 'Year 5',
                'goal'         => 'Expand to regional partnerships and scale purpose ecosystems',
                'projects_json' => json_encode(['Regional stewardship partnerships', 'Human Legacy Platform launch', 'Purpose grants program', 'Cross-region mission coordination']),
                'kpis_json'    => json_encode(['10,000 contributors recognized', '50 regional missions active', '5,000 legacy stories preserved', '20 institutional partners']),
                'sort_order'   => 5,
                'updated_at'   => now(),
            ],
            [
                'pillar'       => 'purpose',
                'year_number'  => 6,
                'year_label'   => 'Year 6',
                'goal'         => 'Establish global stewardship ecosystem and purpose institution',
                'projects_json' => json_encode(['Global stewardship network', 'International legacy archive', 'Purpose economy framework', 'Annual stewardship summit']),
                'kpis_json'    => json_encode(['100,000+ contributors globally', 'Global mission network active', 'Recognized institution status', 'Published stewardship model']),
                'sort_order'   => 6,
                'updated_at'   => now(),
            ],
        ]);

        // ── About Section quote ───────────────────────────────────────
        DB::table('about_sections')->where('id', '>=', 1)->update([
            'philosophy_body' => 'The future economy may increasingly be powered by machines, but the future society must still be guided by humans.',
            'updated_at'      => now(),
        ]);

        // ── Clear all content caches ──────────────────────────────────
        Cache::forget('focus_areas');
        Cache::forget('programs_connection');
        Cache::forget('programs_purpose');
        Cache::forget('roadmap_connection');
        Cache::forget('roadmap_purpose');
        Cache::forget('about');
    }

    public function down(): void {}
};
