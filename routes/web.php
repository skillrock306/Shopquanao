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

Route::get('/', 'FrontendController@getHome');

Route::get('/about', 'FrontendController@getAbout');
Route::get('/contact', 'FrontendController@getContact');

Route::get('detail/{id}/{slug}.html', 'FrontendController@getDetail');
Route::get('category/{id}/{slug}.html', 'FrontendController@getCategory');
Route::get('/allproduct', 'FrontendController@getAllProducts');

Route::post('getProductVariant', 'FrontendController@ajaxProductVariant');

Route::resource('cart', 'CartController');
Route::get('/cart', 'CartController@index')->name('index');	
Route::post('/add-to-cart', 'CartController@addCart')->name('addCart');
Route::post('/update-cart', 'CartController@updateCart')->name('updateCart');
Auth::routes();

Route::get('/login','UserController@getLogin');
Route::post('/login','UserController@postLogin');
Route::get('/logout','UserController@destroy');

Route::get('/register','UserController@getRegister')->name('getRegister');
Route::post('/register','UserController@postRegister')->name('postRegister');

Route::get('/checkout','CheckoutController@checkout');
Route::post('/storeCheckout','CheckoutController@storeCheckout')->name('storeCheckout');
Route::get('/complete/{orderId}','CheckoutController@complete');

Route::get('/account','UserController@account')->name('account');
Route::get('/edit-user','UserController@editUser')->name('edit-user');
Route::post('/post-edit-user','UserController@postEditUser')->name('post-edit-user');

Route::get('/orders','UserController@orders')->name('orders');
Route::get('/orderdetail/{id}','UserController@orderdetail');

Route::get('/addresses','UserController@addresses')->name('addresses');
Route::get('/add-address/','UserController@addAddress');
Route::post('/post-add-address','UserController@postAddAddress')->name('post-add-address');
Route::get('/edit-address/{id}','UserController@editAddress');
Route::post('/post-edit-address','UserController@postEditAddress')->name('post-edit-address');
Route::get('/delete-address/{id}','UserController@deleteAddress');



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});



