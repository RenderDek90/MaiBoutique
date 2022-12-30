<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// guest
Route::get('/', function () {
    return view('main');
});

// sign in
Route::get('/sign-in', [UserController::class, 'signinPage']);
Route::post('/sign-in', [UserController::class, 'signin']);
// sign out
Route::get('/sign-out', [UserController::class, 'signout']);
// sign up
Route::get('/sign-up', [UserController::class, 'signupPage']);
Route::post('/sign-up', [UserController::class, 'signup']);

// home
Route::get('/home', [ItemController::class, 'viewItems']);
// item details
Route::get('/item/{id}', [ItemController::class, 'viewItemDetail']);
// add item (admin)
Route::get('/add-item', [ItemController::class, 'addItemPage']);
Route::post('/add-item', [ItemController::class, 'addItem']);
// delete item (admin)
Route::get('/delete/{id}', [ItemController::class, 'deleteItem']);

// search
Route::get('/search', [ItemController::class, 'searchItem']);





Route::get('/cart/{id}', [UserController::class, 'viewCart']);
Route::get('/checkout', function () {
    //view checkout ("Kayak Done Checkout atau gimana")
});

Route::get('/edit_cart/id', function () {
    // harusnya ada Id, untuk tau Item yang mana untuk di Update
    return view('edit_cart');
});


// profile
Route::get('/profile/{id}', [UserController::class, 'viewProfile']);

Route::get('/password-update', function () {
    return view('/update');
});


//item untuk masukin ke Cart blm bisa, gw masi bingung
Route::post('/addToCart', [ItemController::class, 'add_to_cart']);
// Route::post('/addtocart', [ItemController::class, 'add_to_cart']);

Route::get('/history', [CartController::class, 'viewTransactionHistory']);
