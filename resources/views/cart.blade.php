@extends('layouts.app')

@section('content')
  
        <div class="cart__container">


        @foreach ($cartItems as $item)
            <!-- cartitem -->
            <div class="cart__item">
                <div class="cart_box">
                    <div class="cart__img" style="padding:10px">
                        <img src="{{ $item->product->image }}" />
                    </div>
                    <div class="cart__info">
                        <h4 class="title">
                            
                        @php
                        if (strlen($item->product->title) < 20) {
                            echo $item->product->title;
                        } else {
                            echo substr($item->product->title, 0, 20) . '...';
                        }
                        @endphp

                        </h4>
                        <p>
                        @php
                        if (strlen($item->product->description) < 110) {
                            echo $item->product->description;
                        } else {
                            echo substr($item->product->description, 0, 110) . '...';
                        }
                        @endphp

                        </p>
                    </div>
                </div>
    
                <div class="cart__action">
                    <div>Quantity: <span> {{ $item->quantity }}</span></div>
                    <div>price: <span> {{ $item->total }}</span></div>
                    <div>
                   
                            <form action="remove-from-cart" method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="product_id" value="{{ $item->id }}">
                                <button type="submit" class="cart_remove-btn" >Remove</button>
                                
                            </form>
                        
                    </div>
                </div>
            </div>
            
        @endforeach

        </div>



        <div class="checkout__conatiner">
            <h4>total: <span>{{ $total }}</span></h4> <a href="/order">Checkout Now</a>
        </div>


@endsection
