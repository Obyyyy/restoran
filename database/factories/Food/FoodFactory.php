<?php

namespace Database\Factories\Food;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food\Food>
 */
class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'slug' => Str::slug(fake()->sentence()),
            'price' => fake()->randomNumber(2, true),
            // 'category' => 'breakfast',
            'category' => fake()->randomElement(['breakfast', 'launch', 'dinner']),
            'description' => fake()->text(300),
            'image' => fake()->randomElement(['menu-1.jpg', 'menu-2.jpg', 'menu-3.jpg', 'menu-4.jpg', 'menu-5.jpg', 'menu-6.jpg', 'menu-7.jpg', 'menu-8.jpg']),
        ];
    }
}
