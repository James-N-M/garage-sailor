<?php

namespace App;

class Message extends Model
{
    public function fromContact()
    {
        return $this->hasOne(User::class, 'id', 'from_id');
    }
}
