@extends('admin.dashboard')


@section('content')


<section class="stats__conatiner">
    
    @if(Session::has('message'))
    <div class="alert alert-primary" role="alert">
        {{ Session::get('message') }}
    </div>
    @endif
   
  
   
    @foreach ($counts as $count)
        <div class="stats__box">
            <a href={{ $count['url'] }}>{{ $count['key'] }}</a>
            <span>{{ $count['value'] }}</span>
        </div>
    @endforeach

  
</section>


@endsection