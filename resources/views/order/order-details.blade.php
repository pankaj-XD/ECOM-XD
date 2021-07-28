@extends('layouts.app')

@section('content')

    <div class="order__details">


        
    <h1>MY ORDER's</h1>

    @if(count($orders) > 0)
    
    <div class="order__list">
        @foreach($orders as $order)
        
        <div class="order__box">
            
            <ul>
                <li><span><strong>ORDER ID: </strong> {{ $order->id }}</span></li>
                <li> <b>OrderNo: </b>{{ $order->order_number }}</li>
                <li> <b>status: </b>{{ $order->status }}</li>
                <li> <b>item_count: </b>{{ $order->item_count }}</li>
                <li> <b>isPaid: </b>{{ $order->isPaid }}</li>
                <li> <b>grand total: </b>{{ $order->grand_total }}</li>
                <li> <b>payment mode: </b>{{ $order->payment_method }}</li>
                <li><b>Placement Date: </b>{{ $order->created_at }}</li>
            </ul>
            <a href="/order-item/{{ $order->order_number }}">View</a>
        </div>
    
    
        @endforeach
    
    </div>
    
    @else
        <h4>no order</h4>
    @endif




    </div>


@endsection


