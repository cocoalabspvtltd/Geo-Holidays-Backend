<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('package_tours', function (Blueprint $table) {
            $table->id();
            $table->integer('package_category_id');
            $table->string('title');
            $table->string('image');
            $table->integer('package_rate');
            $table->string('description');
            $table->integer('day_count');
            $table->integer('night_count');
            $table->text('highlights');
            $table->string('inclusion');
            $table->string('exclusion');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_tours');
    }
};
