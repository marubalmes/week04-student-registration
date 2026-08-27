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
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            // Student Identification
            $table->string('student_id')->unique();

            // Personal Information
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');

            // Contact & Demographic Information
            $table->string('email')->unique();
            $table->string('mobile_number');
            $table->date('date_of_birth');
            $table->enum('gender', [
                'Male',
                'Female',
                'Other'
            ]);

            // Academic Information
            $table->string('program');
            $table->string('year_level');

            // Residential & Profile
            $table->text('address');
            $table->string('profile_picture');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};