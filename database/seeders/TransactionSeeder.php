<?php

namespace Database\Seeders;

use App\Models\transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Transaction::truncate();
        
        Transaction::factory(10)->create();

        Schema::enableForeignKeyConstraints();

    }
}
