@extends('layout')
 @section('title', 'My Orders')
 @section('content') 

 @php 
 use App\CategoriesModel;
 use App\Products;
 use Illuminate\Support\Facades\DB;
 use App\OrdersModel;
 @endphp


 <!--breadcrumbs area start-->
 <div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{url('my-orders')}}">back</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->
                       <div style="margin:auto;margin-bottom:100px">
                            <h3>Order ID: {{$order->order_id}} @if($order->delivery_status=="Cancelled")(<span style="color:red;font-size:20px">Order Cancelled</span>) @endif</h3>
                            <div class="table-responsive">
                            <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Order</th>
                                            <th>Item Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $item_list = OrdersModel::select('*')->where('order_id','=',$order->order_id)->orderBy('created_at')->get();@endphp
                                      @foreach ($item_list as $item)
                                      @php 
                                       $product_item_id = Products::find($item->item_id);
                                      @endphp
                                      @if($product_item_id)
                                      @php 
                                       $order_main_category = CategoriesModel::where('id',$product_item_id->main_category_id)->get();
                                       $order_second_category = CategoriesModel::where('id',$product_item_id->second_category_id)->get();
                                       $order_third_category = CategoriesModel::where('id',$product_item_id->third_category_id)->get();
                                      @endphp

                                    @if(empty($product_item_id->second_category_id) && empty($product_item_id->third_category_id))
                                       @foreach($order_main_category as $order_main_category)
                                       @php $link ='name/name/name/'.str_replace(' ','-',$order_main_category->main_category).'/'.str_replace(' ','-',$product_item_id->name); @endphp
                                       @endforeach
                                    @elseif(empty($product_item_id->third_category_id))
                                       @foreach($order_main_category as $order_main_category)
                                       @foreach($order_second_category as $order_second_category)
                                       @php $link = 'name/name/name/'.str_replace(' ','-',$order_main_category->main_category).'/'.str_replace(' ','-',$order_second_category->second_category).'/'.str_replace(' ','-',$product_item_id->name); @endphp
                                       @endforeach
                                       @endforeach
                                    @else
                                      @foreach($order_main_category as $order_main_category)
                                      @foreach($order_second_category as $order_second_category)
                                      @foreach($order_third_category as $order_third_category)
                                      @php $link = str_replace(' ','-',$order_main_category->main_category).'/'.str_replace(' ','-',$order_second_category->second_category).'/'.str_replace(' ','-',$order_third_category->third_category).'/'.str_replace(' ','-',$product_item_id->name); @endphp
                                      @endforeach
                                      @endforeach
                                      @endforeach
                                    @endif
                                    @endif
                                        <tr>
                                            <td>{{ $item->order}}</td>
                                            <td>₦{{$item->price}}</td>
                                            <td>{{$item->quantity}}</td>
                                            <td>₦{{ $item->price * $item->quantity}} for {{$item->quantity}} items</td>
                                            <td>@if($product_item_id) @if($product_item_id->item_status=='Available')<a href="{{url($link)}}" class="view">view product</a>@endif @endif</td>
                                        </tr>
                                        @endforeach
                                        <!-- <tr>
                                            <td>2</td>
                                            <td>May 10, 2018</td>
                                            <td>Processing</td>
                                            <td>#17.00 for 1 item </td>
                                            <td><a href="cart.html" class="view">view</a></td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>

                            <!--coupon code area start-->
            <div class="coupon_area">
                <div class="row">
                   
                    <div class="col-lg-6 col-md-6">
                        
                        <!-- <div class="coupon_code left">
                            <h3>Coupon</h3>
                            
                            <div class="coupon_inner">
                                 @if(session('cart'))
                                <p>Enter your coupon code if you have one.</p>
                                <input placeholder="Coupon code" type="text">
                                <button type="submit">Apply coupon</button>
                                @endif
                            </div>
                           
                        </div> -->
                       
                    </div>
                   @php $vat = 25.00;@endphp
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code right">
                            <h3>Totals</h3>
                            <div class="coupon_inner">
                                <div class="cart_subtotal">
                                    <p>VAT</p>
                                    <p class="cart_amount">₦{{number_format($vat,2)}}</p>
                                </div>
                                <!-- <a href="#">Calculate shipping</a> -->
                                         <div style="display:none">  {{ $total = 0 }}
                                          @foreach($item_list as $order_item)
                                           {{$total += $order_item->price * $order_item->quantity}}
                                           @endforeach</div>

                                <div class="cart_subtotal">
                                    <p>Total</p>
                                    <p class="cart-total">₦{{number_format($total + $vat,2)}}</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--coupon code area end-->
                        </div>




                        

 @stop                       