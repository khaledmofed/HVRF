<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Swap photos between Sofia and Liling
        DB::table('team_members')
            ->where('name', 'Sofia Martinez')
            ->update(['photo_url' => 'https://randomuser.me/api/portraits/women/68.jpg']);

        DB::table('team_members')
            ->where('name', 'Liling Chen')
            ->update(['photo_url' => 'https://randomuser.me/api/portraits/women/44.jpg']);

        // Remove developer placeholder members
        DB::table('team_members')
            ->whereIn('name', ['khaled mofed', 'Ahmad Ismael'])
            ->delete();
    }

    public function down(): void
    {
        // Restore photos
        DB::table('team_members')
            ->where('name', 'Sofia Martinez')
            ->update(['photo_url' => 'https://randomuser.me/api/portraits/women/44.jpg']);

        DB::table('team_members')
            ->where('name', 'Liling Chen')
            ->update(['photo_url' => 'https://randomuser.me/api/portraits/women/68.jpg']);
    }
};
