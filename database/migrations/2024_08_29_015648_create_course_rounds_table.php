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
        Schema::create('course_rounds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->references('id')->on('courses');
            $table->foreignId('round_id')->references('id')->on('rounds');
            $table->foreignId('instructor_id')->references('id')->on('instructors');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_rounds');
    }
};