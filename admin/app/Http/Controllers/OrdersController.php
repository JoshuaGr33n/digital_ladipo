<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;


use App\OrdersModel;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Redirect;
use DB;
use App\Customers;
use Mail;

class OrdersController extends Controller
{
   

    /**
     * Display the specified resource.
     *
     * @param  \App\OrdersModel  $Orders
     * @return \Illuminate\Http\Response
     */
    public function show($order_id, Request $request)
    {
        
           // check if url Id exist
           $check = OrdersModel::where('order_id', $order_id)->first();
           if (!$check) {
             return Redirect::to('orders');
                 }

                
             

        $Orders = OrdersModel::find($check->id);
        return view('view_order',compact('Orders'));
            
    
    }

   









    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrdersModel  $Orders
     * @return \Illuminate\Http\Response
     */
    public function update($order_id, Request $request)
    {

       
        // $order = OrdersModel::find($order_id);
        $order = OrdersModel::where('order_id', $order_id)->first();
        $customer = Customers::where('id', $order->customer_id)->first();
        // $customer = DB::select("SELECT * FROM users WHERE id = '$order->customer_id'");

        // $Orders->delivery_status = request('delivery');
        // $Orders->payment_status = request('payment');
        $Orders = OrdersModel::where('order_id', $order_id)->update(['payment_status'=>request('payment'),'delivery_status'=>request('delivery')]);
        // $Orders->save();
        // $this->validate($request,[
            
        //     'delivery' => 'required',
        //     'payment' => 'required',
         
        //  ]);
        // $Orders->update($request->all());
       
        if($Orders)
        {  
          if(request('payment')=='Paid' && request('delivery')=='Delivered'){
              
            if($order->delivery_status=="Pending" && $order->payment_status=="Pending"){
              $order_items = OrdersModel::select('*')->where('order_id','=',$order_id)->orderBy('order','DESC')->get();
              $order_detail = OrdersModel::select('*')->where('order_id','=',$order_id)->first();
            Mail::send('email-messages.delivery-complete-message', ['order_items' => $order_items,'order_detail' => $order_detail,'fname' =>$customer->fname, 'lname' => $customer->lname,'order_id' => $order_id,  'phone' => $order->phone, 'email' => $order->email,'payment_method' => $order->payment_method], function($message) use($request,$order){
               
                $message->to($order->email);
                $message->from('joshua@doshservices.com');
                $message->subject('From Digital Ladipo:: Delivery Completed');
      
           });
          }
          }

         


        }

  
        return Redirect::to('order_data/'.$order_id)
                        ->with('success','Item updated successfully');
    }








    
   
}