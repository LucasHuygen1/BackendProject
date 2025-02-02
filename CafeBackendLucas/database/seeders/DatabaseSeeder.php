<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // alle seeders
        $this->call([
            UsersSeeder::class,
            DrinkSeeder::class,
            NewsSeeder::class,
            FaqsSeeder::class,
        ]);
       
    }
}
