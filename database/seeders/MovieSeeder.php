<?php

namespace Database\Seeders;

use App\Models\movie;
use App\Models\Movie as ModelsMovie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Movie::truncate();
        
        Movie::factory(10)->create();

        Schema::enableForeignKeyConstraints();

    }
}
