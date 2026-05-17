<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();
            $table->text('quote_text');
            $table->string('headline', 500);
            $table->text('subheadline');
            $table->string('cta_primary_label', 100);
            $table->string('cta_primary_url', 255);
            $table->string('cta_secondary_label', 100);
            $table->string('cta_secondary_url', 255);
            $table->boolean('is_active')->default(true);
            $table->timestamp('updated_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};
