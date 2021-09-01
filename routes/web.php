<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WishlistController;

use App\Http\Controllers\admin\AdminController;

/*
|--------------------------------------------------------------------------
| Seed
|--------------------------------------------------------------------------
|
| $ php artisan db:seed --class=ProductSeeder
|
*/

Route::get('/test',[WishlistController::class,'test']);

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
Route::get('/product/by/category/{category}',[ProductController::class,'productByCategory']);

// category
Route::get('/category',[CategoryController::class,'index']);

//cart
Route::get('/cart',[CartController::class,'showCart'])->middleware(['auth']);;
Route::post('/add-to-cart',[CartController::class,'addToCart'])->middleware(['auth']);;
Route::delete('/remove-from-cart',[CartController::class,'removeFromCart'])->middleware(['auth']);;

//order
Route::get('/order',[OrderController::class,'index'])->middleware(['auth']);;
Route::post('/order',[OrderController::class,'store'])->middleware(['auth']);;
Route::get('/myorder',[OrderController::class,'showOrderDetail'])->middleware(['auth']);;
Route::get('/order-item/{order_no}',[OrderController::class,'showOrderItems'])->middleware(['auth']);;

// payment
Route::get('/stripe/{order}',[StripePaymentController::class,'stripe'])->middleware(['auth']);;
Route::post('/stripe',[StripePaymentController::class,'stripePost'])->name('stripe.post')->middleware(['auth']);;



// admin
Route::prefix('admin')->group(function () {
    Route::get('/dashboard',[AdminController::class,'index'])->middleware(['managerCheck']);
    // product
    Route::get('/dashboard/products',[ProductController::class,'listProduct'])->middleware(['managerCheck']);
    Route::get('/dashboard/product/create',[ProductController::class,'showCreateForm'])->middleware(['managerCheck']);
    Route::post('/dashboard/product/create',[ProductController::class,'createProduct'])->middleware(['managerCheck']);
    Route::get('/dashboard/product/{product}',[ProductController::class,'editProduct'])->middleware(['managerCheck']);
    Route::put('/dashboard/product',[ProductController::class,'updateProduct'])->middleware(['managerCheck']);
    Route::delete('/dashboard/product',[ProductController::class,'deleteProduct'])->middleware(['adminCheck']);
    
    // order
    Route::get('/dashboard/orders',[OrderController::class,'listOrder'])->middleware(['managerCheck']);
    Route::get('/dashboard/order/{order}/items',[OrderController::class,'listOrderItems'])->middleware(['managerCheck']);
    
    // transcation
    Route::get('/dashboard/transactions',[AdminController::class,'showTransactions'])->middleware(['managerCheck']);
    
    // transcation
    Route::get('/dashboard/categories',[CategoryController::class,'showCategory'])->middleware(['managerCheck']);
    Route::get('/dashboard/category',[CategoryController::class,'createFromCategory'])->middleware(['managerCheck']);
    Route::post('/dashboard/category',[CategoryController::class,'createCategory'])->middleware(['managerCheck']);
    Route::get('/dashboard/category/{category}',[CategoryController::class,'editCategory'])->middleware(['managerCheck']);
    Route::put('/dashboard/category',[CategoryController::class,'updateCategory'])->middleware(['managerCheck']);
    Route::delete('/dashboard/category',[CategoryController::class,'deleteCategory'])->middleware(['adminCheck']);
    
    // user
    Route::get('/dashboard/users',[AdminController::class,'showUsers'])->middleware(['managerCheck']);
    Route::get('/dashboard/address/{user_id}',[AdminController::class,'showAddress'])->middleware(['managerCheck']);
    
    //manage role
    Route::get('/dashboard/manage-role/',[AdminController::class,'showRoles'])->middleware(['adminCheck']);
    Route::post('/dashboard/manage-role/',[AdminController::class,'handleRoles'])->middleware(['adminCheck']);
});





Route::get('/ty',[TransactionController::class,'ty']);
Route::get('/wishlist',[WishlistController::class,'showWish']);
Route::post('/wishlist',[WishlistController::class,'addWish']);
Route::delete('/wishlist',[WishlistController::class,'removeWish']);
Route::get('/wishlist/delete/{product}',[WishlistController::class,'deleteWish']);