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




Route::prefix('/')->name('site.')->group(function(){

    Route::get('',[HomeController::class,'index'])->name('home');
    Route::get('faqs',[HomeController::class,'faqs'])->name('faqs');
    Route::match(['get','post'],'contact',[HomeController::class,'contact'])->name('contact');
    Route::match(['get','post'],'tutor/register',[AuthController::class,'register'])->name('tutor.register');
});


Route::prefix('superadmin')->name('admin.')->group(function(){
    Route::get('',[AdminController::class,'welcome'])->name('home');
    Route::match(['get','post'],'grades/{action?}/{grade?}',[AdminController::class,'grades'])->name('grades');

    Route::match(['get','post'],'faqs/{action?}/{faq?}',[AdminController::class,'faqs'])->name('faqs');
});

