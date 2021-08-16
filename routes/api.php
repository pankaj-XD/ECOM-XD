<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Product;

use App\Http\Controllers\WishlistController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
  


// search api
Route::get('/f/{q}',function($q){
    $products = Product::where  ('title','like','%'.$q.'%')->get();
    return $products;
});
Route::get('/product/c/{category}',function($category){
   
    $products = Product::where('category_id', '=' , $category)->limit(6)->get();
    return $products;
});

// wishlist REST API
// Route::apiResource('wishlist',WishlistController::class);

