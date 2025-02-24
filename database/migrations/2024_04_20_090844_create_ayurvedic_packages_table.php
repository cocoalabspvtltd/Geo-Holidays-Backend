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
        Schema::create('ayurvedic_packages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('sub_title');
            $table->text('activity_details');
            $table->string('treatments');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ayurvedic_packages');
    }
};
