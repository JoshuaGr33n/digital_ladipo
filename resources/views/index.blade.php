 
        @extends('layout')
        @section('title', 'Home')
        @section('content') 
 @php 
 use App\CategoriesModel;
 use App\Products;
 use Illuminate\Support\Facades\DB;
 @endphp

    <!--slider area start-->
    <section class="slider_section color_scheme_2 mb-42">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <div class="categories_menu ">
                        <div class="categories_title">
                            <h2 class="categori_toggle">Browse categories</h2>
                        </div>
                        <div class="categories_menu_toggle">
                            <ul>
                                @foreach ($sideBarCategories as $sideBarCategory)
                                @php $sideBarSecondCategories = CategoriesModel::where([['main_category_id',$sideBarCategory->id],['second_category','<>','']])->orderBy('created_at', 'DESC')->get();@endphp
                                <li class="menu_item_children categorie_list"><a href="{{str_replace(' ','-',$sideBarCategory->main_category)}}">{{$sideBarCategory->main_category}} @if(count($sideBarSecondCategories)>0)<i class="fa fa-angle-right"></i>@endif</a>
                                    @if(count($sideBarSecondCategories)>0) 
                                    <ul class="categories_mega_menu">
                                      @foreach($sideBarSecondCategories as $sideBarSecondCategories)
                                        <li class="menu_item_children"><a href="{{str_replace(' ','-',$sideBarCategory->main_category)}}/{{str_replace(' ','-',$sideBarSecondCategories->second_category)}}">{{$sideBarSecondCategories->second_category}}</a>
                                            <ul class="categorie_sub_menu">

                                              <?php $sideBarThirdCategories = CategoriesModel::where([['second_category_id',$sideBarSecondCategories->id],['third_category','<>','']])->orderBy('created_at', 'DESC')->get();?>
                                              @foreach($sideBarThirdCategories as $sideBarThirdCategories)
                                                <li><a href="{{str_replace(' ','-',$sideBarCategory->main_category)}}/{{str_replace(' ','-',$sideBarSecondCategories->second_category)}}/{{str_replace(' ','-',$sideBarThirdCategories->third_category)}}">{{$sideBarThirdCategories->third_category}}</a></li>
                                             @endforeach

                                            </ul>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                                @endforeach





                                @foreach ($sideBarCategories_hide as $sideBarCategory_hide)
                                @php $sideBarSecondCategories = CategoriesModel::where([['main_category_id',$sideBarCategory_hide->id],['second_category','<>','']])->orderBy('created_at', 'DESC')->get();@endphp
                                <li class="hidden menu_item_children categorie_list"><a href="{{str_replace(' ','-',$sideBarCategory_hide->main_category)}}">{{$sideBarCategory_hide->main_category}} @if(count($sideBarSecondCategories)>0)<i class="fa fa-angle-right"></i>@endif</a>
                                    @if(count($sideBarSecondCategories)>0) 
                                    <ul class="categories_mega_menu">
                                      @foreach($sideBarSecondCategories as $sideBarSecondCategories)
                                        <li class="menu_item_children"><a href="{{str_replace(' ','-',$sideBarCategory_hide->main_category)}}/{{str_replace(' ','-',$sideBarSecondCategories->second_category)}}">{{$sideBarSecondCategories->second_category}}</a>
                                            <ul class="categorie_sub_menu">

                                              @php $sideBarThirdCategories = CategoriesModel::where([['second_category_id',$sideBarSecondCategories->id],['third_category','<>','']])->orderBy('created_at', 'DESC')->get();@endphp
                                              @foreach($sideBarThirdCategories as $sideBarThirdCategories)
                                                <li><a href="{{str_replace(' ','-',$sideBarCategory_hide->main_category)}}/{{str_replace(' ','-',$sideBarSecondCategories->second_category)}}/{{str_replace(' ','-',$sideBarThirdCategories->third_category)}}">{{$sideBarThirdCategories->third_category}}</a></li>
                                             @endforeach

                                            </ul>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                                @endforeach
                               
                                
                                
                                
                                <li><a href="#" id="more-btn"><i class="fa fa-plus" aria-hidden="true"></i> More Categories</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                     @if(count($slider)==0)
                   <div class="slider_area slider_three owl-carousel" style="height:500px;">
                       <div class="single_slider d-flex align-items-center" data-bgimg="" style="width:100%;">
                            <div class="slider_content">
                                
                                <h2>No Slider</h2>
                               
                                <h1>No Slider</h1>
                                
                                
                            </div>
                        </div>
                       
                    </div>

                     @else

                    <div class="slider_area slider_three owl-carousel">
                       
                      @foreach ($slider as $slider)
                      @php 
                       $slider_main_category = CategoriesModel::where('id',$slider->main_category_id)->get();
                       $slider_second_category = CategoriesModel::where('id',$slider->second_category_id)->get();
                       $slider_third_category = CategoriesModel::where('id',$slider->third_category_id)->get();
                      @endphp
                        <div class="single_slider d-flex align-items-center" data-bgimg="{{ asset('admin'.$slider->slider_pic) }}" style="width:100%;">
                            <div class="slider_content">
                                @foreach($slider_main_category as $slider_main_category)
                                <h2>{{$slider_main_category->main_category}}</h2>
                                @endforeach
                                <h1>{{$slider->name}}</h1>
                                @if(empty($slider->second_category_id) && empty($slider->third_category_id))
                                 <a class="button" href="name/name/name/{{str_replace(' ','-',$slider_main_category->main_category)}}/{{str_replace(' ','-',$slider->name)}}">shopping now</a>
                                @elseif(empty($slider->third_category_id))
                                  @foreach($slider_second_category as $slider_second_category)
                                  <a class="button" href="name/name/name/{{str_replace(' ','-',$slider_main_category->main_category)}}/{{str_replace(' ','-',$slider_second_category->second_category)}}/{{str_replace(' ','-',$slider->name)}}">shopping now</a>
                                  @endforeach
                                @else
                                  @foreach($slider_second_category as $slider_second_category)
                                  @foreach($slider_third_category as $slider_third_category)
                                  <a class="button" href="{{str_replace(' ','-',$slider_main_category->main_category)}}/{{str_replace(' ','-',$slider_second_category->second_category)}}/{{str_replace(' ','-',$slider_third_category->third_category)}}/{{str_replace(' ','-',$slider->name)}}">shopping now</a>
                                  @endforeach
                                  @endforeach
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif  
                </div>
            </div>
        </div>

    </section>

    <!--slider area end-->
      <!--shipping area start-->
      <section class="shipping_area mb-50">
        <div class="container">
            <div class=" row">
                <div class="col-12">
                    <div class="shipping_inner">
                        <div class="single_shipping">
                            <div class="shipping_icone">
                                <img src="{{ asset('public/assets/img/about/shipping1.png')}}" alt="">
                            </div>
                            <div class="shipping_content">
                                <h2>Free Shipping</h2>
                                <p>Free shipping on all US order</p>
                            </div>
                        </div>
                        <div class="single_shipping">
                            <div class="shipping_icone">
                                <img src="{{ asset('public/assets/img/about/shipping2.png')}}" alt="">
                            </div>
                            <div class="shipping_content">
                                <h2>Support 24/7</h2>
                                <p>Contact us 24 hours a day</p>
                            </div>
                        </div>
                        <div class="single_shipping">
                            <div class="shipping_icone">
                                <img src="{{ asset('public/assets/img/about/shipping3.png')}}" alt="">
                            </div>
                            <div class="shipping_content">
                                <h2>100% Money Back</h2>
                                <p>You have 30 days to Return</p>
                            </div>
                        </div>
                        <div class="single_shipping">
                            <div class="shipping_icone">
                                <img src="{{ asset('public/assets/img/about/shipping4.png')}}" alt="">
                            </div>
                            <div class="shipping_content">
                                <h2>Payment Secure</h2>
                                <p>We ensure secure payment</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--shipping area end-->

    <!--featured categories area start-->
    <section class="featured_categories featured_c_three color_scheme_2 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2><span> <strong>Featured</strong>Categories</span></h2>
                    </div>
                    <div class="featured_container">
                        <div class="featured_carousel featured_column3 owl-carousel">
                            @foreach($featuredCategories->chunk(1) as $featuredCategory_chunk)
                            
                            <div class="single_items">
                                @foreach($featuredCategory_chunk as $featuredCategory)
                                @php 
                                $product_pic = DB::select("SELECT * FROM products WHERE main_category_id = '$featuredCategory->id' AND pic_1 NOT IN ('') ORDER BY RAND() LIMIT 1");
                                $second_categories = DB::select("SELECT * FROM categories WHERE main_category_id = '$featuredCategory->id' ORDER BY RAND() LIMIT 5");
                                @endphp
                               
                                <div class="single_featured">
                                    <div class="featured_thumb">
                                     @if(count($product_pic)>0)
                                     @foreach($product_pic as $product_pic)
                                        <a href="{{str_replace(' ','-',$featuredCategory->main_category)}}"><img src="{{ asset('admin'.$product_pic->pic_1) }}" alt="" style="height:150px; width:150px"></a>
                                     @endforeach
                                     @else
                                       <a class="primary_img" href="{{str_replace(' ','-',$featuredCategory->main_category)}}"><img src="{{ asset('public/assets/img/no-img.png') }}" alt="" style="height:150px; width:150px"></a>
                                     @endif
                                    </div>
                                    <div class="featured_content">
                                        <h3 class="product_name"><a href="{{str_replace(' ','-',$featuredCategory->main_category)}}">{{ucwords($featuredCategory->main_category)}}</a></h3>
                                        <div class="sub_featured">
                                            <ul>
                                               @foreach($second_categories as $second_categories)
                                                <li><a href="{{str_replace(' ','-',$featuredCategory->main_category)}}/{{str_replace(' ','-',$second_categories->second_category)}}">{{$second_categories->second_category}}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <a class="view_more" href="{{str_replace(' ','-',$featuredCategory->main_category)}}">shop now</a>
                                    </div>
                                </div>
                               
                                @endforeach
                            </div>
                            @endforeach
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--featured categories area end-->




   <!-- keep-safe/featured-section.php -->






     <!--featured product area start-->
