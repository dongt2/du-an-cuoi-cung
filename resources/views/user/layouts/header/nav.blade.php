<!-- Toggle for mobile menu mode -->
<a href="" id="navigation-toggle">
    <span class="menu-icon">
        <span class="icon-toggle" role="button" aria-label="Toggle Navigation">
            <span class="lines"></span>
        </span>
    </span>
</a>

<!-- Link navigation -->
<ul id="navigation">
    <li>
        <span class="sub-nav-toggle plus"></span>
        <a href="{{ route('movies.list') }}">Phim</a>
        <ul>
            <li class="menu__nav-item"><a href="{{ route('movies.list') }}">Phim đang chiếu</a></li>
            <li class="menu__nav-item"><a href="movie-page-right.html">Phim sắp chiếu</a></li>
            {{-- <li class="menu__nav-item"><a href="movie-page-full.html">Single movie (full widht)</a>
            </li> --}}
            {{-- <li class="menu__nav-item"><a href="movie-list-left.html">Movies list (rigth
                    sidebar)</a></li>
            <li class="menu__nav-item"><a href="movie-list-right.html">Movies list (left
                    sidebar)</a></li>
            <li class="menu__nav-item"><a href="movie-list-full.html">Movies list (full widht)</a>
            </li>
            <li class="menu__nav-item"><a href="single-cinema.html">Single cinema</a></li>
            <li class="menu__nav-item"><a href="cinema-list.html">Cinemas list</a></li>
            <li class="menu__nav-item"><a href="trailer.html">Trailers</a></li>
            <li class="menu__nav-item"><a href="rates-left.html">Rates (rigth sidebar)</a></li>
            <li class="menu__nav-item"><a href="rates-right.html">Rates (left sidebar)</a></li>
            <li class="menu__nav-item"><a href="rates-full.html">Rates (full widht)</a></li>
            <li class="menu__nav-item"><a href="offers.html">Offers</a></li>
            <li class="menu__nav-item"><a href="contact.html">Contact us</a></li>
            <li class="menu__nav-item"><a href="404.html">404 error</a></li>
            <li class="menu__nav-item"><a href="coming-soon.html">Coming soon</a></li>
            <li class="menu__nav-item"><a href="login.html">Login/Registration</a></li> --}}
        </ul>
    </li>
    <li>
        <span class="sub-nav-toggle plus"></span>
        <a href="page-elements.html">Features</a>
        <ul>
            <li class="menu__nav-item"><a href="typography.html">Typography</a></li>
            <li class="menu__nav-item"><a href="page-elements.html">Shortcodes</a></li>
            <li class="menu__nav-item"><a href="column.html">Columns</a></li>
            <li class="menu__nav-item"><a href="icon-font.html">Icons</a></li>
        </ul>
    </li>
    <li>
        <span class="sub-nav-toggle plus"></span>
        <a href="page-elements.html">Booking steps</a>
        <ul>
            <li class="menu__nav-item"><a href="book1.html">Booking step 1</a></li>
            <li class="menu__nav-item"><a href="book2.html">Booking step 2</a></li>
            <li class="menu__nav-item"><a href="book3-buy.html">Booking step 3 (buy)</a></li>
            <li class="menu__nav-item"><a href="book3-reserve.html">Booking step 3 (reserve)</a>
            </li>
            <li class="menu__nav-item"><a href="book-final.html">Final ticket view</a></li>
        </ul>
    </li>
    <li>
        <span class="sub-nav-toggle plus"></span>
        <a href="gallery-four.html">Gallery</a>
        <ul>
            <li class="menu__nav-item"><a href="gallery-four.html">4 col gallery</a></li>
            <li class="menu__nav-item"><a href="gallery-three.html">3 col gallery</a></li>
            <li class="menu__nav-item"><a href="gallery-two.html">2 col gallery</a></li>
        </ul>
    </li>
    <li>
        <span class="sub-nav-toggle plus"></span>
        <a href="news-left.html">News</a>
        <ul>
            <li class="menu__nav-item"><a href="news-left.html">News (rigth sidebar)</a></li>
            <li class="menu__nav-item"><a href="news-right.html">News (left sidebar)</a></li>
            <li class="menu__nav-item"><a href="news-full.html">News (full widht)</a></li>
            <li class="menu__nav-item"><a href="single-page-left.html">Single post (rigth
                    sidebar)</a></li>
            <li class="menu__nav-item"><a href="single-page-right.html">Single post (left
                    sidebar)</a></li>
            <li class="menu__nav-item"><a href="single-page-full.html">Single post (full widht)</a>
            </li>
        </ul>
    </li>
    <li>
        <span class="sub-nav-toggle plus"></span>
        <a href="#">Mega menu</a>
        <ul class="mega-menu container">
            <li class="col-md-3 mega-menu__coloum">
                <h4 class="mega-menu__heading">Now in the cinema</h4>
                <ul class="mega-menu__list">
                    <li class="mega-menu__nav-item"><a href="#">The Counselor</a></li>
                    <li class="mega-menu__nav-item"><a href="#">Bad Grandpa</a></li>
                    <li class="mega-menu__nav-item"><a href="#">Blue Is the Warmest
                            Color</a></li>
                    <li class="mega-menu__nav-item"><a href="#">Capital</a></li>
                    <li class="mega-menu__nav-item"><a href="#">Spinning Plates</a></li>
                    <li class="mega-menu__nav-item"><a href="#">Bastards</a></li>
                </ul>
            </li>

            <li class="col-md-3 mega-menu__coloum mega-menu__coloum--outheading">
                <ul class="mega-menu__list">
                    <li class="mega-menu__nav-item"><a href="#">Gravity</a></li>
                    <li class="mega-menu__nav-item"><a href="#">Captain Phillips</a></li>
                    <li class="mega-menu__nav-item"><a href="#">Carrie</a></li>
                    <li class="mega-menu__nav-item"><a href="#">Cloudy with a Chance of
                            Meatballs 2</a></li>
                </ul>
            </li>

            <li class="col-md-3 mega-menu__coloum">
                <h4 class="mega-menu__heading">Ending soon</h4>
                <ul class="mega-menu__list">
                    <li class="mega-menu__nav-item"><a href="#">Escape Plan</a></li>
                    <li class="mega-menu__nav-item"><a href="#">Rush</a></li>
                    <li class="mega-menu__nav-item"><a href="#">Prisoners</a></li>
                    <li class="mega-menu__nav-item"><a href="#">Enough Said</a></li>
                    <li class="mega-menu__nav-item"><a href="#">The Fifth Estate</a></li>
                    <li class="mega-menu__nav-item"><a href="#">Runner Runner</a></li>
                </ul>
            </li>

            <li class="col-md-3 mega-menu__coloum mega-menu__coloum--outheading">
                <ul class="mega-menu__list">
                    <li class="mega-menu__nav-item"><a href="#">Insidious: Chapter 2</a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
</ul>
