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
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('booking_id');
            $table->string('order_id', 20);
            $table->string('extra_fee_note')->nullable();
            $table->string('payment_date')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('cheque_no')->nullable();
            $table->string('recieved_by')->nullable();
            $table->string('transaction_id')->nullable();
            $table->decimal('total_amount', 8, 2);
            $table->decimal('discount', 8, 2);
            $table->decimal('after_discount', 8, 2);
            $table->decimal('net_amount', 8, 2);
            $table->decimal('balance', 8, 2);
            $table->decimal('extra_fee', 8, 2);
            $table->decimal('recieved_amount', 8, 2);
            $table->string('currency');
            $table->string('payment_method');
            $table->string('status')->nullable();
            $table->timestamps();

            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
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