<section class="product_area color_scheme_2 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <span id="status-featured"></span>
                    <div class="section_title">
                        <h2><span> <strong>Featured</strong>Products</span></h2>
                    </div>
                      <div class="product_carousel product_column5 owl-carousel" id="data-wrapper">
                         @foreach($featuredProducts as $featuredProduct)
                         
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

                         @php 
                          $category = CategoriesModel::find($featuredProduct->main_category_id);
                         @endphp
                         <div class="single_product" style="height:300px">
                            <div class="product_name">
                                <h3><a href="{{$link}}">{{$featuredProduct->name}}</a></h3>
                               
                                <p class="manufacture_product"><a href="{{str_replace(' ','-',$category->main_category)}}">{{$category->main_category}}</a></p>
                             
                            </div>
                            <div class="product_thumb">
                                
                                
                                @if(!empty($featuredProduct->pic_1))
                                <a class="primary_img" href="{{$link}}"><img src="{{ asset('admin'.$featuredProduct->pic_1) }}" alt="" style="height:130px; width:150px;"></a>
                                @else
                                <a class="primary_img" href="{{$link}}"><img src="{{ asset('public/assets/img/no-img.png') }}" alt="" style="height:130px; width:150px;"></a>
                                @endif
                                @if(!empty($featuredProduct->pic_2))
                                <a class="secondary_img" href="{{$link}}"><img src="{{ asset('admin'.$featuredProduct->pic_2) }}" alt="" style="height:130px; width:150px;"></a>
                                @endif
                                
                                <div class="label_product">
                                    @if(!empty($featuredProduct->old_price))
                                    <span class="label_sale">{{round((1 - $featuredProduct->old_price / $featuredProduct->price) * 100)}}%</span>
                                    @endif
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box_featured{{$featuredProduct->id}}" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                        <!-- <li class="wishlist"><a href="wishlist" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="wishlist" title="compare"><span class="lnr lnr-sync"></span></a></li> -->
                                    </ul>
                                </div>
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
                                         @if(empty($featuredProduct->old_price))
                                         {{$price_class = 'regular_price'}}
                                         {{$old_price = ''}}
                                         @else
                                         {{ $price_class = 'current_price'}}
                                         {{$old_price = '₦'.number_format($featuredProduct->old_price,2)}}
                                         @endif 
                                       </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="{{$price_class}}" style="font-size:15px">₦{{number_format($featuredProduct->price,2)}}</span>
                                        <span class="old_price" style="font-size:15px">{{$old_price}}</span>
                                    </div>
                                    

                                        <div class="add_to_cart">
                                        <input min="1" max="100" value="1" type="number" class="quantity">
                                        <a href="javascript:void(0);" data-id="{{$featuredProduct->id}}" title="add to cart" class="add-to-cart-featured"><span class="lnr lnr-cart"></span></a>
                                        </div>
                                </div>
                            </div>
                        </div>
                        
                        @endforeach
                       
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--featured product area end-->
     <!--most viewed product area start-->
 <section class="product_area color_scheme_2 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <span id="status-most-viewed"></span>
                    <div class="section_title">
                        <h2><span> <strong>Most</strong>View Products</span></h2>
                    </div>
                      <div class="product_carousel product_column5 owl-carousel" id="data-wrapper_most_viewed">
                         @foreach($mostViewedProducts as $mostViewedProduct)
                         
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

                         @php 
                          $category = CategoriesModel::find($mostViewedProduct->main_category_id);
                         @endphp
                         <div class="single_product" style="height:300px">
                            <div class="product_name">
                                <h3><a href="{{$link}}">{{$mostViewedProduct->name}}</a></h3>
                               
                                <p class="manufacture_product"><a href="{{str_replace(' ','-',$category->main_category)}}">{{$category->main_category}}</a></p>
                             
                            </div>
                            <div class="product_thumb">
                                
                                
                                @if(!empty($mostViewedProduct->pic_1))
                                <a class="primary_img" href="{{$link}}"><img src="{{ asset('admin'.$mostViewedProduct->pic_1) }}" alt="" style="height:130px; width:150px;"></a>
                                @else
                                <a class="primary_img" href="{{$link}}"><img src="{{ asset('public/assets/img/no-img.png') }}" alt="" style="height:130px; width:150px;"></a>
                                @endif
                                @if(!empty($mostViewedProduct->pic_2))
                                <a class="secondary_img" href="{{$link}}"><img src="{{ asset('admin'.$mostViewedProduct->pic_2) }}" alt="" style="height:130px; width:150px;"></a>
                                @endif
                                
                                <div class="label_product">
                                    @if(!empty($mostViewedProduct->old_price))
                                    <span class="label_sale">{{round((1 - $mostViewedProduct->old_price / $mostViewedProduct->price) * 100)}}%</span>
                                    @endif
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box_most_viewed{{$mostViewedProduct->id}}" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                        <!-- <li class="wishlist"><a href="wishlist" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="wishlist" title="compare"><span class="lnr lnr-sync"></span></a></li> -->
                                    </ul>
                                </div>
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
                                         @if(empty($mostViewedProduct->old_price))
                                         {{$price_class = 'regular_price'}}
                                         {{$old_price = ''}}
                                         @else
                                         {{ $price_class = 'current_price'}}
                                         {{$old_price = '₦'.number_format($mostViewedProduct->old_price,2)}}
                                         @endif 
                                       </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="{{$price_class}}" style="font-size:15px">₦{{number_format($mostViewedProduct->price,2)}}</span>
                                        <span class="old_price" style="font-size:15px">{{$old_price}}</span>
                                    </div>
                                  

                                       <div class="add_to_cart">
                                        <input min="1" max="100" value="1" type="number" class="quantity">
                                        <a href="javascript:void(0);" data-id="{{$mostViewedProduct->id}}" title="add to cart" class="add-to-cart-most-viewed"><span class="lnr lnr-cart"></span></a>
                                        </div>

                                    
                                </div>
                            </div>
                        </div>
                        
                        @endforeach
                       
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--most viewed product area end-->

     <!--best seller product area start-->
 <section class="product_area color_scheme_2 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <span id="status-best-seller"></span>
                    <div class="section_title">
                        <h2><span> <strong>Bestseller</strong>Products</span></h2>
                    </div>
                      <div class="product_carousel product_column5 owl-carousel" id="data-wrapper_best_seller">
                         @foreach($best_seller_Products as $best_seller_Product)


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

                         @php 
                          $category = CategoriesModel::find($get_product->main_category_id);
                         @endphp
                         <div class="single_product" style="height:300px">
                            <div class="product_name">
                                <h3><a href="{{$link}}">{{$get_product->name}}</a></h3>
                               
                                <p class="manufacture_product"><a href="{{str_replace(' ','-',$category->main_category)}}">{{$category->main_category}}</a></p>
                             
                            </div>
                            <div class="product_thumb">
                                
                                
                                @if(!empty($get_product->pic_1))
                                <a class="primary_img" href="{{$link}}"><img src="{{ asset('admin'.$get_product->pic_1) }}" alt="" style="height:130px; width:150px;"></a>
                                @else
                                <a class="primary_img" href="{{$link}}"><img src="{{ asset('public/assets/img/no-img.png') }}" alt="" style="height:130px; width:150px;"></a>
                                @endif
                                @if(!empty($get_product->pic_2))
                                <a class="secondary_img" href="{{$link}}"><img src="{{ asset('admin'.$get_product->pic_2) }}" alt="" style="height:130px; width:150px;"></a>
                                @endif
                                
                                <div class="label_product">
                                    @if(!empty($get_product->old_price))
                                    <span class="label_sale">{{round((1 - $get_product->old_price / $get_product->price) * 100)}}%</span>
                                    @endif
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box_best_seller{{$get_product->id}}" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                        <!-- <li class="wishlist"><a href="wishlist" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="wishlist" title="compare"><span class="lnr lnr-sync"></span></a></li> -->
                                    </ul>
                                </div>
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
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="{{$price_class}}" style="font-size:15px">₦{{number_format($get_product->price,2)}}</span>
                                        <span class="old_price" style="font-size:15px">{{$old_price}}</span>
                                    </div>

                                       <div class="add_to_cart">
                                        <input min="1" max="100" value="1" type="number" class="quantity">
                                        <a href="javascript:void(0);" data-id="{{$get_product->id}}" title="add to cart" class="add-to-cart-best-seller"><span class="lnr lnr-cart"></span></a>
                                        </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                       
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--best seller product area end-->

    <!--banner area start-->
    <section class="banner_area color_scheme_2 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner_container">
                        <div class="single_banner">
                            <div class="banner_thumb">
                                <a href="#"><img src="{{ asset('public/assets/img/bg/banner3.jpg') }}" alt=""></a>
                                <div class="banner_text">
                                    <h3>Car Audio</h3>
                                    <h2>Super Natural Sound</h2>
                                    <a href="#">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="single_banner">
                            <div class="banner_thumb">
                                <a href="#"><img src="{{ asset('public/assets/img/bg/banner4.jpg') }}" alt=""></a>
                                <div class="banner_text">
                                    <h3>All - New</h3>
                                    <h2>Perfomance Parts</h2>
                                    <a href="#">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--banner area end-->

  

    <!--product area start-->
    <section class="product_area color_scheme_2 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <span id="status-special"></span>
                    <div class="section_title">
                        <h2><span> <strong>Special</strong>Offers</span></h2>
                    </div>
                      <div class="product_carousel product_column5 owl-carousel" id="data-wrapper_special_offer">
                         @foreach($special_offers as $special_offer)
                         
                         @php 
                         $special_offer_main_category = CategoriesModel::where('id',$special_offer->main_category_id)->get();
                         $special_offer_second_category = CategoriesModel::where('id',$special_offer->second_category_id)->get();
                         $special_offer_third_category = CategoriesModel::where('id',$special_offer->third_category_id)->get();
                         @endphp
                                @if(empty($special_offer->second_category_id) && empty($special_offer->third_category_id))
                                 @foreach($special_offer_main_category as $special_offer_main_category)
                                 @php $link ='name/name/name/'.str_replace(' ','-',$special_offer_main_category->main_category).'/'.str_replace(' ','-',$special_offer->name); @endphp
                                 @endforeach
                                @elseif(empty($special_offer->third_category_id))
                                  @foreach($special_offer_main_category as $special_offer_main_category)
                                  @foreach($special_offer_second_category as $special_offer_second_category)
                                  @php $link = 'name/name/name/'.str_replace(' ','-',$special_offer_main_category->main_category).'/'.str_replace(' ','-',$special_offer_second_category->second_category).'/'.str_replace(' ','-',$special_offer->name); @endphp
                                  @endforeach
                                  @endforeach
                                @else
                                  @foreach($special_offer_main_category as $special_offer_main_category)
                                  @foreach($special_offer_second_category as $special_offer_second_category)
                                  @foreach($special_offer_third_category as $special_offer_third_category)
                                  @php $link =''.str_replace(' ','-',$special_offer_main_category->main_category).'/'.str_replace(' ','-',$special_offer_second_category->second_category).'/'.str_replace(' ','-',$special_offer_third_category->third_category).'/'.str_replace(' ','-',$special_offer->name); @endphp
                                  @endforeach
                                  @endforeach
                                  @endforeach
                                @endif

                         @php 
                          $category = CategoriesModel::find($special_offer->main_category_id);
                         @endphp
                         <div class="single_product" style="height:300px">
                            <div class="product_name">
                                <h3><a href="{{$link}}">{{$special_offer->name}}</a></h3>
                               
                                <p class="manufacture_product"><a href="{{str_replace(' ','-',$category->main_category)}}">{{$category->main_category}}</a></p>
                             
                            </div>
                            <div class="product_thumb">
                                
                                
                                @if(!empty($special_offer->pic_1))
                                <a class="primary_img" href="{{$link}}"><img src="{{ asset('admin'.$special_offer->pic_1) }}" alt="" style="height:130px; width:150px;"></a>
                                @else
                                <a class="primary_img" href="{{$link}}"><img src="{{ asset('public/assets/img/no-img.png') }}" alt="" style="height:130px; width:150px;"></a>
                                @endif
                                @if(!empty($special_offer->pic_2))
                                <a class="secondary_img" href="{{$link}}"><img src="{{ asset('admin'.$special_offer->pic_2) }}" alt="" style="height:130px; width:150px;"></a>
                                @endif
                                
                                <div class="label_product">
                                    @if(!empty($special_offer->old_price))
                                    <span class="label_sale">{{round((1 - $special_offer->old_price / $special_offer->price) * 100)}}%</span>
                                    @endif
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box_special{{$special_offer->id}}" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                        <!-- <li class="wishlist"><a href="wishlist" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="wishlist" title="compare"><span class="lnr lnr-sync"></span></a></li> -->
                                    </ul>
                                </div>
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
                                         @if(empty($special_offer->old_price))
                                         {{$price_class = 'regular_price'}}
                                         {{$old_price = ''}}
                                         @else
                                         {{ $price_class = 'current_price'}}
                                         {{$old_price = '₦'.number_format($special_offer->old_price,2)}}
                                         @endif 
                                       </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="{{$price_class}}" style="font-size:15px">₦{{number_format($special_offer->price,2)}}</span>
                                        <span class="old_price" style="font-size:15px">{{$old_price}}</span>
                                    </div>
                                    

                                        <div class="add_to_cart">
                                        <input min="1" max="100" value="1" type="number" class="quantity">
                                        <a href="javascript:void(0);" data-id="{{$special_offer->id}}" title="add to cart" class="add-to-cart-special"><span class="lnr lnr-cart"></span></a>
                                        </div>
                                </div>
                            </div>
                        </div>
                        
                        @endforeach
                       
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--product area end-->

    <!--banner area start-->
    <section class="banner_area color_scheme_2 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="single_banner banner_fullwidth">
                        <div class="banner_thumb">
                            <a href="#"><img src="{{ asset('public/assets/img/bg/'.$big_home_banner->url) }}" alt=""></a>
                            <div class="banner_text">
                                <h2>Win the cost of your</h2>
                                <h3>Tyres back</h3>
                                <p>Chance to win when you buy 2 + Pirell Tyres in March</p>
                                <a href="#">Discover Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--banner area end-->

    <!--product area start-->
    <section class="product_area color_scheme_2 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                   <span id="status"></span>
                    <div class="section_title">
                        <h2><span> <strong>Our</strong>Products</span></h2>
                        <ul class="product_tab_button nav" role="tablist" id="nav-tab2">
                            @foreach($ourProductsCategories as $ourProductsCategory)
                            @php $our_products = Products::select('*')->where([['main_category_id',$ourProductsCategory->id],['item_status','=','Available']])->orderBy('created_at', 'DESC')->get(); @endphp
                            
                            @if($loop->first)
                            @if(count($our_products)>0)
                            <li>
                                <a class="active" data-toggle="tab" href="#{{str_replace(array(' ','&'),array('-','and'),$ourProductsCategory->main_category)}}" role="tab" aria-controls="{{str_replace(' ','-',$ourProductsCategory->main_category)}}" aria-selected="true">{{ucwords($ourProductsCategory->main_category)}}</a>
                            </li>
                            @endif
                            @else
                            @if(count($our_products)>0)
                            <li>
                                <a data-toggle="tab" href="#{{str_replace(array(' ','&'),array('-','and'),$ourProductsCategory->main_category)}}" role="tab" aria-controls="{{str_replace(' ','-',$ourProductsCategory->main_category)}}" aria-selected="false">{{ucwords($ourProductsCategory->main_category)}}</a>
                            </li>

                            @endif
                            @endif
                            
                            
                           
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
           
            <div class="tab-content" id="data-wrapper_our_product">
              @foreach($ourProductsCategories as $ourProductsCategory)
                <div class="tab-pane fade show active" id="{{str_replace(array(' ','&'),array('-','and'),$ourProductsCategory->main_category)}}" role="tabpanel">
                   @php $our_products = Products::select('*')->where([['main_category_id',$ourProductsCategory->id],['item_status','=','Available']])->orderBy('created_at', 'DESC')->get(); @endphp
                   <div class="product_carousel product_column5 owl-carousel">
                       @foreach($our_products->chunk(2)  as $our_product_chunk) 

                       

                        <div class="single_product_list">

                          @foreach($our_product_chunk as $our_product)
                             @php 
                              $our_product_main_category = CategoriesModel::where('id',$our_product->main_category_id)->get();
                              $our_product_second_category = CategoriesModel::where('id',$our_product->second_category_id)->get();
                               $our_product_third_category = CategoriesModel::where('id',$our_product->third_category_id)->get();
                             @endphp

                                   @if(empty($our_product->second_category_id) && empty($our_product->third_category_id))
                                       @foreach($our_product_main_category as $our_product_main_category)
                                       @php $link ='name/name/name/'.str_replace(' ','-',$our_product_main_category->main_category).'/'.str_replace(' ','-',$our_product->name); @endphp
                                    @endforeach
                                    @elseif(empty($our_product->third_category_id))
                                       @foreach($our_product_main_category as $our_product_main_category)
                                       @foreach($our_product_second_category as $our_product_second_category)
                                       @php $link = 'name/name/name/'.str_replace(' ','-',$our_product_main_category->main_category).'/'.str_replace(' ','-',$our_product_second_category->second_category).'/'.str_replace(' ','-',$our_product->name); @endphp
                                       @endforeach
                                   @endforeach
                                   @else
                                      @foreach($our_product_main_category as $our_product_main_category)
                                      @foreach($our_product_second_category as $our_product_second_category)
                                      @foreach($our_product_third_category as $our_product_third_category)
                                      @php $link =''.str_replace(' ','-',$our_product_main_category->main_category).'/'.str_replace(' ','-',$our_product_second_category->second_category).'/'.str_replace(' ','-',$our_product_third_category->third_category).'/'.str_replace(' ','-',$our_product->name); @endphp
                                      @endforeach
                                      @endforeach
                                      @endforeach
                                   @endif


                              @php 
                              $category = CategoriesModel::find($our_product->main_category_id);
                              @endphp
                            <div class="single_product" style="height:300px">
                                <div class="product_name">
                                    <h3><a href="{{$link}}">{{$our_product->name}}</a></h3>
                                    <p class="manufacture_product"><a href="{{str_replace(' ','-',$category->main_category)}}">{{$category->main_category}}</a></p>
                                </div>
                                <div class="product_thumb">
                                   
                                

                                    @if(!empty($our_product->pic_1))
                                    <a class="primary_img" href="{{$link}}"><img src="{{ asset('admin'.$our_product->pic_1) }}" alt=""   style="height:150px; width:150px"></a>
                                    @else
                                    <a class="primary_img" href="{{$link}}"><img src="{{ asset('public/assets/img/no-img.png') }}" alt="" style="height:150px; width:150px"></a>
                                    @endif
                                    @if(!empty($our_product->pic_2))
                                    <a class="secondary_img" href="{{$link}}"><img src="{{ asset('admin'.$our_product->pic_2) }}" alt="" style="height:150px; width:150px"></a>
                                    @endif
                                    <div class="label_product">
                                     @if(!empty($our_product->old_price))
                                     <span class="label_sale">{{round((1 - $our_product->old_price / $our_product->price) * 100)}}%</span>
                                     @endif
                                    </div>

                                    <div class="action_links">
                                        <ul>
                                            <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box{{$our_product->id}}" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                            <!-- <li class="wishlist"><a href="wishlist" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                            <li class="compare"><a href="wishlist" title="compare"><span class="lnr lnr-sync"></span></a></li> -->
                                        </ul>
                                    </div>
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
                                         @if(empty($our_product->old_price))
                                         {{$price_class = 'regular_price'}}
                                         {{$old_price = ''}}
                                         @else
                                         {{ $price_class = 'current_price'}}
                                         {{$old_price = '₦'.number_format($our_product->old_price,2)}}
                                         @endif 
                                       </div>  
                                    <div class="product_footer d-flex align-items-center">
                                        <div class="price_box">
                                            <span class="{{$price_class}}" style="font-size:15px">₦{{number_format($our_product->price,2)}}</span>
                                            <span class="old_price" style="font-size:15px">{{$old_price}}</span>
                                        </div>

                                        <div class="add_to_cart">
                                        <input min="1" max="100" value="1" type="number" class="quantity">
                                        <a href="javascript:void(0);" data-id="{{$our_product->id}}" title="add to cart" class="add-to-cart"><span class="lnr lnr-cart"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                           
                            
                        </div>
                        @endforeach
                         
                         
                       
                       
                    </div>
                </div>

                 
                @endforeach
               
           
            </div>
        
        </div>
    </section>
    
    <!--product area end-->
    
  <!--brand area start-->
  <div class="brand_area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                 <h2><span> <strong></strong>Brands</span></h2>
                    <div class="product_carousel product_column5 brand_container owl-carousel" style="margin-top:20px">
                      @foreach($brands as $brand)
                        <div class="single_brand">
                            <a href="{{url(str_replace(' ','-',$brand->name))}}/home/brands/{{$brand->category}}-brands/products"><img src="{{ asset('admin'.$brand->logo) }}" alt="" style="width:120px; height:100px"></a>
                        </div>
                       @endforeach 
                        <!-- <div class="single_brand">
                            <a href="#"><img src="{{ asset('public/assets/img/brand/brand1.png')}}" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="{{ asset('public/assets/img/brand/brand2.png')}}" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="{{ asset('public/assets/img/brand/brand3.png')}}" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="{{ asset('public/assets/img/brand/brand4.png')}}" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="{{ asset('public/assets/img/brand/brand2.png')}}" alt=""></a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--brand area end-->
    <!--vidio banner area start-->
    <!-- <div class="vidio_banner_area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="vidio_banner_thumb">
                        <a href="#"><img src="{{ asset('public/assets/img/bg/new-banner.jpg') }}" alt=""></a>
                        <div class="vidio_play-btn">
                            <a class="new_vidio_play" href="https://youtu.be/PSLroLJEI9M"><i class="fa fa-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!--vidio banner area  end-->

    <!--brand area start-->
    <!-- <div class="brand_area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="brand_container owl-carousel">
                        <div class="single_brand">
                            <a href="#"><img src="{{ asset('public/assets/img/brand/brand.png') }}" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="{{ asset('public/assets/img/brand/brand1.png') }}" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="{{ asset('public/assets/img/brand/brand2.png') }}" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="{{ asset('public/assets/img/brand/brand3.png') }}" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="{{ asset('public/assets/img/brand/brand4.png') }}" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="{{ asset('public/assets/img/brand/brand2.png') }}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!--brand area end-->
    <div id="data-wrapper_our_product_modal">
    @foreach($ourProductsCategories as $ourProductsCategory)
    @php $our_products = Products::select('*')->where([['main_category_id',$ourProductsCategory->id],['item_status','=','Available']])->orderBy('created_at', 'DESC')->get(); @endphp
    @foreach($our_products as $our_product) 
    @include('modals.product_view_modal')
    @endforeach
    @endforeach
    </div>

    <div id="data-wrapper_special_offer_modal">
    @foreach($special_offers as $special_offer)
    @include('modals.special_offer_product_view_modal')
    @endforeach
    </div>
   <div id="data-wrapper_featured_modal">
    @foreach($featuredProducts as $featuredProduct)
    @include('modals.featured_product_view_modal')
    @endforeach
    </div>

   <div id="data-wrapper_most_viewed_modal">
    @foreach($mostViewedProducts as $mostViewedProduct)
    @include('modals.most_view_product_view_modal')
    @endforeach
    </div>



   <div id="data-wrapper_best_seller_modal">
    @foreach($best_seller_Products as $best_seller_Product)
       @php
       $get_product = Products::find($best_seller_Product->item_id);
      @endphp
    @include('modals.best_seller_product_view_modal')
    @endforeach
    </div>




    @endsection
    @section('scripts')
    <script type="text/javascript">
     $('#data-wrapper_our_product').on('click','.add-to-cart',function(e) {
    //    $(".add-to-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            ele.siblings('.btn-loading').show();

            var quantity = $(this).closest('.add_to_cart').find('.quantity').val();

                $.ajax({
                 url: '{{ url('add-to-cart') }}' + '/' + ele.attr("data-id"),
                 method: "get",
                data: {_token: '{{ csrf_token() }}',quantity: quantity},
                dataType: "json",
                success: function (response) {

                    ele.siblings('.btn-loading').hide();

                    $("span#status").html('<div class="alert alert-success">'+response.msg+'</div>');
                    $("#header-bar").html(response.data);
                }
            });
        });
    </script>


