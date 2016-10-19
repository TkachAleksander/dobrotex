<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class ProductsController extends Controller
{
    public function more($id) {
    $top_menu = DB::table('top_menu')->get();
    $product = DB::table('products')->where('id', '=', $id)->where('show', '=', 1)->get();
    $product_characteristics = DB::table('set_of_characteristics')
                                     ->where('name_set', '=', $product[0]->set_of_characteristics)   
                                     ->get(); 	                

	    return view('more', [
	    	                'title' => 'Подробнее',
	    	                'top_menu' => $top_menu,
	    	                'product' => $product,
	    	                'product_characteristics' => $product_characteristics
	    	                ]);
    }

    public function blankets() {
    	$top_menu = DB::table('top_menu')->get();

    	$blankets = DB::table('products')
                        ->where('category', '=', 'Одеяло')
                        ->where('show', '=', 1)->get();

    	return view ('blankets', ['title' => 'Одеяла', 'top_menu' => $top_menu, 'blankets' => $blankets]);
    }

        public function pillow() {
    	$top_menu = DB::table('top_menu')->get();

    	$pillows = DB::table('products')
                       ->where('category', '=', 'Подушка')
                       ->where('show', '=', 1)->get();

    	return view ('pillow', ['title' => 'Подушки', 'top_menu' => $top_menu, 'pillows' => $pillows]);
    }
}
