<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function friendsForm()
    {
        return view('user.friends');
    }
}