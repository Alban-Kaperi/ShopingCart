<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;

use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

class ProductController extends Controller
{
    public function getIndex(){
      $products= Product::all();
      return view('shop.index',compact('products'));
    }

    //  public function getAddToCart(Request $request, $id){
    //     $product = Product::find($id);
    //     $oldCart = Session::has('cart') ? Session::get('cart') : null;
    //     $cart = new Cart($oldCart);
    //     $cart->add($product, $product->id);
    //     Session::put('cart', $cart);
    //     //$request->session()->put('cart', $cart);
    //     return redirect()->route('product.index');
    // }

    public function getAddToCart(Request $request, $id){

      $product= Product::find($id);
      //nqs sesioni ka cart atehere merre perndryshe beje null
      $oldCart=Session::has('cart') ? Session::get('cart') : null;
      $cart= new Cart($oldCart);
      $cart->add($product, $product->id);

     // Session::put('cart', $cart);
      $request->session()->put('cart', $cart);
      return redirect()->route('product.index');

    }
    public function getCart(){
      if(!Session::has('cart')){
        return view('shop.shopping-cart');
      }
      $oldCart= Session::get('cart');
      $cart= new Cart($oldCart);
      return view('shop.shopping-cart', compact('cart'));

    }

    public function postCheckOut(){

      if(!Session::has('cart')){
        return redirect()->route('product.shoppingCart');
      }
      $oldCart= Session::get('cart');
      $cart= new Cart($oldCart);

      Stripe::setApiKey(config('services.stripe.secret'));

      $customer = Customer::create([
          'email'=>request('stripeEmail'),
          'source'=>request('stripeToken')
      ]);

      try{
          Charge::create([
            'customer'=>$customer->id,
            'amount'=>$cart->totalPrice*100,
            'currency'=>'usd'

          ]);
      } catch(\Exception $e){
         return redirect()->route('product.shoppingCart')->with('error', $e->getMessage());
      }

      Session::forget('cart');

      return redirect()->route('product.index')->with('sucessful', 'Succesfully Purchased');

    }


}
