<!doctype html>
<html class="no-js" lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/assets/img/logo.png') }}">
    

     <!-- CSS 
    ========================= -->
     <!--bootstrap min css-->
    <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap.min.css') }}">
    <!--owl carousel min css-->
    <link rel="stylesheet" href="{{ asset('public/assets/css/owl.carousel.min.css') }}">
    <!--slick min css-->
    <link rel="stylesheet" href="{{ asset('public/assets/css/slick.css') }}">
    <!--magnific popup min css-->
    <link rel="stylesheet" href="{{ asset('public/assets/css/magnific-popup.css') }}">
    <!--font awesome css-->
    <link rel="stylesheet" href="{{ asset('public/assets/css/font.awesome.css') }}">
    <!--ionicons min css-->
    <link rel="stylesheet" href="{{ asset('public/assets/css/ionicons.min.css') }}">
    <!--animate css-->
    <link rel="stylesheet" href="{{ asset('public/assets/css/animate.css') }}">
    <!--jquery ui min css-->
    <link rel="stylesheet" href="{{ asset('public/assets/css/jquery-ui.min.css') }}">
    <!--slinky menu css-->
    <link rel="stylesheet" href="{{ asset('public/assets/css/slinky.menu.css') }}">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/plugins.css') }}">
    
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">
    
    <!--modernizr min js here-->
    <script src="{{ asset('public/assets/js/vendor/modernizr-3.7.1.min.js') }}"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <style type="text/css">
  @media only screen and (max-width: 800px) {
	  .logo_logo_m{
		  width:300px;height:160px; margin-left:50px
	  }
     

      .logo_s{
        display:none
      }

    }


  @media only screen and (min-width: 800px) {
  .logo_logo_s{
    height:55px;
  }
  .logo_m{
    display:none
  }
 
 }
  </style>
</head>

