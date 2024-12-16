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
        Schema::create('combos', function (Blueprint $table) {
            $table->bigIncrements('combo_id');
            $table->string('combo_name', 255);
            $table->string('cover', 255);
            $table->string('short_description', 800);
            $table->decimal('price', 10);  // Giá với 10 chữ số và 2 chữ số thập phân
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('combos');
    }
};