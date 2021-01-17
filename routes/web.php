<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\AdminController;

use \App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\TutorController;


Route::prefix('/')->name('site.')->group(function(){

    Route::get('',[HomeController::class,'index'])->name('home');
    Route::get('faqs',[HomeController::class,'faqs'])->name('faqs');
    Route::match(['get','post'],'contact',[HomeController::class,'contact'])->name('contact');
    Route::match(['get','post'],'tutor/register',[AuthController::class,'register'])->name('tutor.register');

    Route::get('tution-rates',[HomeController::class,'tutionrates'])->name('tution_rates');

    Route::match(['get','post'],'update-info/{action?}',[TutorController::class,'registerationForm'])->name('update_info');
    Route::match(['get','post'],'tutor/login/',[AuthController::class,'login'])->name('user.login');

    Route::get('/verify_email/{email?}/{token?}',[AuthController::class,'verify_email'])->name('email-verification');


});

Route::get('/redirect', 'Auth\LoginController@redirectToProvider');


Route::prefix('dashboard')
    ->name('tutor.')->middleware('tutor')->group(function(){

        Route::get('',[TutorController::class,'index'])->name('dashboard');
        Route::match(['get','post'],'update-info',[TutorController::class,'update_info'])->name('update_info');
        Route::get('logout',[TutorController::class,'logout'])->name('logout');
});


use Laravel\Socialite\Facades\Socialite;

Route::get('/google',function(){

    //return 'love';
 $user = Socialite::driver('google')->stateless()->user();
 return view('auths.pages.register',compact('user'));

 //  print_r($user);
});

// Route::get('/auth/callback', function () {
//     return $user = Socialite::driver('google')->stateless()->user();

//     // $user->token
// });


Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});




Route::get('/testing',function(){
    //   \Illuminate\Support\Facades\Mail::to('muhammadatif.pucit@gmail.com')->send(new  \App\Mail\EmailVerification('token'));
        return view('auths.pages.login');
    });


Route::get('/tutor/email-verification/{email}/{token}',function($email,$token){
    dd('working');
})->name('tutor.email-verification');


Route::get('/education/load-card',[TutorController::class,'loadCard'])->name('load-card');

Route::get('/experience/getrow',[TutorController::class,'getAcademicExperienceRow'])->name('get-experience-row');


/* Admin Routes */
Route::prefix('superadmin')->group(function(){
    Route::match(['get', 'post'], '/login',[AdminAuthController::class,'login'])->name('admin.login');
});
Route::prefix('superadmin')->middleware('admin_guard')->name('admin.')->group(function(){

    Route::get('',[AdminController::class,'welcome'])->name('home');

    Route::match(['get','post'],'grades/{action?}/{grade?}',[AdminController::class,'grades'])->name('grades');
    Route::match(['get','post'],'levels/{action?}/{levels?}',[AdminController::class,'levels'])->name('levels');
    Route::match(['get','post'],'faqs/{action?}/{faq?}',[AdminController::class,'faqs'])->name('faqs');
});


populateRoutes([
    'card.load'=>url('/education/load-card'),
    'update-info'=>url('/dashboard/update-info'),
    'get-experience-row'=>url('/experience/getrow')
]);




