<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'App\Http\Controllers\CartsController@Index');
Route::get('/AddtoCart/{id}', 'App\Http\Controllers\CartsController@AddToCart');
Route::post('/AddtoCart', 'App\Http\Controllers\CartsController@AddCart');
Route::get('/AddtoCart1', 'App\Http\Controllers\CartsController@AddCart1');
Route::get('/Delete-Item-Cart/{id}', 'App\Http\Controllers\CartsController@DeleteItemToCart');

Route::get('/Cart', 'App\Http\Controllers\CartsController@ViewtoCart');
Route::get('/same-product', 'App\Http\Controllers\CartsController@SameProduct');
Route::get('/buy-again', 'App\Http\Controllers\CartsController@BuyAgain');
Route::get('/Delete-Item-List-Cart/{id}', 'App\Http\Controllers\CartsController@DeleteItemListToCart');

Route::get('/Save-Item-List-Cart/{id}/{quanty}', 'App\Http\Controllers\CartsController@SaveItemListToCart');

Route::get('/Update-Item-List-Cart/{id}/{quanty}', 'App\Http\Controllers\CartController@UpdateItemListCart');

Route::get('/Dashboard', 'App\Http\Controllers\CartsController@Dashboard');

//API
Route::get('/Api/Product-Cart/{id_user}', 'App\Http\Controllers\ApiController@product_cart');
Route::get('/Api/totalQuanty-Product-Cart/{id_user}', 'App\Http\Controllers\ApiController@total_product_cart');
Route::get('/Api/Reset-Cart/{id_user}', 'App\Http\Controllers\ApiController@resetCart');

