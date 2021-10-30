@extends('layout')
 @section('title', 'Login')
 @section('content')
 <meta name="csrf-token" content="{{ csrf_token() }}">
 @if(\Illuminate\Support\Facades\Auth::check())
      <script>window.location = "{{ URL::to('/') }}";</script>
      <?php exit; ?>
 
 @else 
 <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" /> -->
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script> -->

<style>
.error{ color:red; } 
</style> 
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{url('/')}}">home</a></li>
                        <li>Login</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->


<!-- customer login start -->
<div class="customer_login mt-32">
    <div class="container">
    @if(Session::has('login_alert'))
 <div class="alert alert-warning">
 {{ Session::get('login_alert') }}
 </div>
 @endif
        <div class="row">
            <!--login area start-->
            <div class="col-lg-6 col-md-6">
                <div class="account_form">
                    <h2>login</h2>


                    @if ($password_reset_success = Session::get('password_reset_success'))
                  <div class="alert alert-success">
                  <p>{{ $password_reset_success }}</p>
                  </div>
                  @endif





                    @if ($loginErr = Session::get('login_error'))
                  <div class="alert alert-danger">
                  <p>{{ $loginErr }}</p>
                  </div>
                  @endif


                    <form action="login" method="post">
                    @csrf
               <p>
                {{ $errors->first('email') }}
               {{ $errors->first('password') }}
              </p>
                        <p>
                            <label>Email <span>*</span></label>
                            <input type="text" name="email">
                        </p>
                        <p>
                            <label>Passwords <span>*</span></label>
                            <input type="password" name="password">
                        </p>
                        <div class="login_submit">
                            <a href="{{url('forgot-password')}}">Lost your password?</a>
                            <!-- <label for="remember">
                                <input id="remember" type="checkbox">
                                Remember me
                            </label> -->
                            <button type="submit">login</button>

                        </div>

                    </form>
                </div>
            </div>
            <!--login area start-->

            <!--register area start-->
         

            <div class="col-lg-6 col-md-6">
                <div class="account_form register">
                    <h2>Register</h2>
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

                     @if(Session::has('phone_email_duplicate_error'))
                   <div class="alert alert-danger">
                     {{ Session::get('phone_email_duplicate_error') }}
                  </div>
                     @endif
                     <div style="color:green" id="success-message">  </div>
                    <form id="create-account">
                        @csrf
                        <div class="input-radio">
                        <span class="custom-radio"><input type="radio" value="M" name="gender" id="M"> Male</span>
                        <span class="custom-radio"><input type="radio" value="F" name="gender" id="F"> Female</span>
                        </div> <br>
                        <p>
                         <label>First Name <span>*</span></label>
                         <input type="text" name="fname" id="fname" value="{{ old('fname') }}">
                         <span class="text-danger" id="fname-error"></span>
                         </p>
                         <label>Last Name <span>*</span></label>
                         <input type="text" name="lname" id="lname" value="{{ old('lname') }}">
                         <span class="text-danger" id="lname-error"></span>
                         <p>
                            <label>Phone <span>*</span></label>
                            <input type="text" name="phone" id="phone">
                            <span class="text-danger" id="phone-error"></span>
                        </p>
                        <p>
                            <label>Email address <span>*</span></label>
                            <input type="text" name="email" id="email" value="{{ old('email') }}">
                            <span class="text-danger" id="email-error"></span>
                            <span class="text-danger" id="email_duplicate_error"></span>
                        </p>
                        <p>
                            <label>Retype Email address <span>*</span></label>
                            <input type="text" name="retype_email" id="retype_email" value="{{ old('retype_email') }}">
                            <span class="text-danger" id="retype_email-error"></span>
                        </p>
                        <p>
                            <label>Password <span>*</span></label>
                            <input type="password" name="password" id="password">
                            <span class="text-danger" id="password-error"></span>
                        </p>
                        <p>
                            <label> Retype Password <span>*</span></label>
                            <input type="password" name="retype_password" id="retype_password">
                            <span class="text-danger" id="retype_password-error"></span>
                        </p>
                        <div class="login_submit">
                            <button type="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--register area end-->

        </div>
    </div>
</div>
<!-- customer login end -->



@endif

       
@endsection
@section('scripts')
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> -->

<script type="text/javascript">
 $.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
 });

 $('#create-account').on('submit', function(event){
     event.preventDefault();
     $('#fname-error').text('');
     $('#lname-error').text('');
     $('#phone-error').text('');
     $('#email-error').text('');
     $('#retype_email-error').text('');
     $('#password-error').text('');
     $('#retype_password-error').text('');
     
     gender = $('input[name=gender]:checked').val();
     fname = $('#fname').val();
     lname = $('#lname').val();
     phone = $('#phone').val();
     email = $('#email').val();
     retype_email = $('#retype_email').val();
     password = $('#password').val();
     retype_password = $('#retype_password').val();

     $.ajax({
       url: "create-account",
       type: "POST",
       data:{
           gender:gender,
           fname:fname,
           lname:lname,
           phone:phone,
           email:email,
           retype_email:retype_email,
           password:password,
           retype_password:retype_password,
       },
       success:function(response){
         console.log(response);
         if (response) {
           $('#success-message').html('<div class="alert alert-success">'+response.success+'</div>');
          
           $("#create-account")[0].reset();
   
         }

        

             
                 
               
       },
       error: function(response) {
           $('#fname-error').text(response.responseJSON.errors.fname);
           $('#lname-error').text(response.responseJSON.errors.lname);
           $('#phone-error').text(response.responseJSON.errors.phone);
           $('#email-error').text(response.responseJSON.errors.email);
           $('#retype_email-error').text(response.responseJSON.errors.retype_email);
           $('#password-error').text(response.responseJSON.errors.password);
           $('#retype_password-error').text(response.responseJSON.errors.retype_password);
          
      
       }
      });
     });
   </script>
@stop