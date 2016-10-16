<?php

Route::auth();
Route::get('/admin', 'AdminController@index');

Route::get('/', 'DiscountController@index');
Route::get('/more/{id}', 'ProductsController@more');
Route::get('/blankets', 'ProductsController@blankets');
Route::get('/pillow', 'ProductsController@pillow');


