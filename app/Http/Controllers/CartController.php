<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

class CartController extends Controller
{
    public function setCookie(Request $request){

    	$id_cookie = DB::table('cart')->count();
    	$id_cookie++;

    	DB::table('cart')->insert([ 'id_cookie' => $id_cookie, 'id_products' => $request->input('id_product') ]);

    	
    	
    	return response()->json($id_cookie); 
    }


}    	

