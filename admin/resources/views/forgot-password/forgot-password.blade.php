<!DOCTYPE html>
<html>
<!-- Mirrored from light.pinsupreme.com/auth_lock.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Jul 2020 19:12:25 GMT -->

<head>
    <title>Forgot Password</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="Tamerlan Soziev" name="author">
    <meta content="Forgot Password" name="description">
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
        <div class="auth-box-w wider centered">
            <div class="logo-w">
            <!-- <img alt="" src="{{ asset('public/assets/img/logo.png') }}" style="height:200px; width:280px"/> -->
              <p><h1>Digital Ladipo</h1></p>
            </div>
            <h5 class="auth-header">Forgot Password</h5>

          

           @if ($success = Session::get('success_message'))
           <div class="alert alert-success">
              <p>{{ $success }}</p>
           </div>
           @endif

            
            <form action="process-email" method="post">
            {{ csrf_field() }}

            <p>
                {{ $errors->first('email') }}
              
           </p>
                <div class="form-group"><label for="">Enter your Email</label>
                <input class="form-control @error('email') is-invalid @enderror" placeholder="Enter you Email" type="text" name="email" value="{{ old('email') }}">
                    <div class="pre-icon os-icon os-icon-user-male-circle"></div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="buttons-w"><button class="btn btn-primary">Submit</button><a class="btn btn-link"
                        href="{{url('admin')}}">Back</a></div>
            </form>
        </div>
    </div>
</body>


</html>