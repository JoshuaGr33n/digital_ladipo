 
 @extends('layout')
 @section('title', 'My Profile')
 @section('content') 


 @php 
 use App\CategoriesModel;
 use App\Products;
 use Illuminate\Support\Facades\DB;
 @endphp
 <meta name="csrf-token" content="{{ csrf_token() }}">
 <!--breadcrumbs area start-->
 <div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{url('/')}}">home</a></li>
                        <li>My Profile</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!-- my account start  -->
<section class="main_content_area">
    <div class="container">
        <div class="account_dashboard">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <!-- Nav tabs -->
                    <div class="dashboard_tab_button">
                        <ul role="tablist" class="nav flex-column dashboard-list" id="nav-tab">
                            <li><a href="#dashboard" data-toggle="tab" class="nav-link active">Dashboard</a></li>
                            <!-- <li> <a href="#orders" data-toggle="tab" class="nav-link">My Orders</a></li> -->
                            <!-- <li><a href="#downloads" data-toggle="tab" class="nav-link">Downloads</a></li> -->
                            <li><a href="#address" data-toggle="tab" class="nav-link">Address</a></li>
                            <li><a href="#account-details" data-toggle="tab" class="nav-link">Account details</a></li>
                            <!-- <li><a href="logout" class="nav-link">logout</a></li> -->
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content">
                        <div class="tab-pane fade show active" id="dashboard">
                            <h3>Dashboard </h3>
                            <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">Edit your password and account details.</a></p>
                        </div>
                        <div class="tab-pane fade" id="orders">
                            <h3>My Orders</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Order</th>
                                            <th>Order Id</th>
                                            <th>Item Price</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Payment Method</th>
                                            <th>Total</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($myOrders as $myOrder)
                                      @php 
                                       $product_item_id = Products::find($myOrder->item_id);
                                        
                                      @endphp
                                      @if($product_item_id)


                                      @php 
                                     
                                       $order_main_category = CategoriesModel::where('id',$product_item_id->main_category_id)->get();
                                       
                                       $order_second_category = CategoriesModel::where('id',$product_item_id->second_category_id)->get();
                                       $order_third_category = CategoriesModel::where('id',$product_item_id->third_category_id)->get();
                                      @endphp

                                    @if(empty($product_item_id->second_category_id) && empty($product_item_id->third_category_id))
                                       @foreach($order_main_category as $order_main_category)
                                       @php $link ='name/name/name/'.str_replace(' ','-',$order_main_category->main_category).'/'.str_replace(' ','-',$myOrder->order); @endphp
                                       @endforeach
                                    @elseif(empty($product_item_id->third_category_id))
                                       @foreach($order_main_category as $order_main_category)
                                       @foreach($order_second_category as $order_second_category)
                                       @php $link = 'name/name/name/'.str_replace(' ','-',$order_main_category->main_category).'/'.str_replace(' ','-',$order_second_category->second_category).'/'.str_replace(' ','-',$myOrder->order); @endphp
                                       @endforeach
                                       @endforeach
                                    @else
                                      @foreach($order_main_category as $order_main_category)
                                      @foreach($order_second_category as $order_second_category)
                                      @foreach($order_third_category as $order_third_category)
                                      @php $link = str_replace(' ','-',$order_main_category->main_category).'/'.str_replace(' ','-',$order_second_category->second_category).'/'.str_replace(' ','-',$order_third_category->third_category).'/'.str_replace(' ','-',$myOrder->order); @endphp
                                      @endforeach
                                      @endforeach
                                      @endforeach
                                    @endif

                                     @endif

                                   
                                        <tr>
                                            <td>{{ $myOrder->order}}</td>
                                            <td>{{ $myOrder->order_id}}</td>
                                            <td>₦{{$myOrder->price}}</td>
                                            <td>{{  date("d M Y  h:i:s A", strtotime($myOrder->created_at)) }}</td>
                                            <td><span class="success">{{ $myOrder->delivery_status}}</span></td>
                                            <td><span class="success">{{ $myOrder->payment_method}}</span></td>
                                            <td>₦{{ $myOrder->price * $myOrder->quantity}} for {{$myOrder->quantity}} items</td>
                                            <td>@if($product_item_id) @if($product_item_id->item_status=='Available')<a href="{{$link}}" class="view">view</a>@endif @endif</td>
                                        </tr>
                                        
                                        @endforeach
                                        <!-- <tr>
                                            <td>2</td>
                                            <td>May 10, 2018</td>
                                            <td>Processing</td>
                                            <td>#17.00 for 1 item </td>
                                            <td><a href="cart.html" class="view">view</a></td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="downloads">
                            <h3>Downloads</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Downloads</th>
                                            <th>Expires</th>
                                            <th>Download</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Shopnovilla - Free Real Estate PSD Template</td>
                                            <td>May 10, 2018</td>
                                            <td><span class="danger">Expired</span></td>
                                            <td><a href="#" class="view">Click Here To Download Your File</a></td>
                                        </tr>
                                        <tr>
                                            <td>Organic - ecommerce html template</td>
                                            <td>Sep 11, 2018</td>
                                            <td>Never</td>
                                            <td><a href="#" class="view">Click Here To Download Your File</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="address">
                            <p>The following addresses will be used on the checkout page by default.</p>
                            <h4 class="billing-address">Billing address</h4>
                            <!-- <a href="#" class="view">Edit</a> -->
                            @if(Session::has('success'))
                           <div class="alert alert-success">
                           {{ Session::get('success') }}
                             </div>
                              @endif



                              
                            <div style="color:green" id="update-address-success-message">  </div>
                            <form id="update-address">
                            {{csrf_field()}}
                            <div class="col-12">
                                <div class="order-notes">
                                    <label for="order_note">Address</label>
                                    
                                    <textarea  id="address-text" name="address" placeholder="Delivery Address" style="height:100px">{{Auth::user()->address}}</textarea>
                                    <span class="text-danger" id="address-error"></span><br>
                                </div>
                            </div>
                            <div class="order_button">
                                <button type="submit">Save</button>
                            </div>
                           </form>
                            <p><strong>{{Auth::user()->fname}} {{Auth::user()->lname}}</strong></p>
                            <address>
                               {{Auth::user()->address}}
                           
                            </address>
                                <p></p>
                        </div>
                        <div class="tab-pane fade" id="account-details">
                            <h3>Account details </h3>
                            <div class="login">
                                <div class="login_form_container">
                                    <div class="account_login_form">
                                    <br>
                                         @if(Session::has('success'))
                                          <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                            </div>
                                           @endif
                                        @if(Session::has('email_duplicate_error'))
                                       <div class="alert alert-danger">
                                       {{ Session::get('email_duplicate_error') }}
                                      </div>
                                      @endif

                                      @if(Session::has('phone_duplicate_error'))
                                     <div class="alert alert-danger">
                                        {{ Session::get('phone_duplicate_error') }}
                                        </div>
                                       @endif



                                       
                                       <div style="color:green" id="update-success-message">  </div>
                                        <form id="update-account">
                                          {{csrf_field()}}
                                            <div class="input-radio">
                                            @if (Auth::user()->gender=="M")
                                                <span class="custom-radio"><input name="gender" id="M" type="radio"  value="M" checked> Male</span>
                                                <span class="custom-radio"><input name="gender" id="F" type="radio" value="F"> Female</span>
                                            @else
                                                <span class="custom-radio"><input name="gender" id="M" type="radio"  value="M"> Male</span>
                                                <span class="custom-radio"><input name="gender" id="F" type="radio" value="F" checked> Female</span>
                                            @endif      
                                            </div> <br>
                                            <label>First Name</label>
                                            <input type="text" name="fname" id="fname" value="{{Auth::user()->fname}}">
                                            <span class="text-danger" id="fname-error"></span><br>
                                            <label>Last Name</label>
                                            <input type="text" name="lname" id="lname" value="{{Auth::user()->lname}}">
                                            <span class="text-danger" id="lname-error"></span><br>
                                            <label>Phone</label>
                                            <input type="text" name="phone" id="phone" value="{{Auth::user()->phone}}">
                                            <span class="text-danger" id="phone-error"></span><br>
                                            <span class="text-danger" id="phone_duplicate_error"></span><br>

                                            <label>Email</label>
                                            <input type="text" name="email" id="email" value="{{Auth::user()->email}}">
                                            <span class="text-danger" id="email-error"></span><br>
                                            <span class="text-danger" id="email_duplicate_error"></span><br>
                                            <label>Retype Email</label>
                                            <input type="text" name="retype-email" id="retype_email" value="{{Auth::user()->email}}">
                                            <span class="text-danger" id="retype_email-error"></span><br>
                                            
                                            <div class="save_button primary_btn default_button">
                                                <button type="submit">Save</button>
                                            </div>
                                        </form>

                                        <br>
                                        @if ($incorrect_password = Session::get('incorrect_password'))
                                       <div class="alert alert-danger">
                                        <p>{{ $incorrect_password }}</p>
                                        </div>
                                        @endif

                                        @if ($password_success = Session::get('password_success'))
                                         <div class="alert alert-success">
                                        <p>{{ $password_success }}</p>
                                        </div>
                                        @endif

                                        <div style="color:green" id="message">  </div>
                                        <div style="color:red" id="old-password-err">  </div>

                                        <form id="change-profile-password"  style="margin-top:10px">
                                            {{csrf_field()}}
                                            {{ $errors->first('new_password') }}<br>
                                            {{ $errors->first('confirm_new_password') }}<br>
                                            <label>Old Password</label>
                                            <input type="password" name="old_password" id="old_password" class="form-control @error('old_password') is-invalid @enderror">
                                            <span class="text-danger" id="old_password-error"></span><br>
                                           
                                            <label>New Password</label>
                                            <input type="password" name="new_password" id="new_password" class="form-control @error('new_password') is-invalid @enderror">
                                            <span class="text-danger" id="new_password-error"></span><br>
                                            
                                            <label>Repeat Password</label> 
                                            <input type="password" name="confirm_new_password" id="confirm_new_password" class="form-control @error('confirm_new_password') is-invalid @enderror">
                                            <span class="text-danger" id="confirm_new_password-error"></span>
                                           
                                            
                                            <div class="save_button primary_btn default_button">
                                                <button type="submit">Save</button>
                                            </div>
                                        </form> 
                                    
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- my account end   -->
@endsection
@section('scripts')
<script type="text/javascript">
 $.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
 });

 $('#update-address').on('submit', function(event){
     event.preventDefault();
     $('#address-error').text('');
   
     address = $('#address-text').val();
    
    
    

     $.ajax({
       url: "update-address",
       type: "POST",
       data:{
        address:address,
       },
       success:function(response){
         console.log(response);
         if (response) {
           $('#update-address-success-message').text(response.address_update_success);
       
          

        //    $("#update-account")[0].reset();
   
         }
   
       },
       error: function(response) {
           $('#address-error').text(response.responseJSON.errors.address);
   
       }
      });
     });
   </script>


