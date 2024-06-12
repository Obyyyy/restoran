<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bookings = [
                [
                    'user_id' => 2,
                    'name' => 'Obyy',
                    'email' => 'obyy@gmail.com',
                    'date' => '06/13/2024 2:15 PM',
                    'num_people' => 2,
                    'spe_request' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure delectus sunt repellat repudiandae exercitationem debitis?',
                ],
                [
                    'user_id' => 1,
                    'name' => 'Muhammad Qalby',
                    'email' => 'qolbymuhammad86@gmail.com',
                    'date' => '06/13/2024 4:45 PM',
                    'num_people' => 3,
                    'spe_request' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, in.',
                ]
            ];
    }
}