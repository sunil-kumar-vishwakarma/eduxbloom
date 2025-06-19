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
        Schema::create('user_tests_score', function (Blueprint $table) {
           $table->id();
    $table->unsignedBigInteger('user_id');
    $table->string('test_type'); // TOEFL, IELTS, etc.
    $table->integer('reading')->nullable();
    $table->integer('listening')->nullable();
    $table->integer('writing')->nullable();
    $table->integer('speaking')->nullable();
    $table->date('exam_date')->nullable();
    $table->timestamps();
    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_tests_score');
    }
};
