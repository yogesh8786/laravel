<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
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
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $rememberMe = $request->remember ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role_id' => Role::ADMIN], $rememberMe)) {
            if (!empty($request->next)) {
                return redirect($request->next);
            }
            notify()->success('Login Successful');
            return redirect(route('admin.auth.signin'));
        }
        notify()->warning('Invalid credentials');
        return back();
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
