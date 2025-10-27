<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLogin(Request $request)
    {
        // Set locale from URL segment
        $locale = $request->segment(1);
        if (in_array($locale, ['en', 'nl'])) {
            app()->setLocale($locale);
        }
        
        return view('admin.auth.login');
    }

    /**
     * Handle the login request.
     */
    public function login(Request $request)
    {
        // Set locale from URL segment
        $locale = $request->segment(1);
        if (in_array($locale, ['en', 'nl'])) {
            app()->setLocale($locale);
        }
        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard', ['locale' => $locale]));
        }

        throw ValidationException::withMessages([
            'email' => __('The provided credentials do not match our records.'),
        ]);
    }

    /**
     * Handle the logout request.
     */
    public function logout(Request $request)
    {
        // Set locale from URL segment
        $locale = $request->segment(1);
        if (in_array($locale, ['en', 'nl'])) {
            app()->setLocale($locale);
        }
        
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login', ['locale' => $locale]);
    }
}
