<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function viewProfile($id){
        $user = User::find($id);
        return view('profile', ['user' => $user]);
    }
}
