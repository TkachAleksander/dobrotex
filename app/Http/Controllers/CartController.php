<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

class CartController extends Controller
{
    public function setCookie(Request $request){

    	if ($request->input('id_cookie') == null){

    		$id_cookie = DB::table('cart')->max('id_cookie');
    		$id_cookie++;
    		DB::table('cart')->insert([ 'id_cookie' => $id_cookie, 
    									'id_products' => $request->input('id_product') ]);
    		$addCookie = true;

  		} else {
  			$value = DB::table('cart')->where('id_cookie', '=', $request->input('id_cookie'))
  			                          ->where('id_products', '=', $request->input('id_product'))
  			                          ->select('quantity')->get();
  			if(!empty($value)){

  				$value = $value[0]->quantity + 1;
  				DB::table('cart')->where('id_cookie', '=', $request->input('id_cookie'))
  			                     ->where('id_products', '=', $request->input('id_product'))
  			                     ->update(['quantity' => $value]);
  			} else {
  				DB::table('cart')->insert([ 'id_cookie' => $request->input('id_cookie'), 
  											'id_products' => $request->input('id_product') ]);
  			}
  			$id_cookie = $request->input('id_cookie');
  			$addCookie = false;
    	}
    	return response()->json(['id_cookie' => $id_cookie, 'addCookie' => $addCookie]); 
  
    }

    public function showCart(Request $request){
    	$arrayProducts = DB::table('cart')->join('products as p', 'p.id', '=', 'cart.id_products')
    	                                  ->where('id_cookie', '=', $request->input('id_cookie'))
    									  ->select('p.category', 'p.name', 'p.id', 'p.kg', 'p.size', 'cart.quantity', 'p.name_img', 'p.cost_price')
    									  ->get();

    	return response()->json($arrayProducts);
    }






    public function addNewIdInBasket(Request $request){
        $id_cookie = DB::table('cart')->max('id_cookie');
        $id_cookie++;

        DB::table('cart')->insert([ 'id_cookie' => $id_cookie, 
                                    'id_products' => $request->input('id_product'),
                                    'name' => $request->input('category').' '. $request->input('name')
                                     ]);
    }

    // function addToIdInBasket(Request $request){
    //     $value = DB::table('cart')->where('id_cookie', '=', $request->input('id_cookie'))
    //                               ->where('id_products', '=', $request->input('id_product'))
    //                               ->select('quantity')->get();
    //     if(!empty($value)){

    //             $value = $value[0]->quantity + 1;
    //             DB::table('cart')->where('id_cookie', '=', $request->input('id_cookie'))
    //                              ->where('id_products', '=', $request->input('id_product'))
    //                              ->update(['quantity' => $value]);
    //         } else {
    //             DB::table('cart')->insert([ 'id_cookie' => $request->input('id_cookie'), 
    //                                         'id_products' => $request->input('id_product'),
    //                                         'name' => $request->input('category').' '. $request->input('name') ]);
    //         }
    //         return response()->json(' ');                                        
    // }

    // function showBasket(Request $request){
    //             $arrayProducts = DB::table('cart')
    //                                       ->where('id_cookie', '=', $request->input('id_cookie'))
    //                                       ->get();
    //             return response()->json($arrayProducts);
    // }
}    	