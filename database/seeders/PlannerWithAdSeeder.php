<?php

namespace Database\Seeders;

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
        $planner = factory(Planner::class)->create();
        $ad = factory(Ad::class)->create();

        $planner->addAd($ad);
    }
}
