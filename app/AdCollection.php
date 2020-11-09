<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;

class AdCollection extends Collection
{
    protected $shortestPath = [];

    // Calculate the shortest path using here api
    public function shortestPath()
    {
        // get start ad where start
        // get end ad where end
        // get destinations where not start or end
        // mode
        // apiKey

        $response = Http::get("https://wse.api.here.com/2/findsequence.json");


    }

    public function start()
    {

    }
}
