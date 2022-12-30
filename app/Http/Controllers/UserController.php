<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function viewProfile($id)
    {
        $user = User::find($id);
        return view('profile', ['user' => $user]);
    }

    public function signupPage()
    {
        return view('signup');
    }

    public function signup(Request $req)
    {

        $val = $req->validate([
            'username' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email',
            'address' => 'required|min:5|max:255',
            'phone_number' => 'required|min:10|max:14',
            'password' => 'required|min:6'
        ]);

        $user = new User();
        $user->username = $val['username'];
        $user->email = $val['email'];
        $user->address = $val['address'];
        $user->phone_number = $val['phone_number'];
        $user->password = bcrypt($val['password']);
        $user->role = 'Member';
        $user->save();

        return redirect('/home');
    }

    public function getData(Request $req)
    {

        $validator = Validator::make($req->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $email = $req->email;
        $password = $req->password;
        // Check kalo yang di masukin itu Admin atau Member atau Guest
        // tapi seinget gua pakai ini

        //masi error, coba di cek lagi deh
        if (Auth::attempt(['email' => $email, 'password' => $password])) {

            return view('home');
        };
        return redirect('/sign-in');
    }

    public function viewCart($id)
    {
        $cart = Cart::find($id);
        $carts = CartDetail::find($id);

        //Masukin biar bisa 1 user, punya 1 cart yang isinya berbagai items yang suda di klik
        return view('all_cart', ['cart' => $cart, 'carts'=>$carts]);
    }
}
