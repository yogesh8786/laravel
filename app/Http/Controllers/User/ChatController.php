<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function createChatForm()
    {
        return view('user.create_chat');
    }
    public function chatsForm()
    {
        return view('user.chats');
    }
}
