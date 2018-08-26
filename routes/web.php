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

/*Route::get('/', function () {
    return view('frontEnd.index');
});*/
Route::get('/','HomeController@index')->name('/');

/*
|--------------------------------------------------------------------------
|                                Admin Routes
|--------------------------------------------------------------------------
|
*/
Route::get('admin','Auth\AdminLoginController@LoginForm')->name('admin');
Route::get('admin-signup','AdminController@create')->name('admin-signup');
Route::post('admin-store','AdminController@store')->name('admin-store');
Route::post('admin-login','Auth\AdminLoginController@login')->name('admin-login');
Route::get('admin-logout','Auth\AdminLoginController@logout')->name('admin-logout');
Route::get('dashboard','AdminController@index')->name('dashboard');
/*
|--------------------------------------------------------------------------
|                                Category Routes
|--------------------------------------------------------------------------
|
*/
//back-end:
Route::get('category','CategoryController@index')->name('category');
Route::get('create-category','CategoryController@create')->name('create-category');
Route::post('store-category','CategoryController@store')->name('store-category');
Route::get('edit-category/{id}','CategoryController@edit')->name('edit-category');
Route::post('update-category/{id}','CategoryController@update')->name('update-category');
Route::get('destroy-category/{id}','CategoryController@destroy')->name('destroy-category');
Route::get('active-category/{id}','CategoryController@active')->name('active-category');
Route::get('deactive-category/{id}','CategoryController@deactive')->name('deactive-category');
//front-End:
Route::get('show-category/{id}','CategoryController@show_category')->name('show-category');
/*
|--------------------------------------------------------------------------
|                                Brands Routes
|--------------------------------------------------------------------------
|
*/
Route::get('brands','BrandController@index')->name('brands');
Route::get('create-brand','BrandController@create')->name('create-brand');
Route::post('store-brand','BrandController@store')->name('store-brand');
Route::get('edit-brand/{id}','BrandController@edit')->name('edit-brand');
Route::post('update-brand/{id}','BrandController@update')->name('update-brand');
Route::get('destroy-brand/{id}','BrandController@destroy')->name('destroy-brand');
Route::get('active-brand/{id}','BrandController@active')->name('active-brand');
Route::get('deactive-brand/{id}','BrandController@deactive')->name('deactive-brand');
//front-End:
Route::get('show-brand/{id}','CategoryController@show_category')->name('show-brand');
/*
|--------------------------------------------------------------------------
|                                Product Routes
|--------------------------------------------------------------------------
|
*/
Route::get('products','ProductController@index')->name('products');
Route::get('create-product','ProductController@create')->name('create-product');
Route::post('store-product','ProductController@store')->name('store-product');
Route::get('edit-product/{id}','ProductController@edit')->name('edit-product');
Route::post('update-product/{id}','ProductController@update')->name('update-product');
Route::get('destroy-product/{id}','ProductController@destroy')->name('destroy-product');
Route::get('active-product/{id}','ProductController@active')->name('active-product');
Route::get('deactive-product/{id}','ProductController@deactive')->name('deactive-product');
//front-End:
Route::get('show-product/{id}','ProductController@show')->name('show-product');
/*
|--------------------------------------------------------------------------
|                                Slider Routes
|--------------------------------------------------------------------------
|
*/
Route::get('sliders','SliderController@index')->name('sliders');
Route::get('create-slider','SliderController@create')->name('create-slider');
Route::post('store-slider','SliderController@store')->name('store-slider');
Route::get('destroy-slider/{id}','SliderController@destroy')->name('destroy-slider');
Route::get('active-slider/{id}','SliderController@active')->name('active-slider');
Route::get('deactive-slider/{id}','SliderController@deactive')->name('deactive-slider');
/*
|--------------------------------------------------------------------------
|                                Cart Routes
|--------------------------------------------------------------------------
|
*/
Route::post('add-to-cart/{id}','CartController@store')->name('add-to-cart');
Route::get('cart','CartController@show_cart')->name('cart');
Route::post('update-cart/{id}','CartController@update')->name('update-cart');
Route::get('delete-cart/{id}','CartController@destroy')->name('delete-cart');
/*
|--------------------------------------------------------------------------
|                                User Routes
|--------------------------------------------------------------------------
|
*/
Route::get('customer-login','Auth\CustomerController@LoginForm')->name('customer-login');
Route::post('customer','Auth\CustomerController@login')->name('customer');
Route::get('customer-logout','Auth\CustomerController@logout')->name('customer-logout');
Route::get('customer-create','Auth\CustomerController@create')->name('customer-create');
Route::post('customer-store','Auth\CustomerController@store')->name('customer-store');
/*
|--------------------------------------------------------------------------
|                                Checkout Routes
|--------------------------------------------------------------------------
|
*/
Route::get('checkout','CheckoutController@create')->name('checkout');
Route::post('shipping-store/{id}','CheckoutController@store')->name('shipping-store');
Route::get('payment','CheckoutController@payment')->name('payment');