<script type="text/javascript">
 $.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
 });

 $('#update-account').on('submit', function(event){
     event.preventDefault();
     $('#fname-error').text('');
     $('#lname-error').text('');
     $('#phone-error').text('');
     $('#email-error').text('');
     $('#retype_email-error').text('');
     
     
     gender = $('input[name=gender]:checked').val();
     fname = $('#fname').val();
     lname = $('#lname').val();
     phone = $('#phone').val();
     email = $('#email').val();
     retype_email = $('#retype_email').val();
    

     $.ajax({
       url: "update-account",
       type: "POST",
       data:{
           gender:gender,
           fname:fname,
           lname:lname,
           phone:phone,
           email:email,
           retype_email:retype_email,
         
       },
       success:function(response){
         console.log(response);
         if (response) {
           $('#update-success-message').text(response.update_success);
           $('#email_duplicate_error').text(response.email_duplicate_error);
           $('#phone_duplicate_error').text(response.phone_duplicate_error);


           if(response.update_success){
                
                $('#email_duplicate_error').hide();
                $('#phone_duplicate_error').hide();
                $('#update-success-message').show();
                
             }
             else if(response.email_duplicate_error){
               
                $('#update-success-message').hide();
                $('#email_duplicate_error').show();
               
             }

             else if(response.phone_duplicate_error){
               
               $('#update-success-message').hide();
               $('#phone_duplicate_error').show();
              
            }
          
        //    $("#update-account")[0].reset();
   
         }

        

             
                 
               
       },
       error: function(response) {
           $('#fname-error').text(response.responseJSON.errors.fname);
           $('#lname-error').text(response.responseJSON.errors.lname);
           $('#phone-error').text(response.responseJSON.errors.phone);
           $('#email-error').text(response.responseJSON.errors.email);
           $('#retype_email-error').text(response.responseJSON.errors.retype_email);
         
          
      
       }
      });
     });
   </script>



