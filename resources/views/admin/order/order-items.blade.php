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
            <th >Image</th>
            <th >Title</th>
            <th >Category</th>
            <th >Price</th>
            <th >Quantity</th>
            <th >Total</th>
          </tr>
        </thead>
        <tbody>

       @foreach ($items as $item)
           

       <tr>
        <td><img src="{{ $item->image }}" width="30" height="30"></td>
        <td>{{ $item->title }}</td>
        <td>{{ $item->category->name }}</td>
        <td>{{ $item->price }}</td>
        <td>{{ $item->pivot->quantity }}</td>
        <td>{{ $item->pivot->price }}</td>
       </tr>


       @endforeach
         
        </tbody>
      </table>
   

</section>

@endsection