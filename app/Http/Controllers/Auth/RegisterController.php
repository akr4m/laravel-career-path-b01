<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // 1. [done] validate requested data (email should be unique)
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        // 2. [done] create a new user record in database
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            // 'password' => Hash::make($request->input('password')),
            'password' => $request->input('password'),
        ]);

        // 3.1. (Optional), after new user, redirect to /login
        // return redirect()->to('/login');

        // 3.2. (Optional), after new user, we can authenticate him and redirect him to dashboard
        auth()->login($user, true);

        // 3.3. redirect to dashboard
        return redirect()->route('dashboard');
    }
}
