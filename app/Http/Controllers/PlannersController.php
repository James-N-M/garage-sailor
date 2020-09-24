<?php

namespace App\Http\Controllers;

use App\Ad;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Planner;

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
        $ads = Ad::whereDate('start_date_time', $planner->date)->get();

        return view('planners.show', compact('planner', 'ads'));
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

        auth()->user()->planners()->create($attributes);

        return "planner created!";
    }
}
