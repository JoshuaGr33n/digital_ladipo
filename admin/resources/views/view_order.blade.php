@extends('layout')
 @section('content') 
 @section('title', 'View Order Item')

@php 
use App\OrdersModel;
use App\User;
@endphp
    <div class="content-box">
        <div class="row">
            <div class="col-md-8">
                <div class="order-box">
                     <div class="form-group"><a href="{{url('orders')}}" class="btn btn-success">Back</a></div>
                    <div class="order-details-box">
                        <div class="order-main-info"><span>Order ID</span><strong>{{ $Orders->order_id }} @if($Orders->delivery_status=="Cancelled")<span style="color:red;font-size:20px">Order Cancelled</span>@endif</strong></div>
                        <div class="order-sub-info"><span>Order Date</span><strong>{{  date("d M Y", strtotime($Orders->created_at)) }}</strong></div>
                    </div>
                  
                    <div class="order-controls">
                        <form class="form-inline" action="{{ route('order_data.update',$Orders->order_id ) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="form-group">
                                <label for="">Delivery Status</label>
                                <select class="form-control form-control-sm" name="delivery">
                                   <option value="{{ $Orders->delivery_status }}">{{ $Orders->delivery_status }}</option>
                                    @if($Orders->delivery_status!="Delivered")<option value="Delivered">Delivered</option>@endif
                                    @if($Orders->delivery_status!="Pending")<option value="Pending">Pending</option>@endif
                                    @if($Orders->delivery_status!="Cancelled")<option value="Cancelled">Cancel Order</option>@endif

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Payment Status</label>
                                <select class="form-control form-control-sm" name="payment">
                                    <option value="{{ $Orders->payment_status }}">{{ $Orders->payment_status }}</option>
                                    @if($Orders->payment_status!="Paid")<option value="Paid">Paid</option>@endif
                                    @if($Orders->payment_status!="Pending")<option value="Pending">Pending</option>@endif
                                </select>
                            </div>
                            <div class="form-group"><button type="submit" class="btn btn-primary">Save</button></div>
                        </form>
                    </div>
                    <div class="order-items-table">
                        <div class="table-responsive">
                            <table class="table table-lightborder">
                                <thead>
                                    <tr>
                                        <th>Order Info</th>
                                        <th></th>
                                        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $order_list = OrdersModel::select('*')->where('order_id','=',$Orders->order_id)->take(10)->orderBy('created_at')->get();@endphp
                                    @foreach($order_list as $order_item)
                                    <tr>
                                      @if (!empty($order_item->pic))
                                      <td><div class="product-image" style="background-image: url({{ asset($order_item->pic) }});"><img alt="" src="{{ asset($order_item->pic) }}" /></div></td>
                                        
                                      @else
                                      <td><div class="product-image" style="background-image: url({{ asset('public/img/empty.jpg') }});"><img alt="" src="{{ asset('public/img/empty.jpg') }}" /></div></td>
                                       
                                      @endif
                                      <td>
                                        
                                            <div class="product-name">{{ $order_item->order }}</div>
                                            <div class="product-details">
                                                <span>Quantity: </span><strong> {{ $order_item->quantity }}</strong>
                                                <span>Price: </span><strong> ₦{{ $order_item->price }}</strong>
                                                <div class="color-box" style="background-color: #d4c1a2;"></div>
                                            </div>
                                        </td>
                                     
                                        <td class="text-md-center"><div class="product-price">₦{{ $order_item->price * $order_item->quantity}}</div></td>
                                        
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="order-foot">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <h5></h5>
                               
                           
                            </div>
                            <div style="display:none"> {{ $total = 0 }}
                            
                             @foreach($order_list as $order_item)
                             {{$total +=$order_item->price * $order_item->quantity}}
     
                               @endforeach
                            
                            </div>
                            @php $vat = 25.00;@endphp
                            <div class="col-md-5 offset-md-1">
                                <h5 class="order-section-heading">Order Summary</h5>
                                <!-- <div class="order-summary-row">
                                    <div class="order-summary-label"><span>Quantity Ordered</span></div>
                                    <div class="order-summary-value"></div>
                                </div>
                                <div class="order-summary-row">
                                    <div class="order-summary-label"><span>Payment Method</span><strong></strong></div>
                                    <div class="order-summary-value"></div>
                                </div> -->
                                <div class="order-summary-row">
                                    <div class="order-summary-label"><span>Taxes</span><strong>VAT 20%</strong></div>
                                    <div class="order-summary-value">₦{{$vat}}</div>
                                </div>
                                <div class="order-summary-row as-total">
                                    <div class="order-summary-label"><span>Total </span></div>
                                    <div class="order-summary-value">₦{{number_format($total + $vat,2)}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="order-foot">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <h5>Order Note</h5>
                                <div class="form-group"><textarea class="form-control" disabled style="height:150px">{{ $Orders->note }}</textarea></div>
                               
                            </div>
                            <div class="col-md-5 offset-md-1">

                                <div class="order-summary-row as-total">
                                    <div class="order-summary-label"><span></span></div>
                                    <div class="order-summary-value"></div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            @php $customer = User::select('*')->where('id','=',$Orders->customer_id)->first();@endphp
            <div class="col-md-4">
                <div class="ecommerce-customer-info">
                    
                    <div class="ecommerce-customer-sub-info">
                       <div class="ecc-sub-info-row">
                            <div class="sub-info-label">Customer</div>
                            <div class="sub-info-value">{{ $customer->fname }} {{ $customer->lname }}</div>
                        </div>
                        <div class="ecc-sub-info-row">
                            <div class="sub-info-label">Email</div>
                            <div class="sub-info-value"><a href="#">{{ $Orders->email }}</a></div>
                        </div>
                        <div class="ecc-sub-info-row">
                            <div class="sub-info-label">Phone</div>
                            <div class="sub-info-value">{{ $Orders->phone }}</div>
                        </div>
                    </div>
                    <div class="os-tabs-controls">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab_overview"> Billing</a></li>

                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="ecc-sub-info-row">
                            <div class="sub-info-label">Address</div>
                            <div class="sub-info-value">
                            {{ $Orders->address }}
                            </div>
                        </div>
                        <!-- <div class="ecc-sub-info-row">
                            <div class="sub-info-label">Payment Method</div>
                            <div class="sub-info-value"><img alt="" src="{{ asset('public/assets/img/mastercard.png') }}" style="width: auto; height: 40px;" /><span>{{ $Orders->payment_method }}</span></div>
                        </div> -->
                    </div>
                </div>

                <div class="ecommerce-customer-info" style="margin-top:20px">
                   <div class="tab-content">
                       <div class="ecc-sub-info-row">
                            <div class="sub-info-label">Payment Method</div>
                            <div class="sub-info-value"><img alt="" src="{{ asset('public/assets/img/mastercard.png') }}" style="width: auto; height: 40px;" /><span>{{ $Orders->payment_method }}</span></div>
                        </div>
                        <div class="ecc-sub-info-row" style="margin-top:30px">
                           <h5>Order Note</h5>
                          <div class="form-group">{{ $Orders->note }}</div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
      
        
    </div>



@stop 