<!-- Banner -->
<div class="banner-top">
    @include('layouts.header.banner')
</div>

<!-- Header section -->
<header class="header-wrapper">
    <div class="container">
        <!-- Logo link-->
        <a href='index.html' class="logo">
            @include('layouts.header.logo')
        </a>

        <!-- Main website navigation-->
        <nav id="navigation-box">
            @include('layouts.header.nav')
        </nav>

        <!-- Additional header buttons / Auth and direct link to booking-->
        <div class="control-panel">
            @include('layouts.header.navRight')
        </div>
    </div>
</header>


