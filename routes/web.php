<?php

use App\Events\UserRegistered;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create-user', function () {
    $user = User::create([
        'name' => 'John Doe',
        'email' => 'abc'.rand(1000, 9999).'@example.com',
        'password' => 'password',
    ]);

    // event(new UserRegistered($user));
    UserRegistered::dispatch($user);

    return 'User created: '.$user->email;
});
