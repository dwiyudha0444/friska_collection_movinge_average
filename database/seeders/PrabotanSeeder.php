<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prabotan;

class PrabotanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'nama' => 'Sapu 1',
                'kategori' => 'sapu',
                'image' => 'default.jpg',
                'harga' => 8000
            ],
            [
                'nama' => 'Sapu 2',
                'kategori' => 'sapu',
                'image' => 'default.jpg',
                'harga' => 7000
            ],
            [
                'nama' => 'Sapu 3',
                'kategori' => 'sapu',
                'image' => 'default.jpg',
                'harga' => 5000
            ],
        ];
        foreach ($products as $item){
            Prabotan::create($item);
        }
    }
}
