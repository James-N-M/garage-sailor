<?php

namespace App;

class Item extends Model
{
    public $guarded = [];


    public function path()
    {
        return "/items/{$this->id}";
    }

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
