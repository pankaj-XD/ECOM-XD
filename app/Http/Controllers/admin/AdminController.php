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
        if(!$user->isAdmin) return redirect('/');

        return view('admin.dashboard');
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


   








}
