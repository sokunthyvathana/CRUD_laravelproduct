<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'category_name'=>'Drink'
        ]);

        Category::create([
            'category_name'=>'Beer'
        ]);

        Category::create([
            'category_name'=>'Milk'
        ]);
    }
}
