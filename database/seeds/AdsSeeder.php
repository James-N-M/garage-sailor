<?php

use Illuminate\Database\Seeder;
use App\Ad;

class AdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Ad::class, 25)->create();
    }
}
