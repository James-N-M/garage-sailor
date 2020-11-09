<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Item;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        factory(Item::class, 25)->create(['category_id' => null]);
    }
}
