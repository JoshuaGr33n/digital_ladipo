   <!-- modal area start-->
   @php 
 use App\CategoriesModel;
 use App\Products;
 use Illuminate\Support\Facades\DB;
 @endphp
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
                                      @php $link = str_replace(' ','-',$mostViewedProduct_main_category->main_category).'/'.str_replace(' ','-',$mostViewedProduct_second_category->second_category).'/'.str_replace(' ','-',$mostViewedProduct_third_category->third_category).'/'.str_replace(' ','-',$mostViewedProduct->name); @endphp
                                      @endforeach
                                      @endforeach
                                      @endforeach
                                  @endif
   <div class="modal fade color_scheme_2" id="modal_box_most_viewed{{$mostViewedProduct->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal_body">
                    <div class="container">
                        <span id="status-most-viewed-modal"></span>
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-12">
                                <div class="modal_tab">
                                    <div class="tab-content product-details-large">
                                        <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                            <div class="modal_tab_img">
                                               @if(!empty($mostViewedProduct->pic_1))
                                                <a href="{{$link}}"><img src="{{ asset('admin'.$mostViewedProduct->pic_1) }}" alt=""></a>
                                                @else
                                                <a href="{{$link}}"><img src="{{ asset('public/assets/img/no-img.png') }}" alt=""></a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab2" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="{{$link}}"><img src="{{ asset('admin'.$mostViewedProduct->pic_2) }}" alt=""></a>
                                            </div>
                                        </div>
                                        <!-- <div class="tab-pane fade" id="tab3" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="{{ asset('public/assets/img/product/product3.jpg') }}" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab4" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="{{ asset('public/assets/img/product/product5.jpg') }}" alt=""></a>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="modal_tab_button">
                                        <ul class="nav product_navactive owl-carousel" role="tablist">
                                            <li>
                                               @if(!empty($mostViewedProduct->pic_1))
                                                <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false"><img src="{{ asset('admin'.$mostViewedProduct->pic_1) }}" alt=""></a>
                                              @else
                                              <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false"><img src="{{ asset('public/assets/img/no-img.png') }}" alt=""></a>
                                              @endif
                                            </li>
                                            @if(!empty($mostViewedProduct->pic_2))
                                            <li>
                                                <a class="nav-link" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false"><img src="{{ asset('admin'.$mostViewedProduct->pic_2) }}" alt=""></a>
                                            </li>
                                            @endif
                                            <!-- <li>
                                                <a class="nav-link button_three" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false"><img src="{{ asset('public/assets/img/product/product3.jpg') }}" alt=""></a>
                                            </li>
                                            <li>
                                                <a class="nav-link" data-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false"><img src="{{ asset('public/assets/img/product/product5.jpg') }}" alt=""></a>
                                            </li> -->

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12">
                                <div class="modal_right">
                                    <div class="modal_title mb-10">
                                        <h2>{{$mostViewedProduct->name}}</h2>
                                    </div>
                                      <div style="display:none"> 
                                         @if(empty($mostViewedProduct->old_price))
                                         {{$price_class = 'regular_price'}}
                                         {{$old_price = ''}}
                                         @else
                                         {{ $price_class = 'new_price'}}
                                         {{$old_price = '???'.number_format($mostViewedProduct->old_price,2)}}
                                         @endif 
                                       </div>  
                                    <div class="modal_price mb-10">
                                       <span class="{{$price_class}}">???{{number_format($mostViewedProduct->price,2)}}</span>
                                       <span class="old_price">{{$old_price}}</span>
                                    </div>
                                    <div class="modal_description mb-15">
                                        <p>{{$mostViewedProduct->description}}</p>
                                    </div>
                                    <div class="variants_selects">
                                        <!-- <div class="variants_size">
                                            <h2>size</h2>
                                            <select class="select_option">
                                                <option selected value="1">s</option>
                                                <option value="1">m</option>
                                                <option value="1">l</option>
                                                <option value="1">xl</option>
                                                <option value="1">xxl</option>
                                            </select>
                                        </div>
                                        <div class="variants_color">
                                            <h2>color</h2>
                                            <select class="select_option">
                                                <option selected value="1">purple</option>
                                                <option value="1">violet</option>
                                                <option value="1">black</option>
                                                <option value="1">pink</option>
                                                <option value="1">orange</option>
                                            </select>
                                        </div> -->
                                        <div class="modal_add_to_cart">
                                          
                                                <a href="{{$link}}" class="btn btn-success btn-xs" style="margin-bottom:20px">View Product</a>
                                                
                                                 <div class="add">
                                                  <input min="1" max="100" value="1" type="number" class="quantity">
                                                  <a href="javascript:void(0);" data-id="{{$mostViewedProduct->id}}" title="add to cart" class="add-to-cart-most-viewed"><span class="lnr lnr-cart"></span></a>
                                                 </div>
                                           
                                        </div>
                                       
                                    </div>
                                    <div class="modal_social">
                                        <h2>Share this product</h2>
                                        <ul>
                                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                           
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal area end-->