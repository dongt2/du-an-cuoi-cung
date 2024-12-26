<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Seed the theme's table.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();

        User::factory(count: 10)->create();

        Schema::enableForeignKeyConstraints();

    }
}

