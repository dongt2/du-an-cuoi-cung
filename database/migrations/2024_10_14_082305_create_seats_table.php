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
            $table->unsignedBigInteger('screen_id');
            $table->foreign('screen_id')->references('screen_id')->on('screens')->onDelete('cascade');
            $table->integer('seat_number');
            $table->boolean('is_vip');
            $table->string('section');
            $table->string('status');
            $table->boolean('is_available');
            $table->string('seat_type');
            $table->decimal('price', 10, 2);
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
