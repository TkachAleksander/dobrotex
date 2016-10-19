<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Storage;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admin');
    }

    public function addNewProduct()
    {
        $products = DB::table('products')->select('id','category','name')->orderBy('id','desc')->get();
        $categories = DB::table('categories')->select('name')->get();
        $sets = DB::table('sets')->select('name')->get();
        $discounts = DB::table('discounts')->select('id','name')->get();

        return view('admin.addNewProduct', [
                                            'products' => $products,
                                            'categories' => $categories,
                                            'sets' => $sets,
                                            'discounts' => $discounts
                                            ]);
    }
    
    public function addNewProductToServer(Request $request)
    {
        $photo = $request->file('photo');
        $name_img = $request->input('name_img').uniqid();
        $photo->move('img/products',$name_img.'.'.$photo->getClientOriginalExtension());

        DB::table('products')->insert([
            'name' => $request->input('name'),
            'cost_price' => $request->input('cost_price'),
            'price' => $request->input('price'),
            'discount' => $request->input('discount'),
            'category' => $request->input('category'),
            'set_of_characteristics' => $request->input('set_of_characteristics'),
            'description' => $request->input('description'),
            'name_img' => $name_img.'.jpg'
            ]);
        return redirect('/addNewProduct');
    } 

    public function showProducts()
    {
        $products = DB::table('products')
                        ->leftJoin('discounts', 'discounts.id', '=', 'products.discount')
                        ->select('products.*', 'discounts.name as discount_name')
                        ->get();
        return view('admin.showProducts', ['products' => $products]);
    }

    public function removeProduct($id) 
    {
        DB::table('products')->where('id', '=', $id)->delete();
        return redirect('/showProducts');
    }

    public function editProduct($id) 
    {
        $product = DB::table('products')->where('id', '=', $id)->get();
        $categories = DB::table('categories')->select('name')->get();
        $sets = DB::table('sets')->select('name')->get();
        $discounts = DB::table('discounts')->select('id','name')->get();

        return view('admin.editProduct', [
                                          'product' => $product[0], 
                                          'categories' => $categories, 
                                          'sets' => $sets,
                                          'discounts' => $discounts
                                        ]);
    }

    public function editProductToServer($id,Request $request) 
    {
        DB::table('products')->where('id', $id)->update([
                                                         'name' => $request->input('name'),
                                                         'cost_price' => $request->input('cost_prise'),
                                                         'price' => $request->input('price'),
                                                         'discount' => $request->input('discount'),
                                                         'discount' => $request->input('discount'),
                                                         'category' => $request->input('category'),
                                                         'set_of_characteristics' => $request->input('set_of_characteristics'),
                                                         'description' => $request->input('description'),
                                                         'name_img' => $request->input('name_img')
                                                       ]);
        return redirect('/showProducts');
    }

    public function hideProduct($id, $bool) 
    {
        DB::table('products')->where('id', $id)->update(['show' => $bool]);
        return redirect('/showProducts');
    }

    public function addNewDiscount() 
    {
        $discounts = DB::table('discounts')->get();
        return view('admin.addNewDiscount',['discounts' => $discounts]);
    }

    public function addNewDiscountToServer(Request $request) 
    {
        DB::table('discounts')->insert([
                                        'name' => $request->input('name'),
                                        'discount_price' => $request->input('discount_price')
                                      ]);
        return redirect('/addNewDiscount');
    }

    public function removeDiscountToServer($id) 
    {
        DB::table('discounts')->where('id', '=', $id)->delete();
        return redirect('/addNewDiscount');
    }
}