<?php

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
Route::get('/',[\App\Http\Controllers\ProductController::class,'index']);

Route::get('/order',function(){
    return view('products.order');
});

/*
 *it is called from livewire component
 *@class OrderFunctions
*/
Route::get('/payment/{order}',function($order){
    return view('products.payment')->with('order',$order);
});

Route::get('/cart', function () {
    return view('products.cart');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
