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

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});



