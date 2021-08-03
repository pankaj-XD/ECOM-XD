<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Wishlist;
use App\Models\Product;

class WishlistController extends Controller
{
  
    public function showWish()
    {
        $wishlist = auth()->user()->wishlist;
        return view('wishlist.index',[
            'wishlist' => $wishlist
        ]);

    }

    public function addWish(Request $req){
        
        $user = auth()->user();
        if(!$user) return ['status' => 'noAuth'];
        
        
        
        $product = Product::find($req->product_id);
        $user->wishlist()->attach($product);
        return ['status' => 'added'];
    }
    
    public function removeWish(Request $req){
        
        $user = auth()->user();
        if(!$user) return ['status' => 'noAuth'];
        
        
        $product = Product::find($req->product_id);
        $user->wishlist()->detach($product);;
        return ['status' => 'removed'];

    }

    // refresh delete
    public function deleteWish($product){
        auth()->user()->wishlist()->detach($product);
        return redirect()->back()->with('message', 'removed successfully');
    }

}
