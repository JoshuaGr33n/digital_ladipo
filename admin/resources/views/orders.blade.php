
       @extends('layout')
        @section('content')  
        @section('title', 'Orders')



@php 
use App\OrdersModel;
@endphp
<div class="content-box">
    <div class="element-wrapper">
        <h6 class="element-header">Orders</h6>
        <div class="element-box">
            <h5 class="form-header">Orders</h5>
            <div class="form-desc">

              

             @if ($delete_message = Session::get('delete_success'))
             <div class="alert alert-danger">
              <p>{{ $delete_message }}</p>
             </div>
             @endif
                
            </div>
            <div class="table-responsive">
                <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                    <thead>
                         <tr>
                            <th>#</th>
                            <th>Order Id</th>
                            <th>Order Date</th>
                            <th>Total Price</th>
                            <th>Payment Method</th>
                            <th>Payment Status</th>
                            <th>Delivery Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Order Id</th>
                            <th>Order Date</th>
                            <th>Total Price</th>
                            <th>Payment Method</th>
                            <th>Payment Status</th>
                            <th>Delivery Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                          @foreach ($orders as $orders)
                       
                             @php $order_list = OrdersModel::select('*')->where('order_id','=',$orders->order_id)->get();@endphp
                             <div style="display:none">  {{ $total = 0 }}
                             @foreach($order_list as $order_item)
                             {{$total +=$order_item->price * $order_item->quantity}}
                               @endforeach</div>

                        <tr>
                            <td>{{ ++$i }}</td>
                            
                            <td>{{ $orders->order_id }}</td>
                            <td>{{ date("d M Y", strtotime($orders->order_date)) }}</td>
                            <td>₦{{number_format($total,2)}}</td>
                            <td>{{ $orders->payment_method }}</td>
                            @if($orders->payment_status == "Pending")
                            <td><strong class="text-warning">{{$orders->payment_status }}</strong></td>
                            @else
                            <td><strong style="color:green">{{ $orders->payment_status }}</strong></td>
                            @endif
                            @if($orders->delivery_status == "Pending")
                            <td><strong class="text-warning">{{ $orders->delivery_status }}</strong></td>
                            @elseif($orders->delivery_status == "Delivered")
                            <td><strong style="color:green">{{ $orders->delivery_status }}</strong></td>
                            @elseif($orders->delivery_status == "Cancelled")
                            <td><strong class="text-danger">{{ $orders->delivery_status }}</strong></td>
                            @endif
                            <td class="text-center">
                              <form action="" method="POST">
                                 <a href="{{ route('order_data.show',$orders->order_id) }}" class="btn btn-info btn-xs"><i class="os-icon os-icon-external-link"></i></a>
                                 
                                
                                  
                             </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  
    
</div>



                @stop  