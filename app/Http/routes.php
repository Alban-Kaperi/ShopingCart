<?php

//Route::controller('/', 'ProductController');
Route::get('/',[
  'uses'=>'ProductController@getIndex',
  'as'=>'product.index'
]);
//---- ky route eshte thjesht per testime-----//
Route::get('/testmodels',[
  'uses'=>'TestRoutes@test',
  'as'=>'model.test'
]);
//-------------------------------------------//
Route::get('/add-to-cart/{id}', [
    'uses'=> 'ProductController@getAddToCart',
    'as'=> 'product.addToCart'
]);

Route::get('/shopping-cart', [
    'uses'=> 'ProductController@getCart',
    'as'=> 'product.shoppingCart',
    'middleware'=>'auth'
]);

Route::post('/checkout', [
    'uses'=> 'CheckOut@postCheckOut',
    'as'=> 'product.checkout'
]);

//-----------Prefix User--------------
Route::group(['prefix'=>'user'], function(){

  //-----------Middleware Guest--------------
  Route::group(['middleware'=>'guest'], function(){
      // -----SignIn and SignOut--------
      Route::get('/signup',[
        'uses'=>'UserController@getSignup',
        'as'=>'user.signup'
      ]);
      Route::post('/signup',[
        'uses'=>'UserController@postSignup',
        'as'=>'user.signup'
      ]);

      Route::get('/signin',[
        'uses'=>'UserController@getSignin',
        'as'=>'user.signin'
      ]);
      Route::post('/signin',[
        'uses'=>'UserController@postSignin',
        'as'=>'user.signin'
      ]);//---end of SignIn and SignOut -----

  });//---end of Middleware Auth

  //-----------Middleware Auth--------------
  Route::group(['middleware'=>'auth'], function(){
      Route::get('/profile',[
        'uses'=>'UserController@getProfile',
        'as'=>'user.profile'
      ]);
      Route::get('/logout',[
        'uses'=>'UserController@getLogout',
        'as'=>'user.logout'
      ]);
  });//---end of Middleware Auth
});//---end of Prefix user---------------
