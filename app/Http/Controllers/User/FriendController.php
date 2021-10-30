<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class FriendController extends Controller
{
    public function index(Request $request)
    {
        $users = User::get();

     $data['groupedUsers'] = $users->groupBy(function($item,$key) {
            return $item->name[0];     //treats the name string as an array
        })->sortBy(function($item,$key){      //sorts A-Z at the top level
                return $key;
        });

        return view('user.friends', $data);
    }
}
