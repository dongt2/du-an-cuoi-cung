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
            $table->string('image');
            $table->string('title');
            $table->string('genre');
            $table->string('duration');
            $table->date('release_date');
            $table->string('director');
            $table->string('country');
            $table->string('actor');
            $table->text('description');
            $table->string('poster_url');
            $table->string('trailer_url');
            $table->string('cast');
            $table->text('synopis');
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
