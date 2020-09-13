<?php

namespace App;

class Comment extends Model
{

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'reply_to_id');
    }

    public function reply($body)
    {
        $reply = new static(compact('body'));

        $reply->reply_to_id = $this->id;
        $reply->ad_id = $this->ad->id;

        $reply->save();

        return $reply;
    }

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'reply_to_id');
    }
}
