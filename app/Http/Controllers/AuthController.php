<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function loginPage(){
        return view('sign-in');
    }

    public function login(Request $req){
        $credentials =
        [
            'email' => $req->email,
            'password' => $req->password
        ];

        if(Auth::attempt($credentials)){
            return redirect()->back();
        }
        return 'fail';
    }
}
