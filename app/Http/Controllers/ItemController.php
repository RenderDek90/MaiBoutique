<?php

namespace App\Http\Controllers;

use App\Models\CartDetail;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $item->save();

        return redirect('/home');
    }

    public function deleteItem($id)
    {
        $item = Item::find($id);
        // delete file local masi ga bisa
        // Storage::delete($item->image);
        $item->delete();
        return redirect('/home');
    }

    // public function searchItemPage()
    // {
    //     $item = Item::all();
    //     return view('search', ['item' => $item]);
    // }

    public function searchItem(Request $req){
        $search = $req->search;
        $item = Item::where('name', 'LIKE', "%$search%")->paginate(8)->appends(['search' => $search]);
        return view('search', ['item' => $item]);
    }



    public function add_to_cart(Request $req)
    {

        //stock - quantity
        $item = Item::all();
        $calculate_stock = $item->stock - $req->quantity;
        $item->stock = $calculate_stock;
        $item->save();

        //masukin quantity
        $cart = new CartDetail();
        $cart->quantity = $req->quantity;
        $cart->save();


        return view('transaction_history');
    }
}
