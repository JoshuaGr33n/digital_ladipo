<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\CategoriesModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Redirect;
use DB;




class TestController extends Controller
{

  
  



    // public function secondCategories(Request $request)
    // {

    //     $categories = DB::select('select * FROM categories ORDER BY created_at DESC');
    //     return view('second_categories',['categories'=>$categories])
    //     ->with('i', (request()->input('page', 1) - 1) * 5);

    // }


    public function thirdCategories($second_category, Request $request)
    {
         //replace dash '-' with space " "
        $second_category = str_replace('-',' ',$second_category);
         //replace dash '-' with space " "

        $secondCat = CategoriesModel::where('second_category',$second_category)->first();

        $categories = DB::select('select * FROM categories WHERE second_category_id='.$secondCat->id.' ORDER BY created_at DESC');
        return view('third_categories',['categories'=>$categories,'secondCat'=>$secondCat])
        ->with('i', (request()->input('page', 1) - 1) * 5);

    }



    
}