<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function login(Request $request){

        if(session('admin_authenticated')){
            return redirect()->route('admin.home');
        }

        return view('admin.auths.login');
    }
}
