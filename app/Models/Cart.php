<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function cart_details() {
        return $this->hasMany(CartDetail::class);
    }

    //gatau perlu apa engga
    public function cart_items(){
        return $this->hasMany(Item::class);
    }
}
