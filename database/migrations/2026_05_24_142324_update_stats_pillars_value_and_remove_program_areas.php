<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('stats')
            ->where('label', 'like', '%Pillar%')
            ->update(['value' => '5', 'updated_at' => now()]);

        DB::table('stats')
            ->where('label', 'like', '%Program%')
            ->delete();
    }

    public function down(): void
    {
        DB::table('stats')
            ->where('label', 'like', '%Pillar%')
            ->update(['value' => '3', 'updated_at' => now()]);

        DB::table('stats')->insert([
            'value'      => '5',
            'label'      => 'Program Areas',
            'icon_name'  => 'bi-grid-fill',
            'sort_order' => 4,
            'is_active'  => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
};
