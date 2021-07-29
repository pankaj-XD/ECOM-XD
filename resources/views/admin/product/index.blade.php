@extends('admin.dashboard')


@section('content')


<section>
    
    @if(Session::has('message'))
    <div class="alert alert-primary" role="alert">
        {{ Session::get('message') }}
    </div>
    @endif

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Title</th>
            <th scope="col">Discription</th>
            <th scope="col">Price</th>
            <th scope="col">action</th>
          </tr>
        </thead>
        <tbody>

       @foreach ($products as $product)
           

       <tr>
        <th scope="row">{{ $product->id }}</th>
        <td><img src="{{ $product->image }}" width="30" height="30"></td>
        <td>{{ $product->title }}</td>
        <td>{{ $product->description }}</td>
        <td>{{ $product->price }}</td>
        <td>
            <a href="/admin/dashboard/product/{{ $product->id }}"><button class="btn">Edit</button></a>
            <form action="/admin/dashboard/product" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                @method("DELETE")
                <button class="btn">Delete</button>
            </form>
        </td>
       </tr>


       @endforeach
         
        </tbody>
      </table>
   

</section>

@endsection