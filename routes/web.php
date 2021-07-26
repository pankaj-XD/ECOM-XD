<?php

use Illuminate\Support\Facades\Route;

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
// Route::delete('/remove-from-cart',[CartController::class,'removeFromCart']);


// payment
Route::get('/stripe/{order}',[StripePaymentController::class,'stripe']);
Route::post('/stripe',[StripePaymentController::class,'stripePost'])->name('stripe.post');




// Name: Test

// Number: 4242 4242 4242 4242

// CSV: 123

// Expiration Month: 12

// Expiration Year: 2024