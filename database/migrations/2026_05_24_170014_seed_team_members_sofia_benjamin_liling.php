<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $members = [
            [
                'name'        => 'Sofia Martinez',
                'role'        => 'Head of Community',
                'bio'         => 'Community builder with a deep belief in the power of local action and human connection.',
                'photo_url'   => 'https://randomuser.me/api/portraits/women/44.jpg',
                'linkedin_url'=> 'https://www.linkedin.com/',
                'sort_order'  => 2,
                'is_active'   => true,
                'updated_at'  => now(),
            ],
            [
                'name'        => 'Dr. Benjamin Reid',
                'role'        => 'Head of Research',
                'bio'         => 'Futurist and researcher studying the intersection of AI, society, and the human future.',
                'photo_url'   => 'https://randomuser.me/api/portraits/men/32.jpg',
                'linkedin_url'=> 'https://www.linkedin.com/',
                'sort_order'  => 3,
                'is_active'   => true,
                'updated_at'  => now(),
            ],
            [
                'name'        => 'Liling Chen',
                'role'        => 'Head of Education',
                'bio'         => 'Education innovator empowering the next generation with skills, wisdom, and values.',
                'photo_url'   => 'https://randomuser.me/api/portraits/women/68.jpg',
                'linkedin_url'=> 'https://www.linkedin.com/',
                'sort_order'  => 4,
                'is_active'   => true,
                'updated_at'  => now(),
            ],
        ];

        foreach ($members as $member) {
            $exists = DB::table('team_members')->where('name', $member['name'])->exists();
            if (! $exists) {
                DB::table('team_members')->insert($member);
            }
        }
    }

    public function down(): void
    {
        DB::table('team_members')
            ->whereIn('name', ['Sofia Martinez', 'Dr. Benjamin Reid', 'Liling Chen'])
            ->delete();
    }
};
