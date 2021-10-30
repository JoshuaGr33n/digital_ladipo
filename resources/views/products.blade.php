 
       @extends('layout')
        @section('title', 'Category:: '.ucwords($thirdCat->third_category))
        @section('content') 

        <style type="text/css">
		.pagination .current{
			background-color: #b2e515 !important;
			color: white !important;
			border-color: #b2e515 !important;
		}

	     </style>
         @php
         use Illuminate\Http\Request;
        @endphp
    
 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
 <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{url('/')}}">home</a></li>
                            <li><a href="{{url(str_replace(' ','-',$mainCat->main_category))}}">{{$mainCat->main_category}}</a></li>
                            <li><a href="{{url(str_replace(' ','-',$mainCat->main_category))}}/{{str_replace(' ','-',$secondCat->second_category)}}">{{$secondCat->second_category}}</a></li>
                            <li>{{$thirdCat->third_category}}</li>
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
                        <h1>{{$thirdCat->third_category}}</h1>
                    </div>
                    <div class="shop_toolbar_wrapper">
                        <div class="shop_toolbar_btn">

                            <button data-role="grid_3" type="button" class="active btn-grid-3" data-toggle="tooltip" title="3"></button>

                            <button data-role="grid_4" type="button" class=" btn-grid-4" data-toggle="tooltip" title="4"></button>

                            <button data-role="grid_list" type="button" class="btn-list" data-toggle="tooltip" title="List"></button>
                        </div>
                        <!-- <div class="niceselect_option"> -->
                        <!-- class="select_option"  -->
                            <form action="{{url(str_replace(' ','-',$mainCat->main_category).'/'.str_replace(' ','-',$secondCat->second_category).'/'.str_replace(' ','-',$thirdCat->third_category))}}" method="get">
                              
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
                    <div class="row shop_wrapper" id="pagination">
                    @include('include.products')
                        
                        
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






<!-- <script>
$(document).ready(function(){

 $(document).on('click', '.pagination a', function(event){
  event.preventDefault(); 
  var page = $(this).attr('href').split('page=')[1];
  fetch_data(page);
 });

 function fetch_data(page)
 {
  $.ajax({
   url:"/thirdCategories_pagination/fetch_data?page="+page,
   success:function(data)
   {
    $('#pagination').html(data);
   }
  });
 }
 
});
</script> -->
    @stop