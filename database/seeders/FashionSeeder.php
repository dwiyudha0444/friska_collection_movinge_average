<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fashion;

class FashionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'nama' => 'Baju 1',
                'kategori' => 'baju',
                'image' => 'default.jpg',
                'harga' => 30000
            ],
            [
                'nama' => 'Baju 2',
                'kategori' => 'baju',
                'image' => 'default.jpg',
                'harga' => 20000
            ],
            [
                'nama' => 'Baju 3',
                'kategori' => 'baju',
                'image' => 'default.jpg',
                'harga' => 25000
            ],
        ];
        foreach ($products as $item){
            Fashion::create($item);
        }
    }
}
