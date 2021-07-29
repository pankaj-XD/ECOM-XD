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
            <th >User</th>
            <th >Order No.</th>
            <th >item Count</th>
            <th >isPaid</th>
            <th >paymentMethod</th>
            <th >shipping Full Name</th>
            <th >shipping Address</th>
            <th >shipping ZipCode</th>
            <th >shipping Contact</th>
            <th >shipping State</th>
            <th >shipping City</th>
            <th >Grand Total</th>
            <th>View Item</th>
          </tr>
        </thead>
        <tbody>

       @foreach ($orders as $order)
           
       <tr>
        <th scope="row">{{ $order->id }}</th>
        <td>{{ $order->user_id }}</td>
        <td>{{ $order->order_number }}</td>
        <td>{{ $order->item_count }}</td>
        <td>{{ $order->isPaid }}</td>
        <td>{{ $order->payment_method }}</td>
        <td>{{ $order->shipping_full_name }}</td>
        <td>{{ $order->shipping_address }}</td>
        <td>{{ $order->shipping_zipcode }}</td>
        <td>{{ $order->shipping_phone }}</td>
        <td>{{ $order->shipping_state }}</td>
        <td>{{ $order->shipping_city }}</td>
        <td>{{ $order->grand_total }}</td>
        <td><a href="/admin/dashboard/order/{{ $order->id }}/items">View Items</a></td>
       </tr>
     


       @endforeach
         
        </tbody>
      </table>
   

</section>

@endsection