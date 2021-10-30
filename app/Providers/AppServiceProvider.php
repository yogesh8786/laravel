<?php

namespace App\Providers;

use App\Models\Chat;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        View::composer('includes.navbar', function ($view) {
            $totalUnSeenMessage = Chat::where(['receiver_id' => Auth::id(), 'seen_status' => 0])->count();
            $view->with('totalUnSeenMessage',  $totalUnSeenMessage);
        });
    }
}
