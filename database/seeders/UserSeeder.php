<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the user's table.
     */
    public function run(): void
    {
        User::factory(10)->create();
    }
}

