<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

        public function handle(Request $request, Closure $next){

        if (Auth::check() && (Auth::user()->isUser())) {
            return $next($request);
        }
        Auth::logout();
        return redirect(route('signin'));
    }
    }

