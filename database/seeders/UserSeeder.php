<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'admin'
            ],
            [
                'name' => 'pemilik',
                'email' => 'pemilik@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'pemilik'
            ],
            [
                'name' => 'kasir',
                'email' => 'kasir@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'kasir'
            ],
        ];
        foreach ($users as $userItem){
            User::create($userItem);
        }
    }
}
