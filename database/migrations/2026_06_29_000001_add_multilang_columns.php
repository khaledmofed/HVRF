<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    private array $langs = ['ja', 'ko', 'es', 'zh_tw', 'vi'];

    public function up(): void
    {
        // hero_sections
        Schema::table('hero_sections', function (Blueprint $table) {
            foreach ($this->langs as $l) {
                $table->text("quote_text_{$l}")->nullable()->after('quote_text');
                $table->string("cta_primary_label_{$l}", 100)->nullable()->after('cta_primary_label');
                $table->string("cta_secondary_label_{$l}", 100)->nullable()->after('cta_secondary_label');
            }
        });

        // about_sections
        Schema::table('about_sections', function (Blueprint $table) {
            foreach ($this->langs as $l) {
                $table->string("philosophy_title_{$l}")->nullable()->after('philosophy_title');
                $table->text("philosophy_body_{$l}")->nullable()->after('philosophy_body');
                $table->string("vision_title_{$l}")->nullable()->after('vision_title');
                $table->text("vision_body_{$l}")->nullable()->after('vision_body');
                $table->string("mission_title_{$l}")->nullable()->after('mission_title');
                $table->text("mission_body_{$l}")->nullable()->after('mission_body');
            }
        });

        // vision_slides
        Schema::table('vision_slides', function (Blueprint $table) {
            foreach ($this->langs as $l) {
                $table->string("tag_{$l}", 100)->nullable()->after('tag');
                $table->string("title_{$l}", 200)->nullable()->after('title');
                $table->text("description_{$l}")->nullable()->after('description');
                $table->string("pill_label_{$l}", 100)->nullable()->after('pill_label');
            }
        });

        // focus_areas
        Schema::table('focus_areas', function (Blueprint $table) {
            foreach ($this->langs as $l) {
                $table->string("title_{$l}", 200)->nullable()->after('title');
                $table->text("description_{$l}")->nullable()->after('description');
                $table->json("examples_json_{$l}")->nullable()->after('examples_json');
            }
        });

        // programs
        Schema::table('programs', function (Blueprint $table) {
            foreach ($this->langs as $l) {
                $table->string("title_{$l}", 200)->nullable()->after('title');
                $table->text("description_{$l}")->nullable()->after('description');
                $table->json("features_json_{$l}")->nullable()->after('features_json');
                $table->json("how_involved_json_{$l}")->nullable()->after('how_involved_json');
            }
        });

        // roadmap_years
        Schema::table('roadmap_years', function (Blueprint $table) {
            foreach ($this->langs as $l) {
                $table->string("year_label_{$l}", 20)->nullable()->after('year_label');
                $table->string("goal_{$l}", 255)->nullable()->after('goal');
                $table->json("projects_json_{$l}")->nullable()->after('projects_json');
                $table->json("kpis_json_{$l}")->nullable()->after('kpis_json');
            }
        });
    }

    public function down(): void
    {
        Schema::table('hero_sections', function (Blueprint $table) {
            foreach ($this->langs as $l) {
                $table->dropColumn(["quote_text_{$l}", "cta_primary_label_{$l}", "cta_secondary_label_{$l}"]);
            }
        });
        Schema::table('about_sections', function (Blueprint $table) {
            foreach ($this->langs as $l) {
                $table->dropColumn(["philosophy_title_{$l}", "philosophy_body_{$l}", "vision_title_{$l}", "vision_body_{$l}", "mission_title_{$l}", "mission_body_{$l}"]);
            }
        });
        Schema::table('vision_slides', function (Blueprint $table) {
            foreach ($this->langs as $l) {
                $table->dropColumn(["tag_{$l}", "title_{$l}", "description_{$l}", "pill_label_{$l}"]);
            }
        });
        Schema::table('focus_areas', function (Blueprint $table) {
            foreach ($this->langs as $l) {
                $table->dropColumn(["title_{$l}", "description_{$l}", "examples_json_{$l}"]);
            }
        });
        Schema::table('programs', function (Blueprint $table) {
            foreach ($this->langs as $l) {
                $table->dropColumn(["title_{$l}", "description_{$l}", "features_json_{$l}", "how_involved_json_{$l}"]);
            }
        });
        Schema::table('roadmap_years', function (Blueprint $table) {
            foreach ($this->langs as $l) {
                $table->dropColumn(["year_label_{$l}", "goal_{$l}", "projects_json_{$l}", "kpis_json_{$l}"]);
            }
        });
    }
};
