<?php

namespace App;

use Carbon\Carbon;

class Ad extends Model
{
    public function scopeUpcoming($query)
    {
        return $query->whereDate('start_date_time', '>=', Carbon::today()->toDateString());
    }

    public function path()
    {
        return "/ads/{$this->id}";
    }

    public function addItem($item)
    {
        return $this->items()->create($item);
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
