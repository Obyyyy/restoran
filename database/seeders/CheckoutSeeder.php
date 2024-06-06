<?php

namespace Database\Seeders;

use App\Models\Food\Checkout;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CheckoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $checkouts = [
            [
                'user_id' => 1,
                'status' => 'Delivered',
                'price' => 28,
                'name' => 'Muhammad Qalby',
                'email' => 'qolbymuhammad86@gmail.com',
                'town' => 'Palangka Raya',
                'country' => 'Indonesia',
                'zipcode' => '73112',
                'phone_number' => '081345336291',
                'address' => 'Jl. Kebenaran, Gg. Berkah',
            ],
            [
                'user_id' => 1,
                'status' => 'Processing',
                'price' => 15,
                'name' => 'Muhammad Qalby',
                'email' => 'qolbymuhammad86@gmail.com',
                'town' => 'Banjarmasin',
                'country' => 'Indonesia',
                'zipcode' => '72121',
                'phone_number' => '081345336291',
                'address' => 'Jl. Kebenaran, Gg. Berkah',
            ],
        ];

        foreach ($checkouts as $checkout) {
            Checkout::create($checkout);
        }
    }
}
