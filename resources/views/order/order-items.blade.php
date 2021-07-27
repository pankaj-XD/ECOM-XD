@extends('layouts.app')

@section('content')

    <h1>MY ORDER's</h1>

    @if(count($orders) > 0)
    @foreach($orders as $order)
    <div class="list-group">
  <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
   <b>OrderNo: </b>{{ $order->order_number }}
  </a>
  <a href="/order-item/{{ $order->order_number }}" class="list-group-item list-group-item-action">  <b>OrderNo: </b>{{ $order->order_number }}</a>
  <a href="#" class="list-group-item list-group-item-action">  <b>status: </b>{{ $order->status }}</a>
  <a href="#" class="list-group-item list-group-item-action">  <b>item_count: </b>{{ $order->item_count }}</a>
  <a href="#" class="list-group-item list-group-item-action">  <b>isPaid: </b>{{ $order->isPaid }}</a>
  <a href="#" class="list-group-item list-group-item-action">  <b>grand total: </b>{{ $order->grand_total }}</a>
  <a href="#" class="list-group-item list-group-item-action">  <b>payment mode: </b>{{ $order->payment_method }}</a>
  <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">  <b>Placement Date: </b>{{ $order->created_at }}</a>
</div>
    @endforeach
    @else
        <h4>no order</h4>
    @endif


@endsection


