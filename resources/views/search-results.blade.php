 
 
       @extends('layout')
        @section('title', 'Search Results')
        @section('content') 


        @php 
        use App\CategoriesModel;
        use App\Products;
        use Illuminate\Support\Facades\DB;
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
                            <!-- <li>Camera & Video </li> -->
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--shop  area start-->
    <div class="shop_area" id="data-wrapper">
        <div class="container">
            <div class="row">

                <div class="col-lg-9 col-md-12">
                    <!--shop wrapper start-->
                    <!--shop toolbar start-->
                    <div class="shop_banner">
                        <!-- <img src="{{ asset('public/assets/img/bg/banner8.jpg') }}" alt=""> -->
                    </div>
                    <div class="shop_title">
                        <h1>search results</h1>
                    </div>
                    <div class="shop_toolbar_wrapper">
                        <div class="shop_toolbar_btn">

                            <button data-role="grid_3" type="button" class=" btn-grid-3" data-toggle="tooltip" title="3"></button>

                            <button data-role="grid_4" type="button" class=" btn-grid-4" data-toggle="tooltip" title="4"></button>

                            <button data-role="grid_list" type="button" class="active btn-list" data-toggle="tooltip" title="List"></button>
                        </div>
                          <!-- <div class="niceselect_option"> -->
                        <!-- class="select_option"  -->
                        <form action="{{url('search_results')}}" method="get">
                              
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
                                  <input type="hidden" value="{{$search_field}}" name="search">
                                  <!-- <p style="margin-left:200px"><button  type="submit">Search</button></p> -->
                              </form>
  
  
                          <!-- </div> -->
                        <div class="page_amount">
                            <p>Showing {{ $search->firstItem() }} to {{ $search->lastItem() }}
                             of total {{$search->total()}} entries</p>
                        </div>
                    </div>
                    <span id="status"></span>
                    <!--shop toolbar end-->

                    <div class="row shop_wrapper grid_list">
                  
                        @foreach($search as $search_result)
                        @php 
                        $search_result_main_category = CategoriesModel::where('id',$search_result->main_category_id)->get();
                        $search_result_second_category = CategoriesModel::where('id',$search_result->second_category_id)->get();
                        $search_result_third_category = CategoriesModel::where('id',$search_result->third_category_id)->get();
                        @endphp

                                   @if(empty($search_result->second_category_id) && empty($search_result->third_category_id))
                                       @foreach($search_result_main_category as $search_result_main_category)
                                       @php $link ='name/name/name/'.str_replace(' ','-',$search_result_main_category->main_category).'/'.str_replace(' ','-',$search_result->name); @endphp
                                    @endforeach
                                    @elseif(empty($search_result->third_category_id))
                                       @foreach($search_result_main_category as $search_result_main_category)
                                       @foreach($search_result_second_category as $search_result_second_category)
                                       @php $link = 'name/name/name/'.str_replace(' ','-',$search_result_main_category->main_category).'/'.str_replace(' ','-',$search_result_second_category->second_category).'/'.str_replace(' ','-',$search_result->name); @endphp
                                       @endforeach
                                   @endforeach
                                   @else
                                      @foreach($search_result_main_category as $search_result_main_category)
                                      @foreach($search_result_second_category as $search_result_second_category)
                                      @foreach($search_result_third_category as $search_result_third_category)
                                      @php $link = str_replace(' ','-',$search_result_main_category->main_category).'/'.str_replace(' ','-',$search_result_second_category->second_category).'/'.str_replace(' ','-',$search_result_third_category->third_category).'/'.str_replace(' ','-',$search_result->name); @endphp
                                      @endforeach
                                      @endforeach
                                      @endforeach
                                   @endif
                                   
                        <div class="col-12 ">
                            
                            <div class="single_product">
                                <div class="product_name grid_name">
                                    <h3><a href="{{$link}}">{{$search_result->name}}</a></h3>
                                    <p class="manufacture_product"><a href="#">{{$search_result_main_category->main_category}}</a></p>
                                </div>
                                <div class="product_thumb">
                                <a class="primary_img" href="{{$link}}">@if(!empty($search_result->pic_1))<img src="{{ asset('admin'.$search_result->pic_1) }}" alt="" style="width:150px; height:150px">@else<img src="{{ asset('public/assets/img/no-img.png') }}" alt="" style="width:150px; height:150px">@endif</a>
                                    <a class="secondary_img" href="{{$link}}">@if(!empty($search_result->pic_2))<img src="{{ asset('admin'.$search_result->pic_2) }}" alt="" style="width:150px; height:150px">@endif</a>
                                    <div class="label_product">
                                    @if(!empty($search_result->old_price))
                                       <span class="label_sale">{{round((1 - $search_result->old_price / $search_result->price) * 100)}}%</span>
                                      @endif
                                    </div>
                                    <div class="action_links">
                                        <ul>
                                            <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box{{$search_result->id}}" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
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
                                        <div style="display:none"> 
                                          @if(empty($search_result->old_price))
                                          {{$price_class = 'regular_price'}}
                                           {{$old_price = ''}}
                                           @else
                                           {{ $price_class = 'current_price'}}
                                           {{$old_price = '#'.number_format($search_result->old_price,2)}}
                                           @endif 
                                </div>
                                        <div class="product_footer d-flex align-items-center">
                                            <div class="price_box">
                                                <span class="{{ $price_class}}">#{{number_format($search_result->price,2)}}</span>
                                                <span class="old_price">{{$old_price}}</span>
                                            </div>
                                            

                                              <div class="add_to_cart">
                                              <input min="1" max="100" value="1" type="number" class="quantity">
                                              <a href="javascript:void(0);" data-id="{{$search_result->id}}" title="add to cart" class="add-to-cart"><span class="lnr lnr-cart"></span></a>
                                              </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{$link}}">
                                <div class="product_content list_content" style="width:100%">
                                    <div class="left_caption">
                                        <div class="product_name">
                                            <h3><a href="{{$link}}"><strong>{{$search_result->name}}</strong></a></h3>
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
                                            <p>{{$search_result->description}}</p>
                                        </div>
                                    </div>
                                    <div class="right_caption">
                                        <div class="text_available">
                                            <!-- <p>availabe: <span>99 in stock</span></p> -->
                                        </div>
                                        <div style="display:none"> 
                                         @if(empty($search_result->old_price))
                                         {{$price_class = 'regular_price'}}
                                        {{$old_price = ''}}
                                         @else
                                         {{ $price_class = 'current_price'}}
                                          {{$old_price = '#'.number_format($search_result->old_price,2)}}
                                         @endif 
                                           </div>  
                                
                                
                                 <div class="price_box">
                                    <span class="{{$price_class}}">#{{number_format($search_result->price,2)}}</span>
                                    <span class="old_price">{{$old_price}}</span>
                                 </div>
                                        <div class="cart_links_btn">
                                            <a href="javascript:void(0);" data-id="{{$search_result->id}}" title="add to cart" class=" add-to-cart">add to cart</a>
                                        </div>
                                        <div class="action_links_btn">
                                            <ul>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box{{$search_result->id}}" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                                <!-- <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                                <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li> -->
                                            </ul>
                                        </div>
                                    </div>
                                    
                                </div>
                               
                            </div>
                        </div>
                        
                        @endforeach
                       
                        
                        
                    </div>

                    <div class="shop_toolbar t_bottom">
                        <div class="pagination">
                        {{ $search->links('vendor.pagination.custom-pagination') }}
                        </div>
                    </div>
                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>
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
                                        <a href="{{str_replace(' ','-',$sideBarCategory->main_category)}}">{{ucwords($sideBarCategory->main_category)}} ({{count($count_Products)}})</a>
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
            </div>
        </div>
    </div>
    <!--shop  area end-->
    <div id="data-wrapper_modal">
    @foreach($search as $search_result)
    @include('modals.search_result_product_view_modal')
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