<script type="text/javascript">
$('#data-wrapper_our_product_modal').on('click','.add-to-cart',function(e) {
    // $(".related-products-add-to-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        ele.siblings('.btn-loading').show();

         var quantity = $(this).closest('.add').find('.quantity').val();

        $.ajax({
            url: '{{ url('add-to-cart') }}' + '/' + ele.attr("data-id"),
            method: "get",
            data: {_token: '{{ csrf_token() }}',quantity: quantity},
            dataType: "json",
            success: function (response) {

                ele.siblings('.btn-loading').hide();

                $("span#our_product-add-to-cart-modal").html('<div class="alert alert-success">'+response.msg+'</div>');
                $("#header-bar").html(response.data);
            }
        });
    });
</script>




   <script type="text/javascript">
      $('#data-wrapper').on('click','.add-to-cart-featured',function(e) {
         //  $(".add-to-cart-featured").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            ele.siblings('.btn-loading').show();

             var quantity = $(this).closest('.add_to_cart').find('.quantity').val();

        $.ajax({
            url: '{{ url('add-to-cart') }}' + '/' + ele.attr("data-id"),
            method: "get",
            data: {_token: '{{ csrf_token() }}',quantity: quantity},
                dataType: "json",
                success: function (response) {

                    ele.siblings('.btn-loading').hide();

                    $("span#status-featured").html('<div class="alert alert-success">'+response.msg+'</div>');
                    $("#header-bar").html(response.data);
                }
            });
        });
    </script>
