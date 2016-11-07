<?php

Route::auth();
Route::get('/admin', 'AdminController@index');

Route::get('/', 'DiscountController@index');
Route::get('{category}', 'ProductsController@getProducts');
Route::get('/more/{id}', 'ProductsController@more');

/* Admin */
Route::get('/admin/addNewProduct', 'AdminController@addNewProduct');
Route::post('/admin/addNewProduct', 'AdminController@addNewProductToServer');

Route::get('/admin/editProduct/{id}', 'AdminController@editProduct');
Route::post('/admin/editProduct/{id}', 'AdminController@editProductToServer');

Route::get('/admin/addNewDiscount', 'AdminController@addNewDiscount');
Route::post('/admin/addNewDiscount', 'AdminController@addNewDiscountToServer');

Route::get('/admin/showProducts', 'AdminController@showProducts');
Route::get('/admin/boolProduct/{id}/{bool}', 'AdminController@hideProduct');
Route::get('/admin/removeProduct/{id}', 'AdminController@removeProduct');
Route::get('/admin/removeDiscount/{id}', 'AdminController@removeDiscountToServer');

Route::get('/admin/setContact', 'AdminController@setContact');
Route::post('/admin/setContact', 'AdminController@setContactToServer');
Route::get('/admin/removeContact/{id}', 'AdminController@removeContact');

/* Cart */
Route::post('/setCookie', 'CartController@setCookie');
Route::post('/showCart', 'CartController@showCart');

Route::post('/addNewIdInBasket', 'CartController@addNewIdInBasket');
Route::post('/addToIdInBasket', 'CartController@addToIdInBasket');
Route::post('/showBasket', 'CartController@showBasket');