<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function viewTransactionHistory()
    {
        $user = User::find('id');
        $cart = Cart::all()->where('id', $user);
        return view('transaction_history', ['cart' => $cart]);
    }

    public function add_to_cart(Request $req, $id)
    {
        // find cart
        $active_cart = Cart::where('user_id', Auth::user()->id)->where('status', 'not checked out')->first();

        // kalo udah ada item yang sama, update cart detail
        if (CartDetail::where('cart_id', $active_cart->id)->where('item_id', $id)->first()) {
            $cart_detail = CartDetail::where('cart_id', $active_cart->id)->where('item_id', $id)->first();
            $cart_detail->quantity = $req->quantity;
            $cart_detail->updated_at = Carbon::now();
            $cart_detail->save();
        }
        // kalo belum, insert cart detail baru
        else {
            $cart_detail = new CartDetail();
            $cart_detail->cart_id = $active_cart->id;
            $cart_detail->item_id = $id;
            $cart_detail->quantity = $req->quantity;
            $cart_detail->created_at = Carbon::now();
            $cart_detail->save();
        }
        return redirect('/cart');
    }

    public function viewActiveCart()
    {
        $active_cart = Cart::where('user_id', Auth::user()->id)->where('status', 'not checked out')->first();

        if (CartDetail::where('cart_id', $active_cart->id)->first() == null) {
            return view('cart', ['cart_detail' => null]);
        }

        $cart_detail = CartDetail::all()->where('cart_id', $active_cart->id);
        return view('cart', ['cart_detail' => $cart_detail]);
    }



    // public function checkout()
    // {
    //     // // update item stock
    //     // $item = Item::find($id);
    //     // $item->stock = $item->stock - $req->quantity;
    //     // $item->save();
    // }
}
