<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Order;
use App\Orderdetail;
use App\Product;

class TestRoutes extends Controller
{
  public function test(User $user){
    //$user->load('orders.orderdetails.product');
   $user=User::with('orders.orderdetails.product')->get();
   return $user;
   

    // return DB::table('persons')
        //           ->join('orders', 'persons.id', '=', 'orders.person_id')
        //           ->join('orderdetails', 'orders.id', '=', 'orderdetails.order_id')
        //           ->join('products', 'orderdetails.product_id', '=', 'products.id')
        //           ->select('persons.FirstName', 'products.ProductName')
        //           ->where('persons.FirstName', 'Kaperi')
        //           ->get();


        // return  DB::select( DB::raw(
        //  "SELECT TemporaryTable.FirstName, TemporaryTable.ProductName
        //   FROM
        //   (SELECT persons.FirstName, products.ProductName
        //   from persons
        //   inner join  orders
        //   on persons.id=orders.person_id
        //   inner join  orderdetails
        //   on orders.id=orderdetails.order_id
        //   inner join  products
        //   on orderdetails.product_id=products.id)
        //   As
        //   TemporaryTable
        //   where TemporaryTable.FirstName='Kaperi'
        //   " ));

          // $person->load('orders.orderdetails.product');
          // // $person=Person::with('orders.orderdetails.product')->find($person->id);
          //  return view('personOrderDetails',compact('person'));
          //  //return $person;



  }
}
