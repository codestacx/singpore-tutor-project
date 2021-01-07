<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

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

            DB::table('contacts')->insert(
                [
                    'name'          =>  $request->input('c_name'),
                    'email'         =>  $request->input('c_email'),
                    'message'       =>  $request->input('message'),
                    'created_at'    => Carbon::now()->toDateTimeString(),
                    'updated_at'    => Carbon::now()->toDateTimeString()
                ]
            );

            return redirect()->back()->with('success','Your request has been dispatched successfully');
        }
        return view('pages.contact.index');
    }
}
