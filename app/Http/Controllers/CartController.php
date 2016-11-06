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
}    	