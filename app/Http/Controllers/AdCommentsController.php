<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Comment;

class AdCommentsController extends Controller
{
    public function store(Ad $ad)
    {
        $ad->addComment(request('body'), request('reply_to_id'));

        return "Comment added";
    }
}
