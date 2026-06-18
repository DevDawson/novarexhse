<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('analytics_events', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->string('event_type', 40)->default('page_view');
            $table->string('path', 255);
            $table->string('page_title', 190)->nullable();
            $table->string('referrer', 255)->nullable();
            $table->string('user_agent', 255)->nullable();
            $table->char('ip_hash', 64)->nullable();
            $table->timestamp('created_at')->useCurrent();

            $table->index(['path', 'created_at'], 'analytics_path_created');
            $table->index(['event_type', 'created_at'], 'analytics_event_created');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('analytics_events');
    }
};
