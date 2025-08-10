<?php

use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/upload', [UploadController::class, 'upload']);
Route::post('/upload', [UploadController::class, 'store'])->name('upload.store');
