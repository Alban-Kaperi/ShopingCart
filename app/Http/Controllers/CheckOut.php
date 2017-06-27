<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Session;
use Auth;

use App\Cart;
use App\User;
use App\Product;
use App\Order;
use App\Orderdetail;

use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

class CheckOut extends Controller
{
  public function postCheckOut(){

    if(!Session::has('cart')){
      return redirect()->route('product.shoppingCart');
    }
    //dd(request()->all());
    $oldCart= Session::get('cart');
    $cart= new Cart($oldCart);

    $email=request('stripeEmail');
    $stripeToken=request('stripeToken');
    $shippingAddress=request('stripeShippingAddressLine1');
    $billingAddress=request('stripeBillingAddressLine1');


    Stripe::setApiKey(config('services.stripe.secret'));

    $customer = Customer::create([
        'email'=>$email,
        'source'=>$stripeToken
    ]);


    try{
        $charge=Charge::create([
          'customer'=>$customer->id,
          'amount'=>$cart->totalPrice*100,
          'currency'=>'usd'

        ]);
    } catch(\Exception $e){
       return redirect()->route('product.shoppingCart')->with('error', $e->getMessage());
    }

    $order= new Order();
    $order->user_id=Auth::id();
    $order->paymentid=$charge->id;
    $order->totalprice=$cart->totalPrice;
    $order->save();

    // ketu duhet te behet loop qe te futen me shum order detail
    // sepse mund te kete me shum se nje produkt
    foreach($cart->items as $product){

      $orderdetail= new Orderdetail();
      $orderdetail->order_id=$order->id;
      $orderdetail->product_id= $product['item']['id'];
      $orderdetail->quantity=$product['qty'];
      $orderdetail->price=$product['price'];
      $orderdetail->shipping_address=$shippingAddress;
      $orderdetail->billing_address=$billingAddress;
      $orderdetail->save();
    }




    Session::forget('cart');

    return redirect()->route('product.index')->with('sucessful', 'Succesfully Purchased');

  }
}
