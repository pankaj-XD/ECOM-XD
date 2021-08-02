@extends('layouts.app')

@section('content')


    <section class="detail__container">

        <div class="product__show">

            {{-- img --}}
            <div class="product__show-image">
                <img src="{{ $product->image }}" alt="">
            </div>

            {{-- info --}}
            <div class="product__show-info">

                {{-- title --}}
                <h4>{{ $product->title }}</h4>

                {{-- des --}}
                <p>{{ $product->description }}</p>
                {{-- catgory --}}
                <span class="product__show-category">{{ $product->category->name }}</span>
                {{-- price --}}
                <span class="sale-price">$ {{ $product->price }} <del class="price">$ {{ $product->price }}</del></span>

                {{-- addtocart + wish --}}
                <div class="action__btn">
                    <button><a href="">Add to Whislist</a></button>
                    <form action="/add-to-cart" method="post" class="addToCartForm">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="cart-btn"><i class="add-icon">Add to CART</i></button>
                    </form>
                </div>

            </div>

        </div>


        {{-- you may also like --}}
        <div class="also__like">
            <h1>you may also like</h1>
            <div class="related__items" data-category="{{ $product->category->id }}" id="related-box">
          
            </div>
        </div>
    </section>

    
    <style>
        .detail__container {
            max-width: 1200px;
            margin: 0 auto;
            min-height: 100vh
        }
    
        .product__show {
    
            display: flex;
            justify-content: space-around;
            align-items: stretch;
            max-height: 400px;
    
            border: 1px solid rgba(22, 21, 21, 0.082);
        }
    
        .product__show-image {
            min-height: 100%;
            width: 50%;
    
        }
    
        .product__show-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 20px;
        }
    
        .product__show-info {
            width: 50%;
        }
    
        .product__show-info {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-content: center;
            gap: 10px;
            padding: 20px;
        }
    
        .product__show-info p {
            font-size: .9rem;
        }
    
        .product__show-info .product__show-category {
            font-size: .8rem;
            color: gray;
            font-style: italic;
        }
    
    
    
        .product__show-info .action__btn {
            display: flex;
        }
    
        .action__btn>button {
            background: tomato;
            border: none;
            outline: none;
            padding: 4px;
            border-radius: 4px;
        }
    
        .action__btn>button>a {
            color: #222;
            font-weight: 500;
        }
    
        .action__btn>button:hover {
            background: rgb(105, 45, 45);
        }
    
        .action__btn>button:hover>a {
            color: #FFF;
        }
    
        @media screen and (max-width:660px) {
            .product__show {
                display: flex;
                flex-direction: column;
                max-height: 100%;
            }
    
            .product__show-image {
                height: 300px;
                width: 100%;
                border-bottom: 1px solid rgba(22, 21, 21, 0.082);
            }
    
            .product__show-info {
                width: 100%
            }
        }
    
        .also__like {
            /* display: flex; */
    
            margin-top: 50px;
            justify-content: center;
            text-align: center;
            color: gray;
        }
    
        .related__items {
            margin-top: 10px;
            display: flex;
            row-gap: 10px;
            flex-wrap: wrap;
            justify-content: space-evenly;
            align-items: center;
    
        }
    
        .related__item {
            border: 1px solid rgba(128, 128, 128, 0.61);
            width: 160px;
            height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            border-radius: 3px;
        }
        .related__item img {
            object-fit: contain;
        }
    
        .related__item a {
            color: #FFF;
            background: rgba(34, 34, 34, 0.39);
            padding: 2px 5px;
            border-radius: 5px;
        }
    
    </style>

<script defer>
    
    const relatedContainer = document.getElementById('related-box');
    let category = relatedContainer.dataset.category;
   
    if(category > 0){
        
        fetch('http://127.0.0.1:8000/api/product/c/'+category)
            .then(res => res.json())
           .then(data => {



            if(data.length > 0){
                let str = '';
                data.forEach( product => {
                    let strTemp = `<div class="related__item">
                            <img src="${product.image}" width="100" height="100" alt="">
                            <a href="http://127.0.0.1:8000/product/${product.id}">Preview</a>
                        </div>`;
                    str = str + strTemp;
                });

                relatedContainer.innerHTML = str;

            }


           });

    }


</script>
@endsection