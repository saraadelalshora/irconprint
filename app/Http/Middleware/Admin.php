<?php

namespace App\Http\Middleware;
use App\Role;
use App\UserRole;
use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if(Auth::check())
        {
            $seedashboard=UserRole::where('user_id',Auth::guard($guard)->user()->id)->first();
            if($seedashboard!=null)
            {
            
                // return redirect($request->path('/'), 301);
                $allrole=Role::all();
                View::share('allrole',$allrole);
                return $next($request);
            }
            else
            {
                return redirect()->route('login');
            }

        }
        // return redirect()->route('login');
    }
    }
