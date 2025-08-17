<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', [RegisterController::class, 'show'])
    ->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])
    ->name('register');

Route::get('login', [LoginController::class, 'show'])
    ->middleware('guest');
Route::post('login', [LoginController::class, 'store'])
    ->name('login');

Route::get('dashboard', [DashboardController::class, 'show'])
    ->middleware('auth')
    ->name('dashboard');

Route::post('logout', [LogoutController::class, 'store'])
    ->middleware('auth')
    ->name('logout');
