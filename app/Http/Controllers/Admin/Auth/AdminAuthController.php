<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function login(Request $request): \Illuminate\Http\JsonResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (auth()->guard('admins_session_guard')->attempt($credentials)) {
            $session = $request->session()->regenerate();

            return response()->json('logged in successfully'. "check auth status ".auth()->guard('admins_session_guard')->check()." ". auth()->guard('admins_session_guard')->user()." session id ".$session, 200);
        }

        return response()->json('The provided credentials do not match our records.', 401);

    }


    public function logout(Request $request): \Illuminate\Http\JsonResponse
    {
        auth()->guard('admins_session_guard')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json('Successfully logged out.', 200);
    }
}
