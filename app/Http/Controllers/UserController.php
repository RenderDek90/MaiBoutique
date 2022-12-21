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
            'username' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email',
            'address' => 'required|min:5|max:255',
            'phone_number' => 'required|min:10|max:14',
            'password' => 'required|min:6'
        ]);

        $user = new User();
        $user->username = $rules['username'];
        $user->email = $rules['email'];
        $user->address = $rules['address'];
        $user->phone_number = $rules['phone_number'];
        $user->password = $rules['password'];
        $user->role = 'Member';
        $user->save();

        return redirect('/sign-in')->with('success', 'Successfully Registered!');
    }

    public function getData(Request $req){



        return view('/home');
    }
}
