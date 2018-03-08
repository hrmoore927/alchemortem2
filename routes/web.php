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

// home page
Route::get('/', function () {
    return view('partials.index');
})->name('index');

// products page
Route::get('/shop-products', 'ProductController@getProducts')->name('shop.products');

// user sign up and sign in
Route::group(['middleware' => 'guest'], function() {
    Route::get('/signup', 'UserController@getSignup')->name('signup');
    Route::post('/signup', 'UserController@postSignup');

    Route::get('/signin', 'UserController@getSignin')->name('signin');
    Route::post('/signin', 'UserController@postSignin');
});

// user account and logout
Route::group(['middleware' => 'auth'], function() {
    Route::get('/my-account', 'UserController@getAccount')->name('my-account');

    Route::get('/logout', 'UserController@getLogout')->name('logout');
});

// add to cart
Route::get('/add-to-cart/{id}', 'ProductController@getAddToCart')->name('add-to-cart');

// view cart
Route::get('/cart', 'ProductController@getCart')->name('cart');

// checkout 
Route::get('/checkout', 'ProductController@getCheckout')->name('checkout');
Route::post('/checkout', 'ProductController@postCheckout');

Route::get('/faq', function () {
    return view('partials.faq');
})->name('faq');

// admin pages
// show all users
Route::get('/manage-users', 'UserController@getUsers')->name('manage-users');
// edit user
Route::get('/manage-user/{id}', 'UserController@editUser')->name('edit-user');
Route::patch('/manage-user/{id}', 'UserController@updateUser');
//delete user
Route::get('/delete-user/{id}', 'UserController@deleteUser')->name('delete-user');

// show all products
Route::get('/manage-products', 'ProductController@getProductsInfo')->name('manage-products');
// add a product
Route::get('/add-product', 'ProductController@getProductForm')->name('add-product');
Route::post('/add-product', 'ProductController@postAddProduct');
// edit a product
Route::get('/manage-product/{id}', 'ProductController@editProduct')->name('edit-product');
Route::patch('/manage-product/{id}', 'ProductController@updateProduct');
//delete user
Route::get('/delete-product/{id}', 'ProductController@deleteProduct')->name('delete-product');