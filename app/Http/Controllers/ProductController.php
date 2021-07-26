<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        $text =  $products[0]->title;

        return view('index',[
            'products' => $products,
        ]);
    }

    public function productShow($product){
        $product = Product::find($product);
        return view('product.detail',['product' => $product]);
    }



}
