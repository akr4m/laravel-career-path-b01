<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/upload', [UploadController::class, 'upload']);
Route::post('/upload', [UploadController::class, 'store'])->name('upload.store');

Route::get('/gallery', [ImageController::class, 'index']);
Route::post('/gallery', [ImageController::class, 'store'])->name('gallery.store');
Route::get('/gallery/{image}', [ImageController::class, 'destroy'])->name('gallery.destroy');
