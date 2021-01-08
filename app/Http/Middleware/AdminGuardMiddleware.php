<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminGuardMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if(!session('admin_authenticated') ){
            return abort(403);
        }
        return ($next)($request);
    }
}
