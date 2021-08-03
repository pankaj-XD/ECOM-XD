@extends('layouts.app')

@section('content')
  
        <div class="cart__container">

        @if(Session::has('message'))
            <span class="wish__msg">
               
            {{ Session::get('message') }}
            </span>
        @endif
      

        <h1> WISHLIST</h1>

            <div class="wishlist__conatiner">
             

                @foreach ($wishlist as $item)
                <section class="wishlist__box">
                    <div class="box__1">
                        <div class="wish__image">
                            <img src="{{ $item->image }}" alt="">
                        </div>
                        <div class="wish__info">
                            <h3>
                                     
                        @php
                        if (strlen($item->title) < 20) {
                            echo $item->title;
                        } else {
                            echo substr($item->title, 0, 20) . '...';
                        }
                        @endphp</h3>
                            <span>
                                @php
                                if (strlen($item->description) < 110) {
                                    echo $item->description;
                                } else {
                                    echo substr($item->description, 0, 110) . '...';
                                }
                                @endphp
                            </span>
                        </div>
                    </div>

                    <div class="wishlist__btn">
                        <a href="product/{{ $item->id }}">preview</a>
                        <a href="/wishlist/delete/{{ $item->id }}">Remove</a>
                    </div>
                </section>
                  
                @endforeach

               


            </div>

        </div>

        
<style>
    .wishlist__conatiner {
        display: flex;
        flex-direction: column;
        gap: 10px;
        
    }
    .wish__msg{
        position: absolute;
        z-index: 100;
        font-size: 20px;
        background: tomato; 
        color: #000;
        padding: 10px;
        top: 60px;
    }
    .wishlist__box {
        width: 400px;
        display: flex;
        flex-direction: column;
        box-shadow: 2px 3px 7px -1px #c7bcc2;
    border-radius: 5px;
    }
    
    .box__1{
        display: flex;
        flex: 40%;
        gap: 10px;
        padding: 5px;
    }
    .wish__info {
        flex: 60%;
    }
    .wish__info h3 {
        font-size: 1rem;
    }
    .wish__info span {
        font-size: 0.9rem;
    }
    .wish__image {
        width: 100px;
    }
    .wish__image img {
        object-fit: contain;
        width: 100%;
        height: 100%;
    }
    .wishlist__btn{
        display: flex;
        text-align: center;
        background: #000;
    }
    .wishlist__btn a{
        flex:50%;
        color: #fff;
    }
    .wishlist__btn a{
        color: #fff;
        flex:50%;
    }
    

    
</style>


@endsection