<script type="text/javascript">
$('#data-wrapper_featured_modal').on('click','.add-to-cart-featured',function(e) {
    // $(".related-products-add-to-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        ele.siblings('.btn-loading').show();

         var quantity = $(this).closest('.add').find('.quantity').val();

        $.ajax({
            url: '{{ url('add-to-cart') }}' + '/' + ele.attr("data-id"),
            method: "get",
            data: {_token: '{{ csrf_token() }}',quantity: quantity},
            dataType: "json",
            success: function (response) {

                ele.siblings('.btn-loading').hide();

                $("span#status-featured-modal").html('<div class="alert alert-success">'+response.msg+'</div>');
                $("#header-bar").html(response.data);
            }
        });
    });
</script>





<script type="text/javascript">
 $('#data-wrapper_most_viewed').on('click','.add-to-cart-most-viewed',function(e) {
    //    $(".add-to-cart-most-viewed").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            ele.siblings('.btn-loading').show();

             var quantity = $(this).closest('.add_to_cart').find('.quantity').val();

        $.ajax({
            url: '{{ url('add-to-cart') }}' + '/' + ele.attr("data-id"),
            method: "get",
            data: {_token: '{{ csrf_token() }}',quantity: quantity},
                dataType: "json",
                success: function (response) {

                    ele.siblings('.btn-loading').hide();

                    $("span#status-most-viewed").html('<div class="alert alert-success">'+response.msg+'</div>');
                    $("#header-bar").html(response.data);
                }
            });
        });
    </script>


