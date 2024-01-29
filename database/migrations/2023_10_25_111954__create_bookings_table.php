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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clinic_id');
            $table->bigInteger('patient_id')->unsigned();
            $table->date('booking_date')->nullable();
            $table->string('problem')->nullable();
            $table->string('remark')->nullable();
            $table->string('consultation_type')->nullable();
            $table->string('booking_type')->nullable();
            $table->string('time')->nullable();
            $table->string('token')->nullable();
            $table->string('meeting_link')->nullable();
            $table->string('order_id')->nullable();
            $table->integer('status')->default(0);
            $table->time('time_in')->nullable();
            $table->time('time_out')->nullable();
            $table->string('booking_source')->nullable();
            $table->timestamps();


            $table->foreign('clinic_id')->references('id')->on('clinics')->onDelete('cascade');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};