<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    public function showCart(){
        $user = auth()->user();
        $cartItems =  $user->cart;
        $total = 0;
        foreach($cartItems as $item){
            $quantity = $item->quantity;
            $price = $item->product->price;
            $total += $quantity * $price;
        }
        return view('cart',['cartItems' => $cartItems, 'total' => $total]);
    }

    public function addToCart(Request $req){
        $product = Product::find($req->product_id);
        $user = auth()->user();

        //product already exsit
        if(count($user->cart->where("product_id",$product->id)) > 0){
            $itemQuantity = $user->cart->where('product_id',$product->id)->first()->quantity;
            $user->cart->where('product_id',$product->id)->first()->update([
                'quantity' => $itemQuantity + 1,
                'total' => $product->price * ($itemQuantity + 1),
            ]);
            return redirect()->back();
        }else{
            //add new item to cart
            $cartItem = new Cart([
                'user_id' => $user->id,
                'product_id' =>$product->id,
                'quantity' => $req->quantity,
                'total' => $product->price,
            ]);
            $cartItem->save();
            return redirect()->back();
        }
    }

    public function removeFromCart(Request $req){
        $deleteId =  $req->product_id;
        $user =  auth()->user();
        $user->cart->where('id','=', $deleteId)->first()->delete();
        return redirect()->back();
    }
}