<?php

use App\Events\UserRegistered;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/create-user', function () {
    return view('create-user');
});

Route::post('/create-user', function () {
    $user = User::create([
        'name' => request('name'),
        'email' => request('email'),
        'password' => request('password'),
    ]);

    broadcast(new UserRegistered($user));

    return redirect('/create-user')->with('status', 'User created: '.$user->email);
})->name('create-user');

Route::get('/chat', function () {
    return view('chat');
});

Route::post('/chat', function () {
    $message = request('message');

    broadcast(new \App\Events\ChatMessageSent($message));

    return redirect('/chat');
})->name('chat.send');

// Route::get('/create-user', function () {
//     $user = User::create([
//         'name' => 'John Doe',
//         'email' => 'abc'.rand(1000, 9999).'@example.com',
//         'password' => 'password',
//     ]);

//     broadcast(new UserRegistered($user));

//     // event(new UserRegistered($user));
//     // UserRegistered::dispatch($user);

//     return 'User created: '.$user->email;
// });
