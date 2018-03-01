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
    return view('partials.index');
})->name('index');

Route::get('/shop-products', 'ProductController@getProducts')->name('shop.products');

Route::group(['middleware' => 'guest'], function() {
    Route::get('/signup', 'UserController@getSignup')->name('signup');
    Route::post('/signup', 'UserController@postSignup');

    Route::get('/signin', 'UserController@getSignin')->name('signin');
    Route::post('/signin', 'UserController@postSignin');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/my-account', 'UserController@getAccount')->name('my-account');

    Route::get('/logout', 'UserController@getLogout')->name('logout');
});

Route::get('/add-to-cart/{id}', 'ProductController@getAddToCart')->name('add-to-cart');

Route::get('/cart', 'ProductController@getCart')->name('cart');

Route::get('/manage-users', 'UserController@getUsers')->name('manage-users');