<!doctype html>
<html>

<head>
    @extends('Users.layouts.head.head')
    @include('Users.assets.css.css')
</head>

<body>
    <div class="wrapper">
        <!-- HEADER -->
        @include('Users.layouts.header.header')
        <!-- END HEADER -->

        @include('Users.layouts.search.search')

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
            @include('Users.layouts.footer.footer')
        </footer>

    </div>

    <!-- open/close -->
    <div class="overlay overlay-hugeinc">
        @include('Users.layouts.open_close.open-close')
    </div>

    @extends('Users.assets.js.jsAll')
    @extends('Users.assets.js.js')

</body>

</html>
