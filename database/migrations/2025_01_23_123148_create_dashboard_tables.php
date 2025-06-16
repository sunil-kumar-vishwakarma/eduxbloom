<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDashboardTables extends Migration
{
    public function up()
    {
        // Create the 'courses' table
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('school_id')->constrained('schools');
            $table->timestamps();  // No status column
        });
        

        // Create the 'enrollments' table
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students'); // Foreign key to students table
            $table->foreignId('course_id')->constrained('courses'); // Foreign key to courses table
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('enrollments');
        Schema::dropIfExists('courses');
    }
}
