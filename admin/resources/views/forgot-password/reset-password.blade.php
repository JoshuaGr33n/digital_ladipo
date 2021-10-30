<!DOCTYPE html>
<html>
<!-- Mirrored from light.pinsupreme.com/auth_login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Jul 2020 19:12:23 GMT -->

<head>
    <title>Reset Your Password</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="Tamerlan Soziev" name="author">
    <meta content="Reset Your Password" name="description">
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
        <div class="logo-w">
            <!-- <img alt="" src="{{ asset('public/assets/img/logo.png') }}" style="height:120px; width:200px"/> -->
             <p><h1>Digital Ladipo</h1></p>
            </div>
            <h4 class="auth-header">Reset Password</h4>
          

           @if ($success = Session::get('success'))
           <div class="alert alert-success">
              <p>{{ $success }}</p>
           </div>
           @endif
            <form action="{{url('reset-password-process')}}" method="post">
                     @csrf
                           <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group"><label for="">{{$email}}</label><input class="form-control"
                        placeholder="Email" type="hidden" name="email" value="{{$email}}">
                    <div class="pre-icon os-icon os-icon-user-male-circle"></div>
                </div>
                <div class="form-group"><label for="">New Password</label><input class="form-control @error('password') is-invalid @enderror"
                        placeholder="New Password" type="password" name="password">
                    <div class="pre-icon os-icon os-icon-fingerprint"></div>
                               @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-group"><label for="">Retype Password</label><input class="form-control"
                        placeholder="Confirm New Password" type="password" name="password_confirmation">
                    <div class="pre-icon os-icon os-icon-fingerprint"></div>
                </div>
                <div class="buttons-w"><button class="btn btn-primary">Reset</button><a class="btn btn-link"
                        href="{{url('admin')}}">Back</a></div>
               
            </form>
        </div>
    </div>
</body>


</html>