
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>@yield('title','iSAC Writing | Student')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
	    
        <!-- App favicon -->
	    <link rel="shortcut icon" href="{{ asset('public/assets/images/newcambridge-logo_bar.png') }}">

        <!-- Custom box css -->
        <link href="{{ asset('public/assets/libs/custombox/custombox.min.css') }}" rel="stylesheet">

        <!-- Lightbox css -->
        <link href="{{ asset('public/assets/libs/magnific-popup/magnific-popup.css') }}" rel="stylesheet" type="text/css" />


        <!-- App css -->
        <link href="{{ asset('public/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/assets/css/icons.css') }}" rel="stylesheet" type="text/css"/>

        <!--venobox lightbox-->
        <link rel="stylesheet" href="{{ asset('public/assets/plugins/magnific-popup/dist/magnific-popup.css') }}"/>

        <!-- Sweet Alert css -->
        <link href="{{ asset('public/assets/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('public/assets/js/modernizr.min.js') }}"></script>

        <!-- third party css -->
        <link href="{{ asset('public/assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />


        <!-- Global Styles -->
        <style>
            #topnav {
                padding: 0;
            }
            .border-3 {
                border-width:10px !important;
            }
            @media(max-width: 991px) {
                .wrapper {
                    padding-top: 140px !important;
                }
            }
            #download {
                cursor: pointer;
            }
            @media(max-width: 500px) {
                .card-header {
                    padding-top: 5px;
                    padding-bottom: 5px;
                }
                .card-header h3 {
                    font-size: 16px;
                }
                .card-body {
                    padding: 0;
                }
            }
        </style>

        @yield('css')

    </head>

    <body class="unsticky-header">

        <header id="topnav">
     
            <!-- Topbar Start -->
            <div class="navbar-custom bg-white">
                <div class="container-fluid">
                    <ul class="list-unstyled topnav-menu float-right mb-0">

                        <li class="dropdown notification-list mt-3 mr-3">
                            @yield('test_time')
                        </li>
                       
                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="{{ asset('public/assets/images/user.png') }}" alt="user-image" class="rounded-circle">
                                <span class="pro-user-name ml-1 text-secondary">
                                    {{ Auth::user()->std_name }} <i class="mdi mdi-chevron-down"></i> 
                                </span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                                <!-- item-->
                                <a data-toggle="modal" data-target="#myModal" class="dropdown-item notify-item">
                                    <i class="mdi mdi-account-circle"></i>
                                    <span>My Account</span>
                                </a>


                                <div class="dropdown-divider"></div>

                                <!-- item-->
                                <a href="{{ route('user_logout') }}" class="dropdown-item notify-item">
                                    <i class="mdi mdi-logout"></i>
                                    <span>Logout</span>
                                </a>

                            </div>
                        </li>            

                    </ul>

                    <!-- LOGO -->
                    <div class="logo-box">
                        <a href="{{ route('user_home') }}" class="logo text-center">
                            <span class="logo-lg">
                                <img src="{{ asset('public/assets/images/logo_nc.png') }}" alt="" width="80%">
                            </span>
                            <span class="logo-sm">
                            	<img src="{{ asset('public/assets/images/icon-nc-color.png') }}" alt="" width="100px">
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- end Topbar -->
            
           
            <div class="topbar-menu border-bottom border-left border-right border-white border-3 bg-info">
                <div class="container-fluid">
                    <div id="navigation d-block">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu text-center d-flex justify-content-center font-weight-bold py-1">
                            <li class="p-2 mr-3">
                                <a href="{{ route('user_home') }}" class="p-0 text-white"><i class="fas fa-home font-20 d-block mb-1 mx-0"></i>Home</a>
                            </li>

                            <li class="p-2 mr-3">
                                <a href="{{ route('isac_writing_home') }}" class="p-0 text-white"><i class="fas fa-folder-open font-20 d-block mb-1 mx-0"></i> iSAC WRITING</a>
                            </li>

                            <li class="p-2">
                                <a href="{{ route('status_writing') }}" class="p-0 text-white"><i class="fas fa-file-audio font-20 d-block mb-1 mx-0"></i> STATUS</a>
                            </li>
                        </ul>
                        <!-- End navigation menu -->
                    </div>
                    <!-- end #navigation -->
                </div>
                <!-- end container -->
            </div>
            <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->



        <div class="wrapper">
            <div class="container-fluid p-0 mt-4">

                <!-- start page title -->
                @yield('page-title')
                <!-- end page title --> 

                @yield('content')
                
            </div> <!-- end container -->
        </div>
       


        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        2021 iPACKS © New Cambridge
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->

        <!-- end wrapper -->

        @include('student.profile')

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

        

        <!-- jQuery  -->
        <script src="{{ asset('public/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('public/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('public/assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('public/assets/js/jquery.scrollTo.min.js') }}"></script>

        <!-- Magnific Popup-->
        <script src="{{ asset('public/assets/libs/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

        <!--form wysiwig-->
        <script src="{{ asset('public/assets/plugins/tinymce/tinymce.min.js') }}"></script>

        <!-- Gallery Init-->
        <script src="{{ asset('public/assets/js/pages/gallery.init.js') }}"></script>

        <!-- Sweet Alert Js  -->
        <script src="{{ asset('public/assets/plugins/sweet-alert/sweetalert2.min.js') }}"></script>
        
        <script src="{{ asset('public/assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('public/assets/libs/datatables/dataTables.bootstrap4.js') }}"></script>
        <script src="{{ asset('public/assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('public/assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
        
        <!-- Datatables init -->
        <script src="{{ asset('public/assets/js/pages/datatables.init.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('public/assets/js/jquery.core.js') }}"></script>
        <script src="{{ asset('public/assets/js/jquery.app.js') }}"></script>

        <script>
            $(document).ready(function () {
                $('.image-popup').magnificPopup({
                    type: 'image',
                    closeOnContentClick: true,
                    mainClass: 'mfp-fade',
                    gallery: {
                        enabled: true,
                        navigateByImgClick: true,
                        preload: [0,1]
                    }
                });

                if($("#elm1").length > 0){
                    tinymce.init({
                        selector: "textarea#elm1",
                        theme: "modern",
                        height: 300,
                        menubar: false,
                        plugins: [
                            "wordcount",
                            "textcolor"
                        ],
                        contenteditable: false
                    });
                }
            })
        </script>

        <script>
            var session_id = "{!! (session('ss_id'))?session('ss_id'):'' !!}";
            var user_id = "{!! (Auth::user())?Auth::user()->session_id:'' !!}";

            if(user_id != session_id) {
                alert('Your account login from another device!!', 'Warning Alert');
                window.location.href = "{{ route('user_logout')}}";
            } 
        </script>

        <script>
            var check_level = "{!! (Auth::user())?Auth::user()->std_level:'' !!}";

            if(check_level != 'premium') {
                alert('Your account is standard. Please upgrade youre package to access it!!', 'Warning Alert');
                window.location.href = "{{ route('user_home')}}";
            }

        </script>

        @yield('javascript')

        @yield('js')
    </body>
</html>