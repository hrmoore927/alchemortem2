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

Route::post('/sort-by-price', 'ProductController@sortPrice')->name('sort.products');

// individual item
Route::get('/item/{id}', 'ProductController@showProduct')->name('show.product');

// user sign up and sign in
Route::group(['middleware' => 'guest'], function() {
    // sign up
    Route::get('/signup', 'UserController@getSignup')->name('signup');
    Route::post('/signup', 'UserController@postSignup');

    // sign in
    Route::get('/signin', 'UserController@getSignin')->name('signin');
    Route::post('/signin', 'UserController@postSignin');
    
    // forgot password
    Route::get('/password/reset', 'Auth\ForgotPasswordController@requestForm')->name('password-reset');
    Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLink')->name('reset-email');
    // reset password
    Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
    Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
});

// user must be logged in for these views
Route::group(['middleware' => 'auth'], function() {
    // user account
    Route::get('/my-account', 'UserController@getAccount')->name('my-account');
    
    Route::get('edit-info/{id}', 'UserController@editInfo')->name('edit-info');
    Route::patch('/edit-info/{id}', 'UserController@updateInfo');
    
    Route::get('/user-orders', 'UserController@getAccountOrders')->name('user-orders');
    
    //user logout
    Route::get('/logout', 'UserController@getLogout')->name('logout');
    
    // checkout 
    Route::get('/checkout', 'ProductController@getCheckout')->name('checkout');
    Route::post('/checkout', 'ProductController@postCheckout');
    Route::get('/successful-checkout', 'ProductController@successfulCheckout')->name('successful-checkout');
    });

// add to cart
Route::get('/add-to-cart/{id}', 'ProductController@getAddToCart')->name('add-to-cart');

Route::get('/reduce/{id}', 'ProductController@getReduceByOne')->name('reduce');

Route::get('/increase/{id}', 'ProductController@getIncreaseByOne')->name('increase');

Route::get('/remove/{id}', 'ProductController@getRemoveItem')->name('remove');

// view cart
Route::get('/cart', 'ProductController@getCart')->name('cart');

// FAQ
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
//delete product
Route::get('/delete-product/{id}', 'ProductController@deleteProduct')->name('delete-product');

// show all orders
Route::get('/manage-orders', 'ProductController@getAllOrders')->name('manage-orders');
// update order status
Route::patch('/manage-orders/{id}', 'ProductController@updateOrderStatus')->name('update-order');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
