<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('university_name');
            $table->string('certificate');
            $table->string('college_name');
            $table->string('college_course');
            $table->string('location');
            $table->string('campus_country');
            $table->string('campus_city');
            $table->decimal('tuition', 8, 2);
            $table->decimal('application_fee', 8, 2);
            $table->string('duration');
            $table->string('success_prediction');
            $table->text('details');
            $table->string('image');
            $table->string('language');
            $table->string('program_level');
            // $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
