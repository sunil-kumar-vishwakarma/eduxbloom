<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('image');
            $table->string('category');
            $table->string('status')->default('Draft');
            $table->timestamp('published_date')->nullable();
            $table->timestamps();
        });
    }
    
    
    
    
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
    
}
