<?php

use Illuminate\Support\Facades\Route;

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
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('admin.signin');
})->name('home');

Route::namespace('App\Http\Controllers')->group(function() {
      Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function() {
        Route::group(['middleware' => 'guest'], function() {

            Route::get('signin', 'AuthController@signinform')->name('signin');
            Route::post('signin', 'AuthController@signin');
            Route::get('signup', 'AuthController@signupform')->name('signup');
            Route::post('signup', 'AuthController@signup');
            Route::get('forget-password','AuthController@forgetForm')->name('forgetPassword');
});

            Route::get('chats', 'ChatController@chatsForm')->name('dashboard');

            Route::get('create_chat', 'ChatController@createChatForm')->name('create_chat');

            Route::get('friends', 'FriendController@friendsForm')->name('friends');

            Route::get('notification', 'NotificationController@notificationForm')->name('notifications');

            Route::get('settings', 'SettingController@settingForm')->name('settings');

            Route::get('support', 'SupportController@supportForm')->name('support');

            // Route::get('modal', 'ModalController@modalForm')->name('modal');


Route::group(['middleware' => ['auth', 'admin']], function() {


       });
    });
});
