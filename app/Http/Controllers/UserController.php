<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function signupPage()
    {
        return view('signup');
    }

    public function signup(Request $req)
    {
        $val = $req->validate([
            'username' => 'required|min:5|max:20|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'address' => 'required|min:5',
            'phone_number' => 'required|numeric||digits_between:10,13',
            'password' => 'required|min:5|max:30'
        ]);

        $user = new User();
        $user->username = $val['username'];
        $user->email = $val['email'];
        $user->address = $val['address'];
        $user->phone_number = $val['phone_number'];
        $user->password = bcrypt($val['password']);
        $user->role = 'Member';
        $user->created_at = Carbon::now();
        $user->save();

        $cart = new Cart();
        $cart->user_id = $user->id;
        $cart->total_price = 0;
        $cart->status = "not checked out";
        $cart->created_at = Carbon::now();
        $cart->save();

        Auth::login($user);
        return redirect('/home');
    }

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
        if($req->remember){
            Cookie::queue('mycookie', $req->email, 5);
        }
        if (Auth::attempt($credentials, true)) {
            Session::put('mysession', $credentials);
            return redirect('/home');
        }
        return redirect('/sign-in')->with('message', 'Please try again!');
    }

    public function signout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function viewProfile()
    {
        $user = Auth::user();
        return view('profile', ['user' => $user]);
    }


    // Untuk view Blade
    public function viewUpPassPage($id){
        $user = User::find($id);

        return view('forgot_password', ['user' => $user]);
    }

    //Update Password masi eror
    public function update_password(Request $req){
        $user = User::find(Auth::user()->id);
        $new_pass = $req->validate(['password' => 'required|min:5|max:30']);

        $user->password = bcrypt($new_pass['password']);

        return redirect('/signin');
    }


    // public function update_prof($id){
    //     $user = User::where($id);

    //     return view('update', ['user' => $user]);
    // }

    // public function getData(Request $req)
    // {
    //     $validator = Validator::make($req->all(), [
    //         'email' => 'required|email',
    //         'password' => 'required'
    //     ]);
    //     if ($validator->fails()) {
    //         return response()->json(['error' => $validator->errors()], 401);
    //     }

    //     $email = $req->email;
    //     $password = $req->password;
    //     // Check kalo yang di masukin itu Admin atau Member atau Guest
    //     // tapi seinget gua pakai ini

    //     //masi error, coba di cek lagi deh
    //     if (Auth::attempt(['email' => $email, 'password' => $password])) {

    //         return view('home');
    //     };
    //     return redirect('/sign-in');
    // }
}
