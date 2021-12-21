<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('customers', CustomerController::class);
Route::resource('couriers', CourierController::class);
Route::resource('orders', OrderController::class);


Route::get('courier_orders/{courier_id}', 'CourierController@courier_orders'); //get courier with orders
Route::delete('delete_couriers_order/{courier_id}','CourierController@delete_couriers_order'); //delete courier's orders

Route::get('order_customer/{customer_token}','OrderController@order_customer'); //get order with customer info

Route::get('orderDistance/{order_id}', 'OrderController@orderDistance'); // get distance data between senderAddress-receiverAddress

Route::post('getDistance','DistanceController@getDistance'); //send order to closest courier
Route::get('getDistance','DistanceController@getDistance');