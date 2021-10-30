
    


    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

    @php
    use App\Products;
     @endphp
        
   
        <!--header top start-->
        <!--header middel start-->
        
        <div class="header_middle middle_two color_scheme_2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3  logo_s">
                        <div class="logo">
                            <a href="{{url('/')}}"><img src="{{ asset('public/assets/img/logo.png') }}"   alt="" class="logo_logo_s"></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 logo_m">
                        <!-- <div class="logo"> -->
                            <a href="{{url('/')}}"><img src="{{ asset('public/assets/img/logo_m_2.png') }}"   alt="" class="logo_logo_m"></a>
                        <!-- </div> -->
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="middel_right">
                            <div class="search-container search_two">
                                <form action="{{url('search_results')}}" method="get">
                                    <div class="search_box">
                                        <input placeholder="Search entire store here ..." type="text" name="search" id="search">
                                        <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                       
                                     
                                    </div>
                                    <div id="list">
                                      </div>
                                </form>
                               
                                
                            </div>
                            <div class="middel_right_info">

                                <!-- <div class="header_wishlist">
                                    <a href="wishlist"><span class="lnr lnr-heart"></span> Wish list </a>
                                    <span class="wishlist_quantity">3</span>
                                </div> -->
                                <div class="mini_cart_wrapper">
                                    <a href="javascript:void(0)"><span class="lnr lnr-cart"></span>My Cart </a>
                                    <span class="cart_quantity">{{ count((array) session('cart')) }}</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header middel end-->
        
        <!--mini cart-->
        <div class="mini_cart" >
          <div class="mini_cart_table">
                <!-- <div class="cart_total">
                    <span>Sub total:</span>
                    <span class="price">#138.00</span>
                </div> -->

             <div class="cart_close">
                <div class="cart_text">
                    <h3>cart</h3>
                </div>
                <div class="mini_cart_close">
                    <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                </div>
              </div>


                 @php $vat = 25.00;@endphp
                 <?php $total = 0 ?>
                    @foreach((array) session('cart') as $id => $details)
                    @php $product_details = Products::find($details['id']); @endphp
                    @php $total += $product_details->price * $details['quantity'] @endphp
                     @endforeach
                <div class="cart_total mt-10">
                    <span>vat:</span>
                    <span class="price">₦{{number_format($vat, 2)}}</span>
                </div>
                <div class="cart_total mt-10">
                    <span>total:</span>
                    <span class="price">₦{{number_format($total + $vat, 2)}}</span>
                </div>
            </div>

            <div class="mini_cart_footer">
               @if(session('cart'))
                <div class="cart_button">
                    <a href="{{url('cart')}}">View cart</a>
                </div>
                @endif
                <!-- <div class="cart_button">
                    <a class="active" href="check-out">Checkout</a>
                </div> -->

            </div>

            
           @if(session('cart'))
            @foreach((array) session('cart') as $id => $details)
            @php $product_details = Products::find($details['id']); @endphp
            <div class="cart_item">
                <div class="cart_img">
                 @if(empty($product_details->pic_1))
                   <a href="{{url('cart')}}"><img src="{{ asset('public/assets/img/no-img.png') }}" alt="{{ $product_details->name }}"/></a>
                 @else
                    <a href="#"><img src="{{ asset('admin'.$product_details->pic_1) }}" alt=""></a>
                 @endif  
                </div>
                <div class="cart_info">
                    <a href="#">{{ $product_details->name }}</a>

                    <span class="quantity">Qty: {{ $details['quantity'] }}</span>
                    <span class="price_cart">Price: ₦{{ $product_details->price }}</span>
                    <span class="price_cart">Total: ₦{{ number_format($product_details->price * $details['quantity'], 2) }}</span>

                </div>
                <!-- <div class="cart_remove">
                    <a href="#"><i class="ion-android-close"></i></a>
                </div> -->
            </div>
            @endforeach
            @endif
           

        </div>
        <!--mini cart end-->
      

                          

        <!-- JS
============================================ -->



<!--jquery elevatezoom min js-->
<script src="{{ asset('public/assets/js/jquery.elevatezoom.js') }}"></script>
<!--isotope packaged min js-->
<script src="{{ asset('public/assets/js/isotope.pkgd.min.js') }}"></script>
<!--slinky menu js-->
<script src="{{ asset('public/assets/js/slinky.menu.js') }}"></script>
<!-- Plugins JS -->
<script src="{{ asset('public/assets/js/plugins.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('public/assets/js/main.js') }}"></script>


                                
