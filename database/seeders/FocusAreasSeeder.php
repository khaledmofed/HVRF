<?php

namespace Database\Seeders;

use App\Models\FocusArea;
use Illuminate\Database\Seeder;

class FocusAreasSeeder extends Seeder
{
    public function run(): void
    {
        FocusArea::truncate();

        $areas = [
            [
                'number' => 1,
                'title' => 'Human Connection Systems',
                'description' => 'Building and sustaining meaningful human relationships in an increasingly automated world. We invest in platforms and systems that foster community, belonging, and genuine human bonds across generations.',
                'examples_json' => ['Community platforms', 'Elder care networks', 'Family support AI', 'Mentorship networks', 'Neighborhood collaboration tools'],
                'icon_name' => 'bi-people-fill',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'number' => 2,
                'title' => 'Human Purpose Infrastructure',
                'description' => 'Creating systems where humans can mentor, teach, create, volunteer, and solve local problems — making human contribution socially visible, rewarded, and central to society.',
                'examples_json' => ['Mentorship platforms', 'Teaching networks', 'Creative contribution systems', 'Volunteer mission coordination', 'Local problem-solving hubs'],
                'icon_name' => 'bi-bullseye',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'number' => 3,
                'title' => 'Human Enhancement',
                'description' => 'Deploying AI as a copilot for human capability — not a replacement. We fund tools that make humans smarter, healthier, and more capable through thoughtful AI augmentation.',
                'examples_json' => ['AI copilots for professionals', 'AI-enhanced education', 'AI healthcare tools', 'Accessibility technology', 'Cognitive enhancement platforms'],
                'icon_name' => 'bi-robot',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'number' => 4,
                'title' => 'Human Creativity Economy',
                'description' => 'Ensuring that human creativity — art, storytelling, design, music, innovation — thrives and is valued in an age of AI-generated content. We build ecosystems that celebrate and monetize genuine human expression.',
                'examples_json' => ['Creator ecosystems', 'Artist grants & funding', 'AI-human collaboration tools', 'Creative marketplaces', 'Authenticity certification systems'],
                'icon_name' => 'bi-palette-fill',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'number' => 5,
                'title' => 'Ethics & Governance',
                'description' => 'Shaping the rules and norms of AI development to ensure it serves humanity. We advocate for transparent, aligned, and accountable AI systems through policy, research, and public engagement.',
                'examples_json' => ['AI transparency initiatives', 'Alignment research', 'Governance frameworks', 'Accountability systems', 'Public AI literacy programs'],
                'icon_name' => 'bi-shield-check',
                'sort_order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($areas as $area) {
            FocusArea::create(array_merge($area, ['updated_at' => now()]));
        }
    }
}
