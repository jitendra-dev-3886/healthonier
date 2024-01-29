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
        // Schema::create('calender', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
        Schema::create('calender', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->longText('start_date')->nullable();
            $table->longText('end_date')->nullable();
            $table->integer('slot_interval')->default(0);         
            $table->longText('day')->nullable();
            $table->longText('start_time')->nullable();
            $table->longText('end_time')->nullable();
            $table->string('slot_title', 255);
            $table->string('slot_timings', 255);
            $table->date('inactive_start_date')->nullable();
            $table->date('inactive_end_date')->nullable();
            $table->time('inactive_start_time')->nullable();
            $table->time('inactive_end_time')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('trash')->default(0);
            $table->string('created_by', 255)->nullable();
            $table->string('updated_by', 255)->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('doctors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calender');
    }
};
