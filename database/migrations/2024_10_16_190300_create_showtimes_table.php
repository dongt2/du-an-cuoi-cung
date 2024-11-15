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
        Schema::create('showtimes', function (Blueprint $table) {
            $table->bigIncrements('showtime_id');
            $table->unsignedBigInteger('movie_id');
            $table->unsignedBigInteger('screen_id');
            // $table->unsignedBigInteger('seat_id');      // Bỏ seat_id vì nhiều ghế cho một buổi chiếu (chat GPT bảo thế)
            $table->date('showtime_date');  // Thêm cột cho ngày chiếu
            $table->time('time');

            $table->foreign('movie_id')->references('movie_id')->on('movies')->onDelete('cascade');
            $table->foreign('screen_id')->references('screen_id')->on('screens')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('showtimes');
    }
};
