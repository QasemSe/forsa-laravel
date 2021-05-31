<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
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


        if ($guard == "manager" && Auth::guard('manager')->check()) {
            return redirect()->route('dashboard.index');
        }

        if ($guard == "company" && Auth::guard('company')->check()) {
            return redirect()->route('myCompany.dashboard');
        }


        if ($guard == "web" && Auth::check()) {
            return redirect()->route('me.post.index');
        }



        return $next($request);
    }
}
