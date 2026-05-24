<?php

namespace Database\Seeders;

use App\Models\Stat;
use Illuminate\Database\Seeder;

class StatsSeeder extends Seeder
{
    public function run(): void
    {
        Stat::truncate();

        $stats = [
            ['value' => '5,000+', 'label' => 'First Year Participants Target', 'icon_name' => 'bi-people-fill', 'sort_order' => 1, 'is_active' => true],
            ['value' => '100,000+', 'label' => 'Users by Year 2 Goal', 'icon_name' => 'bi-graph-up-arrow', 'sort_order' => 2, 'is_active' => true],
            ['value' => '5', 'label' => 'Core Pillars of Focus', 'icon_name' => 'bi-columns', 'sort_order' => 3, 'is_active' => true],
        ];

        foreach ($stats as $stat) {
            Stat::create(array_merge($stat, ['updated_at' => now()]));
        }
    }
}
