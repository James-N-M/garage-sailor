<?php

namespace App\Http\Controllers;
use App\Ad;

class UpcomingUserAdsController extends Controller
{
    public function show()
    {
        return Ad::upcoming()->paginate(10);
    }
}