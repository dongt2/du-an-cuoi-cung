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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('user_id');
            $table->string('username');
            $table->string('avata')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255)->comment('123456');
            $table->string('phone', 30);

            $table->string('address')->nullable();
            $table->enum('role', ['Admin', 'Nhan Vien', 'Khach Hang']);
            $table->boolean('is_active')->default(true)->comment('Trạng thái hoạt động');
            $table->boolean('is_vip')->default(false)->comment('Người dùng VIP');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
