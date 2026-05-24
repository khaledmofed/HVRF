<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Cache;

return new class extends Migration
{
    public function up(): void
    {
        Cache::forget('team');
        Cache::forget('stats');
    }

    public function down(): void {}
};
