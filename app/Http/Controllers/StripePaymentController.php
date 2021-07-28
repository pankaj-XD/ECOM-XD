<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Transaction;
use App\Mail\TransactioMail;

use Session;
use Stripe;
use Mail;

class StripePaymentController extends Controller
{
    public function stripe(Request $request,$order)
    {   
        $order = Order::find($request->order);
        return view('stripe.stripe',['order' => $order]);
    }

    public function stripePost(Request $request)
    {
        $order = Order::find($request->order_id);
        
        $amount = $order->grand_total;
        
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        
        // create customer
        // $customer = \Stripe\Customer::create([
        //     'email' => auth()->user()->email,
        //     "source" => $request->stripeToken,
        //     "name" => auth()->user()->id,
            
        // ]);
        
        
        
        
        // make charge
        $res = Stripe\Charge::create ([
            "amount" => intval($amount) * 100 ,
            "currency" => "inr",
            "source" => $request->stripeToken,
            "description" => "orderID:" . $order->id, 
        ]);
        

        // save to db
        $transaction = new Transaction();
        $transaction->transaction = $res->id ;
        $transaction->user_id = auth()->user()->id ;
        $transaction->amount = $res->amount;
        $transaction->currency = $res->currency;
        $transaction->status = $res->status;
        $transaction->save();

        // return $transaction;

        // send mail
        if($res->status == "succeeded"){
            $emailAddress = "iampankaj0409@gmail.com";
            Mail::to($emailAddress)
                ->send(new TransactioMail($res->id, $res->amount, $res->currency, $res->status ));

        }



        // response
        if($res->status == "succeeded"){
            Session::flash('success', 'Payment successful!');
            $order->update([
                "isPaid" => true,
                "payment_method" => "stripe",
            ]);

            $user = auth()->user();
              // order product binding
        foreach($user->cart as $item){
            $order->products()->attach($item->product,['price' => $item->total , 'quantity' => $item->quantity , 'product_id' => $item->product_id]);
        };

        //empty cart
        foreach($user->cart as $item){
            $item->delete();
        }




            return back();
        }else {
            Session::flash('failed', 'Payment failed!');
            return back();
        }
      
    }
}
