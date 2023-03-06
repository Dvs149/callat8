<?php

namespace App\Http\Middleware;

use Closure;
use Helpers;
use Illuminate\Support\Facades\Auth;

class MainAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user_allow= isset(Auth::user()->settingsofuser[Auth::user()->roleid]["u"])?Auth::user()->settingsofuser[Auth::user()->roleid]["u"]:false;
        $Can_Do_Everything=isset(Auth::user()->settingsofuser[Auth::user()->roleid]["c_d_e"])?Auth::user()->settingsofuser[Auth::user()->roleid]["c_d_e"]:false;

        if (Auth::user()->id == 1 || $user_allow=="User" || $Can_Do_Everything == "Can Do Everything") {
            return $next($request);
        }
        return redirect(Helpers::admin_url('dashboard'));
    }
}
