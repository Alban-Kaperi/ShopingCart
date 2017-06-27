@extends('layouts.master')

@section('title')
User Profile
@endsection


@section('content')
<br><br>
<div class="row">
    <div class="col-md-5 col-offset-2">
    @if($user)
      <h1> <small>This is {{$user->username}}'s profile!</small></h1>
      <h2> <small>You have ordered: </small></h2>
      @foreach($user->orders as $order)
      Order nr: {{$order->id}}
        <ul class="list-group">
          @foreach($order->orderdetails as $orderdetail)
          <li class="list-group-item">{{$orderdetail->product->title}}</li>
          @endforeach
        </ul>
      @endforeach
    @endif






    </div>
</div>


@endsection
