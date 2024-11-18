<!doctype html>
<html lang="en">

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>AMovie - Login</title>
    <meta name="description" content="A Template by Gozha.net">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Gozha.net">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="telephone=no" name="format-detection">

    <!-- Fonts -->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">

    <!-- Stylesheets -->
    <link href="{{ asset('css/gozha-nav.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/external/jquery.selectbox.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style3860.css?v=1') }}" rel="stylesheet" />

    <!-- Modernizr -->
    <script src="{{ asset('js/external/modernizr.custom.js') }}"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js"></script>
    <![endif]-->
</head>

<body>
    <div class="wrapper">
        <!-- Banner -->
        <div class="banner-top">
            <img alt='top banner' src="{{ asset('images/banners/bra.jpg') }}">
        </div>

        <!-- Header section -->
        <header class="header-wrapper">
            <div class="container">
                <a href="{{ url('/') }}" class="logo">
                    <img alt='logo' src="{{ asset('images/logo.png') }}">
                </a>
                <nav id="navigation-box">
                    <a href="#" id="navigation-toggle">
                        <span class="menu-icon">
                            <span class="icon-toggle" role="button" aria-label="Toggle Navigation">
                                <span class="lines"></span>
                            </span>
                        </span>
                    </a>
                    <ul id="navigation">
                        <!-- Navigation items -->
                        <!-- Your navigation code goes here -->
                    </ul>
                </nav>

                <div class="control-panel">
                    <a href="{{ route('login') }}" class="btn btn--sign">Sign in</a>
                    <a href="#" class="btn btn-md btn--warning btn--book">Book a ticket</a>
                </div>
            </div>
        </header>

        <!-- Search bar -->
        <div class="search-wrapper">
            <div class="container container--add">
                <form id='search-form' method='get' class="search">
                    <input type="text" class="search__field" placeholder="Search">
                    <select name="sorting_item" id="search-sort" class="search__sort" tabindex="0">
                        <option value="1" selected='selected'>By title</option>
                        <option value="2">By year</option>
                        <option value="3">By producer</option>
                    </select>
                    <button type='submit' class="btn btn-md btn--danger search__button">search a movie</button>
                </form>
            </div>
        </div>

        <!-- Main content -->
        <form id="login-form" class="login" method='post' action="{{ route('login') }}" novalidate=''>
            @csrf
            <p class="login__title">sign in <br><span class="login-edition">welcome to A.Movie</span></p>

            <div class="social social--colored">
                <a href='#' class="social__variant fa fa-facebook"></a>
                <a href='#' class="social__variant fa fa-twitter"></a>
                <a href='#' class="social__variant fa fa-tumblr"></a>
            </div>

            <p class="login__tracker">or</p>

            <div class="field-wrap">
                <input type='email' placeholder='Email' name='user-email' class="login__input" required>
                <input type='password' placeholder='Password' name='user-password' class="login__input" required>
                <input type='checkbox' id='informed' class='login__check styled'>
                <label for='informed' class='login__check-info'>remember me</label>
            </div>

            <div class="login__control">
                <button type='submit' class="btn btn-md btn--warning btn--wider">sign in</button>
                <a href="#" class="login__tracker form__tracker">Forgot password?</a>
            </div>
        </form>

        <div class="clearfix"></div>
    </div>

    <footer class="footer-wrapper footer-wrapper--mod">
        <section class="container">
            <div class="col-xs-4 col-md-2 footer-nav">
                <ul class="nav-link">
                    <li><a href="#" class="nav-link__item">Cities</a></li>
                    <li><a href="movie-list-left.html" class="nav-link__item">Movies</a></li>
                    <li><a href="trailer.html" class="nav-link__item">Trailers</a></li>
                    <li><a href="rates-left.html" class="nav-link__item">Rates</a></li>
                </ul>
            </div>
            <div class="col-xs-4 col-md-2 footer-nav">
                <ul class="nav-link">
                    <li><a href="coming-soon.html" class="nav-link__item">Coming soon</a></li>
                    <li><a href="cinema-list.html" class="nav-link__item">Cinemas</a></li>
                    <li><a href="offers.html" class="nav-link__item">Best offers</a></li>
                    <li><a href="news-left.html" class="nav-link__item">News</a></li>
                </ul>
            </div>
            <div class="col-xs-4 col-md-2 footer-nav">
                <ul class="nav-link">
                    <li><a href="#" class="nav-link__item">Terms of use</a></li>
                    <li><a href="gallery-four.html" class="nav-link__item">Gallery</a></li>
                    <li><a href="contact.html" class="nav-link__item">Contacts</a></li>
                    <li><a href="page-elements.html" class="nav-link__item">Shortcodes</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="footer-info">
                    <p class="heading-special--small">A.Movie<br><span class="title-edition">in the social media</span></p>
                    <div class="social">
                        <a href='#' class="social__variant fa fa-facebook"></a>
                        <a href='#' class="social__variant fa fa-twitter"></a>
                        <a href='#' class="social__variant fa fa-vk"></a>
                        <a href='#' class="social__variant fa fa-instagram"></a>
                        <a href='#' class="social__variant fa fa-tumblr"></a>
                        <a href='#' class="social__variant fa fa-pinterest"></a>
                    </div>
                    <div class="clearfix"></div>
                    <p class="copy">&copy; A.Movie, 2013. All rights reserved. Done by Olia Gozha</p>
                </div>
            </div>
        </section>
    </footer>

    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="{{ asset('js/external/jquery-1.10.1.min.js') }}"><\/script>')</script>
    <script src="{{ asset('js/external/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/jquery.mobile.menu.js') }}"></script>
    <script src="{{ asset('js/external/jquery.selectbox-0.2.min.js') }}"></script>
    <script src="{{ asset('js/external/form-element.js') }}"></script>
    <script src="{{ asset('js/form.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>