<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Request;
use DB;
use App\Products;
use App\CategoriesModel;
use App\PostsViews;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function login()
    {
        
        return view('login');

    }

    public function contact()
    {
        
   
        return view('contact');

    }



    //for create controller - php artisan make:controller AutocompleteController

   
    

}











