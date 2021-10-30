 
       @extends('layout')
        @section('title', 'Category:: '.ucwords($secondCat->second_category))
        @section('content') 
 
        @php
        use App\Products;
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
                            <li><a class="primary_img" href="{{url(str_replace(' ','-',$mainCat->main_category))}}">{{$mainCat->main_category}}</a></li>
                            <li>{{$secondCat->second_category}}</li>
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
                        <h1>{{$secondCat->second_category}}</h1>
                    </div>
                  
                    <!--shop toolbar end-->
                    @php 
                    use Illuminate\Support\Facades\DB
                    
                   @endphp
                 
                   @php 
                     use App\CategoriesModel
                   @endphp
                   <span id="status"></span>
                    <div class="row shop_wrapper">
                        @foreach($categories as $categories)
                        <div class="col-lg-3 col-md-4 col-12 ">
                            <div class="single_product">
                                <div class="product_name grid_name">
                                    <h3><a href="{{url(str_replace(' ','-',$mainCat->main_category).'/'.str_replace(' ','-',$secondCat->second_category).'/'.str_replace(' ','-',$categories->third_category))}}"><strong>{{$categories->third_category}}</strong></a></h3>
                                    <!-- <p class="manufacture_product"><a href="#">Accessories</a></p> -->
                                </div>
                              
                                @php $show_pic_1 = DB::select("SELECT * FROM products WHERE third_category_id = '$categories->id' AND pic_1 NOT IN ('') AND item_status = 'Available' ORDER BY RAND() LIMIT 1") @endphp
                                @php $show_pic_2 = DB::select("SELECT * FROM products WHERE third_category_id = '$categories->id' AND pic_2 NOT IN ('') AND item_status = 'Available' ORDER BY RAND() LIMIT 1")@endphp
                                
                                @php $show_pic_1_check = DB::select("SELECT * FROM products WHERE third_category_id = '$categories->id' AND pic_1 NOT IN ('') AND item_status = 'Available' ") @endphp
                                @php $show_pic_2_check = DB::select("SELECT * FROM products WHERE third_category_id = '$categories->id' AND pic_2 NOT IN ('') AND item_status = 'Available' ") @endphp
                                <div class="product_thumb">
                                 @if(count($show_pic_1_check)>0)
                                    @foreach($show_pic_1 as $show_pic_1)
                                    <a class="primary_img" href="{{url(str_replace(' ','-',$mainCat->main_category).'/'.str_replace(' ','-',$secondCat->second_category).'/'.str_replace(' ','-',$categories->third_category))}}"><img src="{{ asset('admin'.$show_pic_1->pic_1) }}" alt="" style="width:150px; height:150px;"></a>
                                    @endforeach
                                 @else
                                    <a class="primary_img" href="{{url(str_replace(' ','-',$mainCat->main_category).'/'.str_replace(' ','-',$secondCat->second_category).'/'.str_replace(' ','-',$categories->third_category))}}"><img src="{{ asset('public/assets/img/no-img.png') }}" alt="" style="width:150px; height:150px;"></a>
                                 @endif

                                 @if(count($show_pic_2_check)>0)
                                    @foreach($show_pic_2 as $show_pic_2)
                                    <a class="secondary_img" href="{{url(str_replace(' ','-',$mainCat->main_category).'/'.str_replace(' ','-',$secondCat->second_category).'/'.str_replace(' ','-',$categories->third_category))}}"><img src="{{ asset('admin'.$show_pic_2->pic_2) }}" alt="" style="width:150px; height:150px;"></a>
                                    @endforeach
                                 @endif
                                    <div class="label_product">
                                        <!-- <span class="label_sale">-47%</span> -->
                                    </div>
                                    <!-- <div class="action_links">
                                        <ul>
                                            <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                            <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                        </ul>
                                    </div> -->
                                </div>
                               
                            </div>
                        </div>
                        @endforeach

                        @php 
                      $cat = CategoriesModel::where('main_category',$mainCat->main_category)->first();
                      $cat_second = CategoriesModel::where('second_category',$secondCat->second_category)->first(); 
                      $products = Products::select('*')->where([['main_category_id',$cat->id],['second_category_id',$cat_second->id],['third_category_id','=',''],['item_status','=','Available']])->paginate(4);
                      
                      @endphp
                        @foreach($products as $product)
                                 

                                 
                                  <div class="col-lg-3 col-md-4 col-12 ">
                            <div class="single_product">
                                <div class="product_name grid_name">
                                    <h3><a href="{{url('name/name/name/'.str_replace(' ','-',$mainCat->main_category).'/'.str_replace(' ','-',$secondCat->second_category).'/'.str_replace(' ','-',$product->name))}}">{{$product->name}}</a></h3>
                                    <p class="manufacture_product"><a href="#"></a></p>
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="{{url('name/name/name/'.str_replace(' ','-',$mainCat->main_category).'/'.str_replace(' ','-',$secondCat->second_category).'/'.str_replace(' ','-',$product->name))}}">@if(!empty($product->pic_1))<img src="{{ asset('admin'.$product->pic_1) }}" alt="" style="width:150px; height:150px;">@else<img src="{{ asset('public/assets/img/no-img.png') }}" alt="" style="width:150px; height:150px;">@endif</a>
                                    <a class="secondary_img" href="{{url('name/name/name/'.str_replace(' ','-',$mainCat->main_category).'/'.str_replace(' ','-',$secondCat->second_category).'/'.str_replace(' ','-',$product->name))}}">@if(!empty($product->pic_2))<img src="{{ asset('admin'.$product->pic_2) }}" alt="" style="width:150px; height:150px;">@endif</a>
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
                                   
                                </div>
                            </div>
                        </div>
                        
                                 @endforeach
                       
                        
                    
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
    @include('modals.parent_cate_product_view_modal')                          
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