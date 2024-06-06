<?php

namespace Database\Seeders;

use App\Models\Food\Cart;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carts = [
            [
                'user_id' => 1,
                'food_id' => 3,
                'food_name' => 'French Toast',
                'food_price' => '9',
                'food_image' => 'menu-3.jpg',
            ],
            [
                'user_id' => 1,
                'food_id' => 5,
                'food_name' => 'Breakfast Burrito',
                'food_price' => '11',
                'food_image' => 'menu-5.jpg',
            ],
            [
                'user_id' => 2,
                'food_id' => 7,
                'food_name' => 'Grilled Chicken Salad',
                'food_price' => '15',
                'food_image' => 'menu-7.jpg',
            ]
        ];

        foreach ($carts as $cart) {
            Cart::create($cart);
        }
    }
}