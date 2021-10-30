@foreach($products as $product)
                        <div class="col-lg-3 col-md-4 col-12 ">
                            <div class="single_product">
                                <div class="product_name grid_name">
                                    <h3><a href="{{url(str_replace(' ','-',$mainCat->main_category))}}/{{str_replace(' ','-',$secondCat->second_category)}}/{{str_replace(' ','-',$thirdCat->third_category)}}/{{str_replace(' ','-',$product->name)}}">{{$product->name}}</a></h3>
                                    <p class="manufacture_product"><a href="#">{{$thirdCat->third_category}}</a></p>
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="{{url(str_replace(' ','-',$mainCat->main_category))}}/{{str_replace(' ','-',$secondCat->second_category)}}/{{str_replace(' ','-',$thirdCat->third_category)}}/{{str_replace(' ','-',$product->name)}}">@if(!empty($product->pic_1))<img src="{{ asset('admin'.$product->pic_1) }}" alt="" style="width:150px; height:150px;">@else<img src="{{ asset('public/assets/img/no-img.png') }}" alt="" style="width:150px; height:150px;">@endif</a>
                                    <a class="secondary_img" href="{{url(str_replace(' ','-',$mainCat->main_category))}}/{{str_replace(' ','-',$secondCat->second_category)}}/{{str_replace(' ','-',$thirdCat->third_category)}}/{{str_replace(' ','-',$product->name)}}">@if(!empty($product->pic_2))<img src="{{ asset('admin'.$product->pic_2) }}" alt="" style="width:150px; height:150px;">@endif</a>
                                    <div class="label_product">
                                     @if(!empty($product->old_price))
                                       <span class="label_sale">{{round((1 - $product->old_price / $product->price) * 100)}}%</span>
                                      @endif
                                    </div>
                                    <div class="action_links">
                                        <ul>
                                            <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box{{$product->id}}" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                            <!-- <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                            <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li> -->
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_content grid_content">
                                    <div class="content_inner">
                                        <div class="product_ratings">
                                             <!-- <ul>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                            </ul> -->
                                        </div>
                                        <div class="product_footer d-flex align-items-center">
                                        <div style="display:none"> 
                                         @if(empty($product->old_price))
                                         {{$price_class = 'regular_price'}}
                                         {{$old_price = ''}}
                                         @else
                                         {{ $price_class = 'current_price'}}
                                         {{$old_price = '₦'.number_format($product->old_price,2)}}
                                         @endif 
                                       </div>  
                                        <div class="price_box">
                                            <span class="{{$price_class}}">₦{{number_format($product->price,2)}}</span>
                                            <span class="old_price">{{$old_price}}</span>
                                        </div>
                                             <div class="add_to_cart">
                                             <input min="1" max="100" value="1" type="number" class="quantity">
                                              <a href="javascript:void(0);" data-id="{{$product->id}}" title="add to cart" class="add-to-cart"><span class="lnr lnr-cart"></span></a>
                                              </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product_content list_content">
                                    <div class="left_caption">
                                        <div class="product_name">
                                            <h3><a href="product">{{$product->name}}</a></h3>
                                        </div>
                                        <div class="product_ratings">
                                             <!-- <ul>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                            </ul> -->
                                        </div>

                                        <div class="product_desc">
                                            <p>{{$product->description}} </p>
                                        </div>
                                    </div>
                                    <div class="right_caption">
                                        <div class="text_available">
                                            <!-- <p>availabe: <span>99 in stock</span></p> -->
                                        </div>
                                        <div style="display:none"> 
                                         @if(empty($product->old_price))
                                         {{$price_class = 'regular_price'}}
                                         {{$old_price = ''}}
                                         @else
                                         {{ $price_class = 'current_price'}}
                                         {{$old_price = '₦'.number_format($product->old_price,2)}}
                                         @endif 
                                       </div>  
                                        <div class="price_box">
                                            <span class="{{$price_class}}">₦{{number_format($product->price,2)}}</span>
                                            <span class="old_price">{{$old_price}}</span>
                                        </div>
                                        <div class="cart_links_btn">
                                        <a href="javascript:void(0);" data-id="{{$product->id}}" title="add to cart" class="add-to-cart"><span class="lnr lnr-cart"></span></a>
                                        </div>
                                        <div class="action_links_btn">
                                           <ul>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box{{$product->id}}" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                                <!-- <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                                <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li> -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                        @endforeach
                        <div id="data-wrapper_modal">
                         @foreach($products as $product)
                        @include('modals.third_cate_product_view_modal')                          
                        @endforeach
                       </div>