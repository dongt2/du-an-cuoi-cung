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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->bigIncrements('voucher_id');
            $table->string('voucher_name', 255);
            $table->string('code', 100)->unique();
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('quantity')->default(1);
            $table->integer('deduct_amount');
            $table->timestamps();

            // Thêm chỉ số cho code
            $table->index(['code']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
