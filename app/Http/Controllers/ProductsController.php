<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class ProductsController extends Controller
{
    public function more($id) {
        $top_menu = DB::table('top_menu')->get();
        $product = DB::table('products')->where('id', '=', $id)->where('show', '=', 1)->get();
	   
        $discount_products = DB::table('products')
                            ->join('discounts', 'products.discount', '=', 'discounts.id')
                            ->where('discount', '!=', 0)
                            ->where('show', '=', 1)
                            ->where('products.id', '=', $id)
                            ->select('discounts.name as discount_name', 'discounts.discount_price', 'products.*')
                            ->get();
    
        $id_prods = DB::table('groups_products')
                      ->where('id_group', '=', $id)
                      ->where('show', '=', 1)                      
                      ->select('id_prod')
                      ->get();
    
        if(count($id_prods) == 0){
            $id_prods = DB::table('groups_products')
                          ->where('id_prod', '=', $id)
                          ->select('id_group')
                          ->get();
    
            $sizes=array();
            foreach ($id_prods as $id_prod) {
                $value = DB::table('products')
                           ->where('id', '=', $id_prod->id_group)
                           ->select('size','id')
                           ->get(); 
        
                array_push($sizes, $value[0]); 
            }
        } else {
    
            $sizes=array();
            foreach ($id_prods as $id_prod) {
                $value = DB::table('products')
                           ->where('id', '=', $id_prod->id_prod)
                           ->select('size','id')
                           ->get(); 
        
                array_push($sizes, $value[0]); 
            }
    }
    

    return view('more', [
    	                'title' => 'Подробнее',
    	                'top_menu' => $top_menu,
    	                'product' => $product,
                        'discount_products' => $discount_products,
                        'sizes' => $sizes
    	                ]);
    }

    public function getProducts($category) {
        $top_menu = DB::table('top_menu')->get();

        if ($category == 'pillow')
        {
            $products = DB::table('products')
                       ->where('category', '=', 'Подушка')
                       ->where('show', '=', 1)
                       ->where('discount', '=', 0)
                       ->get();

            return view ('products', ['title' => 'Подушки',
                                      'top_menu' => $top_menu,
                                      'products' => $products
                                      ]);
        }

        if ($category == 'blankets')
        {
            $products = DB::table('products')
                        ->where('category', '=', 'Одеяло')
                        ->where('discount', '=', 0)
                        ->get();

            return view ('products', ['title' => 'Одеяла', 
                                      'top_menu' => $top_menu, 
                                      'products' => $products
                                      ]);
        }
    }
}
