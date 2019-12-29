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

Route::get('detail/{id}/{slug}.html', 'FrontendController@getDetail');
Route::get('category/{id}/{slug}.html','FrontendController@getCategory');

Route::post('getProductVariant','FrontendController@ajaxProductVariant');

Route::resource('cart','CartController');
Route::get('/cart','CartController@index')->name('index');	
Route::get('addcart/{id}','CartController@addCart')->name('addCart');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
