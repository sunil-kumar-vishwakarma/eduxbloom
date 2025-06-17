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
        Schema::create('user_addresses', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id')->unique(); // one-to-one
        $table->string('address');
        $table->string('city');
        $table->string('state');
        $table->string('country');
        $table->string('zip');
        $table->string('email');
        $table->string('phone');

        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_addresses');
    }
};