<script type="text/javascript">
 $.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
 });

 $('#change-profile-password').on('submit', function(event){
     event.preventDefault();
     $('#old_password-error').text('');
     $('#new_password-error').text('');
     $('#confirm_new_password-error').text('');

     
     old_password = $('#old_password').val();
     new_password = $('#new_password').val();
     confirm_new_password = $('#confirm_new_password').val();
     
    

     $.ajax({
       url: "change-profile-password",
       type: "POST",
       data:{
        old_password:old_password,
        new_password:new_password,
        confirm_new_password:confirm_new_password,
          
       },
       success:function(response){
         console.log(response);
         if (response) {
            $('#message').text(response.success);
             $('#old-password-err').text(response.incorrect_password);
             if(response.success){
                
                $('#old-password-err').hide();
                $('#message').show();
                
             }
             else if(response.incorrect_password){
               
                $('#message').hide();
                $('#old-password-err').show();
               
             }
           

           
          
           $("#change-profile-password")[0].reset();
   
         }

        

             
                 
               
       },
       error: function(response) {
           $('#old_password-error').text(response.responseJSON.errors.old_password);
           $('#new_password-error').text(response.responseJSON.errors.new_password);
           $('#confirm_new_password-error').text(response.responseJSON.errors.confirm_new_password);
         
          
      
       }
      });
     });
   </script>
@stop