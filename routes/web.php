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

use App\Http\Controllers\UpdateTutorProfileController as TPC;

//Route::get('testing/',function (){
//
//    $params = http_build_query(array(
//        "access_key" => "615d359dd13a4bd189a3523df6f3bd5e",
//        "url" => "https://www.google.com.pk",
//    ));
//
//    $image_data = file_get_contents("https://api.apiflash.com/v1/urltoimage?" . $params);
//    file_put_contents("screenshot.jpeg", $image_data);
//});

Route::prefix('/')->name('site.')->group(function(){

    Route::get('',[HomeController::class,'index'])->name('home');
    Route::get('faqs',[HomeController::class,'faqs'])->name('faqs');
    Route::get('about-us',[HomeController::class,'aboutus'])->name('aboutus');
    Route::match(['get','post'],'tuition-assignments/{action?}',[HomeController::class,'tuition_assignments'])->name('tuition_assignments');
    Route::match(['get','post'],'contact',[HomeController::class,'contact'])->name('contact');
    Route::match(['get','post'],'tutor/register',[AuthController::class,'register'])->name('tutor.register');

    Route::get('tution-rates',[HomeController::class,'tutionrates'])->name('tution_rates');

    Route::match(['get','post'],'update-info/{action?}',[TutorController::class,'registerationForm'])->name('update_info');
    Route::match(['get','post'],'tutor/login/',[AuthController::class,'login'])->name('user.login');
    Route::get('/verify_email/{email?}/{token?}',[AuthController::class,'verify_email'])->name('email-verification');
    Route::post('tutor/request',[TutorController::class,'tutor_request'])->name('tutor.request');

});

Route::prefix('dashboard')
    ->name('tutor.')->middleware('tutor')->group(function() {
        Route::get('', [TPC::class, 'index'])->name('dashboard');

        Route::match(['get', 'post'], 'tutor/basic-info', [TPC::class, 'updateBasicInformation'])->name('profile.basic_info');
        Route::match(['get', 'post'], 'tutor/education-info', [TPC::class, 'updateEducationInformation'])->name('profile.education_info');
        Route::post('tutor/education-info/timeline', [TPC::class, 'addNewEducationTimeline'])->name('profile.education_info.timeline');
        Route::match(['get', 'post'], 'tutor/experience-info/{action?}', [TPC::class, 'updateExperienceInformation'])->name('profile.experience_info');

        Route::match(['get', 'post'], 'tutor/preferences', [TPC::class, 'updatePreferences'])->name('profile.preference_info');
        Route::match(['get', 'post'], 'tutor/documents', [TPC::class, 'updateDocuments'])->name('profile.document_info');
        Route::match(['get', 'post'], 'update-info', [TutorController::class, 'update_info'])->name('update_info');
        Route::match(['get', 'post'], 'account-privacy/{action?}', [TPC::class, 'account_privacy'])->name('account.privacy');
        Route::get('tutor/notifications', [TPC::class, 'notifications'])->name('notifications');

    });

Route::get('/education/load-card',[TutorController::class,'loadCard'])->name('load-card');
Route::get('/experience/getrow',[TutorController::class,'getAcademicExperienceRow'])->name('get-experience-row');
Route::get('/tutor-request/row',[HomeController::class,'getTutorRequestRow'])->name('tutor.request.row');

/* Admin Routes */
Route::prefix('superadmin')->group(function(){
    Route::match(['get', 'post'], '/login',[AdminAuthController::class,'login'])->name('admin.login');
});
Route::prefix('superadmin')->middleware('admin_guard')->name('admin.')->group(function(){

    Route::get('',[AdminController::class,'welcome'])->name('home');

    Route::match(['get','post'],'grades/{action?}/{grade?}',[AdminController::class,'grades'])->name('grades');
    Route::match(['get','post'],'levels/{action?}/{levels?}',[AdminController::class,'levels'])->name('levels');
    Route::match(['get','post'],'faqs/{action?}/{faq?}',[AdminController::class,'faqs'])->name('faqs');
    Route::match(['get','post'],'subjects/{action?}/{subject?}',[AdminController::class,'subjects'])->name('subjects');
    Route::match(['get','post'],'locations/{action?}/{location?}',[AdminController::class,'locations'])->name('locations');
    Route::match(['get','post'],'instruments/{action?}/{instrument?}',[AdminController::class,'instruments'])->name('instruments');
    Route::match(['get','post'],'races/{action?}/{race?}',[AdminController::class,'races'])->name('races');

});


//populateRoutes([
//    'card.load'=>url('/education/load-card'),
//    'update-info'=>url('/dashboard/update-info'),
//    'get-experience-row'=>url('/experience/getrow'),
//    'tutor.request.row'=>url('/tutor-request/row'),
//    'tutor.request'=>url('tutor/request')
//]);




