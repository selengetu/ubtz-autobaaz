<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
  
<link href="assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
<!-- This page CSS -->
<!-- chartist CSS -->
<link href="assets/node_modules/morrisjs/morris.css" rel="stylesheet">
<!--c3 CSS -->
<link href="assets/node_modules/c3-master/c3.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="css/style.css" rel="stylesheet">
<!-- Dashboard 1 Page CSS -->
<link href="css/pages/dashboard1.css" rel="stylesheet">
<!-- You can change the theme colors from here -->
<link href="css/colors/default.css" id="theme" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>АВТО ҮЙЛЧИЛГЭЭНИЙ СИСТЕМ</title>

</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Түр хүлээнэ үү</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <span>АТҮТ<span>
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                        
                         <img src="assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="fa fa-bars"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/users/1.jpg" alt="user" class="" /> <span class="hidden-md-down">{{Auth::user()->name}} &nbsp;</span> </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" aria-expanded="false"><i class="fa fa-pencil"></i><span class="hide-menu">Тохиргоо</span></a>
                            <ul aria-expanded="false" class="collapse first-level in">
                                <li class="sidebar-item"><a href="{{ route('mark') }}" class="sidebar-link"><i class="mdi mdi-format-align-left"></i><span class="hide-menu"> Үйлдвэрлэгч </span></a></li>
                                <li class="sidebar-item"><a href="{{ route('model') }}" class="sidebar-link"><i class="mdi mdi-format-align-right"></i><span class="hide-menu"> Загвар </span></a></li>
                                <li class="sidebar-item"><a href="{{ route('colour') }}" class="sidebar-link"><i class="mdi mdi-format-align-right"></i><span class="hide-menu"> Өнгө </span></a></li>
                                <li class="sidebar-item"><a href="{{ route('driver') }}" class="sidebar-link"><i class="mdi mdi-format-align-right"></i><span class="hide-menu"> Жолооч </span></a></li>
                                  </span></a></li>
                          
                            </ul>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="{{ route('home') }}" aria-expanded="false"><i class="fa fa-cog"></i><span class="hide-menu">Бүртгэл</span></a>
                            <ul aria-expanded="false" class="collapse first-level in">
                                <li class="sidebar-item"><a href="{{ route('car') }}" class="sidebar-link"><i class="mdi mdi-format-align-left"></i><span class="hide-menu"> Тээврийн хэрэгсэл </span></a></li>
                                <li class="sidebar-item"><a href="{{ route('product') }}" class="sidebar-link"><i class="mdi mdi-format-align-left"></i><span class="hide-menu"> Автомашины сэлбэг </span></a></li>
                            </ul>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="{{ route('rep1') }}" aria-expanded="false"><i class="fa fa-bar-chart"></i><span class="hide-menu">Тайлан</span></a>
                            <ul aria-expanded="false" class="collapse first-level in">
                                <li class="sidebar-item"><a href="{{ route('rep1') }}" class="sidebar-link"><i class="mdi mdi-format-align-left"></i><span class="hide-menu"> Засварын тайлан</span></a></li>
                               
                          
                            </ul>
                        </li>
                      
                      
                    </ul>
                  
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
        @yield('content')
            <footer class="footer"> © 2020 СБМТА </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->


    <script src="assets/node_modules/jquery/jquery.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="assets/node_modules/bootstrap/js/popper.min.js"></script>
    <script src="assets/node_modules/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="assets/node_modules/raphael/raphael-min.js"></script>
    <script src="assets/node_modules/morrisjs/morris.min.js"></script>
    <!--c3 JavaScript -->
    <script src="assets/node_modules/d3/d3.min.js"></script>
    <script src="assets/node_modules/c3-master/c3.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <!-- Chart JS -->
    {{-- <script src="js/dashboard1.js"></script> --}}

    @yield('scripts')
</body>

</html>