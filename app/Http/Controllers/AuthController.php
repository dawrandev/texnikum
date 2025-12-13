<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Show login form
     *
     * Returns the login page.
     *
     * @group Authentication
     *
     * @response 200 {
     *   "html": "Login page HTML"
     * }
     */
    public function showLoginForm()
    {
        return view('pages.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('login', 'password');

        if (auth()->attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'login' => __('auth.failed'),
        ])->withInput($request->only('login'));
    }
}
