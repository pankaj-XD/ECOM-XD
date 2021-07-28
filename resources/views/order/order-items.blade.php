@extends('layouts.app')

@section('content')

    <div class="order__details">



        <h1>ORDER Item's</h1>


        <div class="order__list">
            @foreach ($items as $item)

                <div class="order__box">

                    <ul>
                        <div class="img__box"><img src="{{ $item->image }}" alt=""></div>
                        <li> <b>title: </b>{{ $item->title }}</li>
                        <li> <b>price: </b>{{ $item->price }}</li>
                        <li> <b>quantity: </b>{{ $item->pivot->quantity }}</li>
                    </ul>
                    <a href="/product/{{$item->pivot->product_id}}">Preview</a>
                </div>


            @endforeach

        </div>






    </div>


@endsection
