<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function friendsForm()
    {
        return view('admin.chat.friends');
    }
}
