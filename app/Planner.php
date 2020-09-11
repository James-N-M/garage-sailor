<?php

namespace App;

class Planner extends Model
{
    public function addAd($ad)
    {
        return $this->ads()->create($ad);
    }

    public function removeAd(Ad $ad)
    {
        return $this->ads()->detach($ad->id);
    }

    public function ads()
    {
        return $this->belongsToMany(Ad::class);
    }
}
