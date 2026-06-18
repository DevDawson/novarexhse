<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('corporate_emails', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('email', 190);
            $table->string('label', 190);
            $table->string('person_name', 160)->nullable();
            $table->string('department', 160)->nullable();
            $table->integer('sort_order')->default(0);
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('corporate_emails');
    }
};
