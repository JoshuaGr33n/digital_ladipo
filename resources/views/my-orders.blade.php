 @extends('layout')
 @section('title', 'My Orders')
 @section('content') 

 @php 
 use App\CategoriesModel;
 use App\Products;
 use Illuminate\Support\Facades\DB;
 use App\OrdersModel;
 @endphp

    <style type="text/css">
		.pagination .current{
			background-color: #b2e515 !important;
			color: white !important;
			border-color: #b2e515 !important;
		}

	</style>
                     <div style="margin:auto;margin-bottom:100px">
                            <h3>My Orders</h3>
                            <div class="table-responsive">
                            <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Order Id</th>
                                            <th>Number of Items</th>
                                            <th>Total Price</th>
                                            <th>Date</th>
                                            <th>Delivery Status</th>
                                            <th>Payment Status</th>
                                            <th>Payment Method</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($myOrders as $myOrder)

                                      @php 
                                      $order_list = OrdersModel::select('*')->where('order_id','=',$myOrder->order_id)->get();
                                      $count_items = OrdersModel::select('*')->where('order_id','=',$myOrder->order_id)->count();
                                      @endphp
                                        <div style="display:none">  {{ $total = 0 }}
                                          @foreach($order_list as $order_item)
                                           {{$total += $order_item->price * $order_item->quantity}}
                                         @endforeach</div>
                                      
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $myOrder->order_id}}</td>
                                            <td>{{$count_items}}</td>
                                            <td>₦{{number_format($total,2)}}</td>
                                            <td>{{  date("d M Y", strtotime($myOrder->order_date)) }}</td>
                                            @if($myOrder->delivery_status == "Pending")
                                            <td><span class="text-warning">{{ $myOrder->delivery_status}}</span></td>
                                            @elseif($myOrder->delivery_status == "Delivered")
                                           <td><strong style="color:green">{{ $myOrder->delivery_status }}</strong></td>
                                            @elseif($myOrder->delivery_status == "Cancelled")
                                            <td><strong class="text-danger">Order Cancelled</strong></td>
                                            @endif
                                             @if($myOrder->payment_status == "Pending")
                                             <td><span class="text-warning">{{ $myOrder->payment_status}}</span></td>
                                             @else
                                             <td><strong style="color:green">{{ $myOrder->payment_status }}</strong></td>
                                             @endif
                                            <td><span class="success">{{ $myOrder->payment_method}}</span></td>
                                            <td><a href="my-order-items/{{ $myOrder->order_id}}" class="view">view</a></td>
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

                            <div class="shop_toolbar t_bottom">
                            <div class="pagination">
                            {{ $myOrders->links('vendor.pagination.custom-pagination') }}
                           </div>
                           </div>
                            
                        </div>
                        

 @stop                       