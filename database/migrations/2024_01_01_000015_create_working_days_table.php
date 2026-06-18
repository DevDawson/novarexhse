<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('working_days', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('day_name', 30)->unique();
            $table->string('open_time', 20)->nullable();
            $table->string('close_time', 20)->nullable();
            $table->tinyInteger('is_open')->default(1);
            $table->integer('sort_order')->default(0);
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('working_days');
    }
};
