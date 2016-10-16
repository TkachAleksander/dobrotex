<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class DiscountController extends Controller
{
    public function index() {
	$top_menu = DB::table('top_menu')->get();

	$discount_products = DB::table('products')
                            ->join('discounts', 'products.discount', '=', 'discounts.id')
	                        ->where('discount', '!=', 0)
                            ->select('discounts.name as discount_name', 'discounts.discount_price', 'products.*')
	                        ->get();

	return view('home', [
		                'title' => 'Акции', 
		                'top_menu' => $top_menu, 
		                'discount_products' => $discount_products
		                ]);
    }
}
