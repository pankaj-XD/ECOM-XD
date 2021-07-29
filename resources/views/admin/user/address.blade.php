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
            <th>Full Name</th>
            <th>Address</th>
            <th>ZipCode</th>
            <th>Phone</th>
            <th>State</th>
            <th>City</th>
          </tr>
        </thead>
        <tbody>

           

       <tr>
        <th scope="row"> {{ $address->user_id }}</th>
        <td> {{ $address->full_name }}</td>
        <td> {{ $address->address }}</td>
        <td> {{ $address->zipcode }}</td>
        <td> {{ $address->phone }}</td>
        <td> {{ $address->state }}</td>
        <td> {{ $address->city }}</td>
        <td></td>
       </tr>


        </tbody>
      </table>
   

</section>

@endsection