<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Category;

/** Seeder to be used in Production */

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Apparel']); // 1
        Category::create(['name' => 'Electronics']); // 2
        Category::create(['name' => 'Entertainment']); // 3
        Category::create(['name' => 'Books']); // 4
        Category::create(['name' => 'Garden & Outdoor']); // 5
        Category::create(['name' => 'Home Goods']); // 6
        Category::create(['name' => 'Musical Instruments']); // 7
        Category::create(['name' => 'Pet Supplies']); // 8
        Category::create(['name' => 'Sporting Goods']); // 9
        Category::create(['name' => 'Toys & Goods']); // 10
    }
}
