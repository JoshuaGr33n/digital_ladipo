 
       @extends('layout')
        @section('title', 'Category:: '.ucwords($brand->name))
        @section('content') 
 

        @php
        use App\Products;
        use App\CategoriesModel
        @endphp

     



        <style type="text/css">
		.pagination .current{
			background-color: #b2e515 !important;
			color: white !important;
			border-color: #b2e515 !important;
		}

	</style>
	
 
 <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{url('/')}}">home</a></li>
                            <li>Part Brand </li>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->
    
    <!--shop  area start-->
    <div class="shop_area shop_fullwidth" id="data-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!--shop wrapper start-->
                    <!--shop toolbar start-->
                    <div class="shop_title">
                        <h1>{{$brand->name}}</h1>
                    </div>
                    <div class="shop_toolbar_wrapper">
                        <div class="shop_toolbar_btn">

                            <button data-role="grid_3" type="button" class="active btn-grid-3" data-toggle="tooltip" title="3"></button>

                            <button data-role="grid_4" type="button" class=" btn-grid-4" data-toggle="tooltip" title="4"></button>

                            <button data-role="grid_list" type="button" class="btn-list" data-toggle="tooltip" title="List"></button>
                        </div>
                         <!-- <div class="niceselect_option"> -->
                        <!-- class="select_option"  -->
                        <form action="{{url($brand->name)}}/home/brands/Part-brands/products" method="get">
                              
                              <select class="form-control" name="sortby" id="short" onchange="this.form.submit()">
  
                                      <!-- <option>Sort by:</option> -->
                                       <!-- <option selected value="1">Sort by average rating</option> -->
  
                                      @if($sortby == 'All')
                                       <option value="All" selected>Sort By: All</option>
                                       @else
                                      <option value="All">All</option>
                                      @endif
                                     
                                      @if($sortby == '2')
                                      <option value="2" selected>Sort by: popularity</option>
                                      @else
                                      <option value="2">Sort by popularity</option>
                                      @endif
                                      @if($sortby == '3')
                                      <option value="3" selected>Sort by: newness</option>
                                      @else
                                      <option value="3">Sort by newness</option>
                                      @endif
                                      @if($sortby == '4')
                                      <option value="4" selected>Sort by price: low to high</option>
                                      @else
                                      <option value="4">Sort by price: low to high</option>
                                      @endif
                                      @if($sortby == '5')
                                      <option value="5" selected>Sort by price: high to low</option>
                                      @else
                                      <option value="5">Sort by price: high to low</option>
                                      @endif
                                      <!-- <option value="6">Product Name: Z</option> -->
                                  </select>
                                  <!-- <p style="margin-left:200px"><button  type="submit">Search</button></p> -->
                              </form>
  
  
                          <!-- </div> -->
                      
                    
                        
                        <div class="page_amount">
                        <p>Showing {{ $products->firstItem() }} to {{ $products->lastItem() }}
                             of total {{$products->total()}} entries</p>
                        </div>
                    </div>
                    <!--shop toolbar end-->
                      
                        <span id="status"></span>
                    <div class="row shop_wrapper">
                       

                      
                         @foreach($products as $product)
                                 
                          @php 
                          $cat = CategoriesModel::where('id',$product->main_category_id)->first(); 

                          $cat_main_category = CategoriesModel::where('id',$product->main_category_id)->get();
                          $cat_second_category = CategoriesModel::where('id',$product->second_category_id)->get();
                          $cat_third_category = CategoriesModel::where('id',$product->third_category_id)->get();
                          @endphp

                                  @if(empty($product->second_category_id) && empty($product->third_category_id))
                                       @foreach( $cat_main_category as  $cat_main_category)
                                       @php $link ='name/name/name/'.str_replace(' ','-', $cat_main_category->main_category).'/'.str_replace(' ','-',$product->name); @endphp
                                    @endforeach
                                    @elseif(empty($product->third_category_id))
                                       @foreach( $cat_main_category as  $cat_main_category)
                                       @foreach($cat_second_category as $cat_second_category)
                                       @php $link = 'name/name/name/'.str_replace(' ','-', $cat_main_category->main_category).'/'.str_replace(' ','-',$cat_second_category->second_category).'/'.str_replace(' ','-',$product->name); @endphp
                                       @endforeach
                                   @endforeach
                                   @else
                                      @foreach( $cat_main_category as  $cat_main_category)
                                      @foreach($cat_second_category as $cat_second_category)
                                      @foreach($cat_third_category as $cat_third_category)
                                      @php $link =''.str_replace(' ','-', $cat_main_category->main_category).'/'.str_replace(' ','-',$cat_second_category->second_category).'/'.str_replace(' ','-',$cat_third_category->third_category).'/'.str_replace(' ','-',$product->name); @endphp
                                      @endforeach
                                      @endforeach
                                      @endforeach
                                   @endif
                                 
                                  <div class="col-lg-3 col-md-4 col-12 ">
                            <div class="single_product">
                                <div class="product_name grid_name">
                                    <h3><a href="{{url($link)}}">{{$product->name}}</a></h3>
                                    <p class="manufacture_product"><a href="{{url(str_replace(' ','-',$cat_main_category->main_category))}}">{{$cat_main_category->main_category}}</a></p>
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="{{url($link)}}">@if(!empty($product->pic_1))<img src="{{ asset('admin'.$product->pic_1) }}" alt="" style="width:150px; height:150px">@else<img src="{{ asset('public/assets/img/no-img.png') }}" alt="" style="width:150px; height:150px">@endif</a>
                                    <a class="secondary_img" href="{{url($link)}}">@if(!empty($product->pic_2))<img src="{{ asset('admin'.$product->pic_2) }}" alt="" style="width:150px; height:150px">@endif</a>
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

                                 @if(count($products)==0)
                                  No product yet for this brand
                                 @endif


                        
                       
                        
                    
                    </div>

                    <div class="shop_toolbar t_bottom">
                        <div class="pagination">
                        {{ $products->links('vendor.pagination.custom-pagination') }}
                        </div>
                    </div>
                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>
            </div>
        </div>
    </div>
    <!--shop  area end-->
    <div id="data-wrapper_modal">
    @foreach($products as $product)
    @include('modals.brands-product-modal')                         
        @endforeach
    </div>


    @endsection
    @section('scripts')
    <script type="text/javascript">
    $('#data-wrapper').on('click','.add-to-cart',function(e) {
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
  $('#data-wrapper_modal').on('click','.add-to-cart',function(e) {
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

                $("span#status-modal").html('<div class="alert alert-success">'+response.msg+'</div>');
                $("#header-bar").html(response.data);
            }
        });
    });
</script>
    @stop