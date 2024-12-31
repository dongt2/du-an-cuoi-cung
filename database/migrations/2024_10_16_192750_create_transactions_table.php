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
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('transaction_id');

            $table->unsignedBigInteger('booking_id');
            $table->unsignedBigInteger('user_id');


            $table->foreign('booking_id')->references('booking_id')->on('bookings')->onDelete('cascade');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');

            $table->string('payment_method');
            $table->string('status_payment');
            $table->integer('total');
            $table->dateTime('payment_date');

            // Chỉ số cho các trường thường được truy vấn
            $table->index(['user_id', 'booking_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
