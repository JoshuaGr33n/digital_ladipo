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
use App\CommentReview;
use Session;
class PageController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    
    


    
    
    // public function dashboard(Request $request)
    // {
        
     
    //       return View::make('dashboard');
             
       
    // }

    public function mainCategories($main_category, Request $request)
    {

        //replace dash '-' with space " "
        $main_category = str_replace('-',' ',$main_category);
         //replace dash '-' with space " "


         
        $mainCat = CategoriesModel::where('main_category',$main_category)->first();

        if(empty($mainCat->id)){
            return Redirect::to('404');
         }

        
        $categories = CategoriesModel::select('*')->where([['main_category_id',$mainCat->id],['second_category','<>',''],['second_category_id','']])->orderBy('created_at', 'DESC')->paginate(4);
        return view('main-category',['categories'=>$categories,'mainCat'=>$mainCat])
        ->with('i', (request()->input('page', 1) - 1) * 5);

    }


    public function secondCategories($main_category, $second_category, Request $request)
    {

        //replace dash '-' with space " "
        $main_category = str_replace('-',' ',$main_category);
         //replace dash '-' with space " "

          //replace dash '-' with space " "
        $second_category = str_replace('-',' ',$second_category);
        //replace dash '-' with space " "

        $mainCat = CategoriesModel::where('main_category',$main_category)->first();

        $secondCat = CategoriesModel::where('second_category',$second_category)->first();

        if(empty($mainCat->id)){
            return Redirect::to('404');
         }

         if(empty($secondCat->id)){
            return Redirect::to('404');
         }

        // $show_pic = Products::where('second_category_id',$secondCat->id)->first();

        
        $categories = CategoriesModel::select('*')->where([['main_category_id',$mainCat->id],['second_category_id',$secondCat->id]])->orderBy('created_at', 'DESC')->paginate(4);
        return view('parent-category',['categories'=>$categories,'mainCat'=>$mainCat, 'secondCat'=>$secondCat])
        ->with('i', (request()->input('page', 1) - 1) * 5);

    }




    public function thirdCategories($main_category, $second_category, $third_category, Request $request)
    {

         //replace dash '-' with space " "
         $main_category = str_replace('-',' ',$main_category);
         //replace dash '-' with space " "

         //replace dash '-' with space " "
         $second_category = str_replace('-',' ',$second_category);
         //replace dash '-' with space " "

         //replace dash '-' with space " "
         $third_category = str_replace('-',' ',$third_category);
         //replace dash '-' with space " "

         $mainCat = CategoriesModel::where('main_category',$main_category)->first();
         $secondCat = CategoriesModel::where('second_category',$second_category)->first();
         $thirdCat = CategoriesModel::where('third_category',$third_category)->first();

         if(empty($mainCat->id)){
            return Redirect::to('404');
         }

         if(empty($secondCat->id)){
            return Redirect::to('404');
         }

         if(empty($thirdCat->id)){
            return Redirect::to('404');
         }
         $sortby = $request->get('sortby');

         if($sortby == "2"){
            $products = Products::select('*')->where([['main_category_id',$mainCat->id],['second_category_id',$secondCat->id],['third_category_id','=',$thirdCat->id],['item_status','=','Available']])->orderBy('view_count', 'DESC')->paginate(8);
           
            $pagination =  $products->appends ( array (
                'sortby' => $sortby
                 ) ); 
        }
        elseif($sortby == "3"){
            $products = Products::select('*')->where([['main_category_id',$mainCat->id],['second_category_id',$secondCat->id],['third_category_id','=',$thirdCat->id],['item_status','=','Available']])->orderBy('created_at', 'DESC')->paginate(8);
           
            $pagination =  $products->appends ( array (
                'sortby' => $sortby
                 ) ); 
        }

        elseif($sortby == "4"){
            $products = Products::select('*')->where([['main_category_id',$mainCat->id],['second_category_id',$secondCat->id],['third_category_id','=',$thirdCat->id],['item_status','=','Available']])->orderBy('price', 'ASC')->paginate(8);
           
            $pagination =  $products->appends ( array (
                'sortby' => $sortby
                 ) ); 
        }

        elseif($sortby == "5"){
            $products = Products::select('*')->where([['main_category_id',$mainCat->id],['second_category_id',$secondCat->id],['third_category_id','=',$thirdCat->id],['item_status','=','Available']])->orderBy('price', 'DESC')->paginate(8);
           
            $pagination =  $products->appends ( array (
                'sortby' => $sortby
                 ) ); 
        }
        elseif($sortby == "All"){

            $products = Products::select('*')->where([['main_category_id',$mainCat->id],['second_category_id',$secondCat->id],['third_category_id','=',$thirdCat->id],['item_status','=','Available']])->orderBy('name')->paginate(8);
           }
        else{

            $products = Products::select('*')->where([['main_category_id',$mainCat->id],['second_category_id',$secondCat->id],['third_category_id','=',$thirdCat->id],['item_status','=','Available']])->orderBy('name')->paginate(8);
        }

          
      

         return view('products',['sortby'=>$sortby,'products'=>$products,'mainCat'=>$mainCat, 'secondCat'=>$secondCat, 'thirdCat'=>$thirdCat])
         ->with('i', (request()->input('page', 1) - 1) * 1);
       

    }

    function thirdCategories_fetch_data(Request $request)
    {
     if($request->ajax())
     {
    
     $products = Products::select('*')->where([['main_category_id',$mainCat->id],['second_category_id',$secondCat->id],['third_category_id','=',$thirdCat->id],['item_status','=','Available']])->orderBy('created_at', 'DESC')->paginate(8);
      return view('include.products', compact('products'))->render();
     }
    }





    public function product($main_category, $second_category, $third_category, $product_name, Request $request)
    {

        //replace dash '-' with space " "
        $main_category = str_replace('-',' ',$main_category);
         //replace dash '-' with space " "

         //replace dash '-' with space " "
        $second_category = str_replace('-',' ',$second_category);
        //replace dash '-' with space " "

        //replace dash '-' with space " "
        $third_category = str_replace('-',' ',$third_category);
         //replace dash '-' with space " "

         //replace dash '-' with space " "
         $product_name = str_replace('-',' ',$product_name);
        //replace dash '-' with space " "

        $mainCat = CategoriesModel::where('main_category',$main_category)->first();
        $secondCat = CategoriesModel::where('second_category',$second_category)->first();
        $thirdCat = CategoriesModel::where('third_category',$third_category)->first();

         if(empty($mainCat->id)){
            return Redirect::to('404');
         }

         if(empty($secondCat->id)){
            return Redirect::to('404');
         }

         if(empty($thirdCat->id)){
            return Redirect::to('404');
         }
        
            
        //get product id
        $product_id = Products::where('name',$product_name)->first();


        if(empty($product_id->id)){
            return Redirect::to('404');
         }



        if($product_id->item_status!="Available"){

            return Redirect::to('/');
        }
        else{
           
           

            $viewed = Session::get('viewed_pages', []);
            if(!in_array($product_id->id, $viewed)){
                Products::where('id', $product_id->id)
                ->update([
                 'view_count'=> DB::raw('view_count+1'), 
                  ]);
            Session::push('viewed_pages', $product_id->id);
            }
        }

        
        

        


       
       
        $product = Products::where([['main_category_id', '=', $mainCat->id],['second_category_id', '=', $secondCat->id],['third_category_id', '=', $thirdCat->id],['id', '=', $product_id->id],['item_status','=','Available']])->first();

        $related_products = DB::select("SELECT * FROM products WHERE third_category_id='$thirdCat->id' AND item_status = 'Available' ORDER BY created_at DESC");
         
        $comments_reviews = CommentReview::where('product_id','=', $product_id->id)->orderBy('created_at','DESC')->paginate(10);
        $comments_reviews_count = CommentReview::where('product_id','=', $product_id->id)->count();
        
        $sideBarCategories = CategoriesModel::select('*')->where('main_category','<>','')->take(10)->orderBy('main_category')->get();

        return view('product',['product'=>$product,'mainCat'=>$mainCat, 'secondCat'=>$secondCat, 'thirdCat'=>$thirdCat, 'related_products'=>$related_products,'sideBarCategories'=>$sideBarCategories,'comments_reviews'=>$comments_reviews,'comments_reviews_count'=>$comments_reviews_count])
        ->with('i', (request()->input('page', 1) - 1) * 5);

    }







    //product link from main category
    public function productMainCategory($main_category, $product_name, Request $request)
    {

        //replace dash '-' with space " "
        $main_category = str_replace('-',' ',$main_category);
         //replace dash '-' with space " "

      

         //replace dash '-' with space " "
         $product_name = str_replace('-',' ',$product_name);
        //replace dash '-' with space " "

        $mainCat = CategoriesModel::where('main_category',$main_category)->first();
        
        if(empty($mainCat->id)){
            return Redirect::to('404');
         }

         
            
        //get product id
        $product_id = Products::where('name',$product_name)->first();

        if(empty($product_id->id)){
            return Redirect::to('404');
         }



        if($product_id->item_status!="Available"){

            return Redirect::to('/');
        }
        else{
           
           

            $viewed = Session::get('viewed_pages', []);
            if(!in_array($product_id->id, $viewed)){
                Products::where('id', $product_id->id)
                ->update([
                 'view_count'=> DB::raw('view_count+1'), 
                  ]);
            Session::push('viewed_pages', $product_id->id);
            }
        }
        


        $product = Products::where([['main_category_id', '=', $mainCat->id],['second_category_id', '=', ''],['third_category_id', '=', ''],['id', '=', $product_id->id],['item_status','=','Available']])->first();

        $related_products = DB::select("SELECT * FROM products WHERE main_category_id='$mainCat->id' AND second_category_id IN ('') AND third_category_id IN ('') AND item_status = 'Available' ORDER BY created_at DESC");
         

        $comments_reviews = CommentReview::where('product_id','=', $product_id->id)->orderBy('created_at','DESC')->paginate(10);
        $comments_reviews_count = CommentReview::where('product_id','=', $product_id->id)->count();

        $sideBarCategories = CategoriesModel::select('*')->where('main_category','<>','')->take(10)->orderBy('main_category')->get();

        return view('product_pages.product-from-main-cate',['product'=>$product,'mainCat'=>$mainCat, 'related_products'=>$related_products,'sideBarCategories'=>$sideBarCategories,'comments_reviews'=>$comments_reviews,'comments_reviews_count'=>$comments_reviews_count])
        ->with('i', (request()->input('page', 1) - 1) * 5);

    }
    //product link from main category






    //product link from parent/second category
    public function productSecondCategory($main_category, $second_category, $product_name, Request $request)
    {

        //replace dash '-' with space " "
        $main_category = str_replace('-',' ',$main_category);
         //replace dash '-' with space " "

           //replace dash '-' with space " "
        $second_category = str_replace('-',' ',$second_category);
        //replace dash '-' with space " "


         //replace dash '-' with space " "
         $product_name = str_replace('-',' ',$product_name);
        //replace dash '-' with space " "
        

        $mainCat = CategoriesModel::where('main_category',$main_category)->first();
        $secondCat = CategoriesModel::where('second_category',$second_category)->first();


         if(empty($mainCat->id)){
            return Redirect::to('404');
         }

         if(empty($secondCat->id)){
            return Redirect::to('404');
         }
       
            
        //get product id
        $product_id = Products::where('name',$product_name)->first();


        if(empty($product_id->id)){
            return Redirect::to('404');
         }


        if($product_id->item_status!="Available"){

            return Redirect::to('/');
        }
        else{
           
           

            $viewed = Session::get('viewed_pages', []);
            if(!in_array($product_id->id, $viewed)){
                Products::where('id', $product_id->id)
                ->update([
                 'view_count'=> DB::raw('view_count+1'), 
                  ]);
            Session::push('viewed_pages', $product_id->id);
            }
        }

       
        $product = Products::where([['main_category_id', '=', $mainCat->id],['second_category_id', '=', $secondCat->id],['third_category_id', '=', ''],['id', '=', $product_id->id],['item_status','=','Available']])->first();

        $related_products = DB::select("SELECT * FROM products WHERE main_category_id='$mainCat->id' AND second_category_id IN ('$secondCat->id') AND third_category_id IN ('') AND item_status = 'Available' ORDER BY created_at DESC");
        

        $comments_reviews = CommentReview::where('product_id','=', $product_id->id)->orderBy('created_at','DESC')->paginate(10);
        $comments_reviews_count = CommentReview::where('product_id','=', $product_id->id)->count();

        $sideBarCategories = CategoriesModel::select('*')->where('main_category','<>','')->take(10)->orderBy('main_category')->get();

        return view('product_pages.product-from-second-cate',['product'=>$product,'mainCat'=>$mainCat, 'secondCat'=>$secondCat, 'related_products'=>$related_products,'sideBarCategories'=>$sideBarCategories,'comments_reviews'=>$comments_reviews,'comments_reviews_count'=>$comments_reviews_count])
        ->with('i', (request()->input('page', 1) - 1) * 5);

    }
    //product link from parent/second category


   

}
