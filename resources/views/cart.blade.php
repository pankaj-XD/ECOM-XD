@extends('layouts.app')

@section('content')
    <ul class="list-group list-group-flush">
        @foreach ($cartItems as $item)

            <li class="list-group-item">
                <h5>{{ $item->product->title }}</h5>
                <span>Qty: {{ $item->quantity }}</span>
                <form action="remove-from-cart" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="product_id" value="{{ $item->id }}">
                    <button type="submit" class="btn btn-danger">remove</button>
                </form>
            </li>
            <br>

        @endforeach
    </ul>
    <h3>Total: {{ $total }}</h3>

    <a href="/order">ORDER NOW</a>

@endsection
