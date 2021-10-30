<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\CategoriesModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Redirect;
use DB;




class CategoriesController extends Controller
{

  
    public function storeMainCategory(Request $request)
    {
        $category = request('category_name');
        $category = strtolower($category);
        $this->validate($request,[
            'category_name' => 'required',
        ]);
        //check for duplicate
        $check = CategoriesModel::where('main_category',$category)->first();
        if ($check) {
            return Redirect::to('categories')
            ->with('duplicate_err',$category.' already exist.');
            }
        else{
            CategoriesModel::create([
            'main_category' => $request->category_name
           
        ]);
       }

        return Redirect::to('categories')
        ->with('success',$category.' added successfully.');

      
    }



    public function deleteMainCategory($id, Request $request)
    {
     
        CategoriesModel::find($id)->delete();

        // DB::delete("DELETE FROM menu WHERE id='$id'");
        // DB::table('sekai_menu')->where('id', request('sno'))->delete();
  
        return Redirect::to('categories')->with('delete_success','Category deleted successfully');
    }

    public function updateMainCategory($id, Request $request)
    {
        $category = request('category_name');
        $category = strtolower($category);
     //check for duplicate
     $check = DB::select("SELECT * FROM categories WHERE main_category='$category' AND id NOT IN('$id')");
     if ($check) {
         return Redirect::to('categories')
         ->with('duplicate_err',$category.' already exist.');
         }
     else{
        $CategoryData = CategoriesModel::find($id);


       ///update products
        // $check_menu_category = DB::select("SELECT * FROM sekai_menu WHERE category like '%$CategoryData->category%'");
        // if($check_menu_category){
        //       DB::update("UPDATE sekai_menu SET category = REPLACE(category,'$CategoryData->category','$category')");
        // }
        ///update products

        $this->validate($request,[
            'category_name' => 'required',

         ]);
        $CategoryData->main_category= $category;

        $CategoryData->save();
        
        $CategoryData->update($request->all());


        }


       
        return Redirect::to('categories')
                        ->with('update_success','Category updated successfully');
                       
    }









    public function secondCategories($main_category, Request $request)
    {
         //replace dash '-' with space " "
        $main_category = str_replace('-',' ',$main_category);
         //replace dash '-' with space " "

        $mainCat = CategoriesModel::where('main_category',$main_category)->first();


        if(empty($mainCat->id)){
            return Redirect::to('dashboard');
         }


        $categories = DB::select("SELECT * FROM categories WHERE main_category_id=".$mainCat->id." AND id NOT IN ('$mainCat->id') AND second_category_id ='' ORDER BY created_at DESC");
        return view('second_categories',['categories'=>$categories,'mainCat'=>$mainCat])
        ->with('i', (request()->input('page', 1) - 1) * 5);

    }


    public function secondCategoriesStore(Request $request)
    {

        $category = request('category_name');
        $main_category = request('main_category');
        $category = strtolower($category);

        $this->validate($request,[
            'category_name' => 'required',
        ]);

        //get main category id
        $mainCat = CategoriesModel::where('main_category',$main_category)->first();



        //check for duplicate
        $check = CategoriesModel::where([['second_category', '=', $category],['main_category_id', '=', $mainCat->id]])->first();
        if ($check) {

             //replace with space " " with dash '-' 
            $main_category = str_replace(' ','-',$main_category);
             //replace with space " " with dash '-' 
            return Redirect::to($main_category)
            ->with('duplicate_err',$category.' already exist under '.$main_category);
            }
        else{
            CategoriesModel::create([
            'main_category_id' => $mainCat->id,
            'second_category' => $category
        ]);

         //update main_category_id in main category row
         $add_main_cat_id = CategoriesModel::find($mainCat->id);

         if(empty($add_main_cat_id->main_category_id)){
         $add_main_cat_id->main_category_id = $mainCat->id;
 
         $add_main_cat_id->save();
         
         $add_main_cat_id->update();
         }
       }

         //replace with space " " with dash '-' 
         $main_category = str_replace(' ','-',$main_category);
         //replace with space " " with dash '-' 

        return Redirect::to($main_category)
        ->with('success',$category.' added successfully.');


    }


    public function deleteSecondCategories(Request $request)
    {
        $main_category = request('main_category');
       
        DB::table('categories')->where('id', request('sno'))->delete();

        
        $mainCat = CategoriesModel::where('main_category',$main_category)->first();
        $check = DB::select("SELECT * FROM categories WHERE main_category_id='$mainCat->id' AND id NOT IN ('$mainCat->id')");
        

         if(count($check)==0){
            //update main_category_id in main category row to empty
        
         $update_main_cat_id = CategoriesModel::find($mainCat->id);
         $update_main_cat_id->main_category_id = '';
 
         $update_main_cat_id->save();
         
         $update_main_cat_id->update();
         
         }

         //replace with space " " with dash '-' 
         $main_category = str_replace(' ','-',$main_category);
         //replace with space " " with dash '-' 
  
        return Redirect::to($main_category)->with('delete_success','Category deleted successfully');
    }


