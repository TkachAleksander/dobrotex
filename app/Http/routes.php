<?php

Route::auth();
Route::get('/admin', 'AdminController@index');
 
    Route::get('/', 'DiscountController@index');
    Route::get('/more/{id}', 'ProductsController@more');
    Route::get('/blankets', 'ProductsController@blankets');
    Route::get('/pillow', 'ProductsController@pillow');

/* Admin */
Route::get('/addNewProduct', 'AdminController@addNewProduct');
Route::post('/addNewProduct', 'AdminController@addNewProductToServer');

Route::get('/editProduct/{id}', 'AdminController@editProduct');
Route::post('/editProduct/{id}', 'AdminController@editProductToServer');

Route::get('/addNewDiscount', 'AdminController@addNewDiscount');
Route::post('/addNewDiscount', 'AdminController@addNewDiscountToServer');

Route::get('/showProducts', 'AdminController@showProducts');
Route::get('/boolProduct/{id}/{bool}', 'AdminController@hideProduct');
Route::get('/removeProduct/{id}', 'AdminController@removeProduct');
Route::get('/removeDiscount/{id}', 'AdminController@removeDiscountToServer');