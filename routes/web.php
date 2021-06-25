<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserLevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PopUpController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\LearnPageController;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'viewdashboard']);
Route::get('/login', [PageController::class, 'login']);
Route::get('/register', [PageController::class, 'register']);
Route::get('/programme', [PageController::class, 'programme']);
Route::get('/gametechnology', [PageController::class, 'gametechnology']);
Route::get('/gameproduction', [PageController::class, 'gameproduction']);
//Route::get('/gameart', [PageController::class, 'gameart']);//
Route::get('/error', [PageController::class, 'notfound']);

//Route::get('/test', [UserController::class, 'index']);
//Route::get('/test/plusexp/{user}', [UserController::class, 'showplusexp']);
//Route::get('/test/plusmilitaryration/{user}', [UserController::class, 'showplusration']);
//Route::patch('/test/{user}', [UserController::class, 'update']);
//Route::patch('/test/plusmilitaryration/{user}', [UserController::class, 'updateration']);
//Route::post('/checkout/calculate',[DiscountController::class, 'hitungdiskon']);


Auth::routes();

Auth::routes(['verify' => true]);
Route::get('profile', function () {
})->middleware('verified');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth','checkauthorization:admin']], function(){
    Route::get('/lecturehome', [PageController::class, 'lecturehome']);
});

Route::group(['middleware' => ['auth','checkauthorization:student']], function(){
    Route::get('/gametechnologybeginner', [PageController::class, 'gametechnologybeginner']);
    Route::get('/checkout', [DiscountController::class, 'viewcheckout']);
    Route::get('/payment', [DiscountController::class, 'viewpayment']);
    Route::get('/learning/home', [LearnPageController::class, 'viewHome']);

    Route::get('/notification',[NotificationController::class, 'viewnotification']);
    Route::delete('/notification/delete',[NotificationController::class, 'deleteNotification']);

    Route::post('/addtocart',[CartController::class, 'addtocart']);
    Route::post('/addtocart2',[CartController::class, 'addtocart']);
    Route::get('/user/cart/mycart',[CartController::class, 'viewmycart']);
    Route::post('/mycart/checkout',[CartController::class, 'checkout']);
    Route::delete('/user/cart/mycart/delete',[CartController::class, 'destroy']);

    Route::get('/myprofile', [ProfileController::class, 'viewmyprofile']);
    Route::get('/myprogramme', [ProfileController::class, 'viewmyprogramme']);
});

Route::group(['middleware' => ['auth','checkauthorization:lecture']], function(){
    Route::get('/dashboard', [PageController::class, 'dashboard']);
});

Route::group(['middleware' => ['auth','checkaccessprogramme:1']], function(){

    Route::group(['middleware' => ['auth','checkaccesspart:1']], function(){
         Route::get('/learning/learn/{idprogramme}/{idpart}', [LearnPageController::class, 'viewLearn']);
    });

    Route::group(['middleware' => ['auth','checkquizfinalize:0']], function(){
        Route::group(['middleware' => ['auth','checkaccesspart:1']], function(){
            Route::get('/learning/quiz/{idprogramme}/{idpart}',[QuizController::class, 'viewquiz']);
            Route::post('/learning/quiz/{idprogramme}/{idpart}/check',[QuizController::class, 'checkquiz']);
            Route::get('/learning/survey/{idprogramme}/{idpart}',[QuizController::class, 'survey']);
            Route::post('/learning/survey/{idprogramme}/{idpart}/submit',[QuizController::class, 'submitSurvey']);
        });
    });
});



