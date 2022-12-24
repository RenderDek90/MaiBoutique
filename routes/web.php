<?php

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

// Route::get('/home', function () {
// return view('home');
// });

Route::get('/sign-in' , function (){
return view('login');
});

Route::get('/register' ,[UserController::class, 'view'] );
Route::post('/register' ,[UserController::class, 'saveRegister'] );
Route::post('/getData', [UserController::class, 'getData']);

// Route::get('/register', [])

Route::get('/home', [ItemController::class, 'viewItems']);


Route::get('/myCart', [UserController::class, 'viewCart']);
Route::get('/checkout', function(){
    //view checkout ("Kayak Done Checkout atau gimana")
});

Route::get('/edit_cart/id', function (){
    // harusnya ada Id, untuk tau Item yang mana untuk di Update
    return view('edit_cart');
});

Route::get('/addItems', [ItemController::class, 'addItem']);
Route::post('/addItems', [ItemController::class, 'insertItem']);

Route::get('/profile/{id}', [UserController::class, 'viewProfile']);

Route::get('/password-update', function(){
return view('/update');
});

Route::get('/item/{id}', [ItemController::class, 'viewItemDetail']);

Route::get('/transaction-history', [CartController::class, 'viewTransactionHistory']);

Route::get('/home/admin', [ItemController::class, 'viewItems']);
