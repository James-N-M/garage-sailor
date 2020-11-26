<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Http\Controllers\Controller;

class ContactsController extends Controller
{
    public function index()
    {
        return User::all();
    }
}
