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
                                        ->leftJoin('discounts as d', 'd.id', '=', 'p.discount')
    	                                  ->where('id_cookie', '=', $request->input('id_cookie'))
    									                  ->select('p.id','p.category','p.name','p.price','p.discount','p.size','p.kg','p.name_img','cart.quantity','d.discount_price')
    									                  ->get();

    	return response()->json($arrayProducts);
    }

    public function updateSum(Request $request){
        $arrayProducts = DB::table('cart')->join('products as p', 'p.id', '=', 'cart.id_products')
                                          ->where('id_cookie', '=', $request->input('id_cookie'))
                                          ->select('p.price', 'cart.quantity')
                                          ->get();
        return response()->json($arrayProducts);
    }


    public function cartMinus(Request $request){
        $quantity = DB::table('cart')->where('id_products', '=', $request->input('id_product'))
                                     ->where('id_cookie', '=', $request->input('id_cookie'))
                                     ->select('quantity')->get();

        if ($quantity[0]->quantity <=1){
            return 1;
        }
        $quantity = $quantity[0]->quantity - 1;
        DB::table('cart')->where('id_products', '=', $request->input('id_product'))
                         ->where('id_cookie', '=', $request->input('id_cookie'))
                         ->update(['quantity' => $quantity]);

        return response()->json($quantity);

    }

    public function cartPlus(Request $request){
        $quantity = DB::table('cart')->where('id_products', '=', $request->input('id_product'))
                                     ->where('id_cookie', '=', $request->input('id_cookie'))
                                     ->select('quantity')->get();

        $quantity = $quantity[0]->quantity + 1;
        DB::table('cart')->where('id_products', '=', $request->input('id_product'))
                         ->where('id_cookie', '=', $request->input('id_cookie'))
                         ->update(['quantity' => $quantity]);

        return response()->json($quantity);

    }

        public function cartDelete(Request $request){
        DB::table('cart')->where('id_products', '=', $request->input('id_product'))
                         ->where('id_cookie', '=', $request->input('id_cookie'))
                         ->delete();

        return response()->json("ok");

    }
}    	