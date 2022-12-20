<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        dd($req->all());
    }
}
