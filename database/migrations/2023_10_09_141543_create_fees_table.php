<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->boolean('consultant_type')->default(true);
            $table->unsignedBigInteger('doctor_id');
            $table->string('tittle');
            $table->bigInteger('amount');
            $table->bigInteger('total_amount');
            $table->bigInteger('tax_status');
            $table->boolean('status')->default(true);
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees');
    }
};