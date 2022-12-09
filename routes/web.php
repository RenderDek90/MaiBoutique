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

Route::get('/', function () {
    return view('/main');
});

// Route::get('/home', function () {
// return view('home');
// });

Route::get('/sign-in' , function (){
return view('login');
});

Route::get('/register' , function (){
    return view('register');
    });

Route::get('/home', [ItemController::class, 'viewItems']);

Route::get('/addItems', function(){
    return view('/addItem');
});

Route::get('/profile/{id}', [UserController::class, 'viewProfile']);

Route::get('/password-update', function(){
return view('/update');
});

Route::get('/item/{id}', [ItemController::class, 'viewItemDetail']);

Route::get('/transaction-history', [CartController::class, 'viewTransactionHistory']);

Route::get('/home/admin', [ItemController::class, 'viewItems']);
