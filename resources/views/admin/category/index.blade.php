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
            <th>Name</th>
            <th>Edit action</th>
            <th>Delete action</th>

          </tr>
        </thead>
        <tbody>

       @foreach ($categories  as $c)
           

       <tr>
        <th scope="row">{{ $c->id }}</th>
        <td>{{ $c->name}}</td>
        <td>
            <a href="/admin/dashboard/category/{{ $c->id }}"><button class="btn">Edit</button></a>
          
        </td>
        <td>  <form action="/admin/dashboard/category" method="post">
            @csrf
            @method("DELETE")
            <input type="hidden" name="category_id" value="{{ $c->id }}">
            <button class="btn">Delete</button>
        </form></td>
       </tr>


       @endforeach
         
        </tbody>
      </table>
   

</section>

@endsection