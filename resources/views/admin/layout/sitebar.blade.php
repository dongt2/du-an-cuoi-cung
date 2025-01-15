<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="logo-box">
                <a class='logo logo-light' href='{{ route('admin.dashboard') }}'>
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="24">
                    </span>
                </a>
                <a class='logo logo-dark' href='{{ route('admin.dashboard') }}'>
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="24">
                    </span>
                </a>
            </div>

            <ul id="side-menu">

                <li class="menu-title">Menu</li>

                <li>
                <li>
                    <a class='tp-link' href='{{ route('admin.dashboard') }}'>
                        <i data-feather="calendar"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="#sidebarVe" data-bs-toggle="collapse">
                        <i data-feather="pie-chart"></i>
                        <span> QL Vé </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarVe">
                        <ul class="nav-second-level">
                            <li>
                                <a class='tp-link' href='{{ route('admin.ticket.index') }}'>Danh sách</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="menu-title">Trang</li>


                <li>
                    <a href="#sidebarCategory" data-bs-toggle="collapse">
                        <i data-feather="alert-octagon"></i>
                        <span> Quản lý danh mục </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCategory">
                        <ul class="nav-second-level">
                            <li>
                                <a class='tp-link' href='{{ route('admin.category.index') }}'>Danh sách danh mục</a>
                            </li>
                            <li>
                                <a class='tp-link' href='{{ route('admin.category.create') }}'>Thêm danh mục mới</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li>
                    <a href="#sidebarActor" data-bs-toggle="collapse">
                        <i data-feather="pie-chart"></i>
                        <span> Quản lý diễn viên </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarActor">
                        <ul class="nav-second-level">
                            <li>
                                <a class='tp-link' href='{{ route('admin.actor.index') }}'>Danh sách diễn viên</a>
                            </li>
                            <li>
                                <a class='tp-link' href='{{ route('admin.actor.create') }}'>Thêm diễn viên</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarDirector" data-bs-toggle="collapse">
                        <i data-feather="pie-chart"></i>
                        <span> Quản lý đạo diễn </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarDirector">
                        <ul class="nav-second-level">
                            <li>
                                <a class='tp-link' href='{{ route('admin.director.index') }}'>Danh sách đạo diễn</a>
                            </li>
                            <li>
                                <a class='tp-link' href='{{ route('admin.director.create') }}'>Thêm đạo diễn</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarMovie" data-bs-toggle="collapse">
                        <i data-feather="package"></i>
                        <span> Quản lý phim </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarMovie">
                        <ul class="nav-second-level">
                            <li>
                                <a class='tp-link' href='{{ route('admin.movie.index') }}'>Danh sách phim</a>
                            </li>
                            <li>
                                <a class='tp-link' href='{{ route('admin.movie.create') }}'>Thêm phim mới</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarScreen" data-bs-toggle="collapse">
                        <i data-feather="file-text"></i>
                        <span> Quản lý phòng chiếu </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarScreen">
                        <ul class="nav-second-level">
                            <li>
                                <a class='tp-link' href='{{ route('admin.screen.index') }}'>Danh sách phòng chiếu</a>
                            </li>
                            <li>
                                <a class='tp-link' href='{{ route('admin.screen.create') }}'>Thêm phòng chiếu mới</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarShowtime" data-bs-toggle="collapse">
                        <i data-feather="briefcase"></i>
                        <span> Quản lý xuất chiếu </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarShowtime">
                        <ul class="nav-second-level">
                            <li>
                                <a class='tp-link' href='{{ route('admin.showtime.index') }}'>Danh sách xuất
                                    chiếu</a>
                            </li>
                            <li>
                                <a class='tp-link' href='{{ route('admin.showtime.create') }}'>Thêm xuất chiếu
                                    mới</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarSeat" data-bs-toggle="collapse">
                        <i data-feather="calendar"></i>
                        <span>Quản lý ghế</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarSeat">
                        <ul class="nav-second-level">
                            <li>
                                <a class='tp-link' href='{{ route('admin.seat.index') }}'>Quản lí ghế</a>
                            </li>
                        </ul>
                    </div>
                </li>



                <li>
                    <a href="#sidebarCombo" data-bs-toggle="collapse">
                        <i data-feather="aperture"></i>
                        <span> Quản lý combo </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCombo">
                        <ul class="nav-second-level">
                            <li>
                                <a class='tp-link' href='{{ route('admin.combo.index') }}'>Danh sách combo</a>
                            </li>
                            <li>
                                <a class='tp-link' href='{{ route('admin.combo.create') }}'>Thêm combo mới</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarVoucher" data-bs-toggle="collapse">
                        <i data-feather="table"></i>
                        <span> Quản lý voucher </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarVoucher">
                        <ul class="nav-second-level">
                            <li>
                                <a class='tp-link' href='{{ route('admin.voucher.index') }}'>Danh sách voucher</a>
                            </li>
                            <li>
                                <a class='tp-link' href='{{ route('admin.voucher.create') }}'>Thêm voucher mới</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarReview" data-bs-toggle="collapse">
                        <i data-feather="pie-chart"></i>
                        <span> Quản lý bình luận </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarReview">
                        <ul class="nav-second-level">
                            <li>
                                <a class='tp-link' href='{{ route('admin.review.index') }}'>Danh sách</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarAuth" data-bs-toggle="collapse">
                        <i data-feather="users"></i>
                        <span> Quản lý người dùng </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAuth">
                        <ul class="nav-second-level">
                            <li>
                                <a class='tp-link' href='{{ route('admin.user.index') }}'>Danh sách người dùng</a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
</div>
