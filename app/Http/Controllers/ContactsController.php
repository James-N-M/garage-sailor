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

        $unreadIds = Message::select(\DB::raw('`from_id` as sender_id, count(`from_id`) as messages_count'))
            ->where('to_id', auth()->id())
            ->where('read', false)
            ->groupBy('from_id')
            ->get();

        $contacts = $contacts->map(function($contact) use ($unreadIds) {
            $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();

            $contact->unread = $contactUnread ? $contactUnread->messages_count : 0;

            return $contact;
        });


        return $contacts;
    }

    public function getMessagesFor($id)
    {
        Message::where('from_id', $id)->where('to_id', auth()->id())->update(['read' => true]);

        // get all messages between the authenticated user and the selected user
        return Message::where(function($q) use ($id) {
            $q->where('from_id', auth()->id());
            $q->where('to_id', $id);
        })->orWhere(function($q) use ($id) {
            $q->where('from_id', $id);
            $q->where('to_id', auth()->id());
        })->get();
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
