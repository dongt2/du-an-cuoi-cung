<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);     

        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(MovieSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(ScreenSeeder::class);
        $this->call(ShowtimeSeeder::class);
        $this->call(SeatSeeder::class);
        $this->call(ComboSeeder::class);
        // $this->call(BookingSeeder::class);
        $this->call(VoucherSeeder::class);
        $this->call(TransactionSeeder::class);
        $this->call(TicketSeeder::class);
        $this->call(InvoiceSeeder::class);

    }
}
