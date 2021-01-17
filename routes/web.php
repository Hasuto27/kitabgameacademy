<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;

Route::get('/', [PageController::class, 'home']);
Route::get('/login', [PageController::class, 'login']);
Route::get('/register', [PageController::class, 'register']);
Route::get('/classes', [ClassController::class, 'index']);
Route::get('/account', [ProfileController::class, 'profile']);
Route::get('/profileprofile', [ProfileController::class, 'profile']);
Route::get('/classprofile', [ProfileController::class, 'class']);
Route::get('/postprofile', [ProfileController::class, 'post']);
Route::get('/friendprofile', [ProfileController::class, 'friend']);
Route::get('/programme', [PageController::class, 'programme']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
