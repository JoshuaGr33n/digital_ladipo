<!DOCTYPE html>
<html>

<head>
    <title>Digital Ladipo:: Admin</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="Tamerlan Soziev" name="author">
    <meta content="Admin dashboard html template" name="description">
    <meta content="width=device-width,initial-scale=1" name="viewport">
    <link href="favicon.png" rel="shortcut icon">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="../fast.fonts.net/cssapi/487b73f1-c2d1-43db-8526-db577e4c822b.html" rel="stylesheet">
    <link href="public/assets/bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="public/assets/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="public/assets/bower_components/dropzone/dist/dropzone.css" rel="stylesheet">
    <link href="public/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="public/assets/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="public/assets/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
    <link href="public/assets/bower_components/slick-carousel/slick/slick.css" rel="stylesheet">
    
    
    <link href="{{ asset('public/assets/css/main5739.css?version=4.5.0') }}" rel="stylesheet">
    
   


  
   
</head>

<body class="auth-wrapper">
    <div class="all-wrapper menu-side with-pattern">
        <div class="auth-box-w">
            <div class="logo-w"><img alt="" src="{{ asset('public/assets/img/logo.png') }}" style="height:200px; width:280px"/><p><h1>Digital Ladipo</h1></p></div>
            <h4 class="auth-header">Admin Login</h4>

            @if ($loginErr = Session::get('login_error'))
           <div class="alert alert-danger">
              <p>{{ $loginErr }}</p>
           </div>
           @endif


           @if ($password_reset_suc = Session::get('password_reset_success'))
           <div class="alert alert-success">
              <p>{{ $password_reset_suc }}</p>
           </div>
           @endif


            
            {{ Form::open(array('url' => 'admin')) }}
              @csrf
            <p>
                {{ $errors->first('email') }}
               {{ $errors->first('password') }}
           </p>

            

            
                <div class="form-group"><label for="">Email</label>
                      
                        {{ Form::text('email',  Request::old('email'), array('placeholder' => 'Your Email Here', 'class' =>"form-control")) }}
                      
                    <div class="pre-icon os-icon os-icon-user-male-circle"></div>
                </div>
                <div class="form-group"><label for="">Password</label> 
                 {{ Form::password('password', array('class' =>"form-control")) }}
                    <div class="pre-icon os-icon os-icon-fingerprint"></div>
                </div>
                <div class="buttons-w">
                {{ Form::submit('Login', array('class' =>"btn btn-primary")) }}
                </div>
                <div class="buttons-w">
                    <div class="form-check-inline">
                        <a href="{{url('forgot-password')}}">Forgot Password?</a>
                </div>
            {{ Form::close() }}
            
        </div>
       
    </div>
</body>

</html>

