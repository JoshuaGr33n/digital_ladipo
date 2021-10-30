 
 @extends('layout')
 @section('title', 'Cart')
 @section('content') 

 @php 
 use App\CategoriesModel;
 use App\Products;
 use Illuminate\Support\Facades\DB;
 @endphp

 
 <!--breadcrumbs area start-->
 <div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{url('/')}}">home</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--shopping cart area start -->
<div class="shopping_cart_area mt-32">
              @if(Session::has('delivery_success'))
                         <div class="alert alert-success">
        	        {{ Session::get('delivery_success') }}
                          </div>
                        @endif
    <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table_desc">
                        <div class="cart_page table-responsive">
                           <span id="status"></span>
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product_remove">Delete</th>
                                        <th class="product_thumb">Image</th>
                                        <th class="product_name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product_quantity">Quantity</th>
                                        <th class="product_total">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @if(session('cart'))
                                 @foreach((array) session('cart') as $id => $details)
                                 @php 
                                   $details_main_category = CategoriesModel::where('id',$details['main_category_id'])->get();
                                  $details_second_category = CategoriesModel::where('id',$details['second_category_id'])->get();
                                  $details_third_category = CategoriesModel::where('id',$details['third_category_id'])->get();
                                  $product_details = Products::find($details['id']);
                                 @endphp

                                   @if(empty($details['second_category_id']) && empty($details['third_category_id']))
                                       @foreach($details_main_category as $details_main_category)
                                       @php $link ='name/name/name/'.str_replace(' ','-',$details_main_category->main_category).'/'.str_replace(' ','-',$product_details->name); @endphp
                                    @endforeach
                                    @elseif(empty($details['third_category_id']))
                                       @foreach($details_main_category as $details_main_category)
                                       @foreach($details_second_category as $details_second_category)
                                       @php $link = 'name/name/name/'.str_replace(' ','-',$details_main_category->main_category).'/'.str_replace(' ','-',$details_second_category->second_category).'/'.str_replace(' ','-',$product_details->name); @endphp
                                       @endforeach
                                   @endforeach
                                   @else
                                      @foreach($details_main_category as $details_main_category)
                                      @foreach($details_second_category as $details_second_category)
                                      @foreach($details_third_category as $details_third_category)
                                      @php $link = str_replace(' ','-',$details_main_category->main_category).'/'.str_replace(' ','-',$details_second_category->second_category).'/'.str_replace(' ','-',$details_third_category->third_category).'/'.str_replace(' ','-',$product_details->name); @endphp
                                      @endforeach
                                      @endforeach
                                      @endforeach
                                   @endif
                                    <tr>
                                        <td class="product_remove">
                                            <a class="remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></a>
                                            <a  class="btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></a>
                                            <i class="fa fa-circle-o-notch fa-spin btn-loading" style="font-size:24px; display: none"></i>
                                        </td>
                                        <td class="product_thumb">
                                        @if(empty($product_details->pic_1))
                                           <a href="{{$link}}"><img src="{{ asset('public/assets/img/no-img.png') }}" alt="{{ $product_details->name }}" style="height:100px; width:100px"/></a>
                                        @else
                                            <a href="{{$link}}"><img src="{{ asset('admin'.$product_details->pic_1) }}" alt="" style="height:100px; width:100px"/></a>
                                        @endif
                                        </td>
                                    
                                        <td class="product_name"><a href="{{$link}}">{{ $product_details->name }}</a></td>
                                        <td class="product-price">₦{{ number_format($product_details->price, 2) }}</td>
                                        <td class="product_quantity"><label>Quantity</label> <input min="1" max="100" value="{{ $details['quantity'] }}" type="number" class="quantity"></td>
                                        <td class="product_total">₦{{ number_format($product_details->price * $details['quantity'], 2) }}</td>


                                    </tr>
                                 @endforeach
                                 @endif  

                                   

                                </tbody>
                            </table>
                        </div>

                            <div class="cart_submit">
                             @if(session('cart'))
                            <button data-bs-toggle="modal" data-bs-target="#myModal" type="submit">Clear Cart</button>
                            <form action="clear-cart" method="post">
                             {{ csrf_field() }}
                             @include('modals.clear_cart_modal')
                            </form>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
            <!--coupon code area start-->
            <div class="coupon_area">
                <div class="row">
                   
                    <div class="col-lg-6 col-md-6">
                        
                        <!-- <div class="coupon_code left">
                            <h3>Coupon</h3>
                            
                            <div class="coupon_inner">
                                 @if(session('cart'))
                                <p>Enter your coupon code if you have one.</p>
                                <input placeholder="Coupon code" type="text">
                                <button type="submit">Apply coupon</button>
                                @endif
                            </div>
                           
                        </div> -->
                       
                    </div>
                    @php $vat = 25.00;@endphp
                    @if(session('cart'))
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code right">
                            <h3>Cart Totals</h3>
                            <div class="coupon_inner">
                                <div class="cart_subtotal">
                                    <p>VAT</p>
                                    <p class="cart_amount">₦{{number_format($vat,2)}}</p>
                                </div>
                                <!-- <a href="#">Calculate shipping</a> -->
                          <div style="display:none"> {{ $total = 0 }}
                         
                          @foreach((array) session('cart') as $id => $details)
                          @php $product_details = Products::find($details['id']); @endphp
                           {{$total += $product_details->price * $details['quantity']}}
     
                               @endforeach
                           
                            </div>

                                <div class="cart_subtotal">
                                    <p>Total</p>
                                    <p class="cart-total">₦{{number_format($total + $vat,2)}}</p>
                                </div>
                                @if(session('cart'))
                                <div class="">
                                <form method="post" action="payment">
                                {{csrf_field()}}
                                           <select class="coupon_code" style="height:50px;width:220px" name="payment_method">
                                                <option selected value="Pay on Delivery">Pay on Delivery</option>
                                                <option value="Pay Online">Pay Online</option>
                                            </select>
                                <button type="submit" class="btn btn-warning" style="margin-left:20px;">Proceed to Checkout</button>
                               </form>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <!--coupon code area end-->
        
    </div>
</div>
<!--shopping cart area end -->

  
@endsection

  @section('scripts')

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script type="text/javascript">

        $(".update-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            var parent_row = ele.parents("tr");

            var quantity = parent_row.find(".quantity").val();

            var product_subtotal = parent_row.find(".product_total");

            var cart_total = $(".cart-total");

            var loading = parent_row.find(".btn-loading");

            loading.show();

            $.ajax({
                url: '{{ url('update-cart') }}',
                method: "patch",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: quantity},
                dataType: "json",
                success: function (response) {

                    loading.hide();

                    $("span#status").html('<div class="alert alert-success">'+response.msg+'</div>');

                    $("#header-bar").html(response.data);

                    product_subtotal.text(response.subTotal);

                    cart_total.text(response.total);
                }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            var parent_row = ele.parents("tr");

            var cart_total = $(".cart-total");

            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    dataType: "json",
                    success: function (response) {

                        parent_row.remove();

                        $("span#status").html('<div class="alert alert-danger">'+response.msg+'</div>');

                        $("#header-bar").html(response.data);

                        cart_total.text(response.total);
                    }
                });
            }
        });

    </script>

@endsection
    