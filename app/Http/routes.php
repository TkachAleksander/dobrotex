<?php

Route::auth();
Route::get('/admin', 'AdminController@index');

Route::get('/', 'DiscountController@index');
Route::get('/{category}', 'ProductsController@getProducts');
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
Route::post('/admin/removeContact', 'AdminController@removeContact');

Route::post('/removeRootGroup', 'AdminController@removeRootGroup');
Route::post('/removeChildGroup', 'AdminController@removeChildGroup');

Route::get('/admin/showOrders', 'AdminController@showOrders');
Route::post('/showMoreOrder', 'AdminController@showMoreOrder');

Route::post('/setDoneOrder', 'AdminController@setDoneOrder');
Route::post('/setNewOrder', 'AdminController@setNewOrder');

/* Cart */
Route::post('/setCookie', 'CartController@setCookie');
Route::post('/showCart', 'CartController@showCart');

Route::post('/cartMinus', 'CartController@cartMinus');
Route::post('/cartPlus', 'CartController@cartPlus');
Route::post('/cartDelete', 'CartController@cartDelete');
Route::post('/updateSum', 'CartController@updateSum');

/* Checkout */
Route::post('/orders', 'OrdersController@orders');
