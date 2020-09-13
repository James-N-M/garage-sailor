<?php

namespace App;

trait Commentable
{
    public function addComment($body, $parentId = null)
    {
        if ($parentId) {
            return Comment::findOrFail($parentId)->reply($body);
        }

        return $this->comments()->create(compact('body'));
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}