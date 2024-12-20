<!doctype html>
<html>

<head>
    @extends('user.layouts.head.head')
    @include('user.assets.css.css')

    @yield('style')
</head>

<body>
<div class="wrapper">
    <!-- HEADER -->
    @include('user.layouts.header.header')
    <!-- END HEADER -->

    @include('user.layouts.search.search')

    <!-- Main content -->
    <section class="container">
        @yield('content')
    </section>

    <div class="choose-film">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @yield('listMovies')
            </div>
        </div>
    </div>


    <div class="clearfix"></div>

    <footer class="footer-wrapper">
        @include('user.layouts.footer.footer')
    </footer>

</div>

<!-- open/close -->
<div class="overlay overlay-hugeinc">
    @include('user.layouts.open_close.open-close')
</div>
@yield('script')
@extends('user.assets.js.jsAll')
@extends('user.assets.js.js')

</body>

</html>
