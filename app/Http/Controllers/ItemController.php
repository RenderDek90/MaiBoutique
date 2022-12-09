<?php

namespace App\Http\Controllers;

use App\Models\Item;
// use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function viewItems(){
        $item = Item::all();
        return view('home', ['item' => $item]);
    }

    public function viewItemDetail($id)
    {
        $item = Item::find($id);
        return view('item_detail', ['item' => $item]);
    }
}
