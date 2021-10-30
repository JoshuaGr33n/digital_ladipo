<?php 

namespace App\Http\Controllers; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\AuthAccessAuthorizesResources;
use Illuminate\Html\HtmlServiceProvider;
use Illuminate\Http\Request;
use App\CustomerAccountModel;
use Illuminate\Support\Facades\Hash;
use Redirect;
use View;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\OrdersModel;
use Mail; 

class CustomerAccountController extends Controller { 

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    

    




       public function createAccount(Request $request) { 
        $messages = [
          'fname.required' => 'First name is required',
          'lname.required' => 'Last name is required',
          'phone.required' => 'Phone is required',
          'phone.unique' => 'Phone number already taken',
          'phone.min' => 'Phone must be 11 digits',
          'phone.max' => 'Phone must be 11 digits',
          'email.required' => 'Email is required',
          'email.email' => 'Invalid email',
          'email.required_with' => 'Email doesnt match',
          'email.unique' => 'Email already taken',
          'retype_email.required' => 'Required',
          'retype_email.same' => 'Email doesnt match',
          'password.min' => 'Password must be atleast 6 digits',
          'password.required' => 'Required',
          'retype_password.required' => 'Required',
          'retype_password.same' => 'Password doesnt match',

      ];
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'gender' => 'required',
            'phone' => 'required|unique:users|min:11|max:11',
            'email' => 'required|email|required_with:retype_email|unique:users',
            'retype_email' => 'required|same:email',
            'password' => 'required|min:6|required_with:retype_password',
            'retype_password' => 'required|same:password'
            
        ],$messages);

         $create_acct = new CustomerAccountModel;

         $check_email =  DB::select("select * FROM users WHERE email='$request->email'");
         $check_phone=  DB::select("select * FROM users WHERE phone='$request->phone'");
         if ($check_email) {
          return back()->with('email_duplicate_error', 'Email already belong to another User!');
          // return response()->json(['email_duplicate_error'=> 'Email already belong to another User!']);
         }
         if ($check_phone) {
          return back()->with('phone_duplicate_error', 'Phone Number already belong to another User!');
         }
        
  
        $create_acct->fname = $request->fname;
        $create_acct->lname = $request->lname;
        $create_acct->gender = $request->gender;
        $create_acct->phone = $request->phone;
        $create_acct->email = $request->email;
        $create_acct->password = \Hash::make($request->password);
      
        Mail::send('email-messages.sign-up-suc-message', ['fname' => $request->fname, 'lname' => $request->lname,'phone' => $request->phone, 'email' => $request->email], function($message) use($request){
          $message->to($request->email);
          $message->from('joshua@doshservices.com');
          $message->subject('From Digital Ladipo');

        });

       


        $create_acct->save();

       

       
        return response()->json([ 'success'=> 'Registration Successful!']);
        // $arr = array('msg' => 'Something goes to wrong. Please try again lator', 'status' => false);
        // if($check){ 
        // $arr = array('msg' => 'Successfully submit form using ajax', 'status' => true);
        // }
        // return Response()->json($arr);
        
            // return back()->with('success', 'Registration Successful!');
           
       
       

    }

  


       public function showProfilePage()
       {
        if (!Auth::check()) {
        return Redirect::to('/');
        }
  
        

        $customer_id=Auth::id();
        $myOrders = DB::select("select * FROM orders WHERE customer_id ='$customer_id' ORDER BY created_at DESC");

        return View::make('customer_profile',['myOrders'=>$myOrders])
        ->with('i', (request()->input('page', 1) - 1) * 5);
         
      
        

    }


    public function updateAccount(Request $request) { 
      if (!Auth::check()) {
        return Redirect::to('/');
    }
    $update_acct = CustomerAccountModel::find(Auth::id());
      $this->validate($request, [
          'fname' => 'required',
          'lname' => 'required',
          'gender' => 'required',
          'phone' => 'required|min:11|max:11',
          'email' => 'required|email',
          'retype_email' => 'required|same:email'
          
      ]);
      $id=Auth::id();

            $check_email =  DB::select("select * FROM users WHERE email='$request->email' AND id NOT IN('$id')");
            $check_phone=  DB::select("select * FROM users WHERE phone='$request->phone' AND id NOT IN('$id')");
             if ($check_email) {
              // return back()->with('email_duplicate_error', 'Email already belong to another User!');
              return response()->json([ 'email_duplicate_error'=> 'Email already belong to another User!']);
             }
             if ($check_phone) {
              // return back()->with('phone_duplicate_error', 'Phone Number already belong to another User!');
              return response()->json([ 'phone_duplicate_error'=> 'Phone Number already belong to another User!']);
             }

      $update_acct->fname = $request->fname;
      $update_acct->lname = $request->lname;
      $update_acct->gender = $request->gender;
      $update_acct->phone = $request->phone;
      $update_acct->email = $request->email;
      


      $update_acct->save();

     
      $update_acct->update($request->all());

        // return back()->with('success', 'Profile Updated!');
        return response()->json([ 'update_success'=> 'Profile Updated!']);
     

  }





    public function updateAddress(Request $request) { 
       if (!Auth::check()) {
            return Redirect::to('/');
        }
      $updateAddress = CustomerAccountModel::find(Auth::id());
      $this->validate($request,[
        'address' => 'required',
       
     ]);
     
            $updateAddress->address = request('address');
            $updateAddress->save();
      
            $updateAddress->update($request->all());
   
            // return back()->with('success', 'Address Updated');
            return response()->json([ 'address_update_success'=> 'Address Updated']);
     

  }






  public function changePassword(Request $request) { 
    if (!Auth::check()) {
         return Redirect::to('/');
     }
     $rules = array(
      'old_password'    => 'required|min:6', 
      'new_password' => 'required|min:6',
      'confirm_new_password' => 'same:new_password' 
    );
  
    $validator = $this->validate($request, $rules);
    // $validator = Validator::make(Request::all(), $rules);
  
  
    // if ($validator->fails()) {
    //   return Redirect::to('my-profile')
    //       ->withErrors($validator); 
    // } else {
  
      
      $userdata = array(
          'email'     => Auth::user()->email,
          'password'  =>request('old_password')
      );
     
      if (Auth::attempt($userdata)) {
              $changePassword = CustomerAccountModel::find(Auth::id());
              $changePassword->password = \Hash::make(request('new_password'));
              $changePassword->save();
        
              $changePassword->update($request->all());
     
              // return back()->with('success', 'Password Changed');
              return response()->json([ 'success'=> 'Password Changed!']);
  
      } else {        
  
        
            //  return back()->with('incorrect_password', 'Old Password Incorrect');
            return response()->json([ 'incorrect_password'=> 'Old Password Incorrect']);
  
      }
  
  
  

}



    public function customerProfile()
    {
       
  
        return View::make('customer-profile');

      }




    public function myOrders()
    {
      if (!Auth::check()) {
        return Redirect::to('/');
      }
    
      $customer_id=Auth::id();
      $myOrders = DB::select("select * FROM orders WHERE customer_id ='$customer_id' ORDER BY created_at DESC");
       
      return view('customer_profile',['myOrders'=>$myOrders])
      ->with('i', (request()->input('page', 1) - 1) * 5);
      
  
    }


    public function myOrder_items($order_id, Request $request)
    {
      if (!Auth::check()) {
        return Redirect::to('/');
     }
           // check if url Id exist
           $check = OrdersModel::where('order_id', $order_id)->first();
           if (!$check) {
             return Redirect::to('orders');
                 }

                 if(empty($order_id)){
                  return Redirect::to('orders');
                 }

                 $order = OrdersModel::find($check->id);
        return view('order_items',compact('order'));
            
    
    }




    public function myOrdersPage()
    {
      if (!Auth::check()) {
        return Redirect::to('/');
     }
    
      $customer_id=Auth::id();
      // $myOrders = DB::select("SELECT payment_method, order_id,payment_status,delivery_status, MAX(created_at) AS order_date, SUM(quantity) AS total_quantity FROM orders WHERE customer_id ='$customer_id' GROUP BY order_id,payment_method,payment_status,delivery_status ORDER BY order_date DESC");
      
      $myOrders = OrdersModel::select([DB::raw("SUM(quantity) AS total_quantity"), DB::raw("MAX(created_at) AS order_date"),'payment_method', 'order_id','payment_status','delivery_status'])->where('customer_id',$customer_id)->groupby('order_id','payment_method','payment_status','delivery_status')->orderby('order_date', 'DESC')->paginate(10);
       
      return view('my-orders',['myOrders'=>$myOrders])
      ->with('i', (request()->input('page', 1) - 1) * 10);
      
  
    }
  

    
}