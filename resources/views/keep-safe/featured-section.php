
    <!--product area start-->
    <section class="new_product_area color_scheme_2 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_tab_button tab_button2">
                        <ul class=" nav" role="tablist" id="nav-tab">
                            <li>
                                <a class="active" data-toggle="tab" href="#featured" role="tab" aria-controls="featured" aria-selected="true"><span>Featured</span> Products</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#view" role="tab" aria-controls="view" aria-selected="false"><span>Most</span> View Products</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#bestseller" role="tab" aria-controls="bestseller" aria-selected="false"><span>Bestseller</span> Products</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>



            <div class="tab-content">
                <div class="tab-pane fade show active" id="featured" role="tabpanel">
                    <div class="new_product_container">
                       @foreach($featuredProductsfirst as $featuredProductsfirst)
                             @php 
                             $category = CategoriesModel::find($featuredProductsfirst->main_category_id);
                             @endphp
                             @php 
                             $featuredProductsfirst_main_category = CategoriesModel::where('id',$featuredProductsfirst->main_category_id)->get();
                             $featuredProductsfirst_second_category = CategoriesModel::where('id',$featuredProductsfirst->second_category_id)->get();
                             $featuredProductsfirst_third_category = CategoriesModel::where('id',$featuredProductsfirst->third_category_id)->get();
                             @endphp
                      
                               @if(empty($featuredProductsfirst->second_category_id) && empty($featuredProductsfirst->third_category_id))
                                 @foreach($featuredProductsfirst_main_category as $featuredProductsfirst_main_category)
                                 @php $link ='name/name/name/'.str_replace(' ','-',$featuredProductsfirst_main_category->main_category).'/'.str_replace(' ','-',$featuredProductsfirst->name); @endphp
                                 @endforeach
                                @elseif(empty($featuredProductsfirst->third_category_id))
                                  @foreach($featuredProductsfirst_main_category as $featuredProductsfirst_main_category)
                                  @foreach($featuredProductsfirst_second_category as $featuredProductsfirst_second_category)
                                  @php $link = 'name/name/name/'.str_replace(' ','-',$featuredProductsfirst_main_category->main_category).'/'.str_replace(' ','-',$featuredProductsfirst_second_category->second_category).'/'.str_replace(' ','-',$featuredProductsfirst->name); @endphp
                                  @endforeach
                                  @endforeach
                                @else
                                  @foreach($featuredProductsfirst_main_category as $featuredProductsfirst_main_category)
                                  @foreach($featuredProductsfirst_second_category as $featuredProductsfirst_second_category)
                                  @foreach($featuredProductsfirst_third_category as $featuredProductsfirst_third_category)
                                  @php $link = str_replace(' ','-',$featuredProductsfirst_main_category->main_category).'/'.str_replace(' ','-',$featuredProductsfirst_second_category->second_category).'/'.str_replace(' ','-',$featuredProductsfirst_third_category->third_category).'/'.str_replace(' ','-',$featuredProductsfirst->name); @endphp
                                  @endforeach
                                  @endforeach
                                  @endforeach
                                @endif
                        <div class="sample_product">
                            <div class="product_name">
                                <h3><a href="{{$link}}"> {{$featuredProductsfirst->name}} </a></h3>
                                <div class="manufacture_product">
                                    <p><a href="{{str_replace(' ','-',$category->main_category)}}">{{$category->main_category}}</a></p>
                                </div>
                            </div>
                           
                            <div class="product_thumb">
                                   @if(!empty($featuredProductsfirst->pic_1))
                                       <a class="primary_img" href="{{$link}}"><img src="{{ asset('admin'.$featuredProductsfirst->pic_1) }}" alt="" style="height:150px; width:150px;"></a>
                                    @else
                                      <a class="primary_img" href="{{$link}}"><img src="{{ asset('public/assets/img/no-img.png') }}" alt="" style="height:150px; width:150px;"></a>
                                    @endif
                                      
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <!-- <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul> -->
                                </div>
                               
                               <div style="display:none"> 
                               @if(empty($featuredProductsfirst->old_price))
                                   {{$price_class = 'regular_price'}}
                                   {{$old_price = ''}}
                                @else
                                  {{ $price_class = 'current_price'}}
                                  {{$old_price = '₦'.number_format($featuredProductsfirst->old_price,2)}}
                                @endif 
                                </div>  
                                
                                
                                <div class="price_box">
                                    <span class="{{$price_class}}">₦{{number_format($featuredProductsfirst->price,2)}}</span>
                                    <span class="old_price">{{$old_price}}</span>
                                </div>
                                <div class="quantity_progress">
                                    <p class="product_sold">Sold: <span>199</span></p>
                                    <!-- <p class="product_available">Availabe: <span>9800</span></p> -->
                                </div>
                                <div class="bar_percent">

                                </div>
                            </div>

                        </div>
                        @endforeach
                        <div class="product_carousel product_bg  product_column2 owl-carousel">
                           
                            @foreach($featuredProducts->chunk(3) as $featuredProduct_chunk)
                                
                            <div class="small_product">
                              @foreach($featuredProduct_chunk as $featuredProduct)

                              @php 
                                     $featuredProduct_main_category = CategoriesModel::where('id',$featuredProduct->main_category_id)->get();
                                     $featuredProduct_second_category = CategoriesModel::where('id',$featuredProduct->second_category_id)->get();
                                     $featuredProduct_third_category = CategoriesModel::where('id',$featuredProduct->third_category_id)->get();
                                  @endphp
                      
                               @if(empty($featuredProduct->second_category_id) && empty($featuredProduct->third_category_id))
                                 @foreach($featuredProduct_main_category as $featuredProduct_main_category)
                                 @php $link ='name/name/name/'.str_replace(' ','-',$featuredProduct_main_category->main_category).'/'.str_replace(' ','-',$featuredProduct->name); @endphp
                                 @endforeach
                                @elseif(empty($featuredProduct->third_category_id))
                                  @foreach($featuredProduct_main_category as $featuredProduct_main_category)
                                  @foreach($featuredProduct_second_category as $featuredProduct_second_category)
                                  @php $link = 'name/name/name/'.str_replace(' ','-',$featuredProduct_main_category->main_category).'/'.str_replace(' ','-',$featuredProduct_second_category->second_category).'/'.str_replace(' ','-',$featuredProduct->name); @endphp
                                  @endforeach
                                  @endforeach
                                @else
                                  @foreach($featuredProduct_main_category as $featuredProduct_main_category)
                                  @foreach($featuredProduct_second_category as $featuredProduct_second_category)
                                  @foreach($featuredProduct_third_category as $featuredProduct_third_category)
                                  @php $link =''.str_replace(' ','-',$featuredProduct_main_category->main_category).'/'.str_replace(' ','-',$featuredProduct_second_category->second_category).'/'.str_replace(' ','-',$featuredProduct_third_category->third_category).'/'.str_replace(' ','-',$featuredProduct->name); @endphp
                                  @endforeach
                                  @endforeach
                                  @endforeach
                                @endif
                                <div class="single_product">
                                    <div class="product_content">
                                        <h3><a href="{{$link}}">{{$featuredProduct->name}}</a></h3>
                                        
                                        <div class="product_ratings">
                                            <!-- <ul>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                            </ul> -->
                                        </div>
                                        <div style="display:none"> 
                                         @if(empty($featuredProduct->old_price))
                                         {{$price_class = 'regular_price'}}
                                         {{$old_price = ''}}
                                         @else
                                         {{ $price_class = 'current_price'}}
                                         {{$old_price = '₦'.number_format($featuredProduct->old_price,2)}}
                                         @endif 
                                       </div>  
                                        <div class="price_box">
                                            <span class="{{$price_class}}">₦{{number_format($featuredProduct->price,2)}}</span>
                                            <span class="old_price">{{$old_price}}</span>
                                        </div>
                                    </div>
                                    <div class="product_thumb">
                                     @if(!empty($featuredProduct->pic_1))
                                       <a class="primary_img" href="{{$link}}"><img src="{{ asset('admin'.$featuredProduct->pic_1) }}" alt="" style="height:150px; width:150px;"></a>
                                     @else
                                      <a class="primary_img" href="{{$link}}"><img src="{{ asset('public/assets/img/no-img.png') }}" alt="" style="height:150px; width:150px;"></a>
                                     @endif
                                     @if(!empty($featuredProduct->pic_2))
                                      <a class="secondary_img" href="{{$link}}"><img src="{{ asset('admin'.$featuredProduct->pic_2) }}" alt="" style="height:150px; width:150px;"></a>
                                     @endif
                                    </div>
                                </div>
                                @endforeach
                                
                               
                            </div>
                            @endforeach
                            
                            
                            
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="view" role="tabpanel">
                    <div class="new_product_container">
                       @foreach($mostViewedProductsFirst as $mostViewedProductFirst)

                                  @php 
                                     $mostViewedProductFirst_main_category = CategoriesModel::where('id',$mostViewedProductFirst->main_category_id)->get();
                                     $mostViewedProductFirst_second_category = CategoriesModel::where('id',$mostViewedProductFirst->second_category_id)->get();
                                     $mostViewedProductFirst_third_category = CategoriesModel::where('id',$mostViewedProductFirst->third_category_id)->get();
                                   @endphp
                      
                               @if(empty($mostViewedProductFirst->second_category_id) && empty($mostViewedProductFirst->third_category_id))
                                 @foreach($mostViewedProductFirst_main_category as $mostViewedProductFirst_main_category)
                                 @php $link ='name/name/name/'.str_replace(' ','-',$mostViewedProductFirst_main_category->main_category).'/'.str_replace(' ','-',$mostViewedProductFirst->name); @endphp
                                 @endforeach
                                @elseif(empty($mostViewedProductFirst->third_category_id))
                                  @foreach($mostViewedProductFirst_main_category as $mostViewedProductFirst_main_category)
                                  @foreach($mostViewedProductFirst_second_category as $mostViewedProductFirst_second_category)
                                  @php $link = 'name/name/name/'.str_replace(' ','-',$mostViewedProductFirst_main_category->main_category).'/'.str_replace(' ','-',$mostViewedProductFirst_second_category->second_category).'/'.str_replace(' ','-',$mostViewedProductFirst->name); @endphp
                                  @endforeach
                                  @endforeach
                                @else
                                  @foreach($mostViewedProductFirst_main_category as $mostViewedProductFirst_main_category)
                                  @foreach($mostViewedProductFirst_second_category as $mostViewedProductFirst_second_category)
                                  @foreach($mostViewedProductFirst_third_category as $mostViewedProductFirst_third_category)
                                  @php $link =''.str_replace(' ','-',$mostViewedProductFirst_main_category->main_category).'/'.str_replace(' ','-',$mostViewedProductFirst_second_category->second_category).'/'.str_replace(' ','-',$mostViewedProductFirst_third_category->third_category).'/'.str_replace(' ','-',$mostViewedProductFirst->name); @endphp
                                  @endforeach
                                  @endforeach
                                  @endforeach
                                @endif
                        <div class="sample_product">
                            <div class="product_name">
                                <h3><a href="{{$link}}">{{$mostViewedProductFirst->name}}</a></h3>
                                <div class="manufacture_product">
                                    <p><a href="{{str_replace(' ','-',$category->main_category)}}">{{$category->main_category}}</a></p>
                                </div>
                            </div>
                            <div class="product_thumb">
                                   @if(!empty($mostViewedProductFirst->pic_1))
                                       <a class="primary_img" href="{{$link}}"><img src="{{ asset('admin'.$mostViewedProductFirst->pic_1) }}" alt="" style="height:150px; width:150px;"></a>
                                    @else
                                      <a class="primary_img" href="{{$link}}"><img src="{{ asset('public/assets/img/no-img.png') }}" alt="" style="height:150px; width:150px;"></a>
                                    @endif
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <!-- <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul> -->
                                </div>
                                <div style="display:none"> 
                               @if(empty($mostViewedProductFirst->old_price))
                                   {{$price_class = 'regular_price'}}
                                   {{$old_price = ''}}
                                @else
                                  {{ $price_class = 'current_price'}}
                                  {{$old_price = '₦'.number_format($mostViewedProductFirst->old_price,2)}}
                                @endif 
                                </div>  
                                
                                
                                <div class="price_box">
                                    <span class="{{$price_class}}">₦{{number_format($mostViewedProductFirst->price,2)}}</span>
                                    <span class="old_price">{{$old_price}}</span>
                                </div>
                                <div class="quantity_progress">
                                    <p class="product_sold">Sold: <span>199</span></p>
                                    <!-- <p class="product_available">Availabe: <span>9800</span></p> -->
                                </div>
                                <div class="bar_percent">

                                </div>
                            </div>

                        </div>
                        @endforeach
                        <div class="product_carousel product_bg  product_column2 owl-carousel">
                          @foreach($mostViewedProducts->chunk(3) as $mostViewedProduct_chunk)
                                  
                            <div class="small_product">
                              @foreach($mostViewedProduct_chunk as $mostViewedProduct)
                                   @php 
                                     $mostViewedProduct_main_category = CategoriesModel::where('id',$mostViewedProduct->main_category_id)->get();
                                     $mostViewedProduct_second_category = CategoriesModel::where('id',$mostViewedProduct->second_category_id)->get();
                                     $mostViewedProduct_third_category = CategoriesModel::where('id',$mostViewedProduct->third_category_id)->get();
                                   @endphp
                      
                               @if(empty($mostViewedProduct->second_category_id) && empty($mostViewedProduct->third_category_id))
                                 @foreach($mostViewedProduct_main_category as $mostViewedProduct_main_category)
                                 @php $link ='name/name/name/'.str_replace(' ','-',$mostViewedProduct_main_category->main_category).'/'.str_replace(' ','-',$mostViewedProduct->name); @endphp
                                 @endforeach
                                @elseif(empty($mostViewedProduct->third_category_id))
                                  @foreach($mostViewedProduct_main_category as $mostViewedProduct_main_category)
                                  @foreach($mostViewedProduct_second_category as $mostViewedProduct_second_category)
                                  @php $link = 'name/name/name/'.str_replace(' ','-',$mostViewedProduct_main_category->main_category).'/'.str_replace(' ','-',$mostViewedProduct_second_category->second_category).'/'.str_replace(' ','-',$mostViewedProduct->name); @endphp
                                  @endforeach
                                  @endforeach
                                @else
                                  @foreach($mostViewedProduct_main_category as $mostViewedProduct_main_category)
                                  @foreach($mostViewedProduct_second_category as $mostViewedProduct_second_category)
                                  @foreach($mostViewedProduct_third_category as $mostViewedProduct_third_category)
                                  @php $link =''.str_replace(' ','-',$mostViewedProduct_main_category->main_category).'/'.str_replace(' ','-',$mostViewedProduct_second_category->second_category).'/'.str_replace(' ','-',$mostViewedProduct_third_category->third_category).'/'.str_replace(' ','-',$mostViewedProduct->name); @endphp
                                  @endforeach
                                  @endforeach
                                  @endforeach
                                @endif
                                <div class="single_product">
                                    <div class="product_content">
                                        <h3><a href="{{$link}}">{{$mostViewedProduct->name}}</a></h3>
                                        <div class="product_ratings">
                                            <!-- <ul>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                            </ul> -->
                                        </div>
                                        <div style="display:none"> 
                                         @if(empty($mostViewedProduct->old_price))
                                         {{$price_class = 'regular_price'}}
                                         {{$old_price = ''}}
                                         @else
                                         {{ $price_class = 'current_price'}}
                                         {{$old_price = '₦'.number_format($mostViewedProduct->old_price,2)}}
                                         @endif 
                                       </div>  
                                        <div class="price_box">
                                            <span class="{{$price_class}}">₦{{number_format($mostViewedProduct->price,2)}}</span>
                                            <span class="old_price">{{$old_price}}</span>
                                        </div>
                                    </div>
                                    <div class="product_thumb">
                                     @if(!empty($mostViewedProduct->pic_1))
                                       <a class="primary_img" href="{{$link}}"><img src="{{ asset('admin'.$mostViewedProduct->pic_1) }}" alt="" style="height:150px; width:150px;"></a>
                                     @else
                                      <a class="primary_img" href="{{$link}}"><img src="{{ asset('public/assets/img/no-img.png') }}" alt="" style="height:150px; width:150px;"></a>
                                     @endif
                                     @if(!empty($mostViewedProduct->pic_2))
                                      <a class="secondary_img" href="{{$link}}"><img src="{{ asset('admin'.$mostViewedProduct->pic_2) }}" alt="" style="height:150px; width:150px;"></a>
                                     @endif
                                    </div>
                                </div>
                                 @endforeach
                            </div>
                            @endforeach
                           
                           
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="bestseller" role="tabpanel">
                    <div class="new_product_container">
                       @foreach($best_seller_Productsfirst as $best_seller_Productsfirst_product)
                             @php 

                             $get_product = Products::find($best_seller_Productsfirst_product->item_id);
                             @endphp

                             @if(!empty($get_product->main_category_id) && $get_product->item_status == "Available")

                             @php

                             $category = CategoriesModel::find($get_product->main_category_id);
                             @endphp
                                   @php 
                                    $get_product_main_category = CategoriesModel::where('id',$get_product->main_category_id)->get();
                                    $get_product_second_category = CategoriesModel::where('id',$get_product->second_category_id)->get();
                                    $get_product_third_category = CategoriesModel::where('id',$get_product->third_category_id)->get();
                                   @endphp
                               @if(empty($get_product->second_category_id) && empty($get_product->third_category_id))
                                 @foreach($get_product_main_category as $get_product_main_category)
                                 @php $link ='name/name/name/'.str_replace(' ','-',$get_product_main_category->main_category).'/'.str_replace(' ','-',$get_product->name); @endphp
                                 @endforeach
                                @elseif(empty($get_product->third_category_id))
                                  @foreach($get_product_main_category as $get_product_main_category)
                                  @foreach($get_product_second_category as $get_product_second_category)
                                  @php $link = 'name/name/name/'.str_replace(' ','-',$get_product_main_category->main_category).'/'.str_replace(' ','-',$get_product_second_category->second_category).'/'.str_replace(' ','-',$get_product->name); @endphp
                                  @endforeach
                                  @endforeach
                                @else
                                  @foreach($get_product_main_category as $get_product_main_category)
                                  @foreach($get_product_second_category as $get_product_second_category)
                                  @foreach($get_product_third_category as $get_product_third_category)
                                  @php $link =''.str_replace(' ','-',$get_product_main_category->main_category).'/'.str_replace(' ','-',$get_product_second_category->second_category).'/'.str_replace(' ','-',$get_product_third_category->third_category).'/'.str_replace(' ','-',$get_product->name); @endphp
                                  @endforeach
                                  @endforeach
                                  @endforeach
                                @endif
                        <div class="sample_product">
                            <div class="product_name">
                                <h3><a href="{{$link}}">{{$get_product->name}}</a></h3>
                                <div class="manufacture_product">
                                    <p><a href="{{str_replace(' ','-',$category->main_category)}}">{{$category->main_category}}</a></p>
                                </div>
                            </div>
                            <div class="product_thumb">
                                    @if(!empty($get_product->pic_1))
                                       <a class="primary_img" href="{{$link}}"><img src="{{ asset('admin'.$get_product->pic_1) }}" alt="" style="height:150px; width:150px;"></a>
                                    @else
                                      <a class="primary_img" href="{{$link}}"><img src="{{ asset('public/assets/img/no-img.png') }}" alt="" style="height:150px; width:150px;"></a>
                                    @endif
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <!-- <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul> -->
                                </div>
                                <div style="display:none"> 
                               @if(empty($get_product->old_price))
                                   {{$price_class = 'regular_price'}}
                                   {{$old_price = ''}}
                                @else
                                  {{ $price_class = 'current_price'}}
                                  {{$old_price = '₦'.number_format($get_product->old_price,2)}}
                                @endif 
                                </div>  
                                
                                
                                <div class="price_box">
                                    <span class="{{$price_class}}">₦{{number_format($get_product->price,2)}}</span>
                                    <span class="old_price">{{$old_price}}</span>
                                </div>
                                <div class="quantity_progress">
                                    <p class="product_sold">Sold: <span>199</span></p>
                                    <!-- <p class="product_available">Availabe: <span>9800</span></p> -->
                                </div>
                                <div class="bar_percent">

                                </div>
                            </div>

                        </div>
                        @endif
                        @endforeach
                     
                        <div class="product_carousel product_bg  product_column2 owl-carousel">
                            @foreach($best_seller_Products->chunk(2)  as $best_seller_Product_chunk)

                            
                            <div class="small_product">
                             @foreach($best_seller_Product_chunk as $best_seller_Product)
                             @php 

                              $get_product = Products::find($best_seller_Product->item_id);

                             @endphp
 
                             @if(!empty($get_product->main_category_id) && $get_product->item_status == "Available")

                             @php
                             $category = CategoriesModel::find($get_product->main_category_id);
                             @endphp





                                      @php 
                                 $get_product_main_category = CategoriesModel::where('id',$get_product->main_category_id)->get();
                                   $get_product_second_category = CategoriesModel::where('id',$get_product->second_category_id)->get();
                                  $get_product_third_category = CategoriesModel::where('id',$get_product->third_category_id)->get();
                                     @endphp
                                    @if(empty($get_product->second_category_id) && empty($get_product->third_category_id))
                                      @foreach($get_product_main_category as $get_product_main_category)
                                   @php $link ='name/name/name/'.str_replace(' ','-',$get_product_main_category->main_category).'/'.str_replace(' ','-',$get_product->name); @endphp
                                 @endforeach
                                   @elseif(empty($get_product->third_category_id))
                                     @foreach($get_product_main_category as $get_product_main_category)
                                 @foreach($get_product_second_category as $get_product_second_category)
                                   @php $link = 'name/name/name/'.str_replace(' ','-',$get_product_main_category->main_category).'/'.str_replace(' ','-',$get_product_second_category->second_category).'/'.str_replace(' ','-',$get_product->name); @endphp
                                    @endforeach
                                  @endforeach
                                      @else
                                     @foreach($get_product_main_category as $get_product_main_category)
                                     @foreach($get_product_second_category as $get_product_second_category)
                                         @foreach($get_product_third_category as $get_product_third_category)
                                      @php $link =''.str_replace(' ','-',$get_product_main_category->main_category).'/'.str_replace(' ','-',$get_product_second_category->second_category).'/'.str_replace(' ','-',$get_product_third_category->third_category).'/'.str_replace(' ','-',$get_product->name); @endphp
                                   @endforeach
                                      @endforeach
                                     @endforeach
                                   @endif
                                <div class="single_product">
                                    <div class="product_content">
                                        <h3><a href="{{$link}}">{{$get_product->name}}</a></h3>
                                        <div class="product_ratings">
                                            <!-- <ul>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                            </ul> -->
                                        </div>
                                        <div style="display:none"> 
                                         @if(empty($get_product->old_price))
                                         {{$price_class = 'regular_price'}}
                                         {{$old_price = ''}}
                                         @else
                                         {{ $price_class = 'current_price'}}
                                         {{$old_price = '₦'.number_format($get_product->old_price,2)}}
                                         @endif 
                                       </div>  
                                        <div class="price_box">
                                            <span class="{{$price_class}}">₦{{number_format($get_product->price,2)}}</span>
                                            <span class="old_price">{{$old_price}}</span>
                                        </div>
                                    </div>
                                    <div class="product_thumb">
                                     @if(!empty($get_product->pic_1))
                                       <a class="primary_img" href="{{$link}}"><img src="{{ asset('admin'.$get_product->pic_1) }}" alt="" style="height:150px; width:150px;"></a>
                                     @else
                                      <a class="primary_img" href="{{$link}}"><img src="{{ asset('public/assets/img/no-img.png') }}" alt="" style="height:150px; width:150px;"></a>
                                     @endif
                                     @if(!empty($get_product->pic_2))
                                      <a class="secondary_img" href="{{$link}}"><img src="{{ asset('admin'.$get_product->pic_2) }}" alt="" style="height:150px; width:150px;"></a>
                                     @endif
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                            
                            @endforeach

                            
                           
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--product area end-->
