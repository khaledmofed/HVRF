<?php

namespace Database\Seeders;

use App\Models\AboutSection;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    public function run(): void
    {
        AboutSection::updateOrCreate(
            ['id' => 1],
            [
                'philosophy_title' => 'Our Core Philosophy',
                'philosophy_body' => 'Human value transcends pure economic output. While AI will outperform humans in speed, memory, repetitive tasks, and data analysis, humans uniquely possess meaning, wisdom, creativity, ethics, connection, and stewardship. HVRF exists to protect and amplify these irreplaceable human qualities as the age of autonomous intelligence unfolds.',
                'vision_title' => 'Our Vision',
                'vision_body' => 'To ensure humanity thrives with dignity, meaning, and shared prosperity in the age of autonomous intelligence.',
                'mission_title' => 'Our Mission',
                'mission_body' => 'To invest in technologies, systems, and communities that amplify uniquely human strengths alongside the rise of AI; building a world where human contribution is recognized, rewarded, and celebrated.',
                'updated_at' => now(),
            ]
        );
    }
}
