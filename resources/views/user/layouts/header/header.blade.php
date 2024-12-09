<!-- Banner -->
{{-- <div class="banner-top">
    @include('user.layouts.header.banner')
</div> --}}

<!-- Header section -->
<header class="header-wrapper">
    <div class="container">
        <!-- Logo link-->
        <a href='{{route('home')}}' class="logo">
            @include('user.layouts.header.logo')
        </a>

        <!-- Main website navigation-->
        <nav id="navigation-box">
            @include('user.layouts.header.nav')
        </nav>

        <!-- Additional header buttons / Auth and direct link to detailmovie-->
        <div class="control-panel">
            @include('user.layouts.header.navRight')
        </div>
    </div>
</header>


