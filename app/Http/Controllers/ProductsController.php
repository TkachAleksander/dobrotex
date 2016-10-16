<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class ProductsController extends Controller
{
    public function more($id) {
    	$top_menu = DB::table('top_menu')->get();

    	$product = DB::table('products')
    	                ->where('id', '=', $id)
    	                ->get();
        
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
}
