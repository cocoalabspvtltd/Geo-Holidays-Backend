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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('package_id');
            $table->integer('email');
            $table->string('phone_number');
            $table->integer('depacture_city');
            $table->integer('prefferd_date');
            $table->integer('members_count');
            $table->integer('adult_count');
            $table->integer('child_count');
            $table->integer('infant_count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