<body>
 
 @php
 use App\CategoriesModel;
 use App\Brands;
 use App\Products;
 @endphp


    <!-- Main Wrapper Start -->
    <!--header area start-->
    <header class="header_area header_padding">
        <!--header top start-->
        <div class="header_top top_two color_scheme_2">
            <div class="container">
                <div class="top_inner">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="follow_us">
                                <label>Follow Us:</label>
                                <ul class="follow_link">
                                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="ion-social-instagram"></i></a></li>
                                   
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="top_right text-right">
                            @if(\Illuminate\Support\Facades\Auth::check())
                                <ul>
                                    <li class="top_links"><a href="#"><i class="ion-android-person"></i> {{Auth::user()->fname}} {{Auth::user()->lname}}<i class="ion-ios-arrow-down"></i></a>
                                        <ul class="dropdown_links">
                                            <!-- <li><a href="{{url('check-out')}}">Checkout </a></li> -->
                                            <li><a href="{{url('my-profile')}}">My Profile </a></li>
                                            <li><a href="{{url('cart')}}">Shopping Cart</a></li>
                                            <li><a href="{{url('my-orders')}}">My Orders</a></li>
                                            <li><a href="{{url('logout')}}">logout</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                @else 
                                <ul>
                                  <li class="top_links"><a href="#"><i class="ion-android-person"></i> Customer Account<i class="ion-ios-arrow-down"></i></a>
                                        <ul class="dropdown_links">
                                            <li><a href="{{url('login')}}">Login</a></li>
                                            <li><a href="{{url('cart')}}">Shopping Cart</a></li>
                                            <!-- <li><a href="wishlist">Wishlist</a></li> -->
                                        </ul>
                                    </li>
                                </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="header-bar">
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
                                @include('include.search-form')
                                
                            </div>
                            <div class="middel_right_info">

                                <!-- <div class="header_wishlist">
                                    <a href="wishlist"><span class="lnr lnr-heart"></span> Wish list </a>
                                    <span class="wishlist_quantity">3</span>
                                </div> -->
                                <div class="mini_cart_wrapper" id="header-bar">
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
        <div class="mini_cart" id="header-bar">
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
                     <?php $total += $product_details->price * $details['quantity'] ?>
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
                   <a href="cart"><img src="{{ asset('public/assets/img/no-img.png') }}" alt="{{ $product_details->name }}"/></a>
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
        </div>
        <!--header bottom satrt-->
        <div class="header_bottom header_b_three color_scheme_2 sticky-header">
            <div class="container"  style="margin-left:200px">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="main_menu header_position">
                            <nav>
                                <ul>
                                    <li><a href="{{url('/')}}">home</a>
                                    </li>
                                    <li class="mega_items"><a href="#">shop<i class="fa fa-angle-down"></i></a>
                                        <div class="mega_menu">
                                            <ul class="mega_menu_inner">
                                                @php $shopCategories = CategoriesModel::select('*')->where('main_category','<>','')->orderBy('main_category')->get(); @endphp
                                                
                                                @foreach($shopCategories->chunk(3) as $shopCategory)
                                                    <ul>
                                                    @foreach($shopCategory as $shopCate)
                                                        <li><a href="{{url(str_replace(' ','-',$shopCate->main_category))}}">{{ucwords($shopCate->main_category)}}</a></li>
                                                    @endforeach
                                                    </ul>
                                                @endforeach 
                                                
                                               
                                            </ul>
                                            <div class="banner_static_menu">
                                                <a href="#"><img src="{{ asset('public/assets/img/bg/banner1.jpg') }}" alt=""></a>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="mega_items"><a href="#">car brands<i class="fa fa-angle-down"></i></a>
                                        <div class="mega_menu" >
                                            <ul class="mega_menu_inner" >
                                                @php $car_brands = Brands::select('*')->where('category','=','Car')->orderBy('name')->get(); @endphp
                                                
                                                @foreach($car_brands->chunk(1) as $brands)
                                                    <ul>
                                                    @foreach($brands as $brand)
                                                        <li><a href="{{url(str_replace(' ','-',$brand->name))}}/home/brands/Car-brands/products">{{ucwords($brand->name)}}</a></li>
                                                    @endforeach
                                                    </ul>
                                                @endforeach 
                                                
                                               
                                            </ul>
                                            <div class="banner_static_menu">
                                                <a href="#"><img src="{{ asset('public/assets/img/bg/banner1.jpg') }}" alt=""></a>
                                            </div>
                                        </div>
                                    </li>


                                    <li class="mega_items"><a href="#">Part brands<i class="fa fa-angle-down"></i></a>
                                        <div class="mega_menu">
                                            <ul class="mega_menu_inner">
                                                @php $part_brands = Brands::select('*')->where('category','=','Part')->orderBy('name')->get(); @endphp
                                                
                                                @foreach($part_brands->chunk(3) as $brands)
                                                    <ul>
                                                    @foreach($brands as $brand)
                                                        <li><a href="{{url(str_replace(' ','-',$brand->name))}}/home/brands/Part-brands/products">{{ucwords($brand->name)}}</a></li>
                                                    @endforeach
                                                    </ul>
                                                @endforeach 
                                                
                                               
                                            </ul>
                                            <div class="banner_static_menu">
                                                <a href="#"><img src="{{ asset('public/assets/img/bg/banner1.jpg') }}" alt=""></a>
                                            </div>
                                        </div>
                                    </li>
                                
                                    <li><a href="{{url('about')}}">about Us</a></li>
                                    <li><a href="{{url('contact')}}"> Contact Us</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--header bottom end-->
    </header>
    <!--header area end-->
    <!--Offcanvas menu area start-->
 <div class="off_canvars_overlay"></div>
    <div class="Offcanvas_menu color_scheme_2">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="canvas_open">
                        <span>MENU</span>
                        <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                    </div>
                    <div class="Offcanvas_menu_wrapper">

                        <div class="canvas_close">
                            <a href="#"><i class="ion-android-close"></i></a>
                        </div>


                        <div class="top_right text-right">
                        @if(\Illuminate\Support\Facades\Auth::check())
                            <ul>
                                <li class="top_links"><a href="#"><i class="ion-android-person"></i> Hello {{Auth::user()->fname}}<i class="ion-ios-arrow-down"></i></a>
                                       <ul class="dropdown_links">
                                           
                                            <li><a href="{{url('my-profile')}}">My Profile </a></li>
                                            <li><a href="{{url('cart')}}">Shopping Cart</a></li>
                                            <li><a href="{{url('my-orders')}}">My Orders</a></li>
                                            <li><a href="{{url('logout')}}">logout</a></li>
                                        </ul>
                                </li>
                                
                            </ul>
                            @else
                            <ul>
                                <li class="top_links"><a href="#"><i class="ion-android-person"></i> Customer Account<i class="ion-ios-arrow-down"></i></a>
                                       <ul class="dropdown_links">
                                            <li><a href="{{url('login')}}">Login</a></li>
                                            <li><a href="{{url('cart')}}">Shopping Cart</a></li>
                                        </ul>
                                </li>
                                
                            </ul>
                            @endif
                        </div>
                        <div class="Offcanvas_follow">
                            <label>Follow Us:</label>
                            <ul class="follow_link">
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                               
                            </ul>
                        </div>
                        <div class="search-container">
                            <form action="{{url('search_results')}}" method="get">
                               {{ csrf_field() }}
                                <div class="search_box">
                                    <input placeholder="Search entire store here ..." type="text" name="search" id="search" autocomplete="off">
                                    <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                </div>
                                <div id="list">
                                      </div>
                            </form>
                        </div>
                        <div id="menu" class="text-left ">
                            <ul class="offcanvas_main_menu">
                                <li class="menu-item-has-children">
                                    <a href="">Home</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Shop</a>
                                    @php $shopCategories = CategoriesModel::select('*')->where('main_category','<>','')->orderBy('main_category')->get(); @endphp
                                    @foreach($shopCategories->chunk(2) as $shopCategory)
                                    <ul class="sub-menu">
                                               
                                               
                                                    
                                                    @foreach($shopCategory as $shopCate)
                                                        <li><a href="{{str_replace(' ','-',$shopCate->main_category)}}">{{ucwords($shopCate->main_category)}}</a></li>
                                                    @endforeach
                                                   
                                               
                                        
                                    </ul>
                                    @endforeach 
                                </li>



                                <li class="menu-item-has-children">
                                    <a href="#">Car Brands</a>
                                    @php $car_brands = Brands::select('*')->where('category','=','Car')->orderBy('name')->get(); @endphp
                                                
                                                @foreach($car_brands->chunk(2) as $brands)
                                            <ul class="sub-menu">
                                                       
                                                       
                                                            
                                                            @foreach($brands as $brand)
                                                                <li><a href="{{url(str_replace(' ','-',$brand->name))}}/home/brands/Car-brands/products">{{ucwords($brand->name)}}</a></li>
                                                            @endforeach
                                                           
                                                       
                                                
                                            </ul>
                                            @endforeach 
                                </li>

                                <li class="menu-item-has-children">
                                    <a href="#">Part Brands</a>
                                    @php $part_brands = Brands::select('*')->where('category','=','Part')->orderBy('name')->get(); @endphp
                                                
                                                @foreach($part_brands->chunk(2) as $brands)
                                            <ul class="sub-menu">
                                                       
                                                       
                                                            
                                                            @foreach($brands as $brand)
                                                                <li><a href="{{url(str_replace(' ','-',$brand->name))}}/home/brands/Part-brands/products">{{ucwords($brand->name)}}</a></li>
                                                            @endforeach
                                                           
                                                       
                                                
                                            </ul>
                                            @endforeach 
                                </li>
                               
                               
                                <li class="menu-item-has-children">
                                    <a href="{{url('about')}}">About Us</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="{{url('contact')}}"> Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Offcanvas menu area end-->

   
    @yield('content')
  


    <!--call to action start-->
    <section class="call_to_action color_scheme_2">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="call_action_inner">
                        <div class="call_text">
                            <h3>We Have <span>Recommendations</span> for You</h3>
                            <p>Take 30% off when you spend ₦150 or more with code Digital Ladipo11</p>
                        </div>
                        <div class="discover_now">
                            <a href="#">discover now</a>
                        </div>
                        <div class="link_follow">
                            <ul>
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-instagram"></i></a></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--call to action end-->
    <div style="height:50px"></div>
    <!--footer area start-->
    <footer class="footer_widgets color_scheme_2">
        <div class="container">
            <div class="footer_top">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="widgets_container contact_us">
                            <div class="footer_logo">
                                <!-- <a href="#"><img src="{{ asset('public/assets/img/logo.png') }}" style="height:50px;" alt=""></a> -->
                            </div>
                            <div class="footer_contact">
                                <p>We are a team of designers and developers that
                                    create high quality Magento, Prestashop, Opencart...</p>
                                <p><span>Address</span> 4710-4890 Ladipo, Lagos Nigeria, VT 05401</p>
                                <p><span>Need Help?</span>Call: <a href="tel:1-800-345-6789">1-800-345-6789</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3>Information</h3>
                            <div class="footer_menu">
                                <ul>
                                    <li><a href="{{url('about')}}">About Us</a></li>
                                    <li><a href="#">Delivery Information</a></li>
                                    <li><a href="{{url('privacy-policy')}}">privacy policy</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3>Extras</h3>
                            <div class="footer_menu">
                                <ul>
                               @if (Auth::check()) 
                                <li><a href="{{url('my-orders')}}">Order History</a></li>
                                @endif
                                <li><a href="{{url('cart')}}">Cart</a></li>
                                    <!-- <li><a href="wishlist">Wish List</a></li> -->
                                  
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="widgets_container">
                            <h3>Newsletter Subscribe</h3>
                            <p>We’ll never share your email address with a third-party.</p>
                            <div class="subscribe_form">
                                <form id="mc-form" class="mc-form footer-newsletter">
                                    <input id="mc-email" type="email" autocomplete="off" placeholder="Enter you email address here..." />
                                    <button id="mc-submit">Subscribe</button>
                                </form>
                                <!-- mailchimp-alerts Start -->
                                <div class="mailchimp-alerts text-centre">
                                    <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                    <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                    <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                                </div><!-- mailchimp-alerts end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bottom">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="copyright_area">
                            <p>Copyright &copy; 2021 <a href="#">Digital Ladipo</a> All Right Reserved.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="footer_payment text-right">
                            <a href="#"><img src="{{ asset('public/assets/img/icon/payment.png') }}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer area end-->
   
        <!-- modal area start-->
        <div class="modal fade color_scheme_2" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal_body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-12">
                                <div class="modal_tab">
                                    <div class="tab-content product-details-large">
                                        <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="{{ asset('public/assets/img/product/product1.jpg') }}" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab2" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="{{ asset('public/assets/img/product/product2.jpg') }}" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab3" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="{{ asset('public/assets/img/product/product3.jpg') }}" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab4" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="{{ asset('public/assets/img/product/product5.jpg') }}" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal_tab_button">
                                        <ul class="nav product_navactive owl-carousel" role="tablist">
                                            <li>
                                                <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false"><img src="{{ asset('public/assets/img/product/product1.jpg') }}" alt=""></a>
                                            </li>
                                            <li>
                                                <a class="nav-link" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false"><img src="{{ asset('public/assets/img/product/product2.jpg') }}" alt=""></a>
                                            </li>
                                            <li>
                                                <a class="nav-link button_three" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false"><img src="{{ asset('public/assets/img/product/product3.jpg') }}" alt=""></a>
                                            </li>
                                            <li>
                                                <a class="nav-link" data-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false"><img src="{{ asset('public/assets/img/product/product5.jpg') }}" alt=""></a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12">
                                <div class="modal_right">
                                    <div class="modal_title mb-10">
                                        <h2>Handbag feugiat</h2>
                                    </div>
                                    <div class="modal_price mb-10">
                                        <span class="new_price">#64.99</span>
                                        <span class="old_price" >#78.99</span>
                                    </div>
                                    <div class="modal_description mb-15">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam, reiciendis maiores quidem aperiam, rerum vel recusandae </p>
                                    </div>
                                    <div class="variants_selects">
                                        <div class="variants_size">
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
                                        </div>
                                        <div class="modal_add_to_cart">
                                            <form action="#">
                                                <input min="1" max="100" step="2" value="1" type="number">
                                                <button type="submit">add to cart</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal_social">
                                        <h2>Share this product</h2>
                                        <ul>
                                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li class="instagram"><a href="#"><i class="fa fa-instagram"></i></a></li>
                                           
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




    






    <!-- <script>
