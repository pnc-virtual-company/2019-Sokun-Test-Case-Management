<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ asset('images/logosn.png') }}">

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sokun</title>
    <link rel="stylesheet" href="{{asset('css/flatpickr.min.css')}} ">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}} ">
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.min.css')}} ">
    <link rel="stylesheet" href="{{asset('css/colReorder.bootstrap.min.css')}} ">

    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}} ">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}} ">
    <link rel="stylesheet" href="{{asset('css/owl.theme.css')}} ">
    <link rel="stylesheet" href="{{asset('css/owl.transitions.css')}} ">
    <link rel="stylesheet" href="{{asset('css/animate.css')}} ">
    <link rel="stylesheet" href="{{asset('css/normalize.css')}} ">
    <link rel="stylesheet" href="{{asset('css/meanmenu.min.css')}} ">
    <link rel="stylesheet" href="{{asset('css/main.css')}} ">
    <link rel="stylesheet" href="{{asset('css/educate-custon-icon.css')}} ">
    <link rel="stylesheet" href="{{asset('css/morris.css')}} ">
    <link rel="stylesheet" href="{{asset('css/jquery.mCustomScrollbar.min.css')}} ">
    <link rel="stylesheet" href="{{asset('css/metisMenu.min.css')}} ">
    <link rel="stylesheet" href="{{asset('css/metisMenu-vertical.css')}} ">
    <link rel="stylesheet" href="{{asset('css/style.css')}} ">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}} ">
    <link rel="stylesheet" href="{{asset('css/gijgo.min.css')}} ">
    <link rel="stylesheet" href="{{asset('css/modal.css')}} ">
    <link rel="stylesheet" href="{{asset('css/icon.css')}} ">


    <script src="{{ asset('js/modernizr-2.8.3.min.js') }}"></script>


    <!-- Scripts -->
    <!-- Fonts and Icons -->
    <link rel="stylesheet" href="{{ asset('css/materialdesignicons.min.css') }}" />

</head>

<body>
    @include('sweetalert::alert')
    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href=""><img class="main-logo" src="{{asset('images/logo.png')}} " alt="" /></a>
                <strong><a href=""><img src="{{asset('images/logosn.png')}}" alt=""
                            style="width:53px; height:50px;" /></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li class="active">
                            <a class="has-arrow" href="index.html">
                                <span class="mdi mdi-home icon-wrap"></span>
                                <span class="mini-click-non">Test Management</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Campaign" href="{{route('campaign.index')}}"><span
                                            class="mini-sub-pro">Campaign</span></a></li>
                                <li><a title="Full Calendar" href="{{route('calendar.index')}}"><span
                                            class="mini-sub-pro">Calendar</span></a></li>
                                <li><a title="Dash board" href="{{route('dashboard.index')}} "><span
                                            class="mini-sub-pro">Dashboard</span></a></li>

                            </ul>
                        </li>
                        @auth
                        @if(Auth::user()->roles->pluck('name')->implode(', ')=="Administrator")
                        <li class="active">
                            <a class="has-arrow" href="">
                                <span class="mdi mdi-account icon-wrap"></span>
                                <span class="mini-click-non">User Management</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Dashboard v.1" href="{{route('users.index')}} "><span
                                            class="mini-sub-pro">Users</span></a></li>
                            </ul>
                        </li>
                        @endif
                        @endauth
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->

    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse"
                                                class=" btn btn-sm bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                <i class="mdi mdi-chevron-left" id="open"
                                                    style="font-size: 1.5em;padding:15px"></i>
                                                <i class="mdi mdi-chevron-right" id="close"
                                                    style="font-size: 1.5em; display:none;padding:15px;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">

                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button"
                                                        aria-expanded="false" class="nav-link dropdown-toggle">
                                                        <img src="{{asset('storage/images/'.Auth::user()->avatar)}} "
                                                            alt="" />
                                                        <span class="admin-name">{{Auth::user()->name}}</span>
                                                        <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                    </a>
                                                    <ul role="menu"
                                                        class="dropdown-header-top author-log dropdown-menu animated zoomIn">

                                                        <li><a href="{{url('/profile')}}"><span
                                                                    class="edu-icon edu-user-rounded author-log-ic"></span>My
                                                                Profile</a>
                                                        </li>
                                                        <li>
                                                            <a style="margin-left:10px;" class="dropdown-item nav-link"
                                                                href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">


                                                                Logout

                                                            </a>
                                                            <form id="logout-form" action="{{ route('logout') }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                            </form>
                                                        </li>

                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="breadcome-area">
                <div class="container-fluid mt-4">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copyright-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer-copy-right">
                                <p style="font-weight:600">Sokun Test Case Management</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        @stack('scripts')

        <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
        <script type="text/javascript">
            //<![CDATA[
            bkLib.onDomLoaded(function () {
                new nicEditor().panelInstance('area1');
                new nicEditor().panelInstance('area2');

            });
    //]]>
        </script>

        <!-- <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
    <script>tinymce.init({selector:'textarea'});</script> -->
        <script>

            $(function () {
                $('#open').click(function () {
                    $('#open').hide();
                    $('#close').show();
                });
                $('#close').click(function () {
                    $('#open').show();
                    $('#close').hide();
                })
            });

    // function hideShow(){
    //     var i = 1;
    //     var close = document.getElementById("close");
    //     var open = document.getElementById("open");
    //     if(i = 1) {
    //         close.classList.remove("hide");
    //         open.classList.add("hide");
    //         i = 0;
    //     }else{
    //         // close.classList.add("hide");
    //         open.classList.remove("hide");
    //         i = 1;
    //     }
    // }

        </script>

        <script src="{{ asset('js/flatpickr.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/wow.min.js') }}"></script>
        <script src="{{ asset('js/jquery-price-slider.js') }}"></script>
        <script src="{{ asset('js/jquery.meanmenu.js') }}"></script>
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/jquery.sticky.js') }}"></script>
        <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
        <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('js/waypoints.min.js') }}"></script>
        <script src="{{ asset('js/counterup-active.js') }}"></script>
        <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
        <script src="{{ asset('js/mCustomScrollbar-active.js') }}"></script>
        <script src="{{ asset('js/metisMenu.min.js') }}"></script>
        <script src="{{ asset('js/metisMenu-active.js') }}"></script>
        <script src="{{ asset('js/raphael-min.js') }}"></script>
        <script src="{{ asset('js/morris.js') }}"></script>
        <script src="{{ asset('js/morris-active.js') }}"></script>
        <script src="{{ asset('js/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('js/jquery.charts-sparkline.js') }}"></script>
        <script src="{{ asset('js/sparkline-active.js') }}"></script>
        <script src="{{ asset('js/plugins.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('js/modernizr-2.8.3.min.js') }}"></script>
        <script src="{{asset('js/gijgo.min.js')}} "></script>
        <script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}} "></script>


</body>
</html>