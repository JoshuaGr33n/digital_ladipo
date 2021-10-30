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



 //FRONT SECTION START
 Route::get('/', function () {

   if (Auth::check()) {
      return Redirect::to('dashboard');
  }
    //  Session::flush();
    return view('admin');

   
 });


 //password reset
 Route::get('forgot-password', 'ResetPasswordController@forgot_password');

 // route to process forgot password email
 Route::post('process-email', array('uses' => 'ResetPasswordController@forgot_password_process'));
 Route::get('reset-password/{email}/{token}', 'ResetPasswordController@getPassword');
 Route::post('reset-password-process', 'ResetPasswordController@resetPasswordProcess');


 

 
 // route to show the login form
 Route::get('admin', array('uses' => 'Controller@showAdmin'));

 // route to process the form
 Route::post('admin', array('uses' => 'Controller@doLogin'));

  //logout route
 Route::get('logout', array('uses' => 'Controller@doLogout'));

 //dashboard route
 Route::get('dashboard', array('uses' => 'PageController@dashboard'));

 Route::get('dashboard', array('uses' => 'PageController@Total'));

 //orders route
 Route::get('orders', array('uses' => 'PageController@orders'));



 // route to order data
 Route::resource('order_data','OrdersController');


 

 //customers route
 Route::get('customers', array('uses' => 'PageController@customers'));

 // products route
 Route::get('products', array('uses' => 'PageController@products'));
 Route::get('/product/{id}', 'ProductsController@productItem');

 Route::get('/product/{id}/item_order_history', 'ProductsController@itemOrderHistory');
 Route::get('/product/{id}/back', 'ProductsController@backItemOrderHistory');
 
 
 Route::patch('/product/{id}/updateItemstatus', 'ProductsController@updateItemStatus');



 // edit products route
 Route::get('/edit-product/{id}', 'ProductsController@editProducts');
 Route::post('{id}/update', 'ProductsController@updateProductItem');
 Route::delete('{id}/delete', 'ProductsController@deleteProductItem');

 Route::get('/editSecondCategories/{id}', 'ProductsController@geteditSecondCategories');

 Route::post('/getsec', 'ProductsController@getSec');





 
 Route::get('add-products', array('uses' => 'ProductsController@addProducts'));
 Route::get('/secondCategories/{id}', 'ProductsController@getSecondCategories');
 Route::get('/thirdCategories/{id}', 'ProductsController@getThirdCategories');
 Route::post('storeProducts', 'ProductsController@storeProducts');



 // car brands route
 Route::get('car-brands', array('uses' => 'PageController@car_brands'));
 Route::post('add-car-brand', 'BrandsController@add_car_brands');
 Route::patch('edit-car-brand/{id}', 'BrandsController@edit_car_Brand');
 Route::delete('delete-car-brand/{id}', 'BrandsController@delete_car_Brand');


 // part brands route
 Route::get('part-brands', array('uses' => 'PageController@part_brands'));
 Route::post('add-part-brand', 'BrandsController@add_part_brands');
 Route::patch('edit-part-brand/{id}', 'BrandsController@edit_part_Brand');
 Route::delete('delete-part-brand/{id}', 'BrandsController@delete_part_Brand');
 






 //post main categories route
 Route::get('categories', array('uses' => 'PageController@categories'));
 Route::post('store_main_category', array('uses' => 'CategoriesController@storeMainCategory'));
 Route::delete('store_main_category/{id}', array('uses' => 'CategoriesController@deleteMainCategory'));
 Route::patch('store_main_category/{id}', array('uses' => 'CategoriesController@updateMainCategory'));

 //second categories route
 Route::get('{main_category}', array('uses' =>'CategoriesController@secondCategories'));
 Route::post('{main_category}/post', array('uses' => 'CategoriesController@secondCategoriesStore'));
 Route::delete('delete_second_category', array('uses' => 'CategoriesController@deleteSecondCategories'));
 Route::patch('update_second_category', array('uses' => 'CategoriesController@updateSecondCategory'));

 //third categories route
 Route::get('{main_category}/{second_category}', array('uses' =>'CategoriesController@thirdCategories'));
 Route::post('{main_category}/{second_category}/post', array('uses' =>'CategoriesController@thirdCategoriesStore'));
 Route::delete('{main_category}/{second_category}/delete_third_category', array('uses' => 'CategoriesController@deleteThirdCategories'));
 Route::patch('{main_category}/{second_category}/update_third_category', array('uses' => 'CategoriesController@updateThirdCategory'));





 





 