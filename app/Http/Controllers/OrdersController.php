<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Mail;
 
class OrdersController extends Controller
{
    public function orders(Request $request)
    {
    	($request->input('address') != null) ? $address = $request->input('address') : $address = 'самовывоз';
    	$id_order = DB::table('orders')
			->insertGetId([
				'l_name' => $request->input('l_name'),
				'f_name' => $request->input('f_name'),
				's_name' => $request->input('s_name'),
				'phone'  => $request->input('phone'),
				'address' => $address
			]);

    	$cart_info = DB::table('cart as c')
			->where('id_cookie','=',$_COOKIE["cart"])
			->join('products as p', 'p.id','=','c.id_products')
			->leftJoin('discounts as d', 'd.id','=','p.discount')
			->select('p.id','p.category','p.name','p.price','p.size','p.kg','p.set_of_characteristics','c.quantity','d.discount_price')
			->get();

    	foreach ($cart_info as $value){
    		DB::table('orders_info')
				->insert([
					'id_orders' => $id_order,
					'id_products' => $value->id,
					'quantity' => $value->quantity
				]);
    	}

        $l_name = $request->input('l_name');
        $f_name = $request->input('f_name');
        $s_name = $request->input('s_name');
        $phone  = $request->input('phone');
        Mail::send('emails.order', array('l_name'=>$l_name,'f_name'=>$f_name, 's_name'=>$s_name, 'phone'=>$phone, 'address'=>$address, 'cart_info'=>$cart_info), function($message)
        {
            $message->from('us@example.com', 'Laravel');
        
            $message->to('foo@example.com')->cc('bar@example.com');
        });

    	DB::table('cart')->where('id_cookie','=',$_COOKIE["cart"])->delete();
    	SetCookie("cartInfo","true",time()+3600);
    	setcookie("cart","",-1);
    	return redirect('/');
    }
}
