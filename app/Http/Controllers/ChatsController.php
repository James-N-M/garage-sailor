<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show chats
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('chat');
    }

    public function show(User $user)
    {
        $sentMessages = Message::with('user')
            ->where('to_id', $user->id)
            ->where('user_id', Auth::user()->id)
            ->get();

        $received = Message::with('user')
            ->where('to_id', Auth::user()->id)
            ->where('user_id', $user->id)
            ->get();

        $messages = $sentMessages->merge($received)->sortByDesc(function ($message) {
            return $message->created_at;
        });

        $to = $user;

        return view('chats.show', compact('to', 'messages'));
    }

    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages()
    {
        return Message::with('user')->get();
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request)
    {
        $user = Auth::user();

        $message = $user->messages()->create([
            'message' => $request->input('message'),
            'user_id' => $user->id,
            'to_id' => $request->input('to_id')
        ]);

        broadcast(new MessageSent($user, $message))->toOthers();

        return ['status' => 'Message Sent!'];
    }
}
