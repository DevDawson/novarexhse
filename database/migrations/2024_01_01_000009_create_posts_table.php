<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('title', 220);
            $table->string('slug', 220)->unique();
            $table->text('excerpt')->nullable();
            $table->mediumText('content');
            $table->string('featured_image', 255)->nullable();
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->dateTime('published_at')->nullable();
            $table->timestamps();

            $table->index(['status', 'published_at'], 'posts_status_published');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
