 
       @extends('layout')
        @section('title', 'Categoies')
        @section('content') 
 
 
 <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="ladipo/">home</a></li>
                            <li>shop </li>
                            <li>brake parts</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--shop  area start-->
    <div class="shop_area shop_fullwidth">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!--shop wrapper start-->
                    <!--shop toolbar start-->
                    <div class="shop_title">
                        <h1>Brake Parts</h1>
                    </div>
                    <!-- <div class="shop_toolbar_wrapper">
                        <div class="shop_toolbar_btn">

                            <button data-role="grid_3" type="button" class="active btn-grid-3" data-toggle="tooltip" title="3"></button>

                            <button data-role="grid_4" type="button" class=" btn-grid-4" data-toggle="tooltip" title="4"></button>

                            <button data-role="grid_list" type="button" class="btn-list" data-toggle="tooltip" title="List"></button>
                        </div>
                        <div class=" niceselect_option">

                            <form class="select_option" action="#">
                                <select name="orderby" id="short">

                                    <option selected value="1">Sort by average rating</option>
                                    <option value="2">Sort by popularity</option>
                                    <option value="3">Sort by newness</option>
                                    <option value="4">Sort by price: low to high</option>
                                    <option value="5">Sort by price: high to low</option>
                                    <option value="6">Product Name: Z</option>
                                </select>
                            </form>


                        </div>
                        <div class="page_amount">
                            <p>Showing 1–9 of 21 results</p>
                        </div>
                    </div> -->
                    <!--shop toolbar end-->

                    <div class="row shop_wrapper">
                        <div class="col-lg-3 col-md-4 col-12 ">
                            <div class="single_product">
                                <div class="product_name grid_name">
                                    <h3><a href="sub-categories"><strong>Wheel Bearings</strong></a></h3>
                                    <!-- <p class="manufacture_product"><a href="#">Accessories</a></p> -->
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="sub-categories"><img src="{{ asset('public/assets/img/product/product10.jpg') }}" alt=""></a>
                                    <a class="secondary_img" href="sub-categories"><img src="{{ asset('public/assets/img/product/product11.jpg') }}" alt=""></a>
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
                                <!-- <div class="product_content grid_content">
                                    <div class="content_inner">
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
                                                <span class="current_price">$160.00</span>
                                                <span class="old_price">$3200.00</span>
                                            </div>
                                            <div class="add_to_cart">
                                                <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="product_content list_content">
                                    <div class="left_caption">
                                        <div class="product_name">
                                            <h3><a href="sub-categories">Cas Meque Metus Shoes Core i7 3.4GHz, 16GB DDR3</a></h3>
                                        </div>
                                        <div class="product_ratings">
                                            <ul>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="product_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad, iure incidunt. Ab consequatur temporibus non eveniet inventore doloremque necessitatibus sed, ducimus quisquam, ad asperiores </p>
                                        </div>
                                    </div>
                                    <div class="right_caption">
                                        <div class="text_available">
                                            <p>availabe: <span>99 in stock</span></p>
                                        </div>
                                        <div class="price_box">
                                            <span class="current_price">$160.00</span>
                                            <span class="old_price">$420.00</span>
                                        </div>
                                        <div class="cart_links_btn">
                                            <a href="#" title="add to cart">add to cart</a>
                                        </div>
                                        <div class="action_links_btn">
                                            <ul>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                                <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12 ">
                            <div class="single_product">
                                <div class="product_name grid_name">
                                    <h3><a href="sub-categories"><strong>Wheel Rim Screws</strong></a></h3>
                                    <!-- <p class="manufacture_product"><a href="#">Accessories</a></p> -->
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="sub-categories"><img src="{{ asset('public/assets/img/product/product9.jpg') }}" alt=""></a>
                                    <a class="secondary_img" href="sub-categories"><img src="{{ asset('public/assets/img/product/product10.jpg') }}" alt=""></a>
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
                                <!-- <div class="product_content grid_content">
                                    <div class="content_inner">
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
                                                <span class="current_price">$160.00</span>
                                                <span class="old_price">$3200.00</span>
                                            </div>
                                            <div class="add_to_cart">
                                                <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="product_content list_content">
                                    <div class="left_caption">
                                        <div class="product_name">
                                            <h3><a href="sub-categories">Cas Meque Metus Shoes Core i7 3.4GHz, 16GB DDR3</a></h3>
                                        </div>
                                        <div class="product_ratings">
                                            <ul>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="product_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad, iure incidunt. Ab consequatur temporibus non eveniet inventore doloremque necessitatibus sed, ducimus quisquam, ad asperiores </p>
                                        </div>
                                    </div>
                                    <div class="right_caption">
                                        <div class="text_available">
                                            <p>availabe: <span>99 in stock</span></p>
                                        </div>
                                        <div class="price_box">
                                            <span class="current_price">$160.00</span>
                                            <span class="old_price">$420.00</span>
                                        </div>
                                        <div class="cart_links_btn">
                                            <a href="#" title="add to cart">add to cart</a>
                                        </div>
                                        <div class="action_links_btn">
                                            <ul>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                                <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12 ">
                            <div class="single_product">
                                <div class="product_name grid_name">
                                    <h3><a href="sub-categories"><strong>Wheel Simulators</strong></a></h3>
                                    <!-- <p class="manufacture_product"><a href="#">Accessories</a></p> -->
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="sub-categories"><img src="{{ asset('public/assets/img/product/product3.jpg') }}" alt=""></a>
                                    <a class="secondary_img" href="sub-categories"><img src="{{ asset('public/assets/img/product/product4.jpg') }}" alt=""></a>
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
                                <!-- <div class="product_content grid_content">
                                    <div class="content_inner">
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
                                                <span class="current_price">$160.00</span>
                                                <span class="old_price">$3200.00</span>
                                            </div>
                                            <div class="add_to_cart">
                                                <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="product_content list_content">
                                    <div class="left_caption">
                                        <div class="product_name">
                                            <h3><a href="sub-categories">Cas Meque Metus Shoes Core i7 3.4GHz, 16GB DDR3</a></h3>
                                        </div>
                                        <div class="product_ratings">
                                            <ul>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="product_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad, iure incidunt. Ab consequatur temporibus non eveniet inventore doloremque necessitatibus sed, ducimus quisquam, ad asperiores </p>
                                        </div>
                                    </div>
                                    <div class="right_caption">
                                        <div class="text_available">
                                            <p>availabe: <span>99 in stock</span></p>
                                        </div>
                                        <div class="price_box">
                                            <span class="current_price">$160.00</span>
                                            <span class="old_price">$420.00</span>
                                        </div>
                                        <div class="cart_links_btn">
                                            <a href="#" title="add to cart">add to cart</a>
                                        </div>
                                        <div class="action_links_btn">
                                            <ul>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                                <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12 ">
                            <div class="single_product">
                                <div class="product_name grid_name">
                                    <h3><a href="sub-categories"><strong>Wheel Bearings</strong></a></h3>
                                    <!-- <p class="manufacture_product"><a href="#">Accessories</a></p> -->
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="sub-categories"><img src="{{ asset('public/assets/img/product/product10.jpg') }}" alt=""></a>
                                    <a class="secondary_img" href="sub-categories"><img src="{{ asset('public/assets/img/product/product11.jpg') }}" alt=""></a>
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
                                <!-- <div class="product_content grid_content">
                                    <div class="content_inner">
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
                                                <span class="current_price">$160.00</span>
                                                <span class="old_price">$3200.00</span>
                                            </div>
                                            <div class="add_to_cart">
                                                <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="product_content list_content">
                                    <div class="left_caption">
                                        <div class="product_name">
                                            <h3><a href="sub-categories">Cas Meque Metus Shoes Core i7 3.4GHz, 16GB DDR3</a></h3>
                                        </div>
                                        <div class="product_ratings">
                                            <ul>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="product_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad, iure incidunt. Ab consequatur temporibus non eveniet inventore doloremque necessitatibus sed, ducimus quisquam, ad asperiores </p>
                                        </div>
                                    </div>
                                    <div class="right_caption">
                                        <div class="text_available">
                                            <p>availabe: <span>99 in stock</span></p>
                                        </div>
                                        <div class="price_box">
                                            <span class="current_price">$160.00</span>
                                            <span class="old_price">$420.00</span>
                                        </div>
                                        <div class="cart_links_btn">
                                            <a href="#" title="add to cart">add to cart</a>
                                        </div>
                                        <div class="action_links_btn">
                                            <ul>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                                <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12 ">
                            <div class="single_product">
                                <div class="product_name grid_name">
                                    <h3><a href="sub-categories"><strong>Wheel Rim Screws</strong></a></h3>
                                    <!-- <p class="manufacture_product"><a href="#">Accessories</a></p> -->
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="sub-categories"><img src="{{ asset('public/assets/img/product/product9.jpg') }}" alt=""></a>
                                    <a class="secondary_img" href="sub-categories"><img src="{{ asset('public/assets/img/product/product10.jpg') }}" alt=""></a>
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
                                <!-- <div class="product_content grid_content">
                                    <div class="content_inner">
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
                                                <span class="current_price">$160.00</span>
                                                <span class="old_price">$3200.00</span>
                                            </div>
                                            <div class="add_to_cart">
                                                <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="product_content list_content">
                                    <div class="left_caption">
                                        <div class="product_name">
                                            <h3><a href="sub-categories">Cas Meque Metus Shoes Core i7 3.4GHz, 16GB DDR3</a></h3>
                                        </div>
                                        <div class="product_ratings">
                                            <ul>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="product_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad, iure incidunt. Ab consequatur temporibus non eveniet inventore doloremque necessitatibus sed, ducimus quisquam, ad asperiores </p>
                                        </div>
                                    </div>
                                    <div class="right_caption">
                                        <div class="text_available">
                                            <p>availabe: <span>99 in stock</span></p>
                                        </div>
                                        <div class="price_box">
                                            <span class="current_price">$160.00</span>
                                            <span class="old_price">$420.00</span>
                                        </div>
                                        <div class="cart_links_btn">
                                            <a href="#" title="add to cart">add to cart</a>
                                        </div>
                                        <div class="action_links_btn">
                                            <ul>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                                <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12 ">
                            <div class="single_product">
                                <div class="product_name grid_name">
                                    <h3><a href="sub-categories"><strong>Wheel Simulators</strong></a></h3>
                                    <!-- <p class="manufacture_product"><a href="#">Accessories</a></p> -->
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="sub-categories"><img src="{{ asset('public/assets/img/product/product3.jpg') }}" alt=""></a>
                                    <a class="secondary_img" href="sub-categories"><img src="{{ asset('public/assets/img/product/product4.jpg') }}" alt=""></a>
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
                                <!-- <div class="product_content grid_content">
                                    <div class="content_inner">
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
                                                <span class="current_price">$160.00</span>
                                                <span class="old_price">$3200.00</span>
                                            </div>
                                            <div class="add_to_cart">
                                                <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="product_content list_content">
                                    <div class="left_caption">
                                        <div class="product_name">
                                            <h3><a href="sub-categories">Cas Meque Metus Shoes Core i7 3.4GHz, 16GB DDR3</a></h3>
                                        </div>
                                        <div class="product_ratings">
                                            <ul>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="product_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad, iure incidunt. Ab consequatur temporibus non eveniet inventore doloremque necessitatibus sed, ducimus quisquam, ad asperiores </p>
                                        </div>
                                    </div>
                                    <div class="right_caption">
                                        <div class="text_available">
                                            <p>availabe: <span>99 in stock</span></p>
                                        </div>
                                        <div class="price_box">
                                            <span class="current_price">$160.00</span>
                                            <span class="old_price">$420.00</span>
                                        </div>
                                        <div class="cart_links_btn">
                                            <a href="#" title="add to cart">add to cart</a>
                                        </div>
                                        <div class="action_links_btn">
                                            <ul>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                                <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <div class="col-lg-3 col-md-4 col-12 ">
                            <div class="single_product">
                                <div class="product_name grid_name">
                                    <h3><a href="sub-categories"><strong>Wheel Bearings</strong></a></h3>
                                    <!-- <p class="manufacture_product"><a href="#">Accessories</a></p> -->
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="sub-categories"><img src="{{ asset('public/assets/img/product/product10.jpg') }}" alt=""></a>
                                    <a class="secondary_img" href="sub-categories"><img src="{{ asset('public/assets/img/product/product11.jpg') }}" alt=""></a>
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
                                <!-- <div class="product_content grid_content">
                                    <div class="content_inner">
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
                                                <span class="current_price">$160.00</span>
                                                <span class="old_price">$3200.00</span>
                                            </div>
                                            <div class="add_to_cart">
                                                <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="product_content list_content">
                                    <div class="left_caption">
                                        <div class="product_name">
                                            <h3><a href="sub-categories">Cas Meque Metus Shoes Core i7 3.4GHz, 16GB DDR3</a></h3>
                                        </div>
                                        <div class="product_ratings">
                                            <ul>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="product_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad, iure incidunt. Ab consequatur temporibus non eveniet inventore doloremque necessitatibus sed, ducimus quisquam, ad asperiores </p>
                                        </div>
                                    </div>
                                    <div class="right_caption">
                                        <div class="text_available">
                                            <p>availabe: <span>99 in stock</span></p>
                                        </div>
                                        <div class="price_box">
                                            <span class="current_price">$160.00</span>
                                            <span class="old_price">$420.00</span>
                                        </div>
                                        <div class="cart_links_btn">
                                            <a href="#" title="add to cart">add to cart</a>
                                        </div>
                                        <div class="action_links_btn">
                                            <ul>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                                <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12 ">
                            <div class="single_product">
                                <div class="product_name grid_name">
                                    <h3><a href="sub-categories"><strong>Wheel Rim Screws</strong></a></h3>
                                    <!-- <p class="manufacture_product"><a href="#">Accessories</a></p> -->
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="sub-categories"><img src="{{ asset('public/assets/img/product/product9.jpg') }}" alt=""></a>
                                    <a class="secondary_img" href="sub-categories"><img src="{{ asset('public/assets/img/product/product10.jpg') }}" alt=""></a>
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
                                <!-- <div class="product_content grid_content">
                                    <div class="content_inner">
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
                                                <span class="current_price">$160.00</span>
                                                <span class="old_price">$3200.00</span>
                                            </div>
                                            <div class="add_to_cart">
                                                <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="product_content list_content">
                                    <div class="left_caption">
                                        <div class="product_name">
                                            <h3><a href="sub-categories">Cas Meque Metus Shoes Core i7 3.4GHz, 16GB DDR3</a></h3>
                                        </div>
                                        <div class="product_ratings">
                                            <ul>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="product_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad, iure incidunt. Ab consequatur temporibus non eveniet inventore doloremque necessitatibus sed, ducimus quisquam, ad asperiores </p>
                                        </div>
                                    </div>
                                    <div class="right_caption">
                                        <div class="text_available">
                                            <p>availabe: <span>99 in stock</span></p>
                                        </div>
                                        <div class="price_box">
                                            <span class="current_price">$160.00</span>
                                            <span class="old_price">$420.00</span>
                                        </div>
                                        <div class="cart_links_btn">
                                            <a href="#" title="add to cart">add to cart</a>
                                        </div>
                                        <div class="action_links_btn">
                                            <ul>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                                <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12 ">
                            <div class="single_product">
                                <div class="product_name grid_name">
                                    <h3><a href="sub-categories"><strong>Wheel Simulators</strong></a></h3>
                                    <!-- <p class="manufacture_product"><a href="#">Accessories</a></p> -->
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="sub-categories"><img src="{{ asset('public/assets/img/product/product3.jpg') }}" alt=""></a>
                                    <a class="secondary_img" href="sub-categories"><img src="{{ asset('public/assets/img/product/product4.jpg') }}" alt=""></a>
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
                                <!-- <div class="product_content grid_content">
                                    <div class="content_inner">
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
                                                <span class="current_price">$160.00</span>
                                                <span class="old_price">$3200.00</span>
                                            </div>
                                            <div class="add_to_cart">
                                                <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="product_content list_content">
                                    <div class="left_caption">
                                        <div class="product_name">
                                            <h3><a href="sub-categories">Cas Meque Metus Shoes Core i7 3.4GHz, 16GB DDR3</a></h3>
                                        </div>
                                        <div class="product_ratings">
                                            <ul>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="product_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad, iure incidunt. Ab consequatur temporibus non eveniet inventore doloremque necessitatibus sed, ducimus quisquam, ad asperiores </p>
                                        </div>
                                    </div>
                                    <div class="right_caption">
                                        <div class="text_available">
                                            <p>availabe: <span>99 in stock</span></p>
                                        </div>
                                        <div class="price_box">
                                            <span class="current_price">$160.00</span>
                                            <span class="old_price">$420.00</span>
                                        </div>
                                        <div class="cart_links_btn">
                                            <a href="#" title="add to cart">add to cart</a>
                                        </div>
                                        <div class="action_links_btn">
                                            <ul>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                                <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <div class="col-lg-3 col-md-4 col-12 ">
                            <div class="single_product">
                                <div class="product_name grid_name">
                                    <h3><a href="sub-categories"><strong>Wheel Bearings</strong></a></h3>
                                    <!-- <p class="manufacture_product"><a href="#">Accessories</a></p> -->
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="sub-categories"><img src="{{ asset('public/assets/img/product/product10.jpg') }}" alt=""></a>
                                    <a class="secondary_img" href="sub-categories"><img src="{{ asset('public/assets/img/product/product11.jpg') }}" alt=""></a>
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
                                <!-- <div class="product_content grid_content">
                                    <div class="content_inner">
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
                                                <span class="current_price">$160.00</span>
                                                <span class="old_price">$3200.00</span>
                                            </div>
                                            <div class="add_to_cart">
                                                <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="product_content list_content">
                                    <div class="left_caption">
                                        <div class="product_name">
                                            <h3><a href="sub-categories">Cas Meque Metus Shoes Core i7 3.4GHz, 16GB DDR3</a></h3>
                                        </div>
                                        <div class="product_ratings">
                                            <ul>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="product_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad, iure incidunt. Ab consequatur temporibus non eveniet inventore doloremque necessitatibus sed, ducimus quisquam, ad asperiores </p>
                                        </div>
                                    </div>
                                    <div class="right_caption">
                                        <div class="text_available">
                                            <p>availabe: <span>99 in stock</span></p>
                                        </div>
                                        <div class="price_box">
                                            <span class="current_price">$160.00</span>
                                            <span class="old_price">$420.00</span>
                                        </div>
                                        <div class="cart_links_btn">
                                            <a href="#" title="add to cart">add to cart</a>
                                        </div>
                                        <div class="action_links_btn">
                                            <ul>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                                <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12 ">
                            <div class="single_product">
                                <div class="product_name grid_name">
                                    <h3><a href="sub-categories"><strong>Wheel Rim Screws</strong></a></h3>
                                    <!-- <p class="manufacture_product"><a href="#">Accessories</a></p> -->
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="sub-categories"><img src="{{ asset('public/assets/img/product/product9.jpg') }}" alt=""></a>
                                    <a class="secondary_img" href="sub-categories"><img src="{{ asset('public/assets/img/product/product10.jpg') }}" alt=""></a>
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
                                <!-- <div class="product_content grid_content">
                                    <div class="content_inner">
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
                                                <span class="current_price">$160.00</span>
                                                <span class="old_price">$3200.00</span>
                                            </div>
                                            <div class="add_to_cart">
                                                <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="product_content list_content">
                                    <div class="left_caption">
                                        <div class="product_name">
                                            <h3><a href="sub-categories">Cas Meque Metus Shoes Core i7 3.4GHz, 16GB DDR3</a></h3>
                                        </div>
                                        <div class="product_ratings">
                                            <ul>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="product_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad, iure incidunt. Ab consequatur temporibus non eveniet inventore doloremque necessitatibus sed, ducimus quisquam, ad asperiores </p>
                                        </div>
                                    </div>
                                    <div class="right_caption">
                                        <div class="text_available">
                                            <p>availabe: <span>99 in stock</span></p>
                                        </div>
                                        <div class="price_box">
                                            <span class="current_price">$160.00</span>
                                            <span class="old_price">$420.00</span>
                                        </div>
                                        <div class="cart_links_btn">
                                            <a href="#" title="add to cart">add to cart</a>
                                        </div>
                                        <div class="action_links_btn">
                                            <ul>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                                <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12 ">
                            <div class="single_product">
                                <div class="product_name grid_name">
                                    <h3><a href="sub-categories"><strong>Wheel Simulators</strong></a></h3>
                                    <!-- <p class="manufacture_product"><a href="#">Accessories</a></p> -->
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="sub-categories"><img src="{{ asset('public/assets/img/product/product3.jpg') }}" alt=""></a>
                                    <a class="secondary_img" href="sub-categories"><img src="{{ asset('public/assets/img/product/product4.jpg') }}" alt=""></a>
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
                                <!-- <div class="product_content grid_content">
                                    <div class="content_inner">
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
                                                <span class="current_price">$160.00</span>
                                                <span class="old_price">$3200.00</span>
                                            </div>
                                            <div class="add_to_cart">
                                                <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="product_content list_content">
                                    <div class="left_caption">
                                        <div class="product_name">
                                            <h3><a href="sub-categories">Cas Meque Metus Shoes Core i7 3.4GHz, 16GB DDR3</a></h3>
                                        </div>
                                        <div class="product_ratings">
                                            <ul>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="product_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad, iure incidunt. Ab consequatur temporibus non eveniet inventore doloremque necessitatibus sed, ducimus quisquam, ad asperiores </p>
                                        </div>
                                    </div>
                                    <div class="right_caption">
                                        <div class="text_available">
                                            <p>availabe: <span>99 in stock</span></p>
                                        </div>
                                        <div class="price_box">
                                            <span class="current_price">$160.00</span>
                                            <span class="old_price">$420.00</span>
                                        </div>
                                        <div class="cart_links_btn">
                                            <a href="#" title="add to cart">add to cart</a>
                                        </div>
                                        <div class="action_links_btn">
                                            <ul>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                                <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    
                    </div>

                    <div class="shop_toolbar t_bottom">
                        <div class="pagination">
                            <ul>
                                <li class="current">1</li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li class="next"><a href="#">next</a></li>
                                <li><a href="#">>></a></li>
                            </ul>
                        </div>
                    </div>
                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>
            </div>
        </div>
    </div>
    <!--shop  area end-->
    @stop