$(document).ready(function(){

 $('#search_field').keyup(function(){ 
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('autocomplete.fetch') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#list').fadeIn();  
                    $('#list').html(data);
          }
         });
        }
    });

    $(document).on('click', 'li', function(){  
        $('#search_field').val($(this).text());  
        $('#list').fadeOut();  
    });  

});
</script> -->

<!-- JS
============================================ -->
<!--jquery min js-->
<script src="{{ asset('public/assets/js/vendor/jquery-3.4.1.min.js') }}"></script>
<!--popper min js-->
<script src="{{ asset('public/assets/js/popper.js') }}"></script>
<!--bootstrap min js-->
<script src="{{ asset('public/assets/js/bootstrap.min.js') }}"></script>
<!--owl carousel min js-->
<script src="{{ asset('public/assets/js/owl.carousel.min.js') }}"></script>
<!--slick min js-->
<script src="{{ asset('public/assets/js/slick.min.js') }}"></script>
<!--magnific popup min js-->
<script src="{{ asset('public/assets/js/jquery.magnific-popup.min.js') }}"></script>
<!--jquery countdown min js-->
<script src="{{ asset('public/assets/js/jquery.countdown.js') }}"></script>
<!--jquery ui min js-->
<script src="{{ asset('public/assets/js/jquery.ui.js') }}"></script>
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

@yield('scripts')

</body>



</html>