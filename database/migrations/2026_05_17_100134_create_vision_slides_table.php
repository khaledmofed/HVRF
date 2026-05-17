<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vision_slides', function (Blueprint $table) {
            $table->id();
            $table->string('tag', 100);
            $table->string('title', 200);
            $table->text('description');
            $table->string('pill_label', 100);
            $table->string('pill_icon', 60)->default('bi-star-fill');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vision_slides');
    }
};
