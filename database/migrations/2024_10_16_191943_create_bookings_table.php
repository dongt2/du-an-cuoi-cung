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
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('booking_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('movie_id');


            $table->string('order_code', 255);

            $table->date('showtime_date');
            $table->time('showtime_time');

            $table->decimal('total_price', 10)->default(0.00);

            $table->string('order_combo', 255)->nullable();
            $table->string('voucher', 255)->nullable();



            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('movie_id')->references('movie_id')->on('movies')->onDelete('cascade');


            $table->timestamps();

            // Thêm chỉ số cho các khóa ngoại để tăng tốc độ truy vấn
            $table->index(['user_id']);
            $table->index(['movie_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
