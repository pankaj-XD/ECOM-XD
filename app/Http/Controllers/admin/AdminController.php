<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Transaction;
use App\Models\User;
use App\Models\Product;

class AdminController extends Controller
{
    public function index(){
        $user = auth()->user();
        // if(!$user->isAdmin) return redirect('/');

        $counts = [
            
        ];


        array_push($counts,[
           'key' => 'Users',
            'url' => '/admin/dashboard/users',
            'value' =>  DB::table('users')->count(),
        ]);
        array_push($counts,[
            'key' => 'Product',
            'url' => '/admin/dashboard/products',
             'value' =>  DB::table('products')->count(),
         ]);
         array_push($counts,[
            'key' => 'Category',
            'url' => '/admin/dashboard/categories',
             'value' =>  DB::table('categories')->count(),
         ]);
         
         array_push($counts,[
            'key' => 'Transaction',
            'url' => '/admin/dashboard/transactions',
             'value' =>  DB::table('transactions')->count(),
         ]);
      
        array_push($counts,[
           'key' => 'Order Pending',
           'url' => '/admin/dashboard/orders',
            'value' =>  DB::table('orders')->where('status',"=","pending")->count(),
        ]);
        array_push($counts,[
           'key' => 'Order Processing',
           'url' => '/admin/dashboard/orders',
            'value' =>  DB::table('orders')->where('status',"=","proccessing")->count(),
        ]);
        array_push($counts,[
           'key' => 'Order Completed',
           'url' => '/admin/dashboard/orders',
            'value' =>  DB::table('orders')->where('status',"=","completed")->count(),
        ]);
    

       

        return view('admin.stats',['counts' => $counts]);
    }
    public function showTransactions()
    {
        $transactions = Transaction::all();
        return view('admin.transaction.index',['transactions' => $transactions ]);
    }
    public function showUsers()
    {
        $users = User::all();
        return view('admin.user.index',['users' => $users ]);
    }
    public function showAddress($user_id)
    {
        $address = User::find($user_id)->address;
        return view('admin.user.address',['address' => $address ]);
    }


   

    // roles
    public function showRoles(){
        $users = User::all();
        return view('admin.roles.index',[
            'users' => $users
        ]);
    }

    public function handleRoles(Request $req)
    {
    
        $user = User::find($req->user_id);


        if($req->handleManage){
            // make manager
            $user->isManager = true;
            $user->save();
            return redirect()->back()->with('message', 'User ID: '. $user->id .' promoted to MANAGER Role');
        }else{
            // remove manager
            $user->isManager = false;
            $user->save();
            return redirect()->back()->with('message', 'User ID: '. $user->id .' removed from MANAGER Role');
        }
        
    }







}
