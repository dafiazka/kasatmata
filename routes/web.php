<?php

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

Route::get('/', function () {
    return view('home');
});

//Home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Contact Us
Route::get('/send', [App\Http\Controllers\ContactUsController::class, 'send'])->name('send');
Route::post('/send', [App\Http\Controllers\ContactUsController::class, 'sendprocess'])->name('send');


//Auth Route
Auth::routes();


//Product
Route::get('/product', [App\Http\Controllers\ProductController::class, 'product'])->name('product');


//Detail Product
Route::get('/detail/{id}', [App\Http\Controllers\OrderController::class, 'index'])->name('detail');


//Keranjang
Route::post('/order/{id}', [App\Http\Controllers\OrderController::class, 'order'])->name('order');
Route::get('/keranjang', [App\Http\Controllers\OrderController::class, 'keranjang'])->name('keranjang');
Route::delete('/keranjang/{id}', [App\Http\Controllers\OrderController::class, 'destroy'])->name('keranjang');


//Checkout
Route::get('/checkout', [App\Http\Controllers\OrderController::class, 'checkout'])->name('checkout');


//Route Admin
Route::group(['middleware' => 'admin'], function ()
{
    // Product Add
    Route::get('/add', [App\Http\Controllers\ProductController::class, 'add'])->name('add');
    Route::post('/add', [App\Http\Controllers\ProductController::class, 'addprocess'])->name('add');

    // Product Edit
    Route::get('/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('edit');
    Route::post('/edit/{id}', [App\Http\Controllers\ProductController::class, 'editprocess'])->name('edit');
    Route::delete('/delete/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('hapus');

    //Contact Us
    Route::get('/receive', [App\Http\Controllers\ContactUsController::class, 'index'])->name('receive');
    Route::delete('/receive/delete/{id}', [App\Http\Controllers\ContactUsController::class, 'destroy'])->name('delete');
});

