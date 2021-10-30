<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB;
use App\Products;
use App\CategoriesModel;
use App\PostsViews;

class SearchController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    
    
    function search()
    {
     return view('search');
    }
    // ,['item_status','=','Available']
    function fetch(Request $request)
    {
     if($request->get('query'))
     {
      $query = $request->get('query');
      $data = DB::table('categories')
        ->where([['main_category', 'LIKE', "%{$query}%"]])
        ->get();
      $output = '<ul class="dropdown-menu" style="display:block; position:relative;padding:10px">';
      foreach($data as $row)
      {
       $output .= '
       <li style="border-bottom:1px solid #eee;"><a href="#">'.ucwords($row->main_category).'</a></li>
       <input type = "hidden" value="'.$row->id.'" name ="cat-id"/>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }
    }


    // function search_results(Request $request)
    // {
    //     $search = Products::select('*')->where('main_category_id','=',$request->get('cat-id'))->orderBy('name')->paginate(4);

    //     $sideBarCategories = CategoriesModel::select('*')->where('main_category','<>','')->take(10)->orderBy('main_category')->get();

    //     return view('search-results',['search'=>$search,'sideBarCategories'=>$sideBarCategories])
    //     ->with('i', (request()->input('page', 1) - 1) * 5);
    // }



    // function search_mobile(Request $request)
    // {
    //     $search = Products::select('*')->where('name','=',$request->get('name'))->take(10)->orderBy('name')->get();

    //     $sideBarCategories = CategoriesModel::select('*')->where('main_category','<>','')->take(10)->orderBy('main_category')->get();

    //     return view('search-results',['search'=>$search,'sideBarCategories'=>$sideBarCategories])
    //     ->with('i', (request()->input('page', 1) - 1) * 5);
    // }








    public function autocompleteSearch(Request $request)
    {
          $query = $request->get('query');
          $filterResult = Products::where('name', 'LIKE', '%'. $query. '%')->get();
          return response()->json($filterResult);
    } 



    function search_results(Request $request)
    {

        $search_field = $request->get('search');
        $sortby = $request->get('sortby');

        // $search = Products::select('*')->where([['name', 'LIKE', '%'. $search_field. '%'],['item_status','=','Available']])->orderBy('name','DESC')->paginate(4);

        $sideBarCategories = CategoriesModel::select('*')->where('main_category','<>','')->take(10)->orderBy('main_category')->get();

        

        if($sortby == "2"){
           $search = Products::select('*')->where([['name', 'LIKE', '%'. $search_field.'%'],['item_status','=','Available']])->orderBy('view_count', 'DESC')->paginate(8);
          
           $pagination = $search->appends ( array (
            'sortby' => $sortby,
            'search' => $search_field
             ) );
       }
       elseif($sortby == "3"){
           $search = Products::select('*')->where([['name', 'LIKE', '%'. $search_field. '%'],['item_status','=','Available']])->orderBy('created_at', 'DESC')->paginate(8);
           
           $pagination = $search->appends ( array (
            'sortby' => $sortby,
            'search' => $search_field
             ) );
       }

       elseif($sortby == "4"){
           $search = Products::select('*')->where([['name', 'LIKE', '%'. $search_field. '%'],['item_status','=','Available']])->orderBy('price', 'ASC')->paginate(8);
          
           $pagination = $search->appends ( array (
            'sortby' => $sortby,
            'search' => $search_field
             ) );
       }

       elseif($sortby == "5"){
           $search = Products::select('*')->where([['name', 'LIKE', '%'. $search_field. '%'],['item_status','=','Available']])->orderBy('price', 'DESC')->paginate(8);
          
           $pagination = $search->appends ( array (
            'sortby' => $sortby,
            'search' => $search_field
             ) );
       }
       elseif($sortby == "All"){

           $search = Products::select('*')->where([['name', 'LIKE', '%'. $search_field. '%'],['item_status','=','Available']])->orderBy('name')->paginate(8);
           $pagination = $search->appends ( array (
            'sortby' => $sortby,
            'search' => $search_field
             ) );
          }
       else{

           $search = Products::select('*')->where([['name', 'LIKE', '%'. $search_field. '%'],['item_status','=','Available']])->orderBy('name')->paginate(8);
           $pagination = $search->appends ( array (
            'sortby' => $sortby,
           'search' => $search_field
             ) );
          }

     
        
        return view('search-results',['search_field' => $search_field, 'sortby'=>$sortby,'search'=>$search,'sideBarCategories'=>$sideBarCategories])
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }



}
