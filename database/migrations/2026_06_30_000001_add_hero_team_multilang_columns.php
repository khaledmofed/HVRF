<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('hero_sections', function (Blueprint $table) {
            foreach (['ja', 'ko', 'es', 'zh_tw', 'vi'] as $l) {
                $table->text("headline_{$l}")->nullable();
                $table->text("subheadline_{$l}")->nullable();
            }
        });

        Schema::table('team_members', function (Blueprint $table) {
            foreach (['ja', 'ko', 'es', 'zh_tw', 'vi'] as $l) {
                $table->string("role_{$l}")->nullable();
                $table->text("bio_{$l}")->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('hero_sections', function (Blueprint $table) {
            foreach (['ja', 'ko', 'es', 'zh_tw', 'vi'] as $l) {
                $table->dropColumn(["headline_{$l}", "subheadline_{$l}"]);
            }
        });

        Schema::table('team_members', function (Blueprint $table) {
            foreach (['ja', 'ko', 'es', 'zh_tw', 'vi'] as $l) {
                $table->dropColumn(["role_{$l}", "bio_{$l}"]);
            }
        });
    }
};
