<?php

namespace Database\Seeders;

use App\Models\HeroSection;
use Illuminate\Database\Seeder;

class HeroSeeder extends Seeder
{
    public function run(): void
    {
        HeroSection::updateOrCreate(
            ['id' => 1],
            [
                'quote_text' => 'In an age where intelligence and labor become automated, humanity\'s greatest value will come from meaning, wisdom, creativity, ethics, connection, and stewardship.',
                'headline' => 'Human Value Reserve Foundation',
                'subheadline' => 'Ensuring humanity thrives with dignity, meaning, and shared prosperity in the age of autonomous intelligence.',
                'cta_primary_label' => 'Explore Our Mission',
                'cta_primary_url' => '#about',
                'cta_secondary_label' => 'Join the Movement',
                'cta_secondary_url' => '#join',
                'is_active' => true,
                'updated_at' => now(),
            ]
        );
    }
}
