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
use Session;
use Mail;

use App\Products;
use View;
use Input;
use Redirect;
use Auth;
use App\OrdersModel;
use DB;

class CartController extends Controller
{
    

    public function cart()
    {
        return view('cart');
    }
    public function addToCart($id, Request $request)
    {
        $product =  Products::find($id);

        if(!$product) {

            abort(404);

        }

        $cart = session()->get('cart');

        if(empty($request->quantity)){
            $request->quantity = 1;
        }

        if($request->quantity == 0){
            $request->quantity = 1;
        }


        

        // if cart is empty then this the first product
        if(!$cart) {
            // $quantity = $request->quantity;

           
            $cart = [
                $id => [
                    "id" => $product->id,
                    "name" => $product->name,
                    "quantity" => $request->quantity,
                    "price" => $product->price,
                    "pic" => $product->pic_1,
                    "main_category_id" => $product->main_category_id,
                    "second_category_id" => $product->second_category_id,
                    "third_category_id" => $product->third_category_id
                ]
            ];

            session()->put('cart', $cart);

            $htmlCart = view('_header_cart')->render();

            return response()->json(['msg' => '<strong>'.$product->name.'</strong> added to cart!', 'data' => $htmlCart]);

            //return redirect()->back()->with('success', 'Item added to cart!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity'] += $request->quantity;

            session()->put('cart', $cart);

            $htmlCart = view('_header_cart')->render();

            return response()->json(['msg' => '<strong>'.$product->name.'</strong> added to cart!', 'data' => $htmlCart]);

            //return redirect()->back()->with('success', 'Item added to cart!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "id" => $product->id,
            "name" => $product->name,
            "quantity" => $request->quantity,
            "price" => $product->price,
            "pic" => $product->pic_1,
            "main_category_id" => $product->main_category_id,
            "second_category_id" => $product->second_category_id,
            "third_category_id" => $product->third_category_id
        ];

        session()->put('cart', $cart);

        $htmlCart = view('_header_cart')->render();

        return response()->json(['msg' => '<strong>'.$product->name.'</strong> added to cart!', 'data' => $htmlCart]);

        //return redirect()->back()->with('success', 'Item added to cart!');
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            $subTotal = $cart[$request->id]['quantity'] * $cart[$request->id]['price'];

            $total = $this->getCartTotal();

            $htmlCart = view('_header_cart')->render();

            return response()->json(['msg' => 'Cart updated successfully', 'data' => $htmlCart, 'total' => $total, 'subTotal' => $subTotal]);

            //session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            $total = $this->getCartTotal();

            $htmlCart = view('_header_cart')->render();

            return response()->json(['msg' => 'Item removed successfully', 'data' => $htmlCart, 'total' => $total]);

            //session()->flash('success', 'Product removed successfully');
        }
    }


    /**
     * getCartTotal
     *
     *
     * @return float|int
     */
    private function getCartTotal()
    {
        $total = 0;

        $cart = session()->get('cart');

        foreach($cart as $id => $details) {
            $total += $details['price'] * $details['quantity'];
        }

        return number_format($total, 2);
    }




    public function redirectToDeliveryPay(Request $request)
    {
       
        

        if ($request->input('payment_method')=="Pay on Delivery") {
            return Redirect::to('pay-on-delivery');
        }
        elseif ($request->input('payment_method')=="Pay Online") {
            return Redirect::to('pay-online');
        }

        return Redirect::to('cart');
    
    }


    public function DeliveryPay(Request $request)
    {

        if (!Auth::check()) {
            return redirect()->intended('login')->with('login_alert', 'You need to Login or SignUp to continue with your purchase');
        }
            return view('pay-on-delivery');
        
      
    }

   
    public function OnlinePay(Request $request)
    {

        if (!Auth::check()) {
            return redirect()->intended('/account')->with('login_alert', 'You need to Login or SignUp to continue with your purchase');
        }
            return view('coming-soon');
        
      
    }


    



    public function submitOrder(Request $request) { 
      
        if(empty($request->input('item_id'))){
            return Redirect::to('cart');
        }

          $this->validate($request,[
            'email' => 'required|email',
            //reg:check if number starts with 0 and followed by 10 numbers
            'phone' => 'required|min:11|max:11|regex:/(0)[0-9]{10}/',
            'address' => 'required',
           
      ]);
        $unique = substr(str_shuffle("0123456789"), 0, 6);
        // $unique = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);
        $check = OrdersModel::where('order_id', $unique)->first();
        
        $count = count($request->input('item_id'));
        if(empty($request->input('note'))){

            $request->input('note', '');
        }
        
        for($i=0; $i < $count; $i++){
        $order = new OrdersModel;
        $order->order = $request->item_name[$i];
        $order->item_id = $request->item_id[$i];
        $order->order_id = $unique;
        // $order->customerFname = Auth::user()->fname;
        // $order->customerLname = Auth::user()->lname;
        $order->customer_id = Auth::id();
        $order->quantity = $request->quantity[$i];
        $order->price = $request->price[$i];
        $order->pic = $request->pic[$i];
        $order->payment_status = $request->input('payment_status');
        $order->payment_method = $request->input('payment_method');
        $order->address =$request->input('address');
        $order->email =$request->input('email');
        $order->phone =$request->input('phone');
        $order->note =$request->input('note');
        $order->save();
        
      }

      if (!$check) {
            $order_items = OrdersModel::select('*')->where('order_id','=',$unique)->orderBy('order','DESC')->get();
            Mail::send('email-messages.order-placed-message', ['order_items' => $order_items, 'count' => $count,'fname' => Auth::user()->fname, 'lname' => Auth::user()->lname,'order_id' => $unique,  'phone' => $request->input('phone'), 'email' => $request->input('email'),'payment_method' => $request->input('payment_method')], function($message) use($request){
            $message->to($request->input('email'));
            $message->from('joshua@doshservices.com');
            $message->subject('From Digital Ladipo:: Order Placement Successful');
  
          });


       
   
      }

        Session::forget('cart');

        return Redirect::to('cart')->with('delivery_success','Order Placement Sucessful.');
        

    }

    public function clearCart(Request $request)
    {

        Session::forget('cart');

        return Redirect::to('cart');
        
      
    }



}