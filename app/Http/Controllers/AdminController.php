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
        $sizes = DB::table('sizes')->get();

        return view('admin.addNewProduct', [
                                            'products' => $products,
                                            'categories' => $categories,
                                            'sets' => $sets,
                                            'discounts' => $discounts,
                                            'sizes' => $sizes
                                            ]);
    }
    
    public function addNewProductToServer(Request $request)
    {
        $photo = $request->file('photo');
        $name_img = uniqid();
        $photo->move('img/products',$name_img.'.'.$photo->getClientOriginalExtension());

        DB::table('products')->insert([
            'name' => $request->input('name'),
            'cost_price' => $request->input('cost_price'),
            'price' => $request->input('price'),
            'discount' => $request->input('discount'),
            'category' => $request->input('category'),
            'size' => $request->input('size'),
            'kg' => $request->input('kg'),
            'set_of_characteristics' => $request->input('set_of_characteristics'),
            'description' => $request->input('description'),
            'name_img' => $name_img.'.jpg'
            ]);
        return redirect('/admin/addNewProduct');
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
        
        $name_img = DB::table('products')->where('id', '=', $id)->select('name_img')->get();
        DB::table('products')->where('id', '=', $id)->delete();
        if (file_exists('img/products/'.$name_img[0]->name_img)){
            unlink('img/products/'.$name_img[0]->name_img); 
        } else {
            echo 'Файл '.$name_img[0]->name_img.' не найден !';
        }
    
        return redirect('/admin/showProducts');
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
        return redirect('/admin/showProducts');
    }

    public function hideProduct($id, $bool) 
    {
        DB::table('products')->where('id', $id)->update(['show' => $bool]);
        DB::table('groups_products')->where('id_prod', $id)->update(['show' => $bool]);
        return redirect('/admin/showProducts');
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
        return redirect('/admin/addNewDiscount');
    }

    public function removeDiscountToServer($id) 
    {
        DB::table('discounts')->where('id', '=', $id)->delete();
        return redirect('/admin/addNewDiscount');
    }


    public function setContact(){
        // Вывод списка продуктов
        $products = DB::table('products')
                        ->leftJoin('discounts', 'discounts.id', '=', 'products.discount')
                        ->select('products.*', 'discounts.name as discount_name')
                        ->get();
        // Вывод корней связей
        $IsRoots = DB::table('groups_products as gp')->join('products as p', 'p.id', '=', 'gp.id_group')
                                                     ->select('gp.id_group','p.category', 'p.name')
                                                     ->orderBy('gp.id_group','asc')
                                                     ->distinct()->get();
        // Изменяем key корня связи на id элемента
        foreach ($IsRoots as $old_key => $value) {
            $new_key = $value->id_group;
            $IsRoots[$new_key] = $IsRoots[$old_key];
            unset($IsRoots[$old_key]);
        }
        // Если есть корневые элементы выводим их 
        if($IsRoots != null){
            foreach ($IsRoots as $key => $IsRoot) {
                $IsRoot = $IsRoot->id_group;  
                $contents[$IsRoot] = DB::table('groups_products as gp')->join('products as p', 'p.id', '=', 'gp.id_prod')
                                                                       ->where('id_group', '=', $IsRoot)
                                                                       ->select('gp.id_prod','p.category','p.name')->get();
                                                                      
            }
        } else {
            $contents = null;
        }

        return view('admin.setContact', ['products' => $products, 'contents' => $contents, 'is_roots' => $IsRoots]);
    }

    public function setContactToServer(Request $request){
        $all = $request->all();
        
        foreach ($all['id_products'] as $key => $value) {
            $show1 = DB::table('products')->where('id', '=', $value)->pluck('show');
            $show2 = DB::table('products')->where('id', '=', $request->input('id_group'))->pluck('show');
            if ($show1[0] == '0' || $show2[0] == '0'){
                $show = 0;
            } else {
                $show = 1;
            }
            DB::table('groups_products')->insert([
                                                'id_group' => $request->input('id_group'),
                                                'id_prod' => $value,
                                                'show' => $show
                                                ]);
        }
        return redirect('/admin/setContact');
    }

    public function removeContact(Request $request)
    {   
        if($request->input('roots') != null){
            foreach ($request->input('roots') as $key => $value) {
                // DB::table('groups_products')->where('id_group','=',$request->input('roots')[$key])->delete();
            }
            
        }
        if($request->input('contents') != null){dd($request->input('contents'));
            foreach ($request->input('roots') as $key => $value) {
                // DB::table('groups_products')->where('id_group','=',$request->input('roots')[$key])->delete();
            }
        }
        return view('admin/setContact');
    }

    public function removeRootGroup(Request $request)
    {
        DB::table('groups_products')->where('id_group','=', $request->input('id_root'))->delete();

        return response()->json(" ");
    }

    public function removeChildGroup(Request $request)
    {
        DB::table('groups_products')->where('id_group','=', $request->input('id_root'))
                                    ->where('id_prod','=', $request->input('id_child'))->delete();

        return response()->json(" ");
    }

    public function showOrders()
    {
        $orders = DB::table('orders as o')->get();

        return view('admin.showOrders', ['orders'=>$orders]);
    }

    public function showMoreOrder(Request $request)
    {
        $moreOrder = DB::table('orders_info as oi')->where('oi.id_orders','=', $request->input('id_order'))
                                                   ->join('products as p', 'p.id','=','oi.id_products')
                                                   ->leftJoin('discounts as d', 'd.id','=','p.discount')
                                                   ->select('oi.*','p.*','p.name as name_product','d.*','d.name as discount_name')
                                                   ->get();
        return response()->json($moreOrder);
    }
}