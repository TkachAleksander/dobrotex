<?php

Route::get('/', 'DiscountController@index');

Route::get('/more/{id}', 'ProductsController@more');

/*Route::get('/more/{id}', function () {
	$top_menu = DB::table('top_menu')->get();

	return view('more', [
		                'title' => 'Подробнее',
		                'top_menu' => $top_menu
		                ]);
});*/