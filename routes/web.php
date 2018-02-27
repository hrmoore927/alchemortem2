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

Route::get('/shop-products', 'ProductController@getProducts');

Route::get('/signup', 'UserController@getSignup')->name('signup');
Route::post('/signup', 'UserController@postSignup');

Route::get('/signin', 'UserController@getSignin')->name('signin');
Route::post('/signin', 'UserController@postSignin');

Route::get('/my-account', 'UserController@getAccount')->name('my-account');

Route::get('/manage-users', 'UserController@getUsers')->name('manage-users');