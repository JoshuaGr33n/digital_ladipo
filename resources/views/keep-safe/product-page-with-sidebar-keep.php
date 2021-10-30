 
  @extends('layout')
        @section('title', ucwords($product->name))
        @section('content') 
 @php    
 use App\Products;
 use Illuminate\Support\Facades\DB;
 use App\CategoriesModel;
 @endphp
 <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{url('/')}}">home</a></li>
                            <li><a href="{{url(str_replace(' ','-',$mainCat->main_category))}}">{{$mainCat->main_category}}</a></li>
                            <li>{{$product->name}}</li>
                           
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--product details start-->
    <div class="product_details product_sidebar mt-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                     <!--sidebar widget start-->
                     <aside class="sidebar_widget">
                        <div class="widget_inner">
                            
                            <div class="widget_list widget_categories">
                                <h2>main categories</h2>
                                <ul>
                                    @foreach($sideBarCategories as $sideBarCategory)
                                    @php $count_Products = Products::select('*')->where([['main_category_id','=',$sideBarCategory->id],['item_status','=','Available']])->get(); @endphp
                                    <li>
                                        <!-- <input type="checkbox"> -->
                                        <a href="{{url(str_replace(' ','-',$sideBarCategory->main_category))}}">{{ucwords($sideBarCategory->main_category)}} ({{count($count_Products)}})</a>
                                        <!-- <span class="checkmark"></span> -->
                                    </li>
                                    @endforeach

                                </ul>
                            </div>

                        </div>
                        <div class="shop_sidebar_banner">
                            <a href="#"><img src="{{ asset('public/assets/img/bg/banner9.jpg') }}" alt=""></a>
                        </div>
                    </aside>
                    <!--sidebar widget end-->
                </div>
                <div class="col-lg-9 col-md-12">
                   <span id="status"></span>
                    <div class="product_right_sidebar">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="product-details-tab">

                                    <div id="img-1" class="zoomWrapper single-zoom">
                                        <a href="#">
                                            @if(!empty($product->pic_1))<img id="zoom1" src="{{ asset('admin'.$product->pic_1) }}" data-zoom-image="{{ asset('admin'.$product->pic_1) }}" alt="big-1">@else<img id="zoom1" src="{{ asset('public/assets/img/no-img.png') }}" data-zoom-image="{{ asset('public/assets/img/no-img.png') }}" alt="big-1">@endif
                                        </a>
                                    </div>

                                    <div class="single-zoom-thumb">
                                      <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                            <li>
                                              @if(!empty($product->pic_1))<a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{ asset('admin'.$product->pic_1) }}" data-zoom-image="{{ asset('admin'.$product->pic_1) }}">@else<a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{ asset('public/assets/img/no-img.png') }}" data-zoom-image="{{ asset('public/assets/img/no-img.png') }}">@endif
                                                  @if(!empty($product->pic_1))<img src="{{ asset('admin'.$product->pic_1) }}" alt="zo-th-1" style="width:80px;height:60px"/>@else<img src="{{ asset('public/assets/img/no-img.png') }}" alt="" style="width:80px;height:60px">@endif
                                                                         </a>

                                            </li>

                                            @if(!empty($product->pic_2))<li>
                                               <a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{ asset('admin'.$product->pic_2) }}" data-zoom-image="{{ asset('admin'.$product->pic_2) }}">
                                                  <img src="{{ asset('admin'.$product->pic_2) }}" alt="zo-th-1"  style="width:80px;height:60px"/>
                                                                          </a>

                                            </li>@endif
                                           
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="product_d_right">
                                    <form action="#">

                                        <h1>{{$product->name}}</h1>
                                        <div class="product_nav">
                                            <!-- <ul>
                                                <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                                <li class="next"><a href="variable-product.html"><i class="fa fa-angle-right"></i></a></li>
                                            </ul> -->
                                        </div>
                                        <div class=" product_ratting">
                                            <!-- <ul>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li class="review"><a href="#"> (customer review ) </a></li>
                                            </ul> -->

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
                                        <div class="product_desc">
                                            <p>{{$product->description}}</p>
                                        </div>
                                        <!-- <div class="product_variant color">
                                            <h3>Available Options</h3>
                                            <label>color</label>
                                            <ul>
                                                <li class="color1"><a href="#"></a></li>
                                                <li class="color2"><a href="#"></a></li>
                                                <li class="color3"><a href="#"></a></li>
                                                <li class="color4"><a href="#"></a></li>
                                            </ul>
                                        </div> -->
                                        <div class="product_variant quantity">
                                            <!-- <label>quantity</label>
                                            <input min="1" max="100" value="1" type="number"> -->
                                            <a href="javascript:void(0);" data-id="{{$product->id}}" class="btn btn-warning pull-right add-to-cart" style="margin-left:20px">Add to Cart</a>

                                        </div>
                                        <div class=" product_d_action">
                                            <!-- <ul>
                                                <li><a href="#" title="Add to wishlist">+ Add to Wishlist</a></li>
                                                <li><a href="#" title="Add to wishlist">+ Compare</a></li>
                                            </ul> -->
                                        </div>
                                        <div class="product_meta">
                                            <span>Category: <a href="#">{{ucwords($mainCat->main_category)}}</a></span>
                                        </div>

                                    </form>
                                    <div class="priduct_social">
                                        <ul>
                                            <li><a class="facebook" href="#" title="facebook"><i class="fa fa-facebook"></i> Like</a></li>
                                            <li><a class="twitter" href="#" title="twitter"><i class="fa fa-twitter"></i> tweet</a></li>
                                            <li><a class="pinterest" href="#" title="pinterest"><i class="fa fa-pinterest"></i> save</a></li>
                                            <li><a class="google-plus" href="#" title="google +"><i class="fa fa-google-plus"></i> share</a></li>
                                            <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i> linked</a></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--product info start-->
                    <div class="product_d_info sidebar">
                        <div class="product_d_inner ">
                            <div class="product_info_button">
                                <ul class="nav" role="tablist" id="nav-tab">
                                    <li>
                                        <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Description</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">Specification</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews (1)</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="info" role="tabpanel">
                                    <div class="product_info_content">
                                        <p>{{$product->description}}</p>
                                        <!-- <p>Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget.</p> -->
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="sheet" role="tabpanel">
                                    <div class="product_d_table">
                                        <form action="#">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="first_child">Compositions</td>
                                                        <td>Polyester</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="first_child">Styles</td>
                                                        <td>Girly</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="first_child">Properties</td>
                                                        <td>Short Dress</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                    <div class="product_info_content">
                                        <p>Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which have since evolved into a full ready-to-wear collection in which every item is a vital part of a woman's wardrobe. The result? Cool, easy, chic looks with youthful elegance and unmistakable signature style. All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories including shoes, hats, belts and more!</p>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="reviews" role="tabpanel">
                                    <div class="reviews_wrapper">
                                        <h2>1 review for Donec eu furniture</h2>
                                        <div class="reviews_comment_box">
                                            <div class="comment_thmb">
                                                <img src="{{ asset('public/assets/img/blog/comment2.jpg') }}" alt="">
                                            </div>
                                            <div class="comment_text">
                                                <div class="reviews_meta">
                                                    <div class="star_rating">
                                                        <ul>
                                                            <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                            <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                            <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                            <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                            <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <p><strong>admin </strong>- September 12, 2018</p>
                                                    <span>roadthemes</span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="comment_title">
                                            <h2>Add a review </h2>
                                            <p>Your email address will not be published. Required fields are marked </p>
                                        </div>
                                        <div class="product_ratting mb-10">
                                            <h3>Your rating</h3>
                                            <ul>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product_review_form">
                                            <form action="#">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label for="review_comment">Your review </label>
                                                        <textarea name="comment" id="review_comment"></textarea>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <label for="author">Name</label>
                                                        <input id="author" type="text">

                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <label for="email">Email </label>
                                                        <input id="email" type="text">
                                                    </div>
                                                </div>
                                                <button type="submit">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--product info end-->
                   


                    <!--product area start-->
                    <div class="product_area mb-50">
                     <span id="related-products-add-to-cart"></span>
                        <div class="section_title">
                            <h2><span> <strong>Related</strong>Products</span></h2>
                        </div>
                        <div class="product_carousel product_sidebar_column4 owl-carousel">
                            @foreach($related_products as $related_product)
                            <div class="single_product">
                                <div class="product_name">
                                    <h3><a href="{{url('name/name/name/'.str_replace(' ','-',$mainCat->main_category))}}/{{str_replace(' ','-',$related_product->name)}}">{{$related_product->name}}</a></h3>
                                    <?php //$related_products_cat = CategoriesModel::where('id',$related_product->main_category_id);?>
                                    @php 
                                    $category = CategoriesModel::find($related_product->main_category_id);
                                    @endphp
                                    <p class="manufacture_product"><a href="{{url(str_replace(' ','-',$category->main_category))}}">{{$category->main_category}}</a></p>
                                    
                                   
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="{{url('name/name/name/'.str_replace(' ','-',$mainCat->main_category))}}/{{str_replace(' ','-',$related_product->name)}}">@if(!empty($related_product->pic_1))<img src="{{ asset('admin'.$related_product->pic_1) }}" alt="" style="width:150px; height:150px">@else<img src="{{ asset('public/assets/img/no-img.png') }}" alt="" style="width:150px; height:150px">@endif</a>
                                    <a class="secondary_img" href="{{url('name/name/name/'.str_replace(' ','-',$mainCat->main_category))}}/{{str_replace(' ','-',$related_product->name)}}">@if(!empty($related_product->pic_2))<img src="{{ asset('admin'.$related_product->pic_2) }}" alt="" style="width:150px; height:150px">@endif</a>
                                    <div class="label_product">
                                     @if(!empty($related_product->old_price))
                                       <span class="label_sale">{{round((1 - $related_product->old_price / $related_product->price) * 100)}}%</span>
                                      @endif
                                    </div>

                                    <div class="action_links">
                                        <ul>
                                            <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box{{$related_product->id}}" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                            <!-- <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                            <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li> -->
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
                                    <div class="product_footer d-flex align-items-center">
                                    <div style="display:none"> 
                                         @if(empty($related_product->old_price))
                                         {{$price_class = 'regular_price'}}
                                         {{$old_price = ''}}
                                         @else
                                         {{ $price_class = 'current_price'}}
                                         {{$old_price = '₦'.number_format($related_product->old_price,2)}}
                                         @endif 
                                       </div>  
                                        <div class="price_box">
                                            <span class="{{$price_class}}">₦{{number_format($related_product->price,2)}}</span>
                                            <span class="old_price">{{$old_price}}</span>
                                        </div>
                                        <div class="add_to_cart">
                                        <a href="javascript:void(0);" data-id="{{$related_product->id}}" title="add to cart" class="related-products-add-to-cart"><span class="lnr lnr-cart"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!--product area end-->

                    <!--product area start-->
                    <!-- <section class="product_area mb-50">
                        <div class="section_title">
                            <h2><span> <strong>Upsell</strong>Products</span></h2>
                        </div>
                        <div class="product_carousel product_sidebar_column4 owl-carousel">
                            <div class="single_product">
                                <div class="product_name">
                                    <h3><a href="#">JBL Flip 3 Splasroof Portable Bluetooth 2</a></h3>
                                    <p class="manufacture_product"><a href="#">Accessories</a></p>
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="#"><img src="{{ asset('public/assets/img/product/product19.jpg') }}" alt=""></a>
                                    <a class="secondary_img" href="#"><img src="{{ asset('public/assets/img/product/product11.jpg') }}" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">-57%</span>
                                    </div>

                                    <div class="action_links">
                                        <ul>
                                            <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                            <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <div class="product_ratings">
                                        <ul>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product_footer d-flex align-items-center">
                                        <div class="price_box">
                                            <span class="regular_price">#180.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single_product">
                                <div class="product_name">
                                    <h3><a href="#">Bose SoundLink Bluetooth Speaker</a></h3>
                                    <p class="manufacture_product"><a href="#">Accessories</a></p>
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="#"><img src="{{ asset('public/assets/img/product/product12.jpg') }}" alt=""></a>
                                    <a class="secondary_img" href="#"><img src="{{ asset('public/assets/img/product/product13.jpg') }}" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">-47%</span>
                                    </div>

                                    <div class="action_links">
                                        <ul>
                                            <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                            <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <div class="product_ratings">
                                        <ul>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product_footer d-flex align-items-center">
                                        <div class="price_box">
                                            <span class="current_price">#160.00</span>
                                            <span class="old_price">#3200.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single_product">
                                <div class="product_name">
                                    <h3><a href="#">Variable with soldout product for title</a></h3>
                                    <p class="manufacture_product"><a href="#">Accessories</a></p>
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="#"><img src="{{ asset('public/assets/img/product/product15.jpg') }}" alt=""></a>
                                    <a class="secondary_img" href="#"><img src="{{ asset('public/assets/img/product/product14.jpg') }}" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">-57%</span>
                                    </div>

                                    <div class="action_links">
                                        <ul>
                                            <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                            <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <div class="product_ratings">
                                        <ul>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product_footer d-flex align-items-center">
                                        <div class="price_box">
                                            <span class="regular_price">#150.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single_product">
                                <div class="product_name">
                                    <h3><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h3>
                                    <p class="manufacture_product"><a href="#">Accessories</a></p>
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="#"><img src="{{ asset('public/assets/img/product/product16.jpg') }}" alt=""></a>
                                    <a class="secondary_img" href="#"><img src="{{ asset('public/assets/img/product/product17.jpg') }}" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">-57%</span>
                                    </div>

                                    <div class="action_links">
                                        <ul>
                                            <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                            <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <div class="product_ratings">
                                        <ul>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product_footer d-flex align-items-center">
                                        <div class="price_box">
                                            <span class="regular_price">#175.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single_product">
                                <div class="product_name">
                                    <h3><a href="#">JBL Flip 3 Splasroof Portable Bluetooth 2</a></h3>
                                    <p class="manufacture_product"><a href="#">Accessories</a></p>
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="#"><img src="{{ asset('public/assets/img/product/product18.jpg') }}" alt=""></a>
                                    <a class="secondary_img" href="#"><img src="{{ asset('public/assets/img/product/product1.jpg') }}" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">-07%</span>
                                    </div>

                                    <div class="action_links">
                                        <ul>
                                            <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                            <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <div class="product_ratings">
                                        <ul>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product_footer d-flex align-items-center">
                                        <div class="price_box">
                                            <span class="current_price">#180.00</span>
                                            <span class="old_price">#420.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single_product">
                                <div class="product_name">
                                    <h3><a href="#">Accusantium dolorem Security Camera</a></h3>
                                    <p class="manufacture_product"><a href="#">Accessories</a></p>
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="#"><img src="{{ asset('public/assets/img/product/product2.jpg') }}" alt=""></a>
                                    <a class="secondary_img" href="#"><img src="{{ asset('public/assets/img/product/product3.jpg') }}" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">-57%</span>
                                    </div>

                                    <div class="action_links">
                                        <ul>
                                            <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                            <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <div class="product_ratings">
                                        <ul>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product_footer d-flex align-items-center">
                                        <div class="price_box">
                                            <span class="current_price">#140.00</span>
                                            <span class="old_price">#320.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single_product">
                                <div class="product_name">
                                    <h3><a href="#">Koss Porta Pro On Ear Headphones </a></h3>
                                    <p class="manufacture_product"><a href="#">Accessories</a></p>
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="#"><img src="{{ asset('public/assets/img/product/product4.jpg') }}" alt=""></a>
                                    <a class="secondary_img" href="#"><img src="{{ asset('public/assets/img/product/product5.jpg') }}" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">-57%</span>
                                    </div>

                                    <div class="action_links">
                                        <ul>
                                            <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                            <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <div class="product_ratings">
                                        <ul>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product_footer d-flex align-items-center">
                                        <div class="price_box">
                                            <span class="regular_price">#160.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section> -->
                    <!--product area end-->

                </div>

            </div>
        </div>
    </div>
    <!--product details end-->
    @foreach($related_products as $related_product)
    @include('modals.product_product_view_modal')
    @endforeach

    @endsection
    @section('scripts')

<script type="text/javascript">
    $(".add-to-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        ele.siblings('.btn-loading').show();

        $.ajax({
            url: '{{ url('add-to-cart') }}' + '/' + ele.attr("data-id"),
            method: "get",
            data: {_token: '{{ csrf_token() }}'},
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
    $(".related-products-add-to-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        ele.siblings('.btn-loading').show();

        $.ajax({
            url: '{{ url('add-to-cart') }}' + '/' + ele.attr("data-id"),
            method: "get",
            data: {_token: '{{ csrf_token() }}'},
            dataType: "json",
            success: function (response) {

                ele.siblings('.btn-loading').hide();

                $("span#related-products-add-to-cart").html('<div class="alert alert-success">'+response.msg+'</div>');
                $("#header-bar").html(response.data);
            }
        });
    });
</script>
    @stop