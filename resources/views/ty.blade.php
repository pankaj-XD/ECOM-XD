@extends('layouts.app')


@section('content')

<section class="ty__conatiner">
 
    <div class="ty__box">
        <h1>Thank You For Shopping with XYZ</h1>
        <p>Check your MailBox.</p>
        <span>email: <i>{{ auth()->user()->email }}</i></span>
        <div class="ty__box-btn">
            <a href="/myorder">My Order's</a>
            <a href="/">HomePage</a>
        </div>
    
    </div>

<style>


</style>
</section>

@endsection
