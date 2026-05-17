<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('roadmap_years', function (Blueprint $table) {
            $table->id();
            $table->enum('pillar', ['connection', 'purpose']);
            $table->tinyInteger('year_number');
            $table->string('year_label', 20);
            $table->string('goal', 255);
            $table->json('projects_json');
            $table->json('kpis_json');
            $table->integer('sort_order')->default(0);
            $table->timestamp('updated_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('roadmap_years');
    }
};
