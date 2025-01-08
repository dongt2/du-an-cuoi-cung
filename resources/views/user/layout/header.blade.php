<header class="header-wrapper header-wrapper--home">
    <div class="container">
        <!-- Logo link-->
        <a href='{{ route('home') }}' class="logo">
            <img alt='logo' src="{{ asset('images/logo.png') }}">
        </a>

        <!-- Main website navigation-->
        <nav id="navigation-box">
            <!-- Toggle for mobile menu mode -->
            <a href="#" id="navigation-toggle">
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
                    <a href="#">Phim</a>
                    <ul>
                        <li class="menu__nav-item"><a href="{{ route('movie.index') }}">Danh sách phim</a></li>
                        <li class="menu__nav-item"><a href="{{ route('movie.upcoming') }}">Phim sắp chiếu</a></li>
                    </ul>
                </li>
                <li>
                    <span class="sub-nav-toggle plus"></span>
                    <a href="#">Trang</a>
                    <ul>
                        <li class="menu__nav-item"><a href="{{ route('movie.categories') }}">Thể loại</a></li>
                    </ul>
                </li>
                <li>
                    <span class="sub-nav-toggle plus"></span>
                    <a href="page-elements.html">Đặc trưng</a>
                    <ul>
                        <li class="menu__nav-item"><a href="typography.html">Typography</a></li>
                        <li class="menu__nav-item"><a href="page-elements.html">Shortcodes</a></li>
                        <li class="menu__nav-item"><a href="column.html">Columns</a></li>
                        <li class="menu__nav-item"><a href="icon-font.html">Icons</a></li>
                    </ul>
                </li>
                <li>
                    <span class="sub-nav-toggle plus"></span>
                    <a href="page-elements.html">Các bước đặt phòng</a>
                    <ul>
                        <li class="menu__nav-item"><a href="book1.html">Booking step 1</a></li>
                        <li class="menu__nav-item"><a href="book2.html">Booking step 2</a></li>
                        <li class="menu__nav-item"><a href="book3-buy.html">Booking step 3 (buy)</a></li>
                        <li class="menu__nav-item"><a href="book3-reserve.html">Booking step 3 (reserve)</a></li>
                        <li class="menu__nav-item"><a href="book-final.html">Final ticket view</a></li>
                    </ul>
                </li>
                <li>
                    <span class="sub-nav-toggle plus"></span>
                    <a href="gallery-four.html">Phòng trưng bày</a>
                    <ul>
                        <li class="menu__nav-item"><a href="gallery-four.html">4 col gallery</a></li>
                        <li class="menu__nav-item"><a href="gallery-three.html">3 col gallery</a></li>
                        <li class="menu__nav-item"><a href="gallery-two.html">2 col gallery</a></li>
                    </ul>
                </li>
                <li>
                    <span class="sub-nav-toggle plus"></span>
                    <a href="news-left.html">Tin tức</a>
                    <ul>
                        <li class="menu__nav-item"><a href="news-left.html">News (rigth sidebar)</a></li>
                        <li class="menu__nav-item"><a href="news-right.html">News (left sidebar)</a></li>
                        <li class="menu__nav-item"><a href="news-full.html">News (full widht)</a></li>
                        <li class="menu__nav-item"><a href="single-page-left.html">Single post (rigth sidebar)</a></li>
                        <li class="menu__nav-item"><a href="single-page-right.html">Single post (left sidebar)</a></li>
                        <li class="menu__nav-item"><a href="single-page-full.html">Single post (full widht)</a></li>
                    </ul>
                </li>
                <li>
                    <span class="sub-nav-toggle plus"></span>
                    <a href="{{ route('contact.index') }}">Liên hệ</a>
                </li>
                {{-- <li>
                    <span class="sub-nav-toggle plus"></span>
                    <a href="#">Thực đơn Mega</a>
                    <ul class="mega-menu container">
                        <li class="col-md-3 mega-menu__coloum">
                            <h4 class="mega-menu__heading">Now in the cinema</h4>
                            <ul class="mega-menu__list">
                                <li class="mega-menu__nav-item"><a href="#">The Counselor</a></li>
                                <li class="mega-menu__nav-item"><a href="#">Bad Grandpa</a></li>
                                <li class="mega-menu__nav-item"><a href="#">Blue Is the Warmest Color</a></li>
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
                                <li class="mega-menu__nav-item"><a href="#">Cloudy with a Chance of Meatballs
                                        2</a></li>
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
                                <li class="mega-menu__nav-item"><a href="#">Insidious: Chapter 2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}
            </ul>
        </nav>

        <!-- Additional header buttons / Auth and direct link to booking-->
        <div class="control-panel">
            @if (session()->has('user.user_name'))
                <div class="auth auth--home">
                    <div class="auth__show">
                        <span class="auth__image">
                            @if (session('user.avata'))
                                <img src="{{ Storage::url(session('user.avata')) }}" alt="" class="img-fluid"
                                    style="border-radius: 4px;">
                            @else
                                <img alt="" src="{{ asset('images/client-photo/auth.png') }}">
                            @endif
                        </span>
                    </div>
                    <a href="#" class="btn btn--sign btn--singin">
                        {{ session('user.user_name') }} <!-- Hiển thị user_name -->
                    </a>
                    <ul class="auth__function">
                        <li><a href="{{ route('account.info') }}" class="auth__function-item">Tài khoản</a></li>
                        <li><a href="{{ route('account.booking-history') }}" class="auth__function-item">Lịch sử đặt
                                vé</a></li>
                        <li>
                            @if (session('user.role') == 'Admin')
                                <a href="{{ route('admin.dashboard') }}" class="auth__function-item">Admin</a>
                            @endif
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="auth__function-item"
                                    style="background: none; border: none;">Đăng xuất</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="{{ route('login.index') }}" class="btn btn-md btn--warning btn--book btn-control--home">Đăng
                    nhập</a>
            @endif

            <a href="{{ route('user.booking1') }}" class="btn btn-md btn--warning btn--book btn-control--home">Đặt
                vé</a>

        </div>

    </div>
</header>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Lấy phần tử ảnh và nút tên
        const authShow = document.querySelector('.auth__show');
        const btnSignIn = document.querySelector('.btn--singin');
        const authFunction = document.querySelector('.auth__function');

        if (authShow && btnSignIn && authFunction) {
            // Hàm thêm hoặc gỡ bỏ class 'open-function'
            const toggleAuthFunction = () => {
                authFunction.classList.toggle('open-function');
            };

            // Gắn sự kiện click vào ảnh và tên
            authShow.addEventListener('click', toggleAuthFunction);
            btnSignIn.addEventListener('click', toggleAuthFunction);
        }
    });
</script>
