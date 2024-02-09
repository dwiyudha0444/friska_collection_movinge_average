<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'nama' => 'Baju 1',
                'kategori' => 'fashion',
                'image' => 'baju1.jpg',
                'harga' => 30000
            ],
        ];
        foreach ($products as $item){
            Product::create($item);
        }
    }
}
