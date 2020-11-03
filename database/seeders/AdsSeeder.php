<?php

namespace Database\Seeders;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdsSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ads')->insert(
            [
                'name' => 'Clover Yard Sale',
                'description' => 'Lot of house items for sale',
                'creator_id' => factory(User::class)->create()->id,
                'start_date_time' => Carbon::tomorrow()->toDateTime(),
                'end_date_time' => Carbon::tomorrow()->toDateTime(),
                'address' => "550 Clover Street",
                'city' => 'Windsor',
                'province' => "Ontario",
                'latitude' => "42.335430",
                'longitude' => "-82.915420",
            ]
        );
    }
}
