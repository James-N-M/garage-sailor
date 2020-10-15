<?php

use Illuminate\Database\Seeder;

use App\Category;

/** Seeder to be used in Production */

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Apparel']);
        Category::create(['name' => 'Electronics']);
        Category::create(['name' => 'Entertainment']);
        Category::create(['name' => 'Books']);
        Category::create(['name' => 'Garden & Outdoor']);
        Category::create(['name' => 'Home Goods']);
        Category::create(['name' => 'Musical Instruments']);
        Category::create(['name' => 'Pet Supplies']);
        Category::create(['name' => 'Sporting Goods']);
        Category::create(['name' => 'Toys & Goods']);
    }
}
