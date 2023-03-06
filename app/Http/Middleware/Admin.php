<?php

namespace App\Http\Middleware;

use Closure;
use Helpers;
use Illuminate\Support\Facades\Auth;

class Admin
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
        
        if (!Auth::guard()->check()) {
            return redirect(Helpers::admin_url())->with('Status','Please Login First');
        }
        return $next($request);
    }
}
