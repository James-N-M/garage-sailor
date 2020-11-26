<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;
use App\Planner;
use App\Ad;

class PlannerWithAdSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $planner = factory(Planner::class)->create(['name' => "Sunday Garage Sale Planner", 'creator_id' => 1 ]);

        $ad = Ad::find(1);

        $adTwo = Ad::find(2);

        $adThree = Ad::find(3);

        $planner->addAd($ad);

        $planner->addAd($adTwo);

        $planner->addAd($adThree);
    }
}
