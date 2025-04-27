<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SignUpController extends Controller
{
    /**
     * Redirect to sign up form.
     */
    public function sign_up()
    {
        return view('auth_forms/signup', ['title' => 'Sign Up']);
    }

    /**
     * Validate sign up credentials.
     */
    public function store(Request $request)
    {
        $validInit = $request->validate([
            'name'     => 'required',
            'username' => 'required|min:5|max:50|unique:users',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:5|max:20'
        ]);

        $validInit['password'] = bcrypt($validInit['password']);
        User::create($validInit);
        return redirect()->route('login');
    }
}
