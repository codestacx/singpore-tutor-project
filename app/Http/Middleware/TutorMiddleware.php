<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class TutorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next){

        if(!$request->session()->has('tutor_logged')){
            return redirect()->route('site.user.login')->with('error','Login first to access dashboard');
        }
        return ($next)($request);
    }
}
