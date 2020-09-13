<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlannersController extends Controller
{
    public function index()
    {
        $planners = auth()->user()->planners()->get();

        return view('planners.index', compact('planners'));
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