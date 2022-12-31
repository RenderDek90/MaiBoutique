<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\User;
use Illuminate\Http\Request;
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
        $user->save();

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

    public function viewProfile($id)
    {
        $user = User::find($id);
        return view('profile', ['user' => $user]);
    }

    public function viewCart($id)
    {
        $cart = Cart::find($id);
        $carts = CartDetail::find($id);

        //Masukin biar bisa 1 user, punya 1 cart yang isinya berbagai items yang suda di klik
        return view('all_cart', ['cart' => $cart, 'carts' => $carts]);
    }

    public function update_prof($id){
        $user = User::where($id);

        return view('update', ['user' => $user]);
    }

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
