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
        Schema::create('movies', function (Blueprint $table) {
            $table->bigIncrements('movie_id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade');

            $table->string('title', 255);
            $table->string('duration', 10);
            $table->string('country', 100);
            $table->string('director', 100);
            $table->text('description');
            $table->year('year');
            $table->date('release_date');
            $table->text('actors');
            $table->string('cover_image')->nullable();
            $table->string('trailer_url', 255)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
