
 @if(\Illuminate\Support\Facades\Auth::check())
<!DOCTYPE html>
<html>
    <head>
        <title>Digital Ladipo:: Admin - @yield('title')</title>
        <meta charset="utf-8" />
        <meta content="ie=edge" http-equiv="x-ua-compatible" />
        <meta content="template language" name="keywords" />
        <meta content="Tamerlan Soziev" name="author" />
        <meta content="Admin dashboard" name="description" />
        <meta content="width=device-width,initial-scale=1" name="viewport" />
        <link href="favicon.png" rel="shortcut icon" />
        <link href="apple-touch-icon.png" rel="apple-touch-icon" />
        <link href="../fast.fonts.net/cssapi/487b73f1-c2d1-43db-8526-db577e4c822b.html" rel="stylesheet" />
        <link href="{{asset('public/assets/bower_components/select2/dist/css/select2.min.css ')}}" rel="stylesheet"/>
        <link href="{{asset('public/assets/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet" />
        <link href="{{asset('public/assets/bower_components/dropzone/dist/dropzone.css')}}" rel="stylesheet" />
        <link href="{{asset('public/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet" />
        <link href="{{asset('public/assets/bower_components/fullcalendar/dist/fullcalendar.min.css')}}" rel="stylesheet" />
        <link href="{{asset('public/assets/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css')}}" rel="stylesheet" />
        <link href="{{asset('public/assets/bower_components/slick-carousel/slick/slick.css')}}" rel="stylesheet" />
        <link href="{{asset('public/assets/css/main5739.css?version=4.5.0')}}" rel="stylesheet" />
        
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/img/logo_m_2.png') }}">


        <link href="{{asset('public/assets/dropdown/css/bootstrap-4.5.2.min.css')}}" rel="stylesheet" />


       
        
     <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script>
      function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
       }
     </script>



    <body class="menu-position-side menu-side-left full-screen with-content-panel">
        <div class="all-wrapper with-side-panel solid-bg-all">
          
            <div class="layout-w">
                <div class="menu-mobile menu-activated-on-click color-scheme-dark">
                    <div class="mm-logo-buttons-w">
                        <a class="mm-logo" href="#"><img src="{{ asset('public/img/logo_m_2.png') }}" style="height:100px"/><span>Digital Ladipo</span></a>
                        <div class="mm-buttons">
                            <div class="content-panel-open"><div class="os-icon os-icon-grid-circles"></div></div>
                            <div class="mobile-menu-trigger"><div class="os-icon os-icon-hamburger-menu-1"></div></div>
                        </div>
                    </div>
                    <div class="menu-and-user">
                        <div class="logged-user-w">
                            <div class="avatar-w"><img alt="" src="{{ asset('public/img/logo_m_2.png') }}" />ggggg</div>
                            <div class="logged-user-info-w">
                                <div class="logged-user-name">{{Auth::user()->fname }} {{Auth::user()->lname }} </div>
                                <div class="logged-user-role">Administrator</div>
                            </div>
                        </div>
                        <ul class="main-menu">
                        <li class="sub-header"><span>ADMIN</span></li>
                        <li class="selected has-sub-menu">
                            <a href="{{url('dashboard')}}">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-layout"></div>
                                </div>
                                <span>Dashboard</span>
                            </a>
                            
                        </li>
                        <li class="has-sub-menu">
                            <a href="{{url('orders')}}">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-layers"></div>
                                </div>
                                <span>Orders</span>
                            </a>
                            
                        </li>
                        <li class="has-sub-menu">
                          <a href="{{url('products')}}">
                              <div class="icon-w">
                                  <div class="os-icon os-icon-credit-card"></div>
                              </div>
                              <span>Products</span>
                          </a>
                          <ul>
                              <li><a href="{{url('add-products')}}">Add Product </a></li>
                          </ul>
                    
                      </li>

                      <li class="has-sub-menu">
                          <a>
                              <div class="icon-w">
                                  <div class="os-icon os-icon-credit-card"></div>
                              </div>
                              <span>Brands</span>
                          </a>
                          <ul>
                              <li><a href="{{url('car-brands')}}">Car Brands</a></li>
                              <li><a href="{{url('part-brands')}}">Part Brands</a></li>
                          </ul>
                    
                      </li>
                      <li class="has-sub-menu">
                          <a href="{{url('categories')}}">
                              <div class="icon-w">
                                  <div class="os-icon os-icon-layers"></div>
                              </div>
                              <span>Categories</span>
                          </a>
                          
                      </li>
                      <li class="has-sub-menu">
                          <a href="{{url('customers')}}">
                              <div class="icon-w">
                                  <div class="os-icon os-icon-user"></div>
                              </div>
                              <span>Customers</span>
                          </a>
                          
                      </li>

                     
                    </ul>
                        
                    </div>
                </div>
                <div
                    class="menu-w color-scheme-light color-style-transparent menu-position-side menu-side-left menu-layout-compact sub-menu-style-over sub-menu-color-bright selected-menu-color-light menu-activated-on-hover menu-has-selected-link"
                >
                    <div class="logo-w">
                        <a class="logo" href="{{url('dashboard')}}">
                            <div class="logo-element"></div>
                            <div class="logo-label">Digital Ladipo</div>
                        </a>
                    </div>
                   
                    <div class="logged-user-w avatar-inline">
                        <div class="logged-user-i">
                            <div class="avatar-w"><img alt="" src="{{ asset('public/img/logo_m_2.png') }}" /></div>
                            <div class="logged-user-info-w">
                                <div class="logged-user-name">{{Auth::user()->fname }} {{Auth::user()->lname }} </div>
                                <div class="logged-user-role">Administrator</div>
                            </div>
                            
                            
                        </div>
                    </div>
                   
                    
                    
                    <h1 class="menu-page-header">Page Header</h1>
                    <ul class="main-menu">
                        <li class="sub-header"><span>ADMIN</span></li>
                        <li class="selected has-sub-menu">
                            <a href="{{url('dashboard')}}">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-layout"></div>
                                </div>
                                <span>Dashboard</span>
                            </a>
                            
                        </li>
                        <li class="has-sub-menu">
                            <a href="{{url('orders')}}">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-layers"></div>
                                </div>
                                <span>Orders</span>
                            </a>
                            
                        </li>
                        <li class="has-sub-menu">
                          <a href="{{url('products')}}">
                              <div class="icon-w">
                                  <div class="os-icon os-icon-credit-card"></div>
                              </div>
                              <span>Products</span>
                          </a>
                           <ul>
                              <li><a href="{{url('add-products')}}">
                             
                              <span>Add Products</span>

                              </a></li>
                          </ul>
                          
                      </li>

                      <li class="has-sub-menu">
                          <a>
                              <div class="icon-w">
                                  <div class="os-icon os-icon-credit-card"></div>
                              </div>
                              <span>Brands</span>
                          </a>
                          <ul>
                              <li><a href="{{url('car-brands')}}">Car Brands</a></li>
                              <li><a href="{{url('part-brands')}}">Part Brands</a></li>
                          </ul>
                    
                      </li>
                     
                      <li class="has-sub-menu">
                          <a href="{{url('categories')}}">
                              <div class="icon-w">
                                  <div class="os-icon os-icon-layers"></div>
                              </div>
                              <span>Categories</span>
                          </a>
                          
                      </li>
                      <li class="has-sub-menu">
                          <a href="{{url('customers')}}">
                              <div class="icon-w">
                                  <div class="os-icon os-icon-users"></div>
                              </div>
                              <span>Customers</span>
                          </a>
                          
                      </li>


                     
                    </ul>
                    
                </div>
                <div class="content-w">
                    <div class="top-bar color-scheme-transparent">
                        <div class="top-menu-controls">
                           
                           
                            <div class="logged-user-w">
                                <div class="logged-user-i">
                                    <div class="avatar-w"><img alt="" src="public/img/logo_m_2.png" /></div>
                                    <div class="logged-user-menu color-style-bright">
                                        <div class="logged-user-avatar-info">
                                            <div class="avatar-w"><img alt="" src="{{ asset('public/img/logo_m_2.png') }}" /></div>
                                            <div class="logged-user-info-w">
                                                <div class="logged-user-name"> {{Auth::user()->fname }} {{Auth::user()->lname }}</div>
                                                <div class="logged-user-role">Administrator</div>
                                            </div>
                                        </div>
                                        <div class="bg-icon"><i class="os-icon os-icon-wallet-loaded"></i></div>
                                        <ul>
                                         
                                          
                                            <li>
                                                <a href="{{ URL::to('logout') }}"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 
                    <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                    <div class="content-i">
                       
                    @yield('content')
                    </div>
                </div>
            </div>
            <div class="display-type"></div>
        </div>
        <script src="{{ asset('public/assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('public/assets/bower_components/popper.js/dist/umd/popper.min.js') }}"></script>
        <script src="{{ asset('public/assets/bower_components/moment/moment.js') }}"></script>
        <script src="{{ asset('public/assets/bower_components/chart.js/dist/Chart.min.js') }}"></script>
        <script src="{{ asset('public/assets/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('public/assets/bower_components/jquery-bar-rating/dist/jquery.barrating.min.js') }}"></script>
        <script src="{{ asset('public/assets/bower_components/ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('public/assets/bower_components/bootstrap-validator/dist/validator.min.js') }}"></script>
        <script src="{{ asset('public/assets/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
        <script src="{{ asset('public/assets/bower_components/ion.rangeSlider/js/ion.rangeSlider.min.js') }}"></script>
        <script src="{{ asset('public/assets/bower_components/dropzone/dist/dropzone.js') }}"></script>
        <script src="{{ asset('public/assets/bower_components/editable-table/mindmup-editabletable.js') }}"></script>
        <script src="{{ asset('public/assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('public/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
        <script src="{{ asset('public/assets/bower_components/fullcalendar/dist/fullcalendar.min.js') }}"></script>
        <script src="{{ asset('public/assets/bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js') }}"></script>
        <script src="{{ asset('public/assets/bower_components/tether/dist/js/tether.min.js') }}"></script>
        <script src="{{ asset('public/assets/bower_components/slick-carousel/slick/slick.min.js') }}"></script>
        <script src="{{ asset('public/assets/bower_components/bootstrap/js/dist/util.js') }}"></script>
        <script src="{{ asset('public/assets/bower_components/bootstrap/js/dist/alert.js') }}"></script>
        <script src="{{ asset('public/assets/bower_components/bootstrap/js/dist/button.js') }}"></script>
        <script src="{{ asset('public/assets/bower_components/bootstrap/js/dist/carousel.js') }}"></script>
        <script src="{{ asset('public/assets/bower_components/bootstrap/js/dist/collapse.js') }}"></script>
        <script src="{{ asset('public/assets/bower_components/bootstrap/js/dist/dropdown.js') }}"></script>
        <script src="{{ asset('public/assets/bower_components/bootstrap/js/dist/modal.js') }}"></script>
        <script src="{{ asset('public/assets/bower_components/bootstrap/js/dist/tab.js') }}') }}"></script>
        <script src="{{ asset('public/assets/bower_components/bootstrap/js/dist/tooltip.js') }}"></script>
        <script src="{{ asset('public/assets/bower_components/bootstrap/js/dist/popover.js') }}"></script>
        <script src="{{ asset('public/assets/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('public/assets/js/demo_customizer5739.js?version=4.5.0') }}"></script>
        <script src="{{ asset('public/assets/js/main5739.js?version=4.5.0') }}"></script>




      

    </body>
</html>
@else 
      <script>window.location = "{{ URL::to('admin') }}";</script>
      <?php exit; ?>
@endif
