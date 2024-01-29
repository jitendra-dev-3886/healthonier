<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('currency')->nullable();
            $table->string('doctor_name')->nullable();
            $table->bigInteger('available_status')->nullable();
            $table->string('slug')->nullable();
            $table->bigInteger('speciality_id')->nullable();
            $table->string('degree')->nullable();
            $table->string('experience')->nullable();
            $table->text('about')->nullable();
            $table->string('short_desc')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('sub_heading')->nullable();
            $table->text('working_hour_content')->nullable();
            $table->longText('footer_content')->nullable();
            $table->string('image_name')->nullable();
            $table->string('image_path')->nullable();
            $table->string('doctor_banner_name')->nullable();
            $table->string('doctor_banner_path')->nullable();
            $table->string('doctor_background_banner_name')->nullable();
            $table->string('doctor_background_banner_path')->nullable();
            $table->string('qrcode_name')->nullable();
            $table->string('qrcode_path')->nullable();
            $table->string('logo_name')->nullable();
            $table->string('logo_path')->nullable();
            $table->string('fevicon_name')->nullable();
            $table->string('fevicon_path')->nullable();
            $table->bigInteger('theme_id')->nullable();
            $table->string('razor_pay_key_id')->nullable();
            $table->string('razor_pay_key_secret')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};