<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //maak de eerste admin account aan met seeder
        User::create([
            'name' => 'Admin',
            'email' => 'admin@ehb.be',
            'password' => 'Password!321',
            'role' => 'admin',
        ]);
    }
}
