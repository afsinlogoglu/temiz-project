<?php

Route::get('orderDistance/{order_id}', 'OrderController@orderDistance'); // get distance data between senderAddress-receiverAddress

Route::post('getDistance','DistanceController@getDistance');
Route::get('getDistance','DistanceController@getDistance');