<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('site.index');
});

Route::get('/home', 'CustomersController@index');
Auth::routes();

Route::get('/color', 'CustomersController@color');

Route::post('/addColor', 'CustomersController@addColor');

Route::get('/product', 'CustomersController@product');

Route::post('/addProduct', 'CustomersController@addProduct');

Route::post('/addCart', 'CustomersController@addCart');

Route::get('/cart', 'CustomersController@cart');

Route::get('/pending', 'CustomersController@pending');

Route::post('/edit/{id}', 'CustomersController@edit');

Route::get('/delete/{id}', 'CustomersController@delete');