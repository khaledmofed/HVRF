<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('initiators', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('logo_url', 500);
            $table->string('website_url', 500)->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamp('updated_at')->nullable();

            foreach (['ja', 'ko', 'es', 'zh_tw', 'vi'] as $l) {
                $table->string("name_{$l}", 150)->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('initiators');
    }
};
