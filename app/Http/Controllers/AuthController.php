<?php

namespace App\Http\Controllers;

use App\Mail\EmailVerification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{

    public function index(Request $request){
        $user = User::find(session('tutor_id'));

        return view('auths.welcome',['user'=>$user]);
    }


    public function login(Request $request){

        if($request->method() == 'POST'){
            //handle login
            $email = $request->email;
            $password = $request->password;


            $user = User::where([
                'email'=>$email
            ])->first();

            if($user){


                // check if email is already verified
                if(!Hash::check($password,$user->password)){
                    return redirect()->back()->with('error','Invalid password');
                }

                $request->session()->put('tutor_logged',true);
                $request->session()->put('tutor_id',$user->id);
                $request->session()->put('tutor_name',$user->name);

                return redirect()->route('site.home');

            }
            return redirect()->back()->with('error','Invalid Email');

        }

        if($request->session()->has('tutor_logged') && !is_null(session('tutor_logged'))){
            return redirect()->route('site.home');
        }

        return view('auths.pages.login');
    }
    public function register(Request $request){
        if($request->method() == 'POST'){

            $email = $request->email;
            if(!User::isEmailAlreadyRegistered($email)){
                $password = $request->password;
                $c_password = $request->confirm_password;

                if($password != $c_password){
                    return redirect()->back()->with('error','Passwords does not match');
                }

                $name = $request->name;
                $now  = Carbon::now();

                $user = DB::table('users')->insert([
                    'name'=>$name,
                    'email'=>$email,
                    'password'=>Hash::make($password),
                    'role_id'=>1,
                    'created_at'=>$now,
                    'updated_at'=>$now
                ]);

                $token = sha1(time());
                DB::table('verificationlinks')->insert([
                    'email'=>$email,
                    'token'=>$token
                ]);


                /*
                 *  Send verification link
                 */

                Mail::to($email)->send(new EmailVerification($email,$token));
                return redirect()->back()->with('success','Please check your email for verification');

            }

            return redirect()->back()->with('error','Email Already Registered');
        }
        return view('auths.pages.register');
    }


    public function verify_email(Request $request){
        $request = (object)$request->all();

        $email  = $request->email;
        $token = $request->token;


        $count = DB::table('verificationlinks')->where([
            'email'=>$email,
            'token'=>$token
        ])->count();

        if($count > 0){
            DB::table('users')->where([
                'email'=>$email
            ])->update([
                'email_verified_at'=>Carbon::now(),
                'active_status'=>1
            ]);
            DB::table('verificationlinks')->where([
                'email'=>$email,
                'token'=>$token
            ])->delete();

            return redirect()->route('site.user.login')->with('success','Email Verified Successfully');
        }else{
            abort(403,'Bad Request');
        }

    }


}
