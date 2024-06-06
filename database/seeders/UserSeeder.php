<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Muhammad Qalby',
                'email' => 'qolbymuhammad86@gmail.com',
                'password' => 'qolbymuhammad86@gmail.com',
            ],
            [
                'name' => 'Obyy',
                'email' => 'obyy@gmail.com',
                'password' => 'obyy@gmail.com',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
