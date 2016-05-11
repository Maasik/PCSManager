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

Route::get('/register', function () {
    if (Auth::check()) {
        return redirect('/home');
    } 
    return view('auth.register');
});

// section User
Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () { 
    
    
});

// section Admin
Route::group(['middleware' => 'admin'], function () {
    

    Route::resource('customer', 'CustomerController');
    Route::get('/customer/search/{search}', 'CustomerController@search');

    Route::resource('order', 'OrderController');
    Route::get('order/create/{customer_id}', 'OrderController@create');
    Route::get('order/search/{search}', 'OrderController@search');;
});

















//Route::get('admin', ['middleware' => 'auth', 'uses' => 'AdminController@index']);