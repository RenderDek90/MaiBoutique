<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('/main');
});


//aku coba pake Auth Controller untuk LoginPage
Route::get('/sign-in' , [AuthController::class, 'signinPage']);
Route::post('/sign-in' , [AuthController::class, 'signin']);
Route::get('/sign-out' , [AuthController::class, 'signout']);

//Register
Route::get('/sign-up' ,[UserController::class, 'signupPage'] );
Route::post('/sign-up' ,[UserController::class, 'signup'] );


// Route::get('/register', [])

Route::get('/home', [ItemController::class, 'viewItems']);


Route::get('/cart/{id}', [UserController::class, 'viewCart']);
Route::get('/checkout', function(){
    //view checkout ("Kayak Done Checkout atau gimana")
});

Route::get('/edit_cart/id', function (){
    // harusnya ada Id, untuk tau Item yang mana untuk di Update
    return view('edit_cart');
});

Route::get('/addItem', [ItemController::class, 'addItemPage']);
Route::post('/addItem', [ItemController::class, 'addItem']);

Route::get('/profile/{id}', [UserController::class, 'viewProfile']);

Route::get('/password-update', function(){
return view('/update');
});

Route::get('/item/{id}', [ItemController::class, 'viewItemDetail']);

Route::get('/delete/{id}', [ItemController::class, 'deleteItem']);

//item untuk masukin ke Cart blm bisa, gw masi bingung
Route::post('/addToCart', [ItemController::class, 'add_to_cart']);
// Route::post('/addtocart', [ItemController::class, 'add_to_cart']);

Route::get('/history', [CartController::class, 'viewTransactionHistory']);

Route::get('/home/admin', [ItemController::class, 'viewItems']);
