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
      $products= Product::simplePaginate(6);
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


}
