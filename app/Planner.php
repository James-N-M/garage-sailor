<?php

namespace App;

class Planner extends Model
{
    public function path()
    {
        return "/planners/{$this->id}";
    }

    public function addAd(Ad $ad)
    {
        $this->ads()->attach($ad);
    }

    public function removeAd(Ad $ad)
    {
        $this->ads()->detach($ad);
    }

    public function ads()
    {
        return $this->belongsToMany(Ad::class);
    }

    public function maps()
    {
        $response = \GoogleMaps::load('geocoding')
            ->setParam (['address' =>'santa cruz'])
            ->get();

        return $response;
    }
}
