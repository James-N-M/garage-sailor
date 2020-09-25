<?php

namespace App\Http\Controllers;

use App\User;

class UserAdsController extends Controller
{
    public function index(User $user)
    {
        $ads = $user->ads;

        return view('user_ads.index', compact('ads'));
    }
}
