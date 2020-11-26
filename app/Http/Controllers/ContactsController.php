<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use Illuminate\Http\Request;
use App\Events\NewMessage;

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

    public function send(Request $request)
    {
        $message = Message::create([
            'from_id' => auth()->id(),
            'to_id' => $request->contact_id,
            'text' => $request->text
        ]);

        broadcast(new NewMessage($message));

        return $message;
    }
}
