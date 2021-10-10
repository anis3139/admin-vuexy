<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    @php
    $setting = \App\Models\Setting::first()
    @endphp
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>{{ $setting->site_name ?? "Website" }}</title>
    <link rel="apple-touch-icon" href="{{asset('')}}app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/').$setting->logo }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('')}}app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}app-assets/vendors/css/extensions/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}app-assets/vendors/css/tables/datatable/responsive.bootstrap.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('')}}app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('')}}app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}app-assets/css/plugins/charts/chart-apex.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}app-assets/css/plugins/extensions/ext-component-toastr.css">
    <link rel="stylesheet" type="text/css" href="{{asset('')}}app-assets/css/pages/app-invoice-list.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('')}}assets/css/style.css">
    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    @include('admin.includes.header')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="{{route('home')}}"><span class="brand-logo">
                        @if($setting->logo)
                        <img src="{{ asset('/').$setting->logo }}" alt="">
                           
                        @endif
                        </span>
                        @php
                        $setting = \App\Models\Setting::first()
                        @endphp
                        @if($setting->site_name)
                        <h2 class="brand-text">{{ $setting->site_name }}</h2>
                        @else
                        <h2 class="brand-text">News</h2>
                        @endif
                    </a>
                </li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            @include('admin.includes.sidebar')
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        @yield('content')
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">

        @include('admin.layouts.partials._footer')
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('')}}app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('')}}app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="{{asset('')}}app-assets/vendors/js/extensions/toastr.min.js"></script>
    <script src="{{asset('')}}app-assets/vendors/js/extensions/moment.min.js"></script>
    <script src="{{asset('')}}app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="{{asset('')}}app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="{{asset('')}}app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
    <script src="{{asset('')}}app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="{{asset('')}}app-assets/vendors/js/tables/datatable/responsive.bootstrap.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('')}}app-assets/js/core/app-menu.js"></script>
    <script src="{{asset('')}}app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('')}}app-assets/js/scripts/pages/dashboard-analytics.js"></script>
    <script src="{{asset('')}}app-assets/js/scripts/pages/app-invoice-list.js"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
    <!--  -->
    @stack('custom-js')
</body>
<!-- END: Body-->

</html>