<script type="text/javascript">
$('#data-wrapper_most_viewed_modal').on('click','.add-to-cart-most-viewed',function(e) {
    // $(".related-products-add-to-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        ele.siblings('.btn-loading').show();

         var quantity = $(this).closest('.add').find('.quantity').val();

        $.ajax({
            url: '{{ url('add-to-cart') }}' + '/' + ele.attr("data-id"),
            method: "get",
            data: {_token: '{{ csrf_token() }}',quantity: quantity},
            dataType: "json",
            success: function (response) {

                ele.siblings('.btn-loading').hide();

                $("span#status-most-viewed-modal").html('<div class="alert alert-success">'+response.msg+'</div>');
                $("#header-bar").html(response.data);
            }
        });
    });
</script>


<script type="text/javascript">
$('#data-wrapper_best_seller').on('click','.add-to-cart-best-seller',function(e) {
    //    $(".add-to-cart-best-seller").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            ele.siblings('.btn-loading').show();

             var quantity = $(this).closest('.add_to_cart').find('.quantity').val();

        $.ajax({
            url: '{{ url('add-to-cart') }}' + '/' + ele.attr("data-id"),
            method: "get",
            data: {_token: '{{ csrf_token() }}',quantity: quantity},
                dataType: "json",
                success: function (response) {

                    ele.siblings('.btn-loading').hide();

                    $("span#status-best-seller").html('<div class="alert alert-success">'+response.msg+'</div>');
                    $("#header-bar").html(response.data);
                }
            });
        });
    </script>



