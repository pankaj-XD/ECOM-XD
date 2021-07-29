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
            <th>name</th>
            <th>email</th>
            <th>Role</th>
            <th>Address</th>
          </tr>
        </thead>
        <tbody>

       @foreach ($users as $user)
           

       <tr>
        <th scope="row">{{ $user->id }}</th>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
            @php
             if($user->isAdmin){
                 echo "admin";
             }else{
                 echo "user";
             }
            @endphp
        </td>
        <td>
            @if($user->address)
            <a href="/admin/dashboard/address/{{ $user->id }}">View</a>
            @else
            Not Available    
            @endif
        </td>
       </tr>


       @endforeach
         
        </tbody>
      </table>
   

</section>

@endsection