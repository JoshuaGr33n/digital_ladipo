<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/', function () {
    return view('index');
});

Route::get('404', function () {
    return view('404');
  });

Route::get('sub-categories', function () {
    return view('sub-categories');
});




Route::get('shop-categories', function () {
    return view('shop-categories');
});


// Route::get('search', function () {
//     return view('search-results');
// });

Route::get('about', function () {
    return view('about');
});


 //route to cart
 Route::get('cart', function () {
    return view('cart');
 });

 Route::get('add-to-cart/{id}', 'CartController@addToCart');

 Route::patch('update-cart', 'CartController@update');

 Route::delete('remove-from-cart', 'CartController@remove');

 Route::post('payment', 'CartController@redirectToDeliveryPay');

 Route::get('pay-on-delivery', 'CartController@DeliveryPay');
 
 Route::get('pay-online', 'CartController@OnlinePay');
 
 Route::post('submit-order', 'CartController@submitOrder');

 Route::post('clear-cart', 'CartController@clearCart');



 //search route
  Route::get('/autocomplete', 'SearchController@search');
  Route::post('/autocomplete/fetch', 'SearchController@fetch')->name('autocomplete.fetch');
  Route::get('/search_results', array('uses' => 'SearchController@search_results'));
  Route::post('/search_mobile', 'SearchController@search_results')->name('search_mobile');

  Route::get('/autocomplete-search', 'SearchController@autocompleteSearch');
  



 // route to update account
 Route::post('update-account', 'CustomerAccountController@updateAccount');

 //change Profile password route
  Route::post('change-profile-password', array('uses' => 'CustomerAccountController@changePassword'));

  // route to update address
  Route::post('update-address', 'CustomerAccountController@updateAddress');

   // route to my orders page
   Route::get('my-orders', 'CustomerAccountController@myOrdersPage');

   // route to my orders page items
   Route::get('my-order-items/{order_id}', 'CustomerAccountController@myOrder_items');

 //password reset
 Route::get('forgot-password', 'ResetPasswordController@forgot_password');




  // route to process forgot password email
 Route::post('process-email', array('uses' => 'ResetPasswordController@forgot_password_process'));
 Route::get('reset-password/{email}/{token}', 'ResetPasswordController@getPassword');
 Route::post('reset-password-process', 'ResetPasswordController@resetPasswordProcess');





 Route::get('check-out', function () {
    return view('check-out');
 });


 Route::get('wishlist', function () {
    return view('wishlist');
 });

 Route::get('product', function () {
    return view('product');
 });


 Route::get('privacy-policy', function () {
    return view('privacy-policy');
 });

 Route::get('coming-soon', function () {
    return view('coming-soon');
 });

 Route::get('layout', function () {
    return view('layout');
 });




  //Comment/Review route
  Route::get('add-comment/{id}', 'CommentReviewController@addComment');






 // route to sideBarCategories
 Route::get('/', 'HomeController@sideBarCategories');

 // route to shopCategories
//  Route::get('layout', 'HomeController@shopCategories');


 // route to create account
 Route::post('create-account', 'CustomerAccountController@createAccount');

 //profile page route
 Route::get('my-profile', array('uses' => 'CustomerAccountController@showProfilePage'));

 Route::post('check-phone', 'CustomerAccountController@checkPhone');




 // route to contact
 Route::get('contact', array('uses' => 'Controller@contact'));

 // route to send email
 Route::post('contact-send', array('uses' => 'ContactController@saveContact'));

 

 // route to login
 Route::get('login', 'Controller@login');

 // route to login
 Route::post('login', 'LoginController@login');

 //logout route
Route::get('logout', array('uses' => 'LoginController@doLogout'));





//main categories route
Route::get('{main_category}', array('uses' =>'PageController@mainCategories'));

//second categories route
Route::get('{main_category}/{second_category}', array('uses' =>'PageController@secondCategories'));

//third categories route(products)
Route::get('{main_category}/{second_category}/{third_category}', array('uses' =>'PageController@thirdCategories'));

Route::get('thirdCategories_pagination/fetch_data', 'PageController@thirdCategories_fetch_data');


//product route
Route::get('{main_category}/{second_category}/{third_category}/{product_name}', array('uses' =>'PageController@product'));


//product from main category route
Route::get('/name/name/name/{main_category_product}/{product_name}', array('uses' =>'PageController@productMainCategory'))->name('main');

//product from second/parent category route
Route::get('/name/name/name/{main_category_product}/{second_category_product}/{product_name}', array('uses' =>'PageController@productSecondCategory'));







//car brands route
Route::get('{car_brand}/home/brands/Car-brands/products', array('uses' =>'BrandsController@carBrands'));

//part brands route
Route::get('{part_brand}/home/brands/Part-brands/products', array('uses' =>'BrandsController@partBrands'));









