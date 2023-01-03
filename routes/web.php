<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

//Admin and Member Middleware

// home
Route::get('/home', [ItemController::class, 'viewItems'])->middleware('adminandmember');
// search
Route::get('/search', [ItemController::class, 'searchItem'])->middleware('adminandmember');
// profile
Route::get('/profile', [UserController::class, 'viewProfile'])->middleware('adminandmember');
// edit password
Route::get('/edit-password', [UserController::class, 'editPasswordPage'])->middleware('adminandmember');
Route::post('/edit-password', [UserController::class, 'editPassword'])->middleware('adminandmember');
// item details
Route::get('/item/{id}', [ItemController::class, 'viewItemDetail'])->middleware('adminandmember');

//Admin Middleware
// add item (admin)
Route::get('/add-item', [ItemController::class, 'addItemPage'])->middleware('admin');
Route::post('/add-item', [ItemController::class, 'addItem'])->middleware('admin');
// delete item (admin)
Route::get('/delete/{id}', [ItemController::class, 'deleteItem'])->middleware('admin');

//Member Middleware
// view active cart
Route::get('/cart', [CartController::class, 'viewActiveCart'])->middleware('member');
// add item to cart
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->middleware('member');
// remove item from cart
Route::get('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->middleware('member');
// edit cart
Route::get('/edit-cart/{id}', [CartController::class, 'editCartPage'])->middleware('member');
Route::post('/edit-cart', [CartController::class, 'editCart'])->middleware('member');

Route::get('/checkout', function () {
    //view checkout ("Kayak Done Checkout atau gimana")
})->middleware('member');

// edit profile
Route::get('/edit-profile', [UserController::class, 'editProfilePage'])->middleware('member');
Route::post('/edit-profile', [UserController::class, 'editProfile'])->middleware('member');

Route::get('/history', [CartController::class, 'viewTransactionHistory'])->middleware('member');
