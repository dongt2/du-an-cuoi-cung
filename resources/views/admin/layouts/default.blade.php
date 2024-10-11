<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/lexa/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Oct 2024 16:04:19 GMT -->

<head>
    @yield('head')
</head>


<body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="colored"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('admin.layouts.header')
       
        <!-- ========== Left Sidebar Start ========== -->
        
        <!-- Left Sidebar End -->
        @include('admin.layouts.sitebar-left')


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            @yield('content')
            <!-- End Page-content -->

            @include('admin.layouts.footer')

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    @include('admin.layouts.sitebar-right')
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    @yield('javascript')

</body>


<!-- Mirrored from themesbrand.com/lexa/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Oct 2024 16:04:44 GMT -->

</html>
