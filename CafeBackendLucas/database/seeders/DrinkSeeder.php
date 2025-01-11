<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Drink;

class DrinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $drinks = [
            [
                'name' => 'Jupiler',
                'description' => 'Mannen weten waarom',
                'price' => 3.50,
                'image' => 'drinks/jupiler.png',
            ],
            [
                'name' => 'Stella Artois',
                'description' => 'Populairste hier',
                'price' => 3.75,
                'image' => 'drinks/stella.jpg',
            ],
            [
                'name' => 'Coffee',
                'description' => 'Zelfgemaakt coffee',
                'price' => 2.50,
                'image' => 'drinks/coffee.jpg',
            ],
        ];

        foreach ($drinks as $drinkData) {
            Drink::create($drinkData);
        }
    }
}
