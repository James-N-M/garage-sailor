<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Planner;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdPlannerController extends Controller
{
    public function store(Planner $planner, Ad $ad)
    {
        $planner->addAd($ad);

        return "Ad added to planner";
    }

    public function update(Planner $planner)
    {
        if (request()->start) {
            DB::table('ad_planner')
                ->where('planner_id', $planner->id)
                ->where('ad_id', request()->start)
                ->update(['start' => true]);
        }

        if (request()->end) {
            DB::table('ad_planner')
                ->where('planner_id', $planner->id)
                ->where('ad_id', request()->end)
                ->update(['end' => true]);
        }

        return redirect($planner->path());
    }
}
