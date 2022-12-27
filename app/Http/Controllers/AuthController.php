<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function signinPage()
    {
        return view('signin');
    }

    public function signin(Request $req)
    {
        $credentials =
            [
                'email' => $req->email,
                'password' => $req->password
            ];

        if (Auth::attempt($credentials, true)) {
            return redirect('/home');
        }
        return redirect('/sign-in')->with('message', 'Please try again!');
    }

    public function signout()
    {
        Auth::logout();
        return redirect('/');
    }
}
