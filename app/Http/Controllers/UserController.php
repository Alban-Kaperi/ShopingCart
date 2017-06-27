<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Order;
use App\Orderdetail;
use App\Product;

use Auth;

class UserController extends Controller
{
    public function getProfile(){
      //$user->load('orders.orderdetails.product');
     $user=User::with('orders.orderdetails.product')->find(Auth::id());
     //return $user;
      return view('user.profile', compact('user'));
    }
    public function getSignup(){

      return view('user.signup');
    }
    public function postSignup(Request $request){
      $this->validate($request, [
        'email'=>'email|required|unique:users',
        'password'=>'required|min:4',
        'username'=>'required|unique:users'
      ]);//kjo ska nevoje per if sepse i ben vete redirect tek faqja qe eshte bere post

      // $user= new User([
      //   'email'=>$request->input('email'),
      //   'password'=>bcrypt($request->input('password')),
      //   'username'=>$request->input('username')
      // ]);
      // $user->save();
      $user= new User();
      $user->email=$request->email;
      $user->username=$request->username;
      $user->password=bcrypt($request->password);
      $user->save();

      Auth::login($user);//mbasi regjistrohet ne e logojm direkt
      return redirect()->route("user.profile");//ridergojme tek faqja kryesore

    }
    //---------------end of sign up---------
    public function getSignin(){

      return view('user.signin');
    }

    public function postSignin(Request $request){
      $this->validate($request, [
        'email'=>'email|required|exists:users',
        'password'=>'required|min:4'
      ]);//kjo ska nevoje per if sepse i ben vete redirect tek faqja qe eshte bere post
      if(Auth::attempt([
      'email'=>$request->input('email'),
      'password'=>$request->input('password')]
      )){
        return redirect()->route("user.profile");
      }
      return back();
    }
    //---------------end of sign in---------
    public function getLogout(){
        Auth::logout();//te con tek user/logout
        return redirect()->route('product.index');
    }


}
