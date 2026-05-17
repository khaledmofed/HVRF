<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Only insert if table is empty
        if (DB::table('vision_slides')->count() > 0) {
            return;
        }

        $now = now();

        DB::table('vision_slides')->insert([
            [
                'tag'         => 'Human Dignity',
                'title'       => 'The Human at the Center',
                'description' => 'In an age of autonomous intelligence, human worth transcends economic output. Every person remains a node of irreplaceable connection, wisdom, and meaning.',
                'pill_label'  => 'Core Principle',
                'pill_icon'   => 'bi-heart-pulse-fill',
                'sort_order'  => 1,
                'is_active'   => true,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'tag'         => 'AI Partnership',
                'title'       => 'Intelligence Meets Humanity',
                'description' => 'Artificial intelligence and human wisdom are not opposites. At their intersection lives a new civilisation — one where machines amplify what is uniquely human.',
                'pill_label'  => 'Our Approach',
                'pill_icon'   => 'bi-diagram-3-fill',
                'sort_order'  => 2,
                'is_active'   => true,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'tag'         => 'Future Vision',
                'title'       => 'A Future Worth Building',
                'description' => 'We do not merely adapt to the future — we shape it. A civilisation where every human being finds purpose, dignity, and belonging in a world transformed by AI.',
                'pill_label'  => 'Our Mission',
                'pill_icon'   => 'bi-globe2',
                'sort_order'  => 3,
                'is_active'   => true,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
        ]);
    }

    public function down(): void
    {
        DB::table('vision_slides')->truncate();
    }
};
