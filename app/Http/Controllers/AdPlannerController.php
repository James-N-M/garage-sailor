<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Planner;
use Illuminate\Http\Request;

class AdPlannerController extends Controller
{
    public function store(Planner $planner, Ad $ad)
    {
        $planner->addAd($ad);

        return "Ad added to planner";
    }
}
