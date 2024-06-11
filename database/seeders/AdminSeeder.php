<?php

namespace Database\Seeders;

use App\Models\Admin\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
                [
                    'name' => 'Obyy-Admin',
                    'email' => 'obyy.admin@restoran.com',
                    'password' => Hash::make('Obyy_0ne'),
                ],
                [
                    'name' => 'Zeta-Admin',
                    'email' => 'zeta.admin@restoran.com',
                    'password' => Hash::make('v.zeta07'),
                ],
            ];

        foreach ($admins as $admin) {
            Admin::create($admin);
        }
    }
}