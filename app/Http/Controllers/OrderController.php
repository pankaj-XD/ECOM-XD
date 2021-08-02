<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;


use App\Models\Order;
use App\Models\Address;
use App\Mail\OrderMail;

class OrderController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $address = $user->address;
        // return $address;
        return view('order.index',['address' => $address]);
    }

    public function store(Request $req)
    {
        $req->validate([
            "fullname" => 'required',
            "state" => 'required',
            "city" => 'required',
            "zipcode" => 'required',
            "address" => 'required',
            "mobile" => 'required',
            "payment_method" => 'required'

        ]);

        // add user address
        $user = auth()->user();

        if(!$user->address){
            $address = new Address;
            $address->user_id = $user->id;
            $address->full_name = $req->fullname;
            $address->address = $req->address;
            $address->zipcode = $req->zipcode ;
            $address->phone = $req->mobile ;
            $address->state = $req->state ;
            $address->city = $req->city ;
        $address->save();
        }
        


        // make order
        $order = new Order();
        $order->user_id = $user->id;
        $order->order_number = uniqid('order-number-');

        $order->shipping_full_name = $req->fullname;
        $order->shipping_address = $req->address;
        $order->shipping_zipcode = $req->zipcode;
        $order->shipping_phone = $req->mobile;
        $order->shipping_state = $req->state;
        $order->shipping_city = $req->city;

        $itemCount = 0;
        $grandTotal = 0;

        foreach($user->cart as $item){
            $qty = $item->quantity;
            $total = $item->total;

            $itemCount += $qty;
            $grandTotal += $total;
        }

        $order->item_count = $itemCount;
        $order->grand_total = $grandTotal;

        $order->save();

        if($req->payment_method === "paypal"){
            return "PAYPAL PAGE";
        }
        if($req->payment_method === "stripe"){
            return redirect('/stripe/'.$order->id);
        }
        if($req->payment_method === "card"){
            return "Comming soon";
        }

        // order product 
        foreach($user->cart as $item){
            $order->products()->attach($item->product,['price' => $item->total , 'quantity' => $item->quantity , 'product_id' => $item->product_id]);
        };


   

        // SEND MAIL
        $emailAddress = "iampankaj0409@gmail.com";
        Mail::to($emailAddress)
            ->send(new OrderMail($order->order_number,$order->item_count,$order->grand_total));


        //empty cart
        foreach($user->cart as $item){
            $item->delete();
        }

        return view('ty');


    }

    public function showOrderDetail(){
        $user = auth()->user();
        return view('order.order-details',['orders' => $user->orders]);
    }

    public function showOrderItems($order_no){
        $user = auth()->user();

        // $orders = []; 
        //     foreach($user->orders->where("order_number", "=" , $order_no)->first()->products as $order){
        //         array_push($orders,[
        //             "product" => $order,
        //             'detail' => $order->pivot,
        //         ]);
        //     };
        //     return $orders;
    
        $items = $user->orders->where("order_number", "=" , $order_no)->first()->products;
        return view('order.order-items',['items' => $items]);
    }

    
    // admin
    public function listOrder()
    {
        $orders = Order::all();
      return view('admin.order.index',['orders' => $orders]);
    }

    public function listOrderItems($order)
    {
        $orderItems = Order::find($order)->products;
        return view('admin.order.order-items',['items' => $orderItems]);
    }


}

