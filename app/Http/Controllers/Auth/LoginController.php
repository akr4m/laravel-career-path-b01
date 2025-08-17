<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // Auth::loginUsingId($request->input('user_id'));

        // return redirect()->route('dashboard');

        // 1. validate the requested data
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        // 2. authenticate
        $user = User::where('email', $request->email)->first();

        if (! $user || ! password_verify($request->input('password'), $user->password)) {
            return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
        }

        Auth::login($user, $request->boolean('remember'));

        // Note: This is the prefered way to authnticate users in Laravel.
        // Auth::attempt([
        //     'email' => $request->email,
        //     'password' => $request->input('password'),
        // ], $request->boolean('remember'));

        // 3. redirect to dashboard
        return redirect()->route('dashboard');
    }
}
