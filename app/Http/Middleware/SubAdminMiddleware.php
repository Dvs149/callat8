<?php

namespace App\Http\Middleware;

use Closure;
use Helpers;
use Illuminate\Support\Facades\Auth;

class SubAdminMiddleware
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
        // dd(!request()->is('*/dashboard*'));
        // dd((request()->is('*/dashboard*')) || (request()->is('*/banner*')) || (request()->is('*/price*')) || (request()->is('*/cities*')) || (request()->is('*/cms_pages*')) || (request()->is('*/driver*')) || (request()->is('*/users*')) ) ;
        // if((auth()->user()->id != 1)  && ((!request()->is('*/customer*')) || (request()->is('*/order*')) || (request()->is('*/store*')) || (request()->is('*/phones*')) || (request()->is('*/testimonial*')) || (request()->is('*/review*')) || (request()->is('*/logout*'))) ){
        if((auth()->user()->id != 1)  && ((request()->is('*/dashboard*')) || (request()->is('*/banner*')) || (request()->is('*/price*')) || (request()->is('*/cities*')) || (request()->is('*/cms_pages*')) || (request()->is('*/driver*')) || (request()->is('*/users*')) ) ){
            return redirect(Helpers::admin_url('order'));
        }
        return $next($request);
    }
}
