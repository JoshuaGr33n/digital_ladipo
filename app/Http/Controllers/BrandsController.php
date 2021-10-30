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
use App\CategoriesModel;
use App\Products;
use App\Brands;
use Session;
class BrandsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    
    


    
    
    // public function dashboard(Request $request)
    // {
        
     
    //       return View::make('dashboard');
             
       
    // }

    public function carBrands($car_brand, Request $request)
    {

        //replace dash '-' with space " "
        $car_brand = str_replace('-',' ',$car_brand);
         //replace dash '-' with space " "


         
        $brand = Brands::where('name',$car_brand)->first();

        if(empty($brand->id)){
            return Redirect::to('404');
         }

         $sortby = $request->get('sortby');

         if($sortby == "2"){
            $products = Products::select('*')->where([['car_brand_id',$brand->id],['item_status','=','Available']])->orderBy('view_count', 'DESC')->paginate(8);
           
            $pagination =  $products->appends ( array (
                'sortby' => $sortby
                 ) ); 
        }
        elseif($sortby == "3"){
            $products = Products::select('*')->where([['car_brand_id',$brand->id],['item_status','=','Available']])->orderBy('created_at', 'DESC')->paginate(8);
           
            $pagination =  $products->appends ( array (
                'sortby' => $sortby
                 ) ); 
        }

        elseif($sortby == "4"){
            $products = Products::select('*')->where([['car_brand_id',$brand->id],['item_status','=','Available']])->orderBy('price', 'ASC')->paginate(8);
           
            $pagination =  $products->appends ( array (
                'sortby' => $sortby
                 ) ); 
        }

        elseif($sortby == "5"){
            $products = Products::select('*')->where([['car_brand_id',$brand->id],['item_status','=','Available']])->orderBy('price', 'DESC')->paginate(8);
           
            $pagination =  $products->appends ( array (
                'sortby' => $sortby
                 ) ); 
        }
        elseif($sortby == "All"){

            $products = Products::select('*')->where([['car_brand_id',$brand->id],['item_status','=','Available']])->orderBy('name')->paginate(8);
           }
        else{

            $products = Products::select('*')->where([['car_brand_id',$brand->id],['item_status','=','Available']])->orderBy('name')->paginate(8);
        }


        // $products = Products::select('*')->where([['car_brand_id',$brand->id],['item_status','=','Available']])->orderBy('name', 'ASC')->paginate(4);
        return view('car-brands',['sortby'=>$sortby,'products'=>$products,'brand'=>$brand])
        ->with('i', (request()->input('page', 1) - 1) * 5);

    }





    public function partBrands($part_brand, Request $request)
    {

        //replace dash '-' with space " "
        $part_brand = str_replace('-',' ',$part_brand);
         //replace dash '-' with space " "


         
        $brand = Brands::where('name',$part_brand)->first();

        if(empty($brand->id)){
            return Redirect::to('404');
         }


         $sortby = $request->get('sortby');

         if($sortby == "2"){
            $products = Products::select('*')->where([['part_brand_id',$brand->id],['item_status','=','Available']])->orderBy('view_count', 'DESC')->paginate(8);
           
            $pagination =  $products->appends ( array (
                'sortby' => $sortby
                 ) ); 
        }
        elseif($sortby == "3"){
            $products = Products::select('*')->where([['part_brand_id',$brand->id],['item_status','=','Available']])->orderBy('created_at', 'DESC')->paginate(8);
           
            $pagination =  $products->appends ( array (
                'sortby' => $sortby
                 ) ); 
        }

        elseif($sortby == "4"){
            $products = Products::select('*')->where([['part_brand_id',$brand->id],['item_status','=','Available']])->orderBy('price', 'ASC')->paginate(8);
           
            $pagination =  $products->appends ( array (
                'sortby' => $sortby
                 ) ); 
        }

        elseif($sortby == "5"){
            $products = Products::select('*')->where([['part_brand_id',$brand->id],['item_status','=','Available']])->orderBy('price', 'DESC')->paginate(8);
           
            $pagination =  $products->appends ( array (
                'sortby' => $sortby
                 ) ); 
        }
        elseif($sortby == "All"){

            $products = Products::select('*')->where([['part_brand_id',$brand->id],['item_status','=','Available']])->orderBy('name')->paginate(8);
           }
        else{

            $products = Products::select('*')->where([['part_brand_id',$brand->id],['item_status','=','Available']])->orderBy('name')->paginate(8);
        }

        
        // $products = Products::select('*')->where([['part_brand_id',$brand->id],['item_status','=','Available']])->orderBy('name', 'ASC')->paginate(4);
        return view('part-brands',['sortby'=>$sortby,'products'=>$products,'brand'=>$brand])
        ->with('i', (request()->input('page', 1) - 1) * 5);

    }


    

   

}
