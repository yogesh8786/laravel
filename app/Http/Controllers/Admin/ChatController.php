<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function createChatForm()
    {
        return view('admin.chat.create_chat');
    }
    public function chatsForm()
    {
        return view('admin.chat.chats');
    }
}
