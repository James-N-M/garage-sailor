<?php

namespace App\Http\Controllers;

use App\Ad;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Planner;
use Illuminate\Support\Facades\Http;

class PlannersController extends Controller
{
    public function index()
    {
        $planners =
            auth()->user()
            ->planners()
            ->get();

        return view('planners.index', compact('planners'));
    }

    public function show(Planner $planner)
    {
        $start = $planner->start();
        $end = $planner->end();
        $ads = $planner->ads()->wherePivot('start', false);

        return view('planners.show', compact('planner', 'start', 'end', 'ads'));
    }

    public function edit(Planner $planner)
    {
        return view('planners.edit', compact('planner'));
    }


    public function create()
    {
        return view('planners.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string'],
            'date' => ['required'],
        ]);

        $planner = auth()->user()->planners()->create($attributes);

        if ($request->ads) {
            foreach($request->ads as $ad) {
                $planner->addAd(Ad::find($ad));
            }
        }

        return redirect($planner->path());
    }
}
