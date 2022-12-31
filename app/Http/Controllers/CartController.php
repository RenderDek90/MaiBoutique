<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function viewTransactionHistory()
    {
        $user = User::find('id');
        $cart = Cart::all()->where('id', $user);
        return view('transaction_history', ['cart' => $cart]);
    }
}
