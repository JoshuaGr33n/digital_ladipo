<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use App\CategoriesModel;
use App\Products;
use App\OrdersModel;
use App\Banners;
use App\Brands;
use DB;

class HomeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sideBarCategories()
    {
        
        $sideBarCategories = CategoriesModel::select('*')->where('main_category','<>','')->take(10)->orderBy('main_category')->get();

        $sideBarCategories_hide = CategoriesModel::select('*')->where('main_category','<>','')->latest()->orderBy('main_category')->get();

      

        $slider = Products::select('*')->where([['slider','Yes'],['slider_pic','<>',''],['item_status','=','Available']])->take(10)->orderBy('created_at', 'DESC')->get();

        $count_featuredCategories = CategoriesModel::select('*')->where([['main_category','<>',''],['main_category_id','<>','']])->get()->count();
        if($count_featuredCategories>=3){
        $featuredCategories = CategoriesModel::select('*')->where([['main_category','<>',''],['main_category_id','<>','']])->get()->random(3);
        }else{
        $featuredCategories = CategoriesModel::select('*')->where([['main_category','<>',''],['main_category_id','<>','']])->get()->random($count_featuredCategories);
        }

        $special_offers = Products::select('*')->where([['special_offer','Yes'],['item_status','=','Available']])->take(10)->orderBy('created_at', 'DESC')->get();
        


        $count_ourProductsCategories = CategoriesModel::select('*')->where('main_category','<>','')->get()->count();
        if($count_ourProductsCategories>=3){
        $ourProductsCategories = CategoriesModel::select('*')->where('main_category','<>','')->get()->random(3);
        }else{
        $ourProductsCategories = CategoriesModel::select('*')->where('main_category','<>','')->get()->random($count_ourProductsCategories);
        }



        $count_featuredProductsfirst = Products::select('*')->where([['featured','=','Yes'],['item_status','=','Available']])->get()->count();
        if($count_featuredProductsfirst>=1){
        $featuredProductsfirst = Products::select('*')->where([['featured','=','Yes'],['item_status','=','Available']])->get()->random(1);
        }else{
        $featuredProductsfirst = Products::select('*')->where([['featured','=','Yes'],['item_status','=','Available']])->get()->random($count_featuredProductsfirst);
        }

        $featuredProducts = Products::select('*')->where([['featured','=','Yes'],['item_status','=','Available']])->get();


       


        $mostViewedProductsFirst = Products::select('*')->where([['item_status','=','Available']])->orderBy('view_count', 'DESC')->take(1)->get();


        $mostViewedProducts = Products::select('*')->where([['item_status','=','Available']])->orderBy('view_count', 'DESC')->take(10)->get();








       
        // $best_seller_Productsfirst = DB::select('SELECT item_id, order, count(*) as cnt FROM orders GROUP BY item_id ORDER BY cnt DESC LIMIT 1');

        
//         $best_seller_Productsfirst_count = DB::table('orders')
//          ->select('item_id', DB::raw('count(*) as total'))
//         ->groupBy('item_id')->orderBy('total','Desc')->take(1)
//         ->get()->count();

// if($best_seller_Productsfirst_count==0){
        $best_seller_Productsfirst = DB::table('orders')
         ->select('item_id', DB::raw('count(*) as total'))
        ->groupBy('item_id')->orderBy('total','Desc')->take(1)
        ->get();
// }else{
//     $best_seller_Productsfirst = DB::table('orders')
//     ->select('item_id', DB::raw('count(*) as total'))
//    ->groupBy('item_id')->orderBy('total','Desc')->take(1)
//    ->get();

// }


        $best_seller_Products = DB::table('orders')
        ->select('item_id', DB::raw('count(*) as total'))
       ->groupBy('item_id')->orderBy('total','Desc')
       ->get();
        



       $shop_category_banner =  Banners::select('*')->where([['category','=','shop-category'],['status','=','Available']])->get();

       $big_home_banner =  Banners::select('*')->where([['category','=','big_banner_home'],['status','=','Available']])->first();
        // $half = ceil($sideBarCategories->count() / 2);
        // $chunks = $sideBarCategories->chunk($half);


        
        $brands = Brands::select('*')->orderBy('name')->get();
      
        return view('index',['sideBarCategories'=>$sideBarCategories,'sideBarCategories_hide'=>$sideBarCategories_hide,'slider'=>$slider,'featuredCategories'=>$featuredCategories,
        'special_offers'=>$special_offers,'ourProductsCategories'=>$ourProductsCategories,'featuredProductsfirst'=>$featuredProductsfirst,
        'featuredProducts'=>$featuredProducts,'best_seller_Productsfirst'=>$best_seller_Productsfirst,'best_seller_Products'=>$best_seller_Products,
        'mostViewedProductsFirst'=>$mostViewedProductsFirst, 'mostViewedProducts'=>$mostViewedProducts, 'big_home_banner'=>$big_home_banner, 'brands'=>$brands])
        ->with('i', (request()->input('page', 1) - 1) * 5);

    }



   

    public function contact()
    {
        
        return view('contact');

    }
}
