<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function store(Request $request)
    {
        // 1. logout the user
        auth()->logout();
        // Auth::logout();

        // 2. invalidate the session
        $request->session()->invalidate();

        // 3. regenerate the CSRF token
        $request->session()->regenerateToken();

        // 4. redirect to the home page
        return redirect('/login');
    }
}
