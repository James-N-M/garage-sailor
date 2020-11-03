<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 50)->create();
    }
}
