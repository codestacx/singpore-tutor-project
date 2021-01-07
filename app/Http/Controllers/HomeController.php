<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        return view('welcome');
    }


    public function faqs(Request $request){
        return view('pages.faqs.index');
    }

    public function contact(Request $request){

        if($request->method() == 'POST'){
            //create contact request & save in database

            return redirect()->back()->with('success','Your request has been dispatched successfully');
        }
        return view('pages.contact.index');
    }
}
