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
        Schema::create('user_details', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id')->unique(); // One-to-one with users table
        $table->string('middle_name')->nullable();
        $table->date('dob');
        $table->string('language');
        $table->string('citizenship');
        $table->string('passport_number');
        $table->date('passport_expiry')->nullable();
        $table->enum('marital_status', ['single', 'married']);
        $table->enum('gender', ['male', 'female']);

        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
