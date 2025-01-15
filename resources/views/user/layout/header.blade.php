<header class="header-wrapper header-wrapper--home">
    <div class="container">
        <!-- Logo link-->
        <a href='{{ route('home') }}' class="logo">
            <p class="heading-special--small" style="color: white; font-size: 25px">Phimmoi</p>
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
                        {{-- <li class="menu__nav-item"><a href="{{ route('movie.upcoming') }}">Phim sắp chiếu</a></li> --}}
                    </ul>
                </li>
                <li>
                    <a href="{{ route('movie.upcoming') }}">Phim sắp chiếu</a>
                </li>
                <li>
                    <a href="{{ route('movie.categories') }}">Thể loại</a>
                </li>
                <li>
                    <span class="sub-nav-toggle plus"></span>
                    <a href="{{ route('instruction.stepfinal') }}">Các bước đặt phòng</a>

                </li>
                {{-- <li>
                    <span class="sub-nav-toggle plus"></span>
                    <a href="gallery-four.html">Phòng trưng bày</a>
                </li> --}}
                <li>
                    <a href="{{ route('contact.index') }}">Liên hệ</a>
                </li>
            </ul>
        </nav>

        <!-- Additional header buttons / Auth and direct link to booking-->
        <div class="control-panel">
            @if (\Illuminate\Support\Facades\Auth::user() != null)
                <div class="auth auth--home">
                    <div class="auth__show">
                        {{--                        <span class="auth__image">--}}
                        {{--                            @if (session('user.avata'))--}}
                        {{--                                <img src="{{ Storage::url(session('user.avata')) }}" alt="" class="img-fluid"--}}
                        {{--                                     style="border-radius: 4px;">--}}
                        {{--                            @else--}}
                        {{--                                <img alt="" src="{{ asset('images/client-photo/auth.png') }}">--}}
                        {{--                            @endif--}}
                        {{--                        </span>--}}
                    </div>
                    <a href="#" class="btn btn--sign btn--singin" >
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

            {{--            <a href="{{ route('user.booking1') }}" class="btn btn-md btn--warning btn--book btn-control--home">Đặt--}}
            {{--                vé</a>--}}

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
