<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product; 
use App\Models\Category; 

class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate(12);

        return view('index',[
            'products' => $products,
        ]);
    }
    
    public function productShow($product){
        $product = Product::find($product);
        return view('product.detail',['product' => $product]);
    }
    
    // admin

    public function showCreateForm()
    {
        $categories = Category::all();
        return view('admin.product.create',['categories' => $categories]);
    }
    
    public function createProduct(Request $req)
    {
        $req->validate([
            'title' => 'required|min:3|max:150',
            'description' => 'required|min:5|max:150',
            'price' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg',
            'category_id' => 'required',
        ]);

        $product =  new Product();
        $imageName = "/product-images/" .$product->id . "-product-image." . $req->image->extension();
        $req->image->move(public_path("product-images"),$imageName);
        $product->image = $imageName;

        $product->title  = $req->title;
        $product->category_id  = $req->category_id;
        $product->description = $req->description;
        $product->price = $req->price;
        $product->save();



        return redirect('/admin/dashboard/products')->with('message', 'New Product Created');
    }

    public function listProduct(){
        $products = Product::all();

        return view('admin.product.index',[
            'products' => $products,
        ]);
    }
    public function deleteProduct(Request $req){
        $product = Product::find($req->product_id);
        $product->delete();
        return redirect()->back()->with('message', 'Product of ID: '. $product->id .' Deleted.');
    }
    public function editProduct($product){
        $product = Product::find($product);
        return view('admin.product.edit',['product' => $product]);
    }
    public function updateProduct(Request $req){
        $req->validate([
            "product_id" => "required",
            "title" => 'required|min:8|max:255',
            "description" => 'required|min:8',
            "price" => 'required',
            "image" =>"mimes:png,jpeg,jpg"
        ]);

        $product = Product::find($req->product_id);
        if($req->image){      
            $imageName = "/product-images/" .$product->id . "-product-image." . $req->image->extension();
            $req->image->move(public_path("product-images"),$imageName);
            $product->image = $imageName;
        }
        $product->title = $req->title;
        $product->description = $req->description;
        $product->price = $req->price;
        $product->save();

        return redirect('/admin/dashboard/products')->with('message','Product of ID: '. $product->id .' Updated.');
    }

    
}

// current_page: 2,
// // last_page: 4,
// first_page_url: "http://127.0.0.1:8000?page=1",
// last_page_url: "http://127.0.0.1:8000?page=4",