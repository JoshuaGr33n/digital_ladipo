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
use App\Brands;
use App\OrdersModel;


class BrandsController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function add_car_brands(Request $request)
    {

        // $name = $request->get('brand_name');
       
        if ($request->hasFile('image1')) {
            
            if ($request->file('image1')->isValid()) {

                //
                $this->validate($request,[
                      'brand_name' => 'required',
                    'image1' => 'mimes:jpeg,png|max:5014',
                ]);
                $extension = $request->image1->extension();
                $request->image1->storeAs('brands_logo', request('brand_name')."_car.".$extension);
                $url = Storage::url('app/brands_logo/'.request('brand_name')."_car.".$extension);

                //check duplicate entries
                $check = Brands::where([['name', request('brand_name')],['category','Car']])->first();
                if ($check) {
                 return Redirect::to('car-brands')
                 ->with('duplicateERROR',request('brand_name').' already exist.');
                     }

                else{
                   
                   
                    $Brands = Brands::create([
    
                    'logo' => $url,
                    'name' => request('brand_name'),
                    'category' => 'Car',
                   
                ]);
               }
              
            }
        }


        else{
         

          $this->validate($request,[
                     'brand_name' => 'required',
         ]);

         //check duplicate entries
         $check = Brands::where([['name', request('brand_name')],['category','Car']])->first();
         if ($check) {
            return Redirect::to('car-brands')
            ->with('duplicateERROR',request('brand_name').' already exist.');
         }
         else{
            $Brands = Brands::create([
               'name' => request('brand_name'),
                'category' => 'Car',
             
          ]);
         }
        
        }


        return Redirect::to('car-brands')
                        ->with('success', request('brand_name').' added successfully.');


    }



    
  

    


    
    public function edit_car_Brand($id, Request $request)
    {   
       

        
        $Brands = Brands::find($id);
        
        

        if ($request->hasFile('image2')){

            if ($request->file('image2')->isValid()) {
                $this->validate($request,[
                    
                  'image2' => 'mimes:jpeg,png|max:5014',
                 
              ]);

              $extension2 = $request->image2->extension();
              $request->image2->storeAs('brands_logo',  request('brand_name')."_car.".$extension2);
              $url2 = Storage::url('app/brands_logo/'. request('brand_name')."_car.".$extension2);

             
                 $Brands->logo = $url2;
                $Brands->save();
            }


        }

       

        $this->validate($request,[
            'brand_name' => 'required',
         
       ]);
      
    
             //check duplicate entries
           $check =  DB::select("select * FROM brands WHERE name='$request->brand_name' AND category ='Car' AND id NOT IN('$id')");
           if ($check) {
               return Redirect::to('car-brands')->with('duplicateERROR',request('brand_name').' already exist. Name should be unique');
             }else{
                $Brands->name = request('brand_name');
                $Brands->category = 'Car';
                 $Brands->save();
             }
               
                   $Brands->update($request->all());
                 
     
        return Redirect::to('car-brands')->with('success','Brand updated successfully');
    }


    public function delete_car_Brand($id, Request $request)
    {
     
        
        DB::table('brands')->where('id', ($id))->delete();
  
        return Redirect::to('car-brands')->with('delete_success','Brand deleted successfully');
    }









    public function add_part_brands(Request $request)
    {
       
        if ($request->hasFile('image1')) {
            
            if ($request->file('image1')->isValid()) {

                //
                $this->validate($request,[
                      'brand_name' => 'required',
                    'image1' => 'mimes:jpeg,png|max:5014',
                ]);
                $extension = $request->image1->extension();
                $request->image1->storeAs('brands_logo', request('brand_name')."_part.".$extension);
                $url = Storage::url('app/brands_logo/'.request('brand_name')."_part.".$extension);

                //check duplicate entries
                $check = Brands::where([['name', request('brand_name')],['category','Part']])->first();
                if ($check) {
                 return Redirect::to('part-brands')
                 ->with('duplicateERROR',request('brand_name').' already exist.');
                     }

                else{
                   
                   
                    $Brands = Brands::create([
    
                    'logo' => $url,
                    'name' => request('brand_name'),
                    'category' => 'Part',
                   
                ]);
               }
              
            }
        }


        else{
         

          $this->validate($request,[
                     'brand_name' => 'required',
         ]);

         //check duplicate entries
         $check = Brands::where([['name', request('brand_name')],['category','Part']])->first();
         if ($check) {
            return Redirect::to('part-brands')
            ->with('duplicateERROR',request('brand_name').' already exist.');
         }
         else{
            $Brands = Brands::create([
               'name' => request('brand_name'),
                'category' => 'Part',
             
          ]);
         }
        
        }


        return Redirect::to('part-brands')
                        ->with('success', request('brand_name').' added successfully.');


    }


    
    public function edit_part_Brand($id, Request $request)
    {   
       

        
        $Brands = Brands::find($id);
        
        

        if ($request->hasFile('image2')){

            if ($request->file('image2')->isValid()) {
                $this->validate($request,[
                    
                  'image2' => 'mimes:jpeg,png|max:5014',
                 
              ]);

              $extension2 = $request->image2->extension();
              $request->image2->storeAs('brands_logo',  request('brand_name')."_part.".$extension2);
              $url2 = Storage::url('app/brands_logo/'. request('brand_name')."_part.".$extension2);

             
                 $Brands->logo = $url2;
                $Brands->save();
            }


        }

       

        $this->validate($request,[
            'brand_name' => 'required',
         
       ]);
      
    
             //check duplicate entries
           $check =  DB::select("select * FROM brands WHERE name='$request->brand_name' AND category = 'Part' AND id NOT IN('$id')");
           if ($check) {
               return Redirect::to('part-brands')->with('duplicateERROR', request('brand_name').' already exist. Name should be unique');
             }else{
                $Brands->name = request('brand_name');
                $Brands->category = 'Part';
                 $Brands->save();
             }
               
                   $Brands->update($request->all());
                 
     
        return Redirect::to('part-brands')->with('success','Brand updated successfully');
    }


   
    public function delete_part_Brand($id, Request $request)
    {
     
        
        DB::table('brands')->where('id', ($id))->delete();
  
        return Redirect::to('part-brands')->with('delete_success','Brand deleted successfully');
    }

    
   

}
