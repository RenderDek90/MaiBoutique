<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{

    public function viewItems()
    {
        $item = Item::paginate(8);

        return view('home', ['item' => $item]);
    }

    public function viewItemDetail($id)
    {
        $item = Item::find($id);

        // find cart
        $active_cart = Cart::where('user_id', Auth::user()->id)->where('status', 'not checked out')->first();
        // kalo udah ada item yang sama di cart
        if (Auth::user()->role == 'Member' && CartDetail::where('cart_id', $active_cart->id)->where('item_id', $id)->first()) {
            $cart_detail = CartDetail::where('cart_id', $active_cart->id)->where('item_id', $id)->first();
            $qty_in_cart = $cart_detail->quantity;
        }
        // kalo belum ada item yang sama di cart
        else {
            $qty_in_cart = 0;
        }
        return view('item_detail', ['item' => $item, 'qty_in_cart' => $qty_in_cart]);
    }

    public function addItemPage()
    {
        return view('add_item');
    }

    public function addItem(Request $req)
    {
        $val = $req->validate([
            'image' => 'required|mimes:jpg,png,jpeg',
            'name' => 'required|string|min:5|max:20|unique:items,name',
            'description' => 'required|string|min:5',
            'price' => 'required|integer|gte:1000',
            'stock' => 'required|integer|gte:1'
        ]);
        $extension = $req->image->getClientOriginalExtension();
        $fileName = $req->name . '.' . $extension;
        $req->image->move('storage/images', $fileName);

        $item = new Item();
        $item->image = $fileName;
        $item->name = $val['name'];
        $item->description = $val['description'];
        $item->price = $val['price'];
        $item->stock = $val['stock'];
        $item->created_at = Carbon::now();
        $item->save();

        return redirect('/home');
    }

    public function deleteItem($id)
    {
        $item = Item::find($id);
        $item->delete();
        return redirect('/home');
    }

    public function searchItem(Request $req)
    {
        $search = $req->search;
        $item = Item::where('name', 'LIKE', "%$search%")->paginate(8);
        return view('search', ['item' => $item]);
    }
}
