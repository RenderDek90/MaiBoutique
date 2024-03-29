<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function viewActiveCart()
    {
        $active_cart = Cart::where('user_id', Auth::user()->id)->where('status', 'not checked out')->first();

        if (CartDetail::where('cart_id', $active_cart->id)->first() == null) {
            return view('cart', ['cart_detail' => null]);
        }

        $cart_detail = CartDetail::all()->where('cart_id', $active_cart->id);
        return view('cart', ['cart_detail' => $cart_detail]);
    }

    public function addToCart(Request $req)
    {
        // find cart
        $active_cart = Cart::where('user_id', Auth::user()->id)->where('status', 'not checked out')->first();

        // kalo udah ada item yang sama, update cart detail
        if (CartDetail::where('cart_id', $active_cart->id)->where('item_id', $req->item_id)->first()) {
            $cart_detail = CartDetail::where('cart_id', $active_cart->id)->where('item_id', $req->item_id)->first();
            $cart_detail->quantity += $req->quantity;
            $cart_detail->updated_at = Carbon::now();
            $cart_detail->save();
        }
        // kalo belum, insert cart detail baru
        else {
            $cart_detail = new CartDetail();
            $cart_detail->cart_id = $active_cart->id;
            $cart_detail->item_id = $req->item_id;
            $cart_detail->quantity = $req->quantity;
            $cart_detail->created_at = Carbon::now();
            $cart_detail->save();
        }
        return redirect('/cart');
    }

    public function removeFromCart($id)
    {
        $cart_detail = CartDetail::find($id);
        $cart_detail->delete();
        return redirect('/cart');
    }

    public function editCartPage($id)
    {
        $item = Item::find($id);
        return view('edit_cart', ['item' => $item]);
    }

    public function editCart(Request $req)
    {
        // find cart
        $active_cart = Cart::where('user_id', Auth::user()->id)->where('status', 'not checked out')->first();

        // kalo udah ada item yang sama, update cart detail
        if (CartDetail::where('cart_id', $active_cart->id)->where('item_id', $req->item_id)->first()) {
            $cart_detail = CartDetail::where('cart_id', $active_cart->id)->where('item_id', $req->item_id)->first();
            $cart_detail->quantity = $req->quantity;
            $cart_detail->updated_at = Carbon::now();
            $cart_detail->save();
        }
        // kalo belum, insert cart detail baru
        else {
            $cart_detail = new CartDetail();
            $cart_detail->cart_id = $active_cart->id;
            $cart_detail->item_id = $req->item_id;
            $cart_detail->quantity = $req->quantity;
            $cart_detail->created_at = Carbon::now();
            $cart_detail->save();
        }
        return redirect('/cart');
    }

    public function deleteCart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect('/history');
    }

    public function checkout(Request $req)
    {
        $active_cart = Cart::where('user_id', Auth::user()->id)->where('status', 'not checked out')->first();
        $active_cart->total_price = $req->total_price;
        $active_cart->status = 'checked out';
        $active_cart->updated_at = Carbon::now();
        $active_cart->save();

        $cart_detail = CartDetail::all()->where('cart_id', $active_cart->id);
        foreach ($cart_detail as $cd) {
            $item = Item::find($cd->item_id);
            $item->stock -= $cd->quantity;
            $item->updated_at = Carbon::now();
            $item->save();
        }

        $cart = new Cart();
        $cart->user_id = Auth::user()->id;
        $cart->total_price = 0;
        $cart->status = "not checked out";
        $cart->created_at = Carbon::now();
        $cart->save();

        return redirect('/history')->with('message', 'Checkout Complete!');
    }

    public function viewTransactionHistory()
    {
        $cart = Cart::all()->where('user_id', Auth::user()->id)->where('status', 'checked out');
        foreach ($cart as $c) {
            $c->cart_detail = CartDetail::all()->where('cart_id', $c->id);
        }
        return view('transaction_history', ['cart' => $cart]);
    }
}
