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
        Schema::create('order_combos', function (Blueprint $table) {
            $table->bigIncrements('ordercombo_id');
            $table->unsignedBigInteger('combo_id');

            $table->foreign('combo_id')->references('combo_id')->on('combos')->onDelete('cascade');
            
            $table->decimal('total_price', 10, 2);
            $table->integer('quantity')->default(1);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_combos');
    }
};
