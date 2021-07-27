<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StripePaymentController;

/*
|--------------------------------------------------------------------------
| Seed
|--------------------------------------------------------------------------
|
| $ php artisan db:seed --class=ProductSeeder
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// user
Route::get('/logout',function(){
    Auth::logout();
    return redirect()->back();
});

// Product
Route::get('/',[ProductController::class,'index']);
Route::get('/product/{product}',[ProductController::class,'productShow']);

//cart
Route::get('/cart',[CartController::class,'showCart']);
Route::post('/add-to-cart',[CartController::class,'addToCart']);
Route::delete('/remove-from-cart',[CartController::class,'removeFromCart']);

//order
Route::get('/order',[OrderController::class,'index']);
Route::post('/order',[OrderController::class,'store']);
Route::get('/myorder',[OrderController::class,'showOrderDetail']);
Route::get('/order-item/{order_no}',[OrderController::class,'showOrderItems']);

// payment
Route::get('/stripe/{order}',[StripePaymentController::class,'stripe']);
Route::post('/stripe',[StripePaymentController::class,'stripePost'])->name('stripe.post');


