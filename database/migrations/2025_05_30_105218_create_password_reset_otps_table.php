<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasswordResetOtpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('password_reset_otps', function (Blueprint $table) {
        $table->id();
        $table->string('email')->index();
        $table->string('otp');
        $table->timestamp('expires_at')->nullable();
         $table->boolean('is_verified')->default(false);
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
        Schema::dropIfExists('password_reset_otps');
    }
}
