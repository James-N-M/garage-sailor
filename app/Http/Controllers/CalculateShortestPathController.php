<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CalculateShortestPathController extends Controller
{
    private $apiKey;

    public function __construct()
    {
        $this->apiKey = env("HERE_KEY");
    }

    public function index(Request $request)
    {
        $start = "start=START-POINT;" . $request->start;

        $end = "end=END-POINT;" . $request->end;

        $waypoints = $request->waypoints;

        $response = Http::get("https://wse.ls.hereapi.com/2/findsequence.json?$start&$waypoints$end&mode=fastest;car&apiKey=$this->apiKey");

        return json_decode($response->body())->results[0]->waypoints;
    }
}
