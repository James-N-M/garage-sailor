<?php

namespace App;

use App\Item;

class Category extends Model
{
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
