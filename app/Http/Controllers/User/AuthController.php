<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Notifications\ForgetPasswordUser;
use Carbon\Carbon;
use Hash, DB ,Str;
use Illuminate\Support\Facades\DB as FacadesDB;

class AuthController extends Controller
{
    public function signinForm()
    {
        return view('user.auth.signin');
    }

    public function signin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $rememberMe = $request->remember ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role_id' => Role::USER], $rememberMe)) {
            if (!empty($request->next)) {
                return redirect($request->next);
            }
            notify()->success('Login Successful');
            return redirect(route('dashboard'));
        }
        notify()->warning('Invalid credentials');
        return back();
    }
    public function signupForm()
    {
        return view('user.auth.signup');
    }

    public function signup(Request $request)
    {

        $request->validate([
            'name'             => 'required',
            'email'            => 'required|email|unique:users',
            'password'         => 'required| min:4|confirmed',

        ]);

        $data = $request->except('_token', 'password_confirmation');

        $data['role_id']    = Role::USER;
        $data['password']   = Hash::make($request->password);
        $user = User::create($data);
        notify()->success('Signup Successful');
        return redirect(route('dashboard'));
    }
    public function forgetForm()
    {
        return view('user.auth.forgot_password');
    }
    public function forgetPassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|',
        ]);

        try {
           $user = User::where(['email' => $request->email, 'role_id' => Role::USER])->first();

            if (!$user) {
                notify()->warning('No account associated with your email');
                return back();
            }

            $tokenData = DB::table('password_resets')->where('email', $request->email)->first();
            if (!$tokenData) {
                DB::table('password_resets')->insert([
                    'email' => strtolower($request->email),
                    'token' => Str::random(60),
                    'created_at' => Carbon::now(),
                ]);
                $tokenData = DB::table('password_resets')->where('email', $request->email)->first();
            }

            $url = route('forgetPasswordChange', [$tokenData->token, $user->id]);
            $user->notify(new ForgetPasswordUser($url));
        } catch (\Exception $error) {
            dd($error);
            notify()->warning('Something Went Wrong');
            return back();
        }

        notify()->success('A password resent link has been sent to your registered email address');
        return redirect(route('signin'));
    }
    public function forgetPasswordChange($token, $id)
    {
        $user = User::find($id);
        $tokenData = DB::table('password_resets')->where(['token' => $token, 'email' => $user->email])->first();
        if (!$tokenData) {
            notify()->warning('Your link has been expired , please send new link');
            return redirect()->route('dashbored');
        }

        return view('user.auth.reset_password', compact('user', 'token'));
    }
    public function forgetPasswordUpdate(Request $request, $token)
    {
        $request->validate([
            'password' => 'required|min:4|confirmed',
        ]);

        $tokenData = DB::table('password_resets')->where('token', $token)->first();
        if (!$tokenData) {
            notify()->warning('Your link has been expired , please send new link');
            return back();
        }

        $user = User::where('email', $tokenData->email)->first();
        if (Hash::check($request->password, $user->password)) {
            notify()->error('New password can not be same as old password.');
            return back();
        }

        $user->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where('email', $user->email)->delete();
        notify()->success('Password updated successfully');
        return redirect(route('signin'));
    }

    public function logout()
    {
        Auth::logout();
        notify()->success('User Logout');
        return redirect()->route('signin');
    }

    public function profileUpdate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'name' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'bio' => 'required',
        ]);

        $user = User::find(Auth::user()->id);
        $data = $request->except(['_token']);
        if ($request->hasFile('profile_photo')) {
            $data['profile_photo'] = $this->fileUpload($request->profile_photo, 'assets/img/user-img')['name'] ?? null;
        }
        $user->update($data);

        notify()->success('Profile updated successfull');
        return back();
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|min:8',
            'new_password' => 'required|min:8|different:current_password|same:confirm_password',
            'confirm_password' => 'required',
        ]);

        try {
            $user = Auth::user();

            if (\Hash::check($request->current_password, $user->password)) {
                $newPassword = \Hash::make($request->new_password);
                $user->update(['password' => $newPassword]);

                notify()->success('Password updated successfully');
                return back();
            }
            else{
                notify()->warning('You have entered wrong current password');
                return back();
            }
        } catch (\Exception $error) {
            notify()->warning('Somthing went Wrong');
            return back();
        }
    }
}
