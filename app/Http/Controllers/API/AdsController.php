<?php

namespace App\Http\Controllers\API;

use App\Ad;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    public function index()
    {
        return Ad::whereDate('start_date_time', Carbon::parse(request()->date)->toDate())->get();
    }
}
