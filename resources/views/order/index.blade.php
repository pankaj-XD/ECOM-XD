@extends('layouts.app')

@section('content')

   <div class="order_container">
    <h1>PLACE ORDER</h1>


    <form action="/order" method="post" class="order__form">
        @csrf
        <label for="">Full name</label>
        <input type="text" name="fullname" @if($address) value="{{$address->full_name}}"  @endif >
       
        <label for="">State</label>
        <input type="text" name="state" @if($address) value="{{$address->state}}"  @endif  >
       
        <label for="">City</label>
        <input type="text" name="city" @if($address) value="{{$address->city}}"  @endif  >
       
        <label for="">Zipcode / Postcode</label>
        <input type="text" name="zipcode" @if($address) value="{{$address->zipcode}}"  @endif  >
       
        <label for="">Full Address</label>
        <input type="text" name="address" @if($address) value="{{$address->address}}"  @endif  >
       
        <label for="">Phone No.</label>
        <input type="text" name="mobile" @if($address) value="{{$address->phone}}"  @endif  >
       

        <h4>Payment Mode</h4>
        {{-- radio --}}

        <div class="order__payment-mode">
            

        cash-on-delivery<input type="radio" name="payment_method" id="payment_mosde" value="cash-on-delivery">
        paypal <input type="radio" name="payment_method" id="payment_mode" value="paypal">
        stripe <input type="radio" name="payment_method" id="payment_mosde" value="stripe">
        card <input type="radio" name="payment_method" id="payment_mode" value="card">
        </div>



        <button type="submit">Submit</button>
    </form>

   </div>


@endsection
