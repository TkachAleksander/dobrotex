<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

class CheckoutController extends Controller
{
    public function viewCheckout(){
        $top_menu = DB::table('top_menu')->get();
        return view('checkout', ['title' => 'Оформление заказа', 'top_menu' => $top_menu]);
    }
}
