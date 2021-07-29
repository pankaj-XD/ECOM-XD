<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category',['categories' => $categories]);
    }

    // admin
    public function showCategory(){
        $categories = Category::all();
        return view('admin.category.index',['categories' => $categories]);
    }
    public function createFromCategory(){
        return view('admin.category.create');
    }

    public function createCategory(Request $req){
        $req->validate([
            "name" => "required|min:3|max:100"
        ]);
        
        $category = new Category();
        $category->name = $req->name;
        $category->save();
        
        return redirect('/admin/dashboard/categories')->with('message' , "New Category Created");

    }

    public function editCategory($category){
        $c = Category::find($category);
        return view('admin.category.edit',['category' => $c]);
    }
    public function UpdateCategory(Request $req){
        $req->validate([
            "categroy_id" => 'required',
            "name" => 'required|min:3|max:100',
        ]);

        $category = Category::find($req->categroy_id);
        $category->name = $req->name;
        $category->save();
        return redirect('/admin/dashboard/categories')->with('message', "categrory of Id: " .$req->categroy_id. " updated" );

    }
    public function deleteCategory(Request $req){
        $c = Category::find($req->category_id);
        $c->delete();
        return redirect()->back()->with('message', 'category of ID: '.$req->category_id. " deleted" );
    }
}
