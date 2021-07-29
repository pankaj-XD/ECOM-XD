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
            <th>Transaction ID</th>
            <th>user id</th>
            <th>Made on</th>
            <th>Amount</th>
            <th>Currency</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>

       @foreach ($transactions as $t)
           

       <tr>
        <th scope="row">{{ $t->id }}</th>
        <td>{{ $t->transaction}}</td>
        <td>{{ $t->user_id }}</td>
        <td>

            {{ $t->created_at->format('d/m/Y') }}

        </td>
        <td>{{ $t->amount }}</td>
        <td>{{ $t->currency }}</td>
        <td>{{ $t->status }}</td>
       
       </tr>


       @endforeach
         
        </tbody>
      </table>
   

</section>

@endsection