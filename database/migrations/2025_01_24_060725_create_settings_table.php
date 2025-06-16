<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_title')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('admin_email')->nullable();
            $table->string('user_permissions')->nullable();
            $table->boolean('enable_notifications')->default(false);
            $table->text('notification_template')->nullable();
            $table->string('payment_gateway')->nullable();
            $table->string('api_key')->nullable();
            $table->decimal('subscription_price', 10, 2)->nullable();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
