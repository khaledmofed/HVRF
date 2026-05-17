<?php

namespace Database\Seeders;

use App\Models\RoadmapYear;
use Illuminate\Database\Seeder;

class RoadmapSeeder extends Seeder
{
    public function run(): void
    {
        RoadmapYear::truncate();

        $years = [
            [
                'pillar' => 'connection',
                'year_number' => 1,
                'year_label' => 'Year 1',
                'goal' => 'Build Local Pilots',
                'projects_json' => ['3 elderly care pilot programs in partner cities', 'Volunteer platform MVP launch', 'Community AI tools beta testing', 'Family strengthening app pilot'],
                'kpis_json' => ['5,000 active participants', 'Measurable reduction in social isolation', 'Active volunteer network across 3 cities', 'Family program satisfaction >85%'],
                'sort_order' => 1,
            ],
            [
                'pillar' => 'connection',
                'year_number' => 2,
                'year_label' => 'Year 2',
                'goal' => 'Expand Social Infrastructure',
                'projects_json' => ['City-level government partnerships', 'Family AI programs rollout', 'Intergenerational mentorship network launch', 'Community platform expansion to 20+ cities'],
                'kpis_json' => ['100,000 active users', 'Measurable mental wellness improvements', '50+ city partnerships', 'Intergenerational mentor-mentee pairs: 10,000+'],
                'sort_order' => 2,
            ],
            [
                'pillar' => 'connection',
                'year_number' => 3,
                'year_label' => 'Year 3',
                'goal' => 'Human Connection Network',
                'projects_json' => ['Global contribution network launch', 'AI-assisted civic participation platform', 'Mentorship economy infrastructure', 'International elder care network'],
                'kpis_json' => ['Cross-country participation in 15+ nations', 'Recognized public impact by international bodies', 'Global mentorship economy established', 'Elder care standards adopted by governments'],
                'sort_order' => 3,
            ],
            [
                'pillar' => 'purpose',
                'year_number' => 1,
                'year_label' => 'Year 1',
                'goal' => 'Define Contribution Framework',
                'projects_json' => ['Contribution scoring system design and pilot', 'First volunteer mission launches', 'Local stewardship program pilots', 'Human Legacy Platform alpha'],
                'kpis_json' => ['First contributor communities established', 'Contribution scoring system validated', '1,000+ legacy stories preserved', 'Mission framework adopted by 5+ organizations'],
                'sort_order' => 4,
            ],
            [
                'pillar' => 'purpose',
                'year_number' => 2,
                'year_label' => 'Year 2',
                'goal' => 'Build Human Contribution Economy',
                'projects_json' => ['Global mentorship network expansion', 'Contribution rewards system launch', 'AI mission coordination platform', 'Human Legacy Platform full launch'],
                'kpis_json' => ['Active contributor growth: 50,000+', 'Measurable community outcomes in 30+ cities', 'Contribution economy recognized by 3+ governments', 'Legacy archive: 100,000+ stories'],
                'sort_order' => 5,
            ],
            [
                'pillar' => 'purpose',
                'year_number' => 3,
                'year_label' => 'Year 3',
                'goal' => 'Human Value Civilization Layer',
                'projects_json' => ['Global contribution index published', 'Intergenerational wisdom archive at scale', 'Worldwide stewardship network', 'Human value measurement standards'],
                'kpis_json' => ['International participation across 30+ nations', 'Recognized societal impact by UN bodies', 'Human contribution index adopted globally', 'Wisdom archive: 1M+ entries'],
                'sort_order' => 6,
            ],
        ];

        foreach ($years as $year) {
            RoadmapYear::create(array_merge($year, ['updated_at' => now()]));
        }
    }
}
