<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('focus_areas', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('number');
            $table->string('title', 200);
            $table->text('description');
            $table->json('examples_json');
            $table->string('icon_name', 50);
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamp('updated_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('focus_areas');
    }
};
