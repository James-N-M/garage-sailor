<?php

namespace App;

class Category extends Model
{
    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function path()
    {
        return "/categories/{$this->id}";
    }
}
