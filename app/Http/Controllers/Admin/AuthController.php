<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signinForm()
    {
        return view('admin.auth.signin');
    }

    public function signin(Request $request)
    {
    }
    public function signupForm()
    {
        return view('admin.auth.signup');
    }

    public function signup(Request $request)
    {
    }
    public function forgetForm()
    {
        return view('admin.auth.reset_password');
    }


}
