<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();  // auto-incrementing primary key
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('contact');
            $table->string('country');
            $table->date('joined_date');
            // $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->string('status')->default('Inactive'); 
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
