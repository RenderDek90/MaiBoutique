<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function viewProfile($id){
        $user = User::find($id);
        return view('profile', ['user' => $user]);
    }

    public function view(){
        return view('register');
    }

    public function saveRegister(Request $req){

        $rules = $req->validate([
            'username' => 'required|min:1|max:255',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|digits:12',
            'password' => 'required|min:6|confirmed'
        ]);

        $validator = Validator::make($req->all(), $rules);

        if ($validator->fails()){
            return back()->withErrors($validator);
        }

        User::insert([
            'username' => $req->username,
            'email' => $req->email,
            'phone_number' => $req->phone_number,
            'password' => $req->password
        ]);

        return redirect('/login');
    }
}
