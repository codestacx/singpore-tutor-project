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
        $profile_updated = User::find(session('tutor_id'))->profile_updated;

//        if($profile_updated == 0){
//            return redirect()->route('tutor.update_info')->with('error','Please update your profile first');
//        }
        return ($next)($request);
    }
}
