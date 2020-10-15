<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Item;

class ItemsWithCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = factory(Category::class, 10)->create();

        foreach($categories as $category) {
            factory(Item::class, 5)->create(['category_id' => $category->id]);
        }
    }
}

