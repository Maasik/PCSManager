<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

//Route::get('/register', function () {
//    if (Auth::check() && Auth::user()->isAdmin == 1) {
//        return view('auth.register');
//    } else {
//        return Redirect::to('/')->with('message', 'To added new employee first you need to autehntication');
//    }
//});


//Route::filter('admin', function(){
//
//    if ( ! Auth::user()->isAdmin())
//    {
//        return Redirect::to('/')
//         ->withError('No Admin, sorry.');
//    }
//    
//
//});

Route::group(['prefix' => 'user', 'namespace' => 'user'], function() {

    Route::get('login', 'AuthController@login');
    Route::get('logout', 'AuthController@logout');

    Route::group(['middleware' => 'admin'], function(){


        // ...
    });
});

Route::get('/home', 'HomeController@index');

Route::resource('customer', 'CustomerController');
Route::get('/customer/search/{search}', 'CustomerController@search');

Route::resource('order', 'OrderController');
Route::get('order/create/{customer_id}', 'OrderController@create');
Route::get('order/search/{search}', 'OrderController@search');



