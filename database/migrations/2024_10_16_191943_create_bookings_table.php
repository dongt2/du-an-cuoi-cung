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
            $table->bigIncrements('booking_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('movie_id');
            $table->unsignedBigInteger('showtime_id');
            $table->unsignedBigInteger('seat_id');
            $table->unsignedBigInteger('ordercombo_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('movie_id')->references('movie_id')->on('movies')->onDelete('cascade');
            $table->foreign('showtime_id')->references('showtime_id')->on('showtimes')->onDelete('cascade');
            $table->foreign('seat_id')->references('seat_id')->on('seats')->onDelete('cascade');
            $table->foreign('ordercombo_id')->references('ordercombo_id')->on('order_combos')->onDelete('cascade');

            $table->decimal('total_price', 10)->default(0.00);  // Giá trị mặc định cho total_price
            $table->timestamps();

            // Thêm chỉ số cho các khóa ngoại để tăng tốc độ truy vấn
            $table->index(['user_id']);
            $table->index(['movie_id']);
            $table->index(['showtime_id']);
            $table->index(['seat_id']);
            $table->index(['ordercombo_id']);
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