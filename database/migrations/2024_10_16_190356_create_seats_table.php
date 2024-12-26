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
            $table->bigIncrements('seat_id');
            $table->unsignedBigInteger('showtime_id');
            $table->text('place', 2);
            $table->enum('price', ['30000', '50000', '70000']);
            $table->enum('status', ['Còn trống', 'Đã đặt', 'Đã hỏng']);
            
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
