<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('company_name');
            $table->string('email')->unique();
            $table->string('contact');
            $table->string('category');
            $table->date('joined_date');
            $table->enum('status', ['Active', 'Inactive']);
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('partners');
    }
}
