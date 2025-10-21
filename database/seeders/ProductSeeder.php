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
        Product::create([
            'productname' => 'Coca',
            'qty' => 100,
            'price' => 0.50,
            'description' => 'Coca',
            'categoryID' => 1
        ]);
        
        Product::create([
            'productname' => 'ABC',
            'qty' => 100,
            'price' => 0.60,
            'description' => 'ABC',
            'categoryID' => 2
        ]);

        Product::create([
            'productname' => 'Lactasoy',
            'qty' => 150,
            'price' => 0.60,
            'description' => 'Lactasoy',
            'categoryID' => 3
        ]);
    }
}
