<?php

namespace App\Http\Controllers;

use App\Models\Cart;


use App\Models\CartDetail;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

// use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function viewItems()
    {
        $item = Item::all();
        return view('home', ['item' => $item]);
    }

    public function viewItemDetail($id)
    {
        $item = Item::find($id);
        return view('item_detail', ['item' => $item]);
    }

    public function addItem(Request $req)
    {
        $req->validate([
            'image' => 'required|image|file|max:2000',
            'name' => 'required|string|min:5|max:255',
            'description' => 'required|string|min:5|max:255',
            'price' => 'required|numeric|min:4',
            'stock' => 'required|min:1'
        ]);
        $extension = $req->image->getClientOriginalExtension();
        $fileName = $req->name . '.' . $extension;
        $req->image->move('storage/images', $fileName);

        $item = new Item();
        $item->image = $fileName;
        $item->name = $req->name;
        $item->description = $req->description;
        $item->price = $req->price;
        $item->stock = $req->stock;
        $item->save();

        return view('home');
    }

    public function addItemPage()
    {
        return view('addItem');
    }

    public function deleteItem($id)
    {
        $item = Item::find($id);
        // delete file local masi ga bisa
        // Storage::delete($item->image);
        $item->delete();
        return redirect('/home');
    }

    public function searchItem($id)
    {
        $search = Item::find($id);
        return view('search', ['item' => $search]);
    }

    public function add_to_cart(Request $req)
    {
        $cart = new CartDetail();
        $cart->quantity = $req->quantity;
        $cart->save();

        //stock - quantity
        $item = Item::all();
        $calculate_stock = $item->stock - $req->quantity;
        $item->stock = $calculate_stock;
        // $item->stock->save();

        return view('transaction_history');
    }
}
