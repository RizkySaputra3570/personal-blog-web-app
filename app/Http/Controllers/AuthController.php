<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Redirect to sign in form.
     */
    public function sign_in()
    {
        return view('auth_forms/signin', ['title' => 'Sign In']);
    }

    /**
     * Validate and authenticate sign in credentials.
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|min:5|max:50',
            'password' => 'required|min:5|max:20'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('error', "Sign In Failed");
    }

    /**
     * Logging out and destroy user session.
     */
    public function sign_out(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/posts');
    }
}
