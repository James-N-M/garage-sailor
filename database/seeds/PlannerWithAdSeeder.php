<?php

use Illuminate\Database\Seeder;
use App\Planner;
use App\Ad;

class PlannerWithAdSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
