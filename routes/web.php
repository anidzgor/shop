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

Route::get('/', 'PagesController@getHome')->name('home');

Route::get('/about', 'PagesController@getAbout');

Route::get('/contact', 'PagesController@getContact');

Route::post('/contact/submit', 'MessagesController@submit');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/add-to-cart/{id}','ProductController@getAddToCart');

Route::get('/reduce/{id}', 'ProductController@getReduceByOne')->name('product.reduceByOne');

Route::get('/remove/{id}', 'ProductController@getRemoveItem')->name('product.removeItem');

Route::get('/dashboard', 'PagesController@getDashboard')->middleware('auth');

Route::get('/shopping-cart','ProductController@getCart')->name('product.shoppingCart');

Route::get('/checkout','ProductController@getCheckout')->name('checkout')->middleware('auth');

Route::post('/checkout', 'ProductController@postCheckout')->name('checkout')->middleware('auth');


