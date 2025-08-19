<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard protected by Gate (editor/admin)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'can:access-admin'])->name('dashboard');

// Posts: custom routes that might conflict must be defined BEFORE the resource
Route::get('/posts/pending', [PostController::class, 'pending'])
    ->middleware(['auth', 'role:editor'])->name('posts.pending');

// Posts: resource + custom actions
Route::resource('posts', PostController::class)->middleware('auth');
Route::post('/posts/{post}/publish', [PostController::class, 'publish'])
    ->middleware('auth')->name('posts.publish');

// Breeze profile routes (optional)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
