<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            SiteSettingsSeeder::class,
            HeroSeeder::class,
            AboutSeeder::class,
            VisionSlideSeeder::class,
            FocusAreasSeeder::class,
            ProgramsSeeder::class,
            RoadmapSeeder::class,
            TeamMemberSeeder::class,
            StatsSeeder::class,
        ]);
    }
}
