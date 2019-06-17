<?php

namespace App\Http\Middleware;
use App\UserRole;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // if (Auth::guard($guard)->check()) {
        //     return redirect('/home');
        // }
        if (Auth::guard($guard)->check()) {
            $seedashboard=UserRole::where('user_id',Auth::guard($guard)->user()->id)->first();
            // dd($seedashboard);
            if ($seedashboard!= null){
            return redirect('/admin');
            }
            else
            {
                return redirect('/');
            }
        }

        return $next($request);
    }
}
