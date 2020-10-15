<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    public function planners()
    {
        return $this->belongsToMany(Planner::class);
    }

    public function addPlanner(Planner $planner)
    {
        return $this->planners()->attach($planner);
    }
}
