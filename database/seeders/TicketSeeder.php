<?php

namespace Database\Seeders;

use App\Models\ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Ticket::truncate();
        
        Ticket::factory(10)->create();

        Schema::enableForeignKeyConstraints();

    }
}
