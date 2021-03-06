<?php

namespace App\Http\Controllers;

use App\User;

class UserItemsController extends Controller
{
    public function index(User $user)
    {
        $items = $user->items()->get();

        return view('user_items.index', compact('items'));
    }
}
