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
            $table->unsignedBigInteger('showtime_id');
            $table->string('seat_name', 30);
            $table->unsignedBigInteger('combo_id');

            $table->foreign('combo_id')->references('combo_id')->on('combos')->onDelete('cascade');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('movie_id')->references('movie_id')->on('movies')->onDelete('cascade');
            $table->foreign('showtime_id')->references('showtime_id')->on('showtimes')->onDelete('cascade');

            $table->integer('total_price');
            $table->timestamps();

            // Thêm chỉ số cho các khóa ngoại để tăng tốc độ truy vấn
            $table->index(['user_id']);
            $table->index(['movie_id']);
            $table->index(['showtime_id']);
            $table->index(['combo_id']);
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
