<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('signin');
})->name('home');

Route::namespace('App\Http\Controllers')->group(function() {
      Route::group([ 'namespace' => 'User'], function() {
        Route::group(['middleware' => 'guest'], function() {
            Route::get('sign-in', 'AuthController@signinform')->name('signin');
            Route::post('sign-in', 'AuthController@signin');
            Route::get('signup', 'AuthController@signupform')->name('signup');
            Route::post('signup', 'AuthController@signup');
            Route::get('forget-password','AuthController@forgetForm')->name('forgetPassword');
            Route::post('forget-password','AuthController@forgetPassword');
            Route::get('forget-password/change/{token}/{id}', 'AuthController@forgetPasswordChange')->name('forgetPasswordChange');
            Route::post('password/reset/{token}','AuthController@forgetPasswordUpdate')->name('password.reset');

        });

        Route::group(['middleware' => ['auth', 'user']], function() {
            Route::get('friends', 'FriendController@index')->name('friends');
            Route::get('dashboard', 'ChatController@chatsForm')->name('dashboard');
            Route::get('create_chat', 'ChatController@createChatForm')->name('create_chat');
            Route::get('chating', 'ChatController@chating')->name('chating');
            Route::get('chat-ajax', 'ChatController@chatAjax')->name('chatAjax');
            Route::post('sendMessage', 'ChatController@sendMessage')->name('sendMessage');
            Route::get('notification', 'NotificationController@notificationForm')->name('notifications');
            Route::get('settings', 'SettingController@settingForm')->name('settings');
            Route::get('support', 'SupportController@supportForm')->name('support');
            Route::post('profileUpdate', 'AuthController@profileUpdate')->name('profileUpdate');
            Route::post('changePassword', 'AuthController@changePassword')->name('changePassword');
            Route::get('logout', 'AuthController@logout')->name('logout');

            Route::get('deletemessage/{id}', 'ChatController@deletemessage')->name('deletemessage');




       });
    });
});
