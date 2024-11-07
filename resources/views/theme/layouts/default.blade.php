<!doctype html>
<html>

<!-- Mirrored from amovie.gozha.net/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 26 Sep 2024 16:25:31 GMT -->
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>
        @yield('title')
    </title>
    <meta name="description" content="A Template by Gozha.net">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Gozha.net">

    <!-- Mobile Specific Metas-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="telephone=no" name="format-detection">

    @yield('head')

</head>

<body>
<div class="wrapper">
    <!-- Banner -->
    <div class="banner-top">
        <img alt='top banner' src="{{ asset('images/banners/bra.jpg') }}">
    </div>

    <!-- Header section -->
    @include('theme.layouts.header')

    <!-- Slider -->
    @yield('slide')
    <!--end slider -->


    <!-- Main content -->
    @yield('content')

    <div class="clearfix"></div>

    <!-- Footer -->
    @include('theme.layouts.footer')
</div>

<!-- open/close -->
<div class="overlay overlay-hugeinc">

    <section class="container">

        <div class="col-sm-4 col-sm-offset-4">
            <button type="button" class="overlay-close">Close</button>
            <form id="login-form" class="login" method='get' novalidate=''>
                <p class="login__title">sign in <br><span class="login-edition">welcome to A.Movie</span></p>

                <div class="social social--colored">
                    <a href='#' class="social__variant fa fa-facebook"></a>
                    <a href='#' class="social__variant fa fa-twitter"></a>
                    <a href='#' class="social__variant fa fa-tumblr"></a>
                </div>

                <p class="login__tracker">or</p>

                <div class="field-wrap">
                    <input type='email' placeholder='Email' name='user-email' class="login__input">
                    <input type='password' placeholder='Password' name='user-password' class="login__input">

                    <input type='checkbox' id='#informed' class='login__check styled'>
                    <label for='#informed' class='login__check-info'>remember me</label>
                </div>

                <div class="login__control">
                    <button type='submit' class="btn btn-md btn--warning btn--wider">sign in</button>
                    <a href="#" class="login__tracker form__tracker">Forgot password?</a>
                </div>
            </form>
        </div>

    </section>
</div>

<!-- JavaScript-->
@yield('javascript')
<!-- End JavaScript-->

</body>

<!-- Mirrored from amovie.gozha.net/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 26 Sep 2024 16:25:31 GMT -->
</html>
