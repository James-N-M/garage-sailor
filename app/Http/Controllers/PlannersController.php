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

        auth()->user()->planners()->create($attributes);

        return "planner created!";
    }

//    private function calculateShortestPath(Planner $planner) {
//
//        $start = $planner->start();
//
//        $end = $planner->end();
//
//        $ads = $planner->ads->toArray();
//
//        $api_key = env('HERE_KEY');
//
////        dd([
////            $start,
////            $end,
////            $ads,
////            $api_key
////        ]);
//
//        $url = "https://wse.ls.hereapi.com/2/findsequence.json
//        ?start=$start->name;$start->latitude,$start->longitude";
//
//        for ($i = 1; $i < count($ads); $i++)
//        {
//            $url .= "&destination" . $i . "=" . $ads[$i]['name'] . ";" . $ads[$i]['latitude'] . "," . $ads[$i]['longitude'];
//        }
//
//        $url .= "&end=$end->name;$end->latitude,$end->longitude";
//
//        $url .= "&mode=fastest;car";
//
//        $url .= "&apiKey=$api_key";
//
//        $response = HTTP::get("https://wse.ls.hereapi.com/2/findsequence.json
//?start=Berlin-Main-Station;52.52282,13.37011
//&destination1=East-Side-Gallery;52.50341,13.44429
//&destination2=Olympiastadion;52.51293,13.24021
//&end=HERE-Berlin-Campus;52.53066,13.38511
//&mode=fastest;car
//&apiKey=ypEJhHh9KXdCy35mBlReQoGe-8AD7yeTaMmJWl8-7x4");
//
//        dd($response->body());
//
////        &destination1=East-Side-Gallery;52.50341,13.44429
////        &destination2=Olympiastadion;52.51293,13.24021
////        &end=HERE-Berlin-Campus;52.53066,13.38511
////        &mode=fastest;car
////        &apiKey=ypEJhHh9KXdCy35mBlReQoGe-8AD7yeTaMmJWl8-7x4";
//    }
}
