<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Add the user_id column
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->date('birthday')->nullable();
            $table->string('profile_photo')->nullable();
            $table->timestamps();
    
            // Add foreign key constraint if user table exists
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    
    

    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
