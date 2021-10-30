<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;


use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\AuthAccessAuthorizesResources;
use Illuminate\Html\HtmlServiceProvider;



use View;
use Input;
use Redirect;
use Illuminate\Support\Facades\Auth;

use DB;
use App\MenuData;
use App\OrdersModel;
use App\CategoriesModel;
use App\Products;
use App\Brands;
class PageController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function dashboard(Request $request)
    {
        
     
          return View::make('dashboard');
             
       
    }

    public function Total(Request $request)
    {
       


        $totalOrders = DB::table('orders')->select('order_id')->groupby('order_id')->get()->count();
        $totalOrdersToday = DB::table('orders')->select('order_id')->whereDate('created_at', date('Y-m-d'))->groupby('order_id')->get()->count();
        $totalProducts = DB::table('products')->count();
        $totalProductsToday = DB::table('products')->whereDate('created_at', date('Y-m-d'))->count();
        $totalNumberOfCustomers = DB::table('users')->count();
        $totalNumberOfCustomersToday = DB::table('users')->whereDate('created_at', date('Y-m-d'))->count();


  
        return view('dashboard',['totalOrdersToday'=>$totalOrdersToday, 'totalProductsToday'=>$totalProductsToday, 'totalOrders'=>$totalOrders, 'totalProducts'=>$totalProducts,  'totalNumberOfCustomers'=>$totalNumberOfCustomers,  'totalNumberOfCustomersToday'=>$totalNumberOfCustomersToday]);
       
           
    }

    public function orders(Request $request)
    {

        $orders = DB::select('SELECT payment_method, order_id,payment_status,delivery_status, MAX(created_at) AS order_date FROM orders GROUP BY order_id,payment_method,payment_status,delivery_status ORDER BY order_date DESC');
       
        return view('orders',['orders'=>$orders])
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function products(Request $request)
    {

        $products = Products::orderby("created_at","DESC")->get();

       


        return view('products',['products'=>$products])->with('i', (request()->input('page', 1) - 1) * 5);
     
    }

    public function car_brands(Request $request)
    {

        $car_brands = Brands::select('*')->where('category','=','Car')->orderby("created_at","DESC")->get();

        return view('car-brands',['car_brands'=>$car_brands])->with('i', (request()->input('page', 1) - 1) * 5);
     
    }


    public function part_brands(Request $request)
    {

        $part_brands = Brands::select('*')->where('category','=','Part')->orderby("created_at","DESC")->get();

        return view('part-brands',['part_brands'=>$part_brands])->with('i', (request()->input('page', 1) - 1) * 5);
     
    }



    public function categories(Request $request)
    {

        $categories = DB::select("select * FROM categories WHERE main_category NOT IN('') ORDER BY created_at DESC");
        return view('categories',['categories'=>$categories])
        ->with('i', (request()->input('page', 1) - 1) * 5);

    }




    public function customers(Request $request)
    {
        $customers = DB::select('select * FROM users ORDER BY created_at DESC');
        return view('customers',['customers'=>$customers])
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }


   

}
