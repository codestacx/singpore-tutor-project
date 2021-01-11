<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(Request $request){
        return view('welcome');
    }


    public function faqs(Request $request){

        $faqs = DB::table('faqs')->join('faqs_categories','faqs_categories.id','=','faqs.faq_cat_id')->get();

        $categories = DB::table('faqs_categories')->get();
        return view('pages.faqs.index',compact('faqs','categories'));
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


    public function tutionrates(Request $request){

        return view('pages.tution_rates.index');
    }
}
