<?php

namespace Database\Seeders;

use App\Models\Food\Food;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $foods = [
            [
                'name' => 'Pancakes',
                'slug' => 'pancakes',
                'price' => '8',
                'category' => 'breakfast',
                'description' => 'Delicious fluffy pancakes served with syrup and fresh berries.',
                'image' => 'menu-1.jpg',
            ],
            [
                'name' => 'Omelette',
                'slug' => 'omelette',
                'price' => '12',
                'category' => 'breakfast',
                'description' => 'A hearty omelette filled with cheese, ham, and vegetables.',
                'image' => 'menu-2.jpg',
            ],
            [
                'name' => 'French Toast',
                'slug' => 'french-toast',
                'price' => '9',
                'category' => 'breakfast',
                'description' => 'Golden brown French toast served with butter and maple syrup.',
                'image' => 'menu-3.jpg',
            ],
            [
                'name' => 'Breakfast Burrito',
                'slug' => 'breakfast-burrito',
                'price' => '11',
                'category' => 'breakfast',
                'description' => 'A savory burrito filled with scrambled eggs, sausage, and cheese.',
                'image' => 'menu-4.jpg',
            ],
            [
                'name' => 'Granola Bowl',
                'slug' => 'granola-bowl',
                'price' => '7',
                'category' => 'breakfast',
                'description' => 'Healthy granola served with yogurt and fresh fruits.',
                'image' => 'menu-5.jpg',
            ],
            [
                'name' => 'Avocado Toast',
                'slug' => 'avocado-toast',
                'price' => '10',
                'category' => 'breakfast',
                'description' => 'Crispy toast topped with smashed avocado and poached eggs.',
                'image' => 'menu-6.jpg',
            ],

            // Launch
            [
                'name' => 'Grilled Chicken Salad',
                'slug' => 'grilled-chicken-salad',
                'price' => '15',
                'category' => 'launch',
                'description' => 'Fresh salad with grilled chicken, mixed greens, and a tangy vinaigrette.',
                'image' => 'menu-7.jpg',
            ],
            [
                'name' => 'Beef Burger',
                'slug' => 'beef-burger',
                'price' => '18',
                'category' => 'launch',
                'description' => 'Juicy beef burger with cheese, lettuce, tomato, and a side of fries.',
                'image' => 'menu-2.jpg',
            ],
            [
                'name' => 'Fish Tacos',
                'slug' => 'fish-tacos',
                'price' => '14',
                'category' => 'launch',
                'description' => 'Crispy fish tacos served with cabbage slaw and spicy mayo.',
                'image' => 'menu-8.jpg',
            ],
            [
                'name' => 'Steak Sandwich',
                'slug' => 'steak-sandwich',
                'price' => '20',
                'category' => 'launch',
                'description' => 'Tender steak sandwich with caramelized onions and horseradish sauce.',
                'image' => 'menu-1.jpg',
            ],
            [
                'name' => 'Chicken Caesar Wrap',
                'slug' => 'chicken-caesar-wrap',
                'price' => '13',
                'category' => 'launch',
                'description' => 'A wrap filled with grilled chicken, romaine lettuce, and Caesar dressing.',
                'image' => 'menu-5.jpg',
            ],
            [
                'name' => 'Pasta Primavera',
                'slug' => 'pasta-primavera',
                'price' => '16',
                'category' => 'launch',
                'description' => 'Pasta with a mix of fresh vegetables in a light garlic sauce.',
                'image' => 'menu-6.jpg',
            ],

            // Dinner
            [
                'name' => 'Roast Beef',
                'slug' => 'roast-beef',
                'price' => '25',
                'category' => 'dinner',
                'description' => 'Succulent roast beef served with mashed potatoes and gravy.',
                'image' => 'menu-5.jpg',
            ],
            [
                'name' => 'Lemon Herb Salmon',
                'slug' => 'lemon-herb-salmon',
                'price' => '28',
                'category' => 'dinner',
                'description' => 'Grilled salmon fillet with a lemon herb crust, served with asparagus.',
                'image' => 'menu-7.jpg',
            ],
            [
                'name' => 'Vegetable Stir-fry',
                'slug' => 'vegetable-stir-fry',
                'price' => '19',
                'category' => 'dinner',
                'description' => 'A medley of fresh vegetables stir-fried in a savory sauce.',
                'image' => 'menu-3.jpg',
            ],
            [
                'name' => 'BBQ Ribs',
                'slug' => 'bbq-ribs',
                'price' => '30',
                'category' => 'dinner',
                'description' => 'Tender BBQ ribs served with coleslaw and cornbread.',
                'image' => 'menu-6.jpg',
            ],
            [
                'name' => 'Spaghetti Bolognese',
                'slug' => 'spaghetti-bolognese',
                'price' => '22',
                'category' => 'dinner',
                'description' => 'Classic spaghetti with a rich bolognese sauce.',
                'image' => 'menu-5.jpg',
            ],
            [
                'name' => 'Lamb Chops',
                'slug' => 'lamb-chops',
                'price' => '35',
                'category' => 'dinner',
                'description' => 'Grilled lamb chops served with mint sauce and roasted vegetables.',
                'image' => 'menu-1.jpg',
            ],
        ];

        foreach ($foods as $food) {
            Food::create($food);
        }
    }
}