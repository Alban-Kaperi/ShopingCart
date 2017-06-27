@extends('layouts.master')
@section('title')
Shopping-Cart
@endsection

@section('content')
<br><br><br><br><br><br>

    @if(Session::has('cart'))
        <div class="row">
            <div class="col-sm-8 col-md-8 col-md-offset-1 col-sm-offset-1">

            @if(Session::has('error'))
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                <div class="alert alert-danger"><p class="text-center">{{Session::get('error')}}</p></div>
                </div>
            </div>
            @endif


               <ul class="list-group">
               @foreach($cart->items as $product)
                <li class="list-group-item clearfix">

                    <strong>Product title: {{$product['item']['title']}}</strong>
                    <span class="label label-success">Price: ${{$product['price']}}</span>
                    <span class="label label-danger">Quantity: {{$product['qty']}}</span>
                    <span class="label label-warning">Total Price: ${{$product['price']*$product['qty']}}</span>

                    <div class="btn-group pull-right">
                    <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Action <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#">Reduce by 1</a></li>
                        <li><a href="#">Reduce all</a></li>
                    </ul>
                    <div>


                 </li>

               @endforeach
               </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-8 col-md-8 col-md-offset-1 col-sm-offset-1">
                <strong>Total: ${{$cart->totalPrice}}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-8 col-md-8 col-md-offset-1 col-sm-offset-1">
               <form action="{{route('product.checkout')}}" method="POST">
                {{csrf_field()}}
                    <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="{{config('services.stripe.key')}}"
                        data-amount="{{$cart->totalPrice*100}}"
                        data-name="Pizza"
                        data-description="food"
                        data-email="{{Auth::user()->email}}"
                        data-shipping-address="true"
                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                        data-locale="auto">
                    </script>
                </form>
            </div>
        </div>


    @else

    <div class="row">
            <div class="col-sm-8 col-md-8 col-md-offset-1 col-sm-offset-1">
               <h2>No items in Shopping Cart!</h2>
            </div>
        </div>

    @endif



@endsection
