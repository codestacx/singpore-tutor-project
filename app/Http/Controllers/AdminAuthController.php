<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function login(Request $request){


        if(session('admin_authenticated')){
            return redirect()->route('admin.home');
        }
        if($request->method() == 'POST'){
             $user = User::where([
                'email'     =>$request->input('loginUsername'),
                'role_id'   =>'0'
            ])->first();
            if($user) {
                if(!Hash::check($request->input('loginPassword'),$user->password)){
                    return redirect()->back()->with('error','Invalid password');
                }
                $request->session()->put('admin_authenticated',true);
                $request->session()->put('admin_id',$user->id);
                $request->session()->put('admin_name',$user->name);
                return view('admin.welcome');
            }
            return redirect()->back()->with('error','Invalid Email');
        }
        return view('admin.auths.login');
    }
}