    public function updateSecondCategory(Request $request)
    {
        $category = request('category_name');
        $category = strtolower($category);
        $main_category = request('main_category');
        $id = request('sno');


        //get main category id
        $mainCat = CategoriesModel::where('main_category',$main_category)->first();


     //check for duplicate
     $check = DB::select("SELECT * FROM categories WHERE second_category='$category' AND  main_category_id = '$mainCat->id' AND id NOT IN('$id')");
     if ($check) {
         return Redirect::to('categories')
         ->with('duplicate_err',$category.' already exist.');
         }
     else{
        $CategoryData = CategoriesModel::find($id);


       ///update products
        // $check_menu_category = DB::select("SELECT * FROM sekai_menu WHERE category like '%$CategoryData->category%'");
        // if($check_menu_category){
        //       DB::update("UPDATE sekai_menu SET category = REPLACE(category,'$CategoryData->category','$category')");
        // }
        ///update products

        $this->validate($request,[
            'category_name' => 'required',

         ]);
        $CategoryData->second_category= $category;

        $CategoryData->save();
        
        $CategoryData->update();


        }


       //replace with space " " with dash '-' 
       $main_category = str_replace(' ','-',$main_category);
       //replace with space " " with dash '-' 
        return Redirect::to($main_category)
                        ->with('update_success','Category updated successfully');
                       
    }







    public function thirdCategories($main_category,$second_category, Request $request)
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
            return Redirect::to('dashboard');
         }

         if(empty($secondCat->id)){
            return Redirect::to('dashboard');
         }

        $categories = DB::select('SELECT * FROM categories WHERE main_category_id = '.$mainCat->id.' AND second_category_id='.$secondCat->id.' ORDER BY created_at DESC');
        return view('third_categories',['categories'=>$categories,'mainCat'=>$mainCat, 'secondCat'=>$secondCat])
        ->with('i', (request()->input('page', 1) - 1) * 5);

    }


    public function thirdCategoriesStore(Request $request)
    {

        $category = request('category_name');
        $main_category = request('main_category');
        $second_category = request('second_category');
        $category = strtolower($category);

        $this->validate($request,[
            'category_name' => 'required',
        ]);

        //get main category id
        $mainCat = CategoriesModel::where('main_category',$main_category)->first();

        //get second category id
        $secondCat = CategoriesModel::where('second_category',$second_category)->first();



        //check for duplicate
        $check = CategoriesModel::where([['third_category', '=', $category],['main_category_id', '=', $mainCat->id],['second_category_id', '=', $secondCat->id]])->first();
        if ($check) {

             //replace with space " " with dash '-' 
            $main_category = str_replace(' ','-',$main_category);
             //replace with space " " with dash '-' 

               //replace with space " " with dash '-' 
            $second_category = str_replace(' ','-',$second_category);
            //replace with space " " with dash '-' 

            return Redirect::to($main_category.'/'.$second_category)
            ->with('duplicate_err',$category.' already exist under '.$main_category.'/'.$second_category);
            }
        else{
            CategoriesModel::create([
            'main_category_id' => $mainCat->id,
            'second_category_id' => $secondCat->id,
            'third_category' => $category
        ]);
       }

         //replace with space " " with dash '-' 
         $main_category = str_replace(' ','-',$main_category);
         //replace with space " " with dash '-' 

          //replace with space " " with dash '-' 
          $second_category = str_replace(' ','-',$second_category);
          //replace with space " " with dash '-' 

        return Redirect::to($main_category.'/'.$second_category)
        ->with('success',$category.' added successfully.');


    }


    public function deleteThirdCategories(Request $request)
    {
        $main_category = request('main_category');
        $second_category = request('second_category');
       
        DB::table('categories')->where('id', request('sno'))->delete();


         //replace with space " " with dash '-' 
         $main_category = str_replace(' ','-',$main_category);
         //replace with space " " with dash '-' 

          //replace with space " " with dash '-' 
          $second_category = str_replace(' ','-',$second_category);
          //replace with space " " with dash '-' 
  
        return Redirect::to($main_category.'/'.$second_category)->with('delete_success','Category deleted successfully');
    }



    public function updateThirdCategory(Request $request)
    {
        $category = request('category_name');
        $category = strtolower($category);
        $main_category = request('main_category');
        $second_category = request('second_category');
        $id = request('sno');


        //get main category id
        $mainCat = CategoriesModel::where('main_category',$main_category)->first();

         //get second category id
         $secondCat = CategoriesModel::where('second_category',$second_category)->first();


     //check for duplicate
     $check = DB::select("SELECT * FROM categories WHERE second_category='$category' AND  main_category_id = '$mainCat->id' AND second_category_id = '$secondCat->id' AND id NOT IN('$id')");
     if ($check) {
         return Redirect::to('categories')
         ->with('duplicate_err',$category.' already exist.');
         }
     else{
        $CategoryData = CategoriesModel::find($id);


       ///update products
        // $check_menu_category = DB::select("SELECT * FROM sekai_menu WHERE category like '%$CategoryData->category%'");
        // if($check_menu_category){
        //       DB::update("UPDATE sekai_menu SET category = REPLACE(category,'$CategoryData->category','$category')");
        // }
        ///update products

        $this->validate($request,[
            'category_name' => 'required',

         ]);
        $CategoryData->third_category= $category;

        $CategoryData->save();
        
        $CategoryData->update();


        }


         //replace with space " " with dash '-' 
         $main_category = str_replace(' ','-',$main_category);
         //replace with space " " with dash '-' 

       
          //replace with space " " with dash '-' 
          $second_category = str_replace(' ','-',$second_category);
          //replace with space " " with dash '-' 


        return Redirect::to($main_category.'/'.$second_category)
                        ->with('update_success','Category updated successfully');
                       
    }

    
}