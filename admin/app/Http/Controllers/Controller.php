<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\AuthAccessAuthorizesResources;
use Illuminate\Html\HtmlServiceProvider;
use Request;


use App\Admin;
use View;

use Redirect;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    public function showAdmin()
    {
       
        if (Auth::check()) {
            return Redirect::to('dashboard');
        }
        
        // show the form
        return View::make('admin');

     
    }
    






    public function doLogin()
    {
   
 $rules = array(
    'email'    => 'required|email', 
    'password' => 'required|alphaNum|min:6' 
  );

  
  $validator = Validator::make(Request::all(), $rules);

  
  if ($validator->fails()) {
    return Redirect::to('admin')
        ->withErrors($validator) 
        ->withRequest(Request::except('password')); 
  } else {

   
    $userdata = array(
        'email'     => Request::get('email'),
        'password'  => Request::get('password')
    );

    // attempt to do the login
    if (Auth::attempt($userdata)) {

        

        $user = Auth::user();
       
      

        
        // $userInfo = Admin::find(Auth::id());
        // return View::make('admin_landing')->with('userInfo',$userInfo);
        
        return redirect()->intended('dashboard');
        
        
       

        

    } else {        

        // validation not successful, send back to form 
        return Redirect::to('admin')->with('login_error','Login Details Incorrect');

    }

     }
    }



    



   


   


    public function doLogout()
      {
    Auth::logout(); // log the user out of our application
    // Session::flush();
    return Redirect::to('admin'); // redirect the user to the login screen
    
    }





 public function customers(Request $request)
    {
        $customers = DB::select('select * FROM users ORDER BY created_at DESC');
        return view('customers',['customers'=>$customers])
        ->with('i', (request()->Request('page', 1) - 1) * 5);
    }
 





}
