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
        Schema::create('seats', function (Blueprint $table) {
            $table->bigIncrements('user_id');
            $table->unsignedBigInteger('showtime_id');
            $table->smallInteger('seat_number');
            // $table->enum('seat_type', ['Cui','Vua','Vip']);
            // $table->enum('status', ['Còn trống', 'Đã đặt', 'Ghế bạn chọn'])->default('Còn trống');
            
            for ($i = 2; $i <= 17; $i++) {
                $table->enum("A$i", ['Còn trống', 'Đã đặt', 'Đã hỏng']);
            }
            for ($i = 1; $i <= 18; $i++) {
                $table->enum("B$i", ['Còn trống', 'Đã đặt', 'Đã hỏng']);
            }
            for ($i = 1; $i <= 18; $i++) {
                $table->enum("C$i", ['Còn trống', 'Đã đặt', 'Đã hỏng']);
            }
            for ($i = 1; $i <= 18; $i++) {
                $table->enum("D$i", ['Còn trống', 'Đã đặt', 'Đã hỏng']);
            }
            for ($i = 1; $i <= 18; $i++) {
                $table->enum("E$i", ['Còn trống', 'Đã đặt', 'Đã hỏng']);
            }
            for ($i = 1; $i <= 18; $i++) {
                $table->enum("F$i", ['Còn trống', 'Đã đặt', 'Đã hỏng']);
            }
            for ($i = 1; $i <= 18; $i++) {
                $table->enum("G$i", ['Còn trống', 'Đã đặt', 'Đã hỏng']);
            }
            for ($i = 3; $i <= 16; $i++) {
                $table->enum("I$i", ['Còn trống', 'Đã đặt', 'Đã hỏng']);
            }
            for ($i = 5; $i <= 14; $i++) {
                $table->enum("J$i", ['Còn trống', 'Đã đặt', 'Đã hỏng']);
            }
            for ($i = 5; $i <= 14; $i++) {
                $table->enum("K$i", ['Còn trống', 'Đã đặt', 'Đã hỏng']);
            }
            for ($i = 6; $i <= 13; $i++) {
                $table->enum("L$i", ['Còn trống', 'Đã đặt', 'Đã hỏng']);
            }


            $table->foreign('showtime_id')->references('showtime_id')->on('showtimes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seats');
    }
};
