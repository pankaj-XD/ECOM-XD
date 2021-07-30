@extends('layouts.app')

@section('content')

    <div class="category__container">


        @foreach ($categories as $category)

        <div class="category__box">
            <a href="/product/by/category/{{ $category->id }}">{{ $category->name }}</a>
        </div>
            
        @endforeach


    </div>


@endsection
