<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;

class ProgramsSeeder extends Seeder
{
    public function run(): void
    {
        Program::truncate();

        $programs = [
            // Connection pillar
            [
                'pillar' => 'connection',
                'title' => 'Elder Companion Systems',
                'description' => 'AI-assisted but human-centered care networks that ensure our elderly population remains connected, cared for, and dignified. Technology serves as a bridge, not a replacement, for human warmth.',
                'features_json' => [
                    ['title' => 'Health Monitoring', 'description' => 'Gentle AI-powered health tracking with human caregivers at the center.', 'items' => ['Real-time vitals monitoring', 'Medication reminders', 'Emergency alert systems']],
                    ['title' => 'Emotional Companionship', 'description' => 'Connecting isolated elders with volunteers, family, and community.', 'items' => ['Daily check-in calls', 'Story-sharing sessions', 'Community activities']],
                    ['title' => 'Family Connection', 'description' => 'Tools that make it easy for families to stay close across distances.', 'items' => ['Video call facilitation', 'Memory sharing platforms', 'Family milestone tracking']],
                ],
                'how_involved_json' => ['Fund local pilots', 'Partner with healthcare systems', 'Subsidize access for low-income families', 'Train volunteer networks', 'Build open technology infrastructure'],
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'pillar' => 'connection',
                'title' => 'Community Restoration Platform',
                'description' => 'Local missions built around volunteering, mentorship, and neighborhood collaboration. Contribution is gamified through scoring systems and local reputation that make giving back socially rewarding.',
                'features_json' => [
                    ['title' => 'Local Mission Hub', 'description' => 'A platform connecting residents with local needs and opportunities.', 'items' => ['Neighborhood missions', 'Skill-matching', 'Impact tracking']],
                    ['title' => 'Contribution Scoring', 'description' => 'Making community contribution visible and valued.', 'items' => ['Contribution points', 'Community recognition', 'Local reputation badges']],
                    ['title' => 'Mentorship Networks', 'description' => 'Connecting experienced community members with those who need guidance.', 'items' => ['Mentor matching', 'Structured programs', 'Progress tracking']],
                ],
                'how_involved_json' => ['Partner with local governments', 'Seed community hubs', 'Create recognition systems', 'Fund platform development', 'Build global coordination network'],
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'pillar' => 'connection',
                'title' => 'Family Strengthening Programs',
                'description' => 'AI tools for parenting, emotional wellness, family communication, and education support — keeping families strong and connected in a fast-changing world.',
                'features_json' => [
                    ['title' => 'Parenting Support', 'description' => 'Evidence-based AI tools that help parents navigate modern challenges.', 'items' => ['Personalized parenting advice', 'Child development tracking', 'Expert resource access']],
                    ['title' => 'Emotional Wellness', 'description' => 'Family mental health tools that normalize and support emotional wellbeing.', 'items' => ['Family check-in routines', 'Conflict resolution guides', 'Wellness activity suggestions']],
                    ['title' => 'Education Support', 'description' => 'Helping families become active partners in their children\'s education.', 'items' => ['Learning progress tracking', 'Homework help tools', 'Teacher communication platforms']],
                ],
                'how_involved_json' => ['Subsidize family access', 'Partner with schools and pediatricians', 'Fund research on family outcomes', 'Create content and curriculum', 'Build support communities'],
                'sort_order' => 3,
                'is_active' => true,
            ],
            // Purpose pillar
            [
                'pillar' => 'purpose',
                'title' => 'Contribution Network',
                'description' => 'A platform where humans can mentor, teach, create, volunteer, and solve local problems. Human contribution becomes socially visible, tracked, and rewarded — creating a new economy of purpose.',
                'features_json' => [
                    ['title' => 'Contribution Marketplace', 'description' => 'A space where skills and needs are matched across communities.', 'items' => ['Skill listing', 'Need posting', 'AI-assisted matching']],
                    ['title' => 'Social Visibility', 'description' => 'Making contribution visible and celebrated at all levels.', 'items' => ['Public contribution profiles', 'Community leaderboards', 'Impact stories']],
                    ['title' => 'Reward Systems', 'description' => 'Creating tangible and social rewards for human contribution.', 'items' => ['Contribution tokens', 'Recognition programs', 'Access to opportunities']],
                ],
                'how_involved_json' => ['Build and maintain the platform', 'Partner with organizations and employers', 'Create contribution recognition standards', 'Fund contributor grants', 'Build global contributor network'],
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'pillar' => 'purpose',
                'title' => 'Human Legacy Platform',
                'description' => 'An intergenerational wisdom system to preserve stories, values, memories, life lessons, and mentorship — ensuring human wisdom survives and flows across generations.',
                'features_json' => [
                    ['title' => 'Story Preservation', 'description' => 'Capturing and preserving personal and family histories.', 'items' => ['Guided story recording', 'AI-assisted transcription', 'Family archive system']],
                    ['title' => 'Wisdom Transfer', 'description' => 'Structured systems for passing knowledge between generations.', 'items' => ['Mentorship programs', 'Life lessons library', 'Values documentation tools']],
                    ['title' => 'Memory Systems', 'description' => 'Technology that helps families maintain living memory of loved ones.', 'items' => ['Interactive memory albums', 'Voice and video preservation', 'Legacy messages']],
                ],
                'how_involved_json' => ['Fund platform development', 'Partner with cultural institutions', 'Create preservation standards', 'Build community around legacy', 'Ensure long-term archive access'],
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'pillar' => 'purpose',
                'title' => 'Human Stewardship Missions',
                'description' => 'Organized missions around environment, elderly care, education, and local communities — where AI coordinates logistics and humans contribute their unique capacity for care and wisdom.',
                'features_json' => [
                    ['title' => 'Environmental Stewardship', 'description' => 'Missions to protect and restore local and global environments.', 'items' => ['Local cleanup missions', 'Conservation projects', 'Environmental monitoring']],
                    ['title' => 'Community Care', 'description' => 'Human-led missions to care for vulnerable community members.', 'items' => ['Elder support missions', 'Youth mentorship', 'Crisis response teams']],
                    ['title' => 'Education Missions', 'description' => 'Ensuring quality education reaches every community member.', 'items' => ['Tutoring programs', 'Literacy initiatives', 'Skills training workshops']],
                ],
                'how_involved_json' => ['Design and launch missions', 'AI-coordinate logistics', 'Partner with local organizations', 'Fund mission participants', 'Measure and report impact'],
                'sort_order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($programs as $program) {
            Program::create(array_merge($program, ['updated_at' => now()]));
        }
    }
}
