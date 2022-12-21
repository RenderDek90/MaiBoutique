<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
            'username' => 'required|min:1|max:255|string',
            'email' => 'required|email',
            'address' => 'required|min:5|max:255|string',
            'phone_number' => 'required|numeric',
            'password' => 'required|min:6'
        ]);

        // $validator = Validator::make($req->all(), $rules);

        // if ($validator->fails()){
        //     return back()->withErrors($validator);
        // }

        $data = $req->all();
        User::insert([
            'username' => $data['username'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'address' => $data['address'],
            'password' => Hash::make($data['password'])
        ]);

        return redirect('/sign-in')->with('success', 'Registration Complete!!');
    }

    public function getData(Request $req){



        return view('/home');
    }
}
