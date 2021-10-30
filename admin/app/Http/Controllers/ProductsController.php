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


use Storage;
use View;
use Input;
use Redirect;
use Illuminate\Support\Facades\Auth;

use DB;
use App\CategoriesModel;
use App\Products;
use App\OrdersModel;
use App\Brands;

class ProductsController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    
    

    
    
    
    public function addProducts(Request $request)
    {
        
     // Fetch main categories
     $mainCategoriesData['data'] = CategoriesModel::orderby("main_category","asc")
     ->select('id','main_category')
     ->get();


     $car_brands = Brands::select('*')->where('category','=','Car')->orderby("name","ASC")->get();
     $part_brands = Brands::select('*')->where('category','=','Part')->orderby("name","ASC")->get();
      // Load index view
     // return view('user')->with("departmentData",$departmentData);

          return View::make('add-products',['car_brands'=>$car_brands,'part_brands'=>$part_brands])->with("mainCategoriesData",$mainCategoriesData);
             
       
    }

     // Fetch records
     public function getSecondCategories($main_category_id=0){

        $main_category_id = str_replace('',',',$main_category_id);

        $categories = DB::select("select * FROM categories WHERE main_category_id IN('$main_category_id')");

         foreach($categories as $category) {        
    	// Fetch second categries by main_category_id
        $second_category['data'] = CategoriesModel::orderby("second_category","asc")
        			->select('id','second_category')->where('second_category','<>','')
        			->whereIN('main_category_id', array($category->main_category_id))
        			->get();
          
  
        return response()->json($second_category);
         }
        
     
    }


    // Fetch records
    public function getThirdCategories($second_cate_id=0){

    	//Fetch third categories by second_category_id
        $third_cate['data'] = CategoriesModel::orderby("third_category","asc")
        			->select('id','third_category')
        			->where('second_category_id',$second_cate_id)
        			->get();
  
        return response()->json($third_cate);
     
    }



    public function storeProducts(Request $request)
    {

        $name = $request->get('name');
        $main_cate = $request->get('main_cate');

        $second_cate = $request->get('second_cate');
        $third_cate = $request->get('third_cate');
        $car_brand = $request->get('car_brand');
        $part_brand = $request->get('part_brand');
        $price = $request->get('price');
        $old_price = $request->get('old_price');
        $quantity = $request->get('quantity');
        $description = $request->get('description');
        $slider = $request->get('slider');
        $featured = $request->get('featured');
        $special = $request->get('special');
        $banner = $request->get('banner');

        if($slider){
            $slider="Yes";
        }
        else{
            $slider="No";
        }


        if($featured){
            $featured="Yes";
        }
        else{
            $featured="No";
        }


        if($special){
            $special="Yes";
        }
        else{
            $special="No";
        }


        if($banner){
            $banner="Yes";
        }
        else{
            $banner="No";
        }
        //replace space ' ' with underscore '_'
        $str_name = str_replace(' ','_',$request->get('name'));
         //replace space ' ' with underscore '_'
       

                $slider_pic_url = "";
                if ($request->hasFile('slider_pic')){

                    if ($request->file('slider_pic')->isValid()) {
                        $this->validate($request,[
                            
                          'slider_pic' => 'required|mimes:jpeg,png|max:5014',
                      ]);

                      $slider_extension = $request->slider_pic->extension();
                      $request->slider_pic->storeAs('products_img', $str_name."_slider.".$slider_extension);
                      $slider_pic_url = Storage::url('app/products_img/'.$str_name."_slider.".$slider_extension);
                    }


                }


        if ($request->hasFile('image1')) {
            
            if ($request->file('image1')->isValid()) {





                $url2 = "";
                if ($request->hasFile('image2')){

                    if ($request->file('image2')->isValid()) {
                        $this->validate($request,[
                            
                          'image2' => 'mimes:jpeg,png|max:5014',
                      ]);

                      $extension2 = $request->image2->extension();
                      $request->image2->storeAs('products_img', $str_name."2.".$extension2);
                      $url2 = Storage::url('app/products_img/'.$str_name."2.".$extension2);
                    }


                }



                //
                $this->validate($request,[
                      'name' => 'required|exists:products',
                     'main_cate' => 'required',
                    //  'second_cate' => 'required',
                    //  'third_cate' => 'required',
                    'car_brand' => 'required',
                    'part_brand' => 'required',
                      'price' => 'required',
                      'old_price' => '',
                      'quantity' => 'required',
                     'description' => 'required',
                     'item_status' => '',
                    'image1' => 'mimes:jpeg,png|max:5014',
                ]);
                $extension = $request->image1->extension();
                $request->image1->storeAs('products_img', $str_name."1.".$extension);
                $url = Storage::url('app/products_img/'.$str_name."1.".$extension);

                //check duplicate entries
                $check = Products::where('name', request('name'))->first();
                if ($check) {
                 return Redirect::to('add-products')
                ->with('duplicateERROR','Item already exist.');
                     }

                else{
                    $main_category = implode(", ", $request->get('main_cate'));

                    if($request->get('second_cate')){
                    $second_category = implode(", ", $request->get('second_cate'));
                    }
                    else{
                        $second_category = "";
                    }
                    if($request->get('third_cate')){
                        $third_category = implode(", ", $request->get('third_cate'));
                    }else{
                        $third_category = "";
                    }
                   
                    $Products = Products::create([
    
                    'pic_1' => $url,
                    'pic_2' => $url2,
                    'slider_pic' => $slider_pic_url,
                    'name' => request('name'),
                    'main_category_id' => $main_category,
                    'second_category_id' => $second_category,
                    'third_category_id' => $third_category,
                    'car_brand_id' => $car_brand,
                    'part_brand_id' => $part_brand,
                    'price' => request('price'),
                    'old_price' => request('old_price'),
                    'quantity' => $quantity,
                    'description' => request('description'), 
                    'slider' => $slider,
                    'featured' => $featured,
                    'special_offer' => $special,
                    'banner' => $banner,
                    'view_count' => 0,
                   
                ]);
               }
              
            }
        }


        else{
         

          $this->validate($request,[
                     'name' => 'required|exists:products',
                     'main_cate' => 'required',
                    //  'second_cate' => 'required',
                    //  'third_cate' => 'required',
                    'car_brand' => 'required',
                    'part_brand' => 'required',
                      'price' => 'required',
                      'old_price' => '',
                      'quantity' => 'required',
                     'description' => 'required',
                     'item_status' => '',

            
            
         ]);

         //check duplicate entries
         $check = Products::where('name', request('name'))->first();
         if ($check) {
            return Redirect::to('add-products')
            ->with('duplicateERROR','Item already exist.');
         }
         else{
            // Products::create($request->all());
                    $main_category = implode(", ", $request->get('main_cate'));
                   if($request->get('second_cate')){
                    $second_category = implode(", ", $request->get('second_cate'));
                    }
                    else{
                        $second_category = "";
                    }
                    if($request->get('third_cate')){
                        $third_category = implode(", ", $request->get('third_cate'));
                    }else{
                        $third_category = "";
                    }
            $Products = Products::create([
                'name' => request('name'),
                'main_category_id' => $main_category,
                'second_category_id' => $second_category,
                'third_category_id' => $third_category,
                'car_brand_id' => $car_brand,
                'part_brand_id' => $part_brand,
                'price' => request('price'),
                'old_price' => request('old_price'),
                'quantity' => $quantity,
                'description' => request('description'), 
                'slider' => $slider,
                'featured' => $featured,
                'special_offer' => $special,
                'banner' => $banner,
                'item_status' => 'Available',
                'slider_pic' => $slider_pic_url,
                'view_count' => 0,
             
          ]);
         }
        
        }


        return Redirect::to('add-products')
                        ->with('success','Item added successfully.');


    }



    public function productItem($id, Request $request)
    {
        

           // check if url Id exist
            $check = Products::where('id', $id)->first();
            if (!$check) {
              return Redirect::to('products');
                  }

        $Products = Products::find($id);
        $main_cat = CategoriesModel::find($Products->main_category_id);
        $second_cat = CategoriesModel::find($Products->second_category_id);
        $third_cat = CategoriesModel::find($Products->third_category_id);

        $car_brand = Brands::find($Products->car_brand_id);
        $part_brand = Brands::find($Products->part_brand_id);


        return view('product-item',compact('Products','main_cat','second_cat','third_cat','car_brand','part_brand'));

    }

    public function updateItemStatus($id, Request $request)
    {
        $item_id= $id;
        $Products = Products::find($item_id);
        $Products->item_status= request('item_status');
        $Products->save();
        // $this->validate($request,[
        //     'item_status' => 'required',

        //  ]);
        $Products->update($request->all());
  
        return Redirect::to('product/'.$item_id)
                        ->with('success','Item updated successfully');
    }

    public function itemOrderHistory($id, Request $request)
    {
        $Product = Products::find($id);
        $itemOrders = OrdersModel::latest()->paginate(5);
        $itemOrders = $itemOrders->where('item_id', $id);

        return view('item_order_history',compact('itemOrders', 'Product'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function backItemOrderHistory($id, Request $request)
    {
   
        return Redirect::to('product/'.$id);
    }


     
   


    public function editProducts($id, Request $request)
    {
        
     // Fetch main categories
     $mainCategoriesData['data'] = CategoriesModel::orderby("main_category","asc")
     ->select('id','main_category')
     ->get();

     $Products = Products::find($id);

     $car_brands = Brands::select('*')->where('category','=','Car')->orderby("name","ASC")->get();
     $part_brands = Brands::select('*')->where('category','=','Part')->orderby("name","ASC")->get();


          return View::make('edit-products',['Products'=>$Products,'car_brands'=>$car_brands,'part_brands'=>$part_brands])->with("mainCategoriesData",$mainCategoriesData);
             
       
    }

     // Fetch records
     public function getSec(Request $request){
      if($request->get('country')){
        $country = request('country');
     
     // Define country and city array
     $countryArr = array(
                    "usa" => array("New Yourk", "Los Angeles", "California"),
                    "india" => array("Mumbai", "New Delhi", "Bangalore"),
                    "uk" => array("London", "Manchester", "Liverpool")
                );
     
     // Display city dropdown based on country name
     if($country !== ''){
        echo "<label>City:</label>";
        echo "<select>";
        foreach($countryArr[$country] as $value){
            echo "<option>". $value . "</option>";
        }
        echo "</select>";
     }
    } 
        
     
    }


     // Fetch records
     public function geteditSecondCategories($main_category_id=1){

        // $main_category_id = str_replace('',',',$main_category_id);

        $categories = DB::select("select * FROM categories WHERE main_category_id=1");

         foreach($categories as $category) {        
    	// Fetch second categories by main_category_id
        $second_category['data'] = CategoriesModel::orderby("second_category","asc")
        			->select('id','second_category')->where('second_category','<>','')
        			->whereIN('main_category_id', array($category->main_category_id))
        			->get();
          
  
        return response()->json($second_category);
         }
        
     
    }


    // Fetch records
    public function geteditThirdCategories($second_cate_id=0){

    	// Fetch third categories by second_category_id
        $third_cate['data'] = CategoriesModel::orderby("third_category","asc")
        			->select('id','third_category')
        			->where('second_category_id',$second_cate_id)
        			->get();
  
        return response()->json($third_cate);
     
    }









    public function updateProductItem($id, Request $request)
    {   
        // $category = $request->get('categoryHidden');
        // if($request->get('category')){
        //  $category = implode(', ', $request->get('category'));
        //  $category =   rtrim($category, ',');
        // }
        // $special = $request->get('special');
        $slider = $request->get('slider');
        $featured = $request->get('featured');
        $special = $request->get('special');
        $banner = $request->get('banner');

        if($slider){
            $slider="Yes";
        }
        else{
            $slider="No";
        }


        if($featured){
            $featured="Yes";
        }
        else{
            $featured="No";
        }


        if($special){
            $special="Yes";
        }
        else{
            $special="No";
        }


        if($banner){
            $banner="Yes";
        }
        else{
            $banner="No";
        }

        
        $Products = Products::find($id);
        
        if ($request->hasFile('image1')) {
          
            if ($request->file('image1')->isValid()) {


                $this->validate($request,[
                    
                    'image1' => 'mimes:jpeg,png|max:10014',
                ]);
                $extension1 = $request->image1->extension();
                $request->image1->storeAs('products_img/', $id."1.".$extension1);
                $url = Storage::url('app/products_img/'.$id."1.".$extension1);
                $Products->pic_1 = $url;
                
                
            }
        }

        if ($request->hasFile('image2')){

            if ($request->file('image2')->isValid()) {
                $this->validate($request,[
                    
                  'image2' => 'mimes:jpeg,png|max:5014',
                 
              ]);

              $extension2 = $request->image2->extension();
              $request->image2->storeAs('products_img',  $id."2.".$extension2);
              $url2 = Storage::url('app/products_img/'. $id."2.".$extension2);

             
                 $Products->pic_2 = $url2;
                $Products->save();
            }


        }

        // $slider_pic_url = "";
        if ($request->hasFile('slider_pic_edit')){

            if ($request->file('slider_pic_edit')->isValid()) {
                $this->validate($request,[
                    
                  'slider_pic_edit' => 'required|mimes:jpeg,png|max:5014',
              ]);

              $slider_extension = $request->slider_pic_edit->extension();
              $request->slider_pic_edit->storeAs('products_img', $id."_slider.".$slider_extension);
              $slider_pic_url = Storage::url('app/products_img/'. $id."_slider.".$slider_extension);

              $Products->slider_pic = $slider_pic_url;
              $Products->save();
            }


        }

        $this->validate($request,[
          'name' => 'required',
          'car_brand' => 'required',
          'part_brand' => 'required',
          'price' => 'required',
          'quantity' => 'required',
          'description' => 'required',
         
       ]);
      
      

   
       
    
             //check duplicate entries
           $check =  DB::select("select * FROM products WHERE name='$request->name' AND id NOT IN('$id')");
           if ($check) {
               return Redirect::to('edit-product/'.$id)->with('duplicateERROR','Item Name already exist. Name should be unique');
             }else{
        
              $Products->name = request('name');
            //   $Products->category = $category;
              $Products->price = request('price');
              $Products->old_price = request('old_price');
              $Products->quantity =  request('quantity');
              $Products->description = request('description');
              $Products->car_brand_id = request('car_brand');
              $Products->part_brand_id =  request('part_brand');
              $Products->slider= $slider;
              $Products->featured= $featured;
              $Products->special_offer= $special;
              $Products->banner= $banner;
            //   $Products->slider_pic = 'kk';
              $Products->save();
             }

        
                   $Products->update($request->all());
                 
     
        return Redirect::to('edit-product/'.$id)->with('success','Item updated successfully');
    }


    public function deleteProductItem($id, Request $request)
    {
     
        
        DB::table('products')->where('id', request('sno'))->delete();
  
        return Redirect::to('products')->with('delete_success','Record deleted successfully');
    }

    
   

}
