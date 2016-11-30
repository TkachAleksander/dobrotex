<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

class OrdersController extends Controller
{
    public function orders(Request $request)
    {
    	($request->input('address') != null) ? $address = $request->input('address') : $address = 'самовывоз';
    	$id_order = DB::table('orders')->insertGetId(['l_name' => $request->input('l_name'),
    								 'f_name' => $request->input('f_name'),
    								 's_name' => $request->input('s_name'),
    								 'phone'  => $request->input('phone'),
    								 'address' => $address]);
    	$cart_info = DB::table('cart')->where('id_cookie','=',$_COOKIE["cart"])->select('id_products','quantity')->get();

    	foreach ($cart_info as $value){
    		DB::table('orders_info')->insert(['id_orders' => $id_order, 'id_products' => $value->id_products, 'quantity' => $value->quantity]);
    	}
    	DB::table('cart')->where('id_cookie','=',$_COOKIE["cart"])->delete();
    	SetCookie("cartInfo","true",time()+3600);
    	setcookie("cart","",-1);
    	return redirect('/');
    }
}
