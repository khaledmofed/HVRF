<?php

namespace Database\Seeders;

use App\Models\VisionSlide;
use Illuminate\Database\Seeder;

class VisionSlideSeeder extends Seeder
{
    public function run(): void
    {
        VisionSlide::truncate();

        $slides = [
            [
                'tag'        => 'Human Dignity',
                'title'      => 'The Human at the Center',
                'description'=> 'In an age of autonomous intelligence, human worth transcends economic output. Every person remains a node of irreplaceable connection, wisdom, and meaning.',
                'pill_label' => 'Core Principle',
                'pill_icon'  => 'bi-heart-pulse-fill',
                'sort_order' => 1,
                'is_active'  => true,
            ],
            [
                'tag'        => 'AI Partnership',
                'title'      => 'Intelligence Meets Humanity',
                'description'=> 'Artificial intelligence and human wisdom are not opposites. At their intersection lives a new civilisation — one where machines amplify what is uniquely human.',
                'pill_label' => 'Our Approach',
                'pill_icon'  => 'bi-diagram-3-fill',
                'sort_order' => 2,
                'is_active'  => true,
            ],
            [
                'tag'        => 'Future Vision',
                'title'      => 'A Future Worth Building',
                'description'=> 'We do not merely adapt to the future — we shape it. A civilisation where every human being finds purpose, dignity, and belonging in a world transformed by AI.',
                'pill_label' => 'Our Mission',
                'pill_icon'  => 'bi-globe2',
                'sort_order' => 3,
                'is_active'  => true,
            ],
        ];

        foreach ($slides as $slide) {
            VisionSlide::create($slide);
        }
    }
}
