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
            $table->enum('status', ['Con', 'Het']);
            $table->enum('seat_type', ['Thuong', 'Vip']);
            $table->smallInteger('seat_number');
            $table->unsignedBigInteger('screen_id');

            $table->foreign('screen_id')->references('screen_id')->on('screens')->onDelete('cascade');  // Xóa ghế nếu màn hình bị xóa

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
