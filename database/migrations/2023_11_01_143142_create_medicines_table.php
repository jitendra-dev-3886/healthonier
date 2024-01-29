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
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prescription_id');
            $table->string('medicine_name');
            $table->string('composition');
            $table->boolean('morning')->default(0);
            $table->boolean('afternoon')->default(0);
            $table->boolean('evening')->default(0);
            $table->string('timing');
            $table->string('dose_repetition');
            $table->string('remark');
            $table->timestamps();

            $table->foreign('prescription_id')->references('id')->on('prescriptions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};