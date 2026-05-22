<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['ProductId' => 1, 'Name' => 'Televisor',  'Reference' => '100-342'],
            ['ProductId' => 2, 'Name' => 'Nevera',      'Reference' => '100-343'],
            ['ProductId' => 3, 'Name' => 'Microondas',  'Reference' => '100-344'],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(['ProductId' => $product['ProductId']], $product);
        }
    }
}
