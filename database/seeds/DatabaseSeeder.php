<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(AdsSeeder::class);
        $this->call(ItemsSeeder::class);
        $this->call(ItemsWithCategorySeeder::class);
        $this->call(PlannerWithAdSeeder::class);
    }
}
