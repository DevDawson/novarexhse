<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('content_sections', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('section_key', 80)->unique();
            $table->string('eyebrow', 190)->nullable();
            $table->text('title')->nullable();
            $table->text('subtitle')->nullable();
            $table->mediumText('content')->nullable();
            $table->string('button_text', 160)->nullable();
            $table->string('button_url', 255)->nullable();
            $table->string('image', 255)->nullable();
            $table->string('background_image', 255)->nullable();
            $table->json('extra_json')->nullable();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('content_sections');
    }
};
