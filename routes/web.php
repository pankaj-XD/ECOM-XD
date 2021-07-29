<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StripePaymentController;

use App\Http\Controllers\admin\AdminController;

/*
|--------------------------------------------------------------------------
| Seed
|--------------------------------------------------------------------------
|
| $ php artisan db:seed --class=ProductSeeder
|
*/

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth']);

require __DIR__.'/auth.php';

// user
Route::get('/logout',function(){
    Auth::logout();
    return redirect('/');
});

// Product
Route::get('/',[ProductController::class,'index']);
Route::get('/product/{product}',[ProductController::class,'productShow']);

// category
Route::get('/category',[CategoryController::class,'index']);

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



// admin
Route::prefix('admin')->group(function () {
    
    Route::get('/dashboard',[AdminController::class,'index'])->middleware(['adminCheck']);
    // product
    Route::get('/dashboard/products',[ProductController::class,'listProduct'])->middleware(['adminCheck']);
    Route::get('/dashboard/product/create',[ProductController::class,'showCreateForm'])->middleware(['adminCheck']);
    Route::post('/dashboard/product/create',[ProductController::class,'createProduct'])->middleware(['adminCheck']);
    Route::get('/dashboard/product/{product}',[ProductController::class,'editProduct'])->middleware(['adminCheck']);
    Route::put('/dashboard/product',[ProductController::class,'updateProduct'])->middleware(['adminCheck']);
    Route::delete('/dashboard/product',[ProductController::class,'deleteProduct'])->middleware(['adminCheck']);
    
    // order
    Route::get('/dashboard/orders',[OrderController::class,'listOrder'])->middleware(['adminCheck']);
    Route::get('/dashboard/order/{order}/items',[OrderController::class,'listOrderItems'])->middleware(['adminCheck']);
    
    // transcation
    Route::get('/dashboard/transactions',[AdminController::class,'showTransactions'])->middleware(['adminCheck']);
    
    // transcation
    Route::get('/dashboard/categories',[CategoryController::class,'showCategory'])->middleware(['adminCheck']);
    Route::get('/dashboard/category',[CategoryController::class,'createFromCategory'])->middleware(['adminCheck']);
    Route::post('/dashboard/category',[CategoryController::class,'createCategory'])->middleware(['adminCheck']);
    Route::get('/dashboard/category/{category}',[CategoryController::class,'editCategory'])->middleware(['adminCheck']);
    Route::put('/dashboard/category',[CategoryController::class,'updateCategory'])->middleware(['adminCheck']);
    Route::delete('/dashboard/category',[CategoryController::class,'deleteCategory'])->middleware(['adminCheck']);
    
    // user
    Route::get('/dashboard/users',[AdminController::class,'showUsers'])->middleware(['adminCheck']);
    Route::get('/dashboard/address/{user_id}',[AdminController::class,'showAddress'])->middleware(['adminCheck']);
});


