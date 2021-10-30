<!doctype html>
<html class="no-js" lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Reset Password</title>
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
 <meta name="csrf-token" content="{{ csrf_token() }}">
 @if(\Illuminate\Support\Facades\Auth::check())
      <script>window.location = "{{ URL::to('/') }}";</script>
      <?php exit; ?>
 
 @else 
 

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
                        <!-- <li><a href="{{url('login')}}">back</a></li> -->
                        
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
        <div class="row">
            <!--login area start-->
            <div class="col-lg-6 col-md-6" style="margin:auto">
                <div class="account_form">
                    <h2>Reset Password</h2>
                    @if ($success = Session::get('success_message'))
                      <div class="alert alert-success">
                        <p>{{ $success }}</p>
                       </div>
                   @endif
                    <form action="{{url('reset-password-process')}}" method="post">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
               <p>
                {{ $errors->first('email') }}
              
              </p>
                    <div class="form-group"><label for="">{{$email}}</label><input class="form-control"
                        placeholder="Email" type="hidden" name="email" value="{{$email}}">
                        <div class="pre-icon os-icon os-icon-user-male-circle"></div>
                    </div>
                        <p>
                        <div class="form-group"><label for="">New Password</label><input class="form-control @error('password') is-invalid @enderror"
                        placeholder="New Password" type="password" name="password">
                    
                               @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-group"><label for="">Retype Password</label><input class="form-control @error('password') is-invalid @enderror"
                        placeholder="Confirm New Password" type="password" name="password_confirmation">
                    
                </div>
                        </p>
                              @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                       
                        <div class="login_submit">
                            
                            <button type="submit">submit</button>

                        </div>

                    </form>
                </div>
            </div>
            <!--login area start-->

          

            

        </div>
    </div>
</div>
<!-- customer login end -->



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


</body>



</html>
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
     
     gender = $('#gender').val();
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
           $('#success-message').text(response.success);
          
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
    @endif
