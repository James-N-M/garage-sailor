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
        factory(User::class)->create(['name' => "James Moore", 'email' => "james0025@gmail.com"]);
        factory(User::class)->create(['name' => "Foo Bar", 'email' => "foobar@gmail.com"]);

        factory(User::class, 10)->create();
    }
}
