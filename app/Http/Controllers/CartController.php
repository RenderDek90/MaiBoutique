<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function viewTransactionHistory()
    {
        $cart = Cart::all();
        return view('transaction_history', ['cart' => $cart]);
    }
}
