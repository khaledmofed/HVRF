<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('about_sections', function (Blueprint $table) {
            $table->id();
            $table->string('philosophy_title');
            $table->text('philosophy_body');
            $table->string('vision_title');
            $table->text('vision_body');
            $table->string('mission_title');
            $table->text('mission_body');
            $table->timestamp('updated_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_sections');
    }
};
