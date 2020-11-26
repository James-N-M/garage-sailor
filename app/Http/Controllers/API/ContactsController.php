<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Message;
use App\Http\Controllers\Controller;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = User::where('id', '!=', auth()->id())->get();

        return $contacts;
    }

    public function getMessagesFor($id)
    {
        $messages = Message::where('from_id', $id)->orWhere('to_id', $id)->get();

        return $messages;
    }

}