<script type="text/javascript">
$('#data-wrapper_best_seller_modal').on('click','.add-to-cart-best-seller',function(e) {
    // $(".related-products-add-to-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        ele.siblings('.btn-loading').show();

         var quantity = $(this).closest('.add').find('.quantity').val();

        $.ajax({
            url: '{{ url('add-to-cart') }}' + '/' + ele.attr("data-id"),
            method: "get",
            data: {_token: '{{ csrf_token() }}',quantity: quantity},
            dataType: "json",
            success: function (response) {

                ele.siblings('.btn-loading').hide();

                $("span#status-best-seller-modal").html('<div class="alert alert-success">'+response.msg+'</div>');
                $("#header-bar").html(response.data);
            }
        });
    });
</script>






   <script type="text/javascript">
      $('#data-wrapper_special_offer').on('click','.add-to-cart-special',function(e) {
    //    $(".add-to-cart-special").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            ele.siblings('.btn-loading').show();

             var quantity = $(this).closest('.add_to_cart').find('.quantity').val();

        $.ajax({
            url: '{{ url('add-to-cart') }}' + '/' + ele.attr("data-id"),
            method: "get",
            data: {_token: '{{ csrf_token() }}',quantity: quantity},
                dataType: "json",
                success: function (response) {

                    ele.siblings('.btn-loading').hide();

                    $("span#status-special").html('<div class="alert alert-success">'+response.msg+'</div>');
                    $("#header-bar").html(response.data);
                }
            });
        });
    </script>





<script type="text/javascript">
$('#data-wrapper_special_offer_modal').on('click','.add-to-cart-special',function(e) {
    // $(".related-products-add-to-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        ele.siblings('.btn-loading').show();

         var quantity = $(this).closest('.add').find('.quantity').val();

        $.ajax({
            url: '{{ url('add-to-cart') }}' + '/' + ele.attr("data-id"),
            method: "get",
            data: {_token: '{{ csrf_token() }}',quantity: quantity},
            dataType: "json",
            success: function (response) {

                ele.siblings('.btn-loading').hide();

                $("span#status-special-modal").html('<div class="alert alert-success">'+response.msg+'</div>');
                $("#header-bar").html(response.data);
            }
        });
    });
</script>


    @stop


    