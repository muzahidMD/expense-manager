<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function showLogin()
    {
        return view('pages.auth.signin', ['title' => 'Sign In']);
    }
    public function showRegister()
    {
        return view('pages.auth.signup', ['title' => 'Sign Up']);
    }

    public function register(Request $request)
    {
        dd($request->all());
        return 'This is register page';
    }
}
