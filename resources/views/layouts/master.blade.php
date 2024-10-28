<!doctype html>
<html>

<head>
    @extends('layouts.head.head')
    @include('assets.css.css')
</head>

<body>
    <div class="wrapper">
        <!-- HEADER -->
        @include('layouts.header.header')
        <!-- END HEADER -->

        @include('layouts.search.search')

        <!-- Main content -->
        <section class="container">
            @yield('content')
        </section>

        <div class="clearfix"></div>

        <footer class="footer-wrapper">
            @include('layouts.footer.footer')
        </footer>

    </div>

    <!-- open/close -->
    <div class="overlay overlay-hugeinc">
        @include('layouts.open_close.open-close')
    </div>

    @extends('assets.js.jsAll')
    @extends('assets.js.js')

</body>

</html>
