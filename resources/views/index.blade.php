@extends('layouts.app')


@section('content')


    <main class="product-container">



        @foreach ($products as $product)

            <section class="product-item">
                <img class="product-img" src="{{ $product->image }}" />
                <span class="product-category">{{ $product->category->name }}</span>
                <p class="product-title" width="80px" style="text-overflow: ellipsis;">
                    @php
                        if (strlen($product->title) < 20) {
                            echo $product->title;
                        } else {
                            echo substr($product->title, 0, 18) . '...';
                        }
                    @endphp
                </p>
                <div class=" product-action">
                    <span class="sale-price">₹{{ $product->price }} <del class="price">₹ {{ $product->price }}
                        </del></span>
                    <form action="/add-to-cart" method="post" class="addToCartForm">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="cart-btn"><i class="add-icon">+ Add</i></button>
                    </form>
                </div>
                <a href="/product/{{ $product->id }}" class="product__preview">preview</a>
            </section>


        @endforeach


        <div class="pagination">
            {{ $products->links() }}
        </div>

    </main>

<style>
   .pagination > nav > div:nth-child(2) {
    display: none;
   }
   .pagination > nav > div:nth-child(1) {
    display: flex;
    min-width:  300px;
    justify-content: space-evenly;
    font-size: 1.2rem;
    font-weight: 800;
   }

   .pagination > nav > div:nth-child(1) a:hover ,
   .pagination > nav > div:nth-child(1) span:hover {
        color: tomato;
        border-bottom: 1px solid rgba(0, 0, 0, 0.37);
   }

   .pagination > nav > div:nth-child(1) > span {
       display: none;
   }
</style>




















@endsection
