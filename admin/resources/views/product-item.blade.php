@extends('layout')
 @section('content') 
 @section('title', $Products->name)


    <div class="content-box">
        <div class="row">
            <div class="col-md-8">
                <div class="order-box">
                     <div class="form-group"><a href="{{url('products')}}" class="btn btn-success">Back</a></div>
                         
                    
                          <div class="order-details-box">
                           <div class="order-main-info"><span>Item #{{ $Products->id }}</span><strong>{{ $Products->name }}</strong></div>
                           <div class="order-sub-info"><span>Placed On</span><strong>{{  date("d M Y", strtotime($Products->created_at)) }}</strong></div>
                      </div>
                           @if(!empty($Products->pic_1))
                            <div class="product-image"><img alt="" src="{{ asset($Products->pic_1) }}" style="width:100px; height:100px; border:1px solid #ccc;padding:5px 5px 5px 5px; margin-bottom:5px"/></div>
                            @else
                                <div class="product-image"><img alt="" src="{{ asset('public/img/empty.jpg') }}" style="width:250px; height:200px; border:1px solid #ccc;padding:5px 5px 5px 5px;margin-bottom:5px"/></div>
                           @endif
                    
                    <div class="order-controls">





                        <form class="form-inline" action="{{ $Products->id }}/updateItemstatus" method="POST">
                          {{ csrf_field() }}
                          {{ method_field('patch') }}

                          
                          
                            <div class="form-group">
                                <label for="">Item Status</label>
                                <select class="form-control form-control-sm" name="item_status">
                                    <option value="{{ $Products->item_status }}">{{ $Products->item_status }}</option>
                                    <option value="Unavailable">Unavailable</option>
                                    <option value="Available">Available</option>
                                </select>
                            </div>
                            <input type="hidden" name="item_id" value="{{ $Products->id }}"/>
                            <div class="form-group"><button type="submit" class="btn btn-primary">Save</button></div>
                        </form>
                    </div>



                    
                    <div class="order-items-table">
                        <div class="table-responsive">
                            <table class="table table-lightborder">
                                <thead>
                                    <tr>
                                        <th colspan="2">Product Info</th>
                                      
                                        <th colspan="2">Price @if(!empty($Products->old_price)) (Old Price) @endif</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> <?php if (!empty($Products->pic_2)){?><div class="product-image"><img alt="" src="{{ asset($Products->pic_2) }}"  style="width:100px; height:70px; border:1px solid #ccc;padding:5px 5px 5px 5px"/></div><?php }else{?> <div class="product-image"><img alt="" src="{{ asset('public/img/empty.jpg') }}" style="width:100px; height:70px; border:1px solid #ccc;padding:5px 5px 5px 5px"/></div><?php }?></td>
                                        <td>
                                            <div class="product-name">{{ $Products->name }}</div>
                                            <div class="product-details">
                                                  <?php $trimed_category = str_replace("','", " ", $Products->category);?>
                                                <!-- <span>Category: </span><strong> <?php //print_r($trimed_category);?></strong> -->
                                                <div class="color-box" style="background-color: #d4c1a2;"></div>
                                            </div>
                                        </td>
                                     
                                        <td class="text-md-center"><div class="product-price">₦{{ $Products->price }}@if(!empty($Products->old_price))<font size="2">(₦{{ $Products->old_price }}) </font> @endif</div></td>
                                        
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="order-foot">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                               <h5 class="order-section-heading">Brands</h5>
                                @if(!empty($car_brand->name))
                                <div class="order-summary-row">
                                    <div class="order-summary-label">Car Brand<span></span><strong></strong></div>
                                    <div class="order-summary-value">{{ ucwords($car_brand->name) }}</div>
                                </div>
                                @endif
                                @if(!empty($part_brand->name))
                                <div class="order-summary-row">
                                    <div class="order-summary-label">Part Brand<span></span><strong></strong></div>
                                    <div class="order-summary-value">{{ ucwords($part_brand->name) }}</div>
                                </div>
                                @endif
                                <div class="order-summary-row as-total">
                                    <!-- <div class="order-summary-label"><span>Quantity</span></div>
                                    <div class="order-summary-value">{{ $Products->quantity }}</div> -->
                                </div>
                           
                            </div>
                            

                            <div class="col-md-5 offset-md-1">
                                <h5 class="order-section-heading">Categories</h5>
                                <div class="order-summary-row">
                                    <div class="order-summary-label">Main<span></span></div>
                                    
                                    <div class="order-summary-value">{{ ucwords($main_cat->main_category) }}</div>
                                </div>
                                @if(!empty($second_cat->second_category))
                                <div class="order-summary-row">
                                    <div class="order-summary-label">Parent<span></span><strong></strong></div>
                                    <div class="order-summary-value">{{ ucwords($second_cat->second_category) }}</div>
                                </div>
                                @endif
                                @if(!empty($third_cat->third_category))
                                <div class="order-summary-row">
                                    <div class="order-summary-label">Sub<span></span><strong></strong></div>
                                    <div class="order-summary-value">{{ ucwords($third_cat->third_category) }}</div>
                                </div>
                                @endif
                                <div class="order-summary-row as-total">
                                    <!-- <div class="order-summary-label"><span>Quantity</span></div>
                                    <div class="order-summary-value">{{ $Products->quantity }}</div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-foot">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <h5>Description</h5>
                                <div class="form-group">{{ $Products->description }}</div>
                                <!-- <button class="btn btn-primary">Save Notes</button> -->
                            </div>
                            <div class="col-md-5 offset-md-1">
                                <h5 class="order-section-heading">Tags</h5>
                                <div class="order-summary-row">
                                    <div class="order-summary-label"><span>Slider</span></div>
                                    <div class="order-summary-value">{{ $Products->slider }}
                                      @if($Products->slider=="Yes")  
                                       @if (!empty($Products->slider_pic))
                                       <div class="product-image"><img alt="" src="{{ asset($Products->slider_pic) }}" style="width:120px; height:80px; border:1px solid #ccc;padding:5px 5px 5px 5px"/></div>
                                        @else
                                       <div class="product-image"><img alt="" src="{{ asset('public/img/empty.jpg') }}" style="width:120px; height:80px; border:1px solid #ccc;padding:5px 5px 5px 5px"/></div>
                                        @endif
                                      @endif   
                                    </div>
                                </div>
                                <div class="order-summary-row">
                                    <div class="order-summary-label"><span>Featured</span><strong></strong></div>
                                    <div class="order-summary-value">{{ $Products->featured }}</div>
                                </div>
                                <div class="order-summary-row">
                                    <div class="order-summary-label"><span>Special Offer</span><strong></strong></div>
                                    <div class="order-summary-value">{{ $Products->special_offer}}</div>
                                </div>
                                <div class="order-summary-row">
                                    <div class="order-summary-label"><span>Banner</span><strong></strong></div>
                                    <div class="order-summary-value">{{ $Products->banner }}</div>
                                </div>
                                <div class="order-summary-row as-total">
                                    <!-- <div class="order-summary-label"><span>Quantity</span></div>
                                    <div class="order-summary-value">{{ $Products->quantity }}</div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ecommerce-customer-info">
                    
                <a href="{{$Products->id}}/item_order_history" class="btn btn-secondary" style="margin-left:100px">Item Order History</a>
                </div>
            </div>
        </div>

       
        
      
        
    </div>



@stop 