<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

use Session;
use Stripe;

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
        $res = Stripe\Charge::create ([
                "amount" => intval($amount) * 100 ,
                "currency" => "inr",
                "source" => $request->stripeToken,
                "description" => "orderID:" . $order->id, 
        ]);

        if($res->status == "succeeded"){
            Session::flash('success', 'Payment successful!');
            $order->update([
                "isPaid" => true,
                "payment_method" => "stripe",
            ]);
            return back();
        }else {
            Session::flash('failed', 'Payment failed!');
            return back();
        }
      
    }
}
