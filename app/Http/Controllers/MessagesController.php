<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Models\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('welcome', compact('messages'));
    }

    public function store(Request $request)
    {
        $request->validate(['content'=>'required|min:3']);

        $message = Message::create([
            "sender_id"=> 2,
            "sender_type" => "teacher",
            "receiver_id" => 1,
            "receiver_type" => "student",
            "content" => $request->content
        ]);

        // event(new NewMessage($message));

        broadcast(new NewMessage($message));

        return ['status' => 'Message Sent!'];
    }
}
