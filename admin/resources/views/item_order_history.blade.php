@extends('layout')
        @section('title', 'Item Order History')
        @section('content') 

@php 
use App\User;
@endphp
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <h6 class="element-header">Item Order History ({{$Product->name}})</h6>
            <div class="element-box">
                <div class="controls-above-table">
                  <div class="row">
                    <div class="col-sm-6"></div>
                      <div class="col-sm-6" style="text-align: right;">
                          <a class="btn btn-sm btn-success" href="back">Back</a>
                          
                      </div>
                      
                  </div>
              </div>
                <div class="table-responsive">
                 @if ($delete_message = Session::get('delete_success'))
                       <div class="alert alert-danger">
                   <p>{{ $delete_message }}</p>
                  </div>
                 @endif
                    <table class="table table-lightborder" id="dataTable1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer Name</th>
                                <th>Phone</th>
                                <th>Quantity</th>
                                <th>Placed on</th>
                                <th>Delivery Status</th>
                                <th>Payment Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Customer Name</th>
                                <th>Phone</th>
                                <th>Quantity</th>
                                <th>Placed on</th>
                                <th>Delivery Status</th>
                                <th>Payment Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </tfoot>

                        <tbody>
                           @foreach ($itemOrders as $itemOrder)
                           @php $customer = User::select('*')->where('id','=',$itemOrder->customer_id)->first();@endphp
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $customer->fname }} {{ $customer->lname }}</td>
                                <td>{{ $itemOrder->phone }}</td>
                                <td>{{ $itemOrder->quantity }}</td>
                                <td>{{ date("d M Y", strtotime($itemOrder->created_at)) }}</td>
                                <td>
                                    {{ $itemOrder->delivery_status }}
                                </td>
                                <td>
                                    {{ $itemOrder->payment_status }}
                                </td>
                                <td class="text-right">
                               
                                 <a href="{{ route('order_data.show',$itemOrder->order_id) }}" class="btn btn-info btn-xs"><i class="os-icon os-icon-external-link"></i></a>
                                 
                                </td>
                            </tr>
                            @endforeach

                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="content-panel">
        <div class="content-panel-close">
            <i class="os-icon os-icon-close"></i>
        </div>

     
    </div>
</div>
@stop 