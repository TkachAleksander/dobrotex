<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

class CheckoutController extends Controller
{
    public function viewCheckout(){
        $array_products = DB::table('cart')
            ->join('products as p', 'p.id', '=', 'cart.id_products')
            ->leftJoin('discounts as d', 'd.id', '=', 'p.discount')
            ->where('id_cookie', '=', $_COOKIE['cart'])
            ->select('p.id','p.category','p.name','p.price','p.discount','p.size','p.kg','p.name_img','cart.quantity','d.discount_price')
            ->get();

        if(!empty($array_products)) {
            return view('checkout', [
                'title' => 'Оформление заказа',
                'array_products' => $array_products
            ]);
        } else {
            return redirect('/');
        }
    }
}
