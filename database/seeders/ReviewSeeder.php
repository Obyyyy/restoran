<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reviews = [
            [
                'user_id' => 1,
                'name' => 'Muhammad Qalby',
                'review' => 'Restoran ini menawarkan pengalaman makan malam yang luar biasa dengan hidangan Italia autentik dan layanan yang sempurna.',
            ],
            [
                'user_id' => 2,
                'name' => 'Obyy',
                'review' => 'Restoran ini menyajikan hidangan rumahan yang lezat dengan porsi besar dan pelayanan ramah dalam suasana yang nyaman.',
            ],

        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }
    }
}