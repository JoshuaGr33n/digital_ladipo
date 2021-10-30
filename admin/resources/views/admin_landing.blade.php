<!DOCTYPE html>
<html>

<head>
    <title>Sekai-Shed:: Admin</title>
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
    <div class="all-wrapper menu-side with-pattern" style="background: #000;">
        <div class="auth-box-w" style="height:700px">
            <div class="logo-w"><a href="sekaiDashboard"><img alt="" src="{{ asset('public/assets/img/sekai.jpg') }}" style="height:100px; width:100px; border:#333 2px solid; padding:2px 2px 2px 2px"/><p><h1>Sekai</h1></p></a></div>
            <div class="logo-w"><a href="shedDashboard"><img alt="" src="{{ asset('public/assets/img/shed.jpg') }}" style="height:100px; width:100px; border:#333 2px solid; padding:2px 2px 2px 2px"/><p><h1>The Shed</h1></p></a></div>
            <!-- <h4 class="auth-header"></h4> -->
            {{Auth::user()->fname }} {{Auth::user()->lname }}  
            <!-- <a href="shedDashboard"  style="margin-left:100px"><img alt="" src="{{ asset('public/assets/img/sekai.jpg') }}" style="height:100px; width:100px"/></a>
            <a href="shedDashboard"  style="margin-left:100px"><img alt="" src="{{ asset('public/assets/img/shed.jpg') }}" style="height:100px; width:100px"/></a> -->
        </div>
    </div>
</body>


</html>