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
                {{-- <a href="#sidebarDashboards" data-bs-toggle="collapse">
                        <i data-feather="home"></i>
                        <span> Dashboard </span>
                        <span class="menu-arrow"></span>
                    </a> --}}
                {{-- <div class="collapse" id="sidebarDashboards">
                        <ul class="nav-second-level">
                            <li>
                                <a class='tp-link' href='index.html'>Analytical</a>
                            </li>
                            <li>
                                <a class='tp-link' href='ecommerce.html'>E-commerce</a>
                            </li>
                        </ul>
                    </div> --}}
                </li>



                <li class="menu-title">Trang</li>

                <li>
                    <a href="#sidebarAuth" data-bs-toggle="collapse">
                        <i data-feather="users"></i>
                        <span> User </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAuth">
                        <ul class="nav-second-level">
                            <li>
                                <a class='tp-link' href='{{ route('admin.user.index') }}'>Danh sách user</a>
                            </li>
                            <li>
                                <a class='tp-link' href='{{ route('admin.user.create') }}'>Thêm user mới</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarMovie" data-bs-toggle="collapse">
                        <i data-feather="package"></i>
                        <span> Movie </span>
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
                    <a href="#sidebarCategory" data-bs-toggle="collapse">
                        <i data-feather="alert-octagon"></i>
                        <span> Danh mục </span>
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
                    <a href="#sidebarSeat" data-bs-toggle="collapse">
                        <i data-feather="calendar"></i>
                        <span>Ghế</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarSeat">
                        <ul class="nav-second-level">
                            <li>
                                <a class='tp-link' href='{{ route('admin.seat.index') }}'>Quản lí ghế</a>
                            </li>
                            {{-- <li>
                                <a class='tp-link' href=''>Thêm bảng ghế</a>
                            </li> --}}
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarScreen" data-bs-toggle="collapse">
                        <i data-feather="file-text"></i>
                        <span> Phòng chiếu </span>
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
                        <span> Xuất Chiếu </span>
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
                    <a href="#sidebarCombo" data-bs-toggle="collapse">
                        <i data-feather="aperture"></i>
                        <span> Combo </span>
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
                        <span> Voucher </span>
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
                        <span> Review </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarReview">
                        <ul class="nav-second-level">
                            <li>
                                <a class='tp-link' href='{{ route('admin.review.index') }}'>Danh sách review</a>
                            </li>
                            <li>
                                <a class='tp-link' href='{{ route('admin.review.create') }}'>Thêm review mới</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarActor" data-bs-toggle="collapse">
                        <i data-feather="pie-chart"></i>
                        <span> QL Diễn Viên </span>
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
                        <span> QL Đạo Diễn </span>
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

                <li>
                    <a href="#sidebarAdvancedUI" data-bs-toggle="collapse">
                        <i data-feather="cpu"></i>
                        <span> Extended UI </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAdvancedUI">
                        <ul class="nav-second-level">
                            <li>
                                <a class='tp-link' href='extended-carousel.html'>Carousel</a>
                            </li>
                            <li>
                                <a class='tp-link' href='extended-notifications.html'>Notifications</a>
                            </li>
                            <li>
                                <a class='tp-link' href='extended-offcanvas.html'>Offcanvas</a>
                            </li>
                            <li>
                                <a class='tp-link' href='extended-range-slider.html'>Range Slider</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarIcons" data-bs-toggle="collapse">
                        <i data-feather="award"></i>
                        <span> Icons </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarIcons">
                        <ul class="nav-second-level">
                            <li>
                                <a class='tp-link' href='icons-feather.html'>Feather Icons</a>
                            </li>
                            <li>
                                <a class='tp-link' href='icons-mdi.html'>Material Design Icons</a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- <li>
                    <a href="#sidebarForms" data-bs-toggle="collapse">
                        <i data-feather="briefcase"></i>
                        <span> Forms </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarForms">
                        <ul class="nav-second-level">
                            <li>
                                <a class='tp-link' href='forms-elements.html'>General Elements</a>
                            </li>
                            <li>
                                <a class='tp-link' href='forms-validation.html'>Validation</a>
                            </li>
                            <li>
                                <a class='tp-link' href='forms-quilljs.html'>Quilljs Editor</a>
                            </li>
                            <li>
                                <a class='tp-link' href='forms-pickers.html'>Picker</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarTables" data-bs-toggle="collapse">
                        <i data-feather="table"></i>
                        <span> Tables </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTables">
                        <ul class="nav-second-level">
                            <li>
                                <a class='tp-link' href='tables-basic.html'>Basic Tables</a>
                            </li>
                            <li>
                                <a class='tp-link' href='tables-datatables.html'>Data Tables</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarCharts" data-bs-toggle="collapse">
                        <i data-feather="pie-chart"></i>
                        <span> Apex Charts </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCharts">
                        <ul class="nav-second-level">
                            <li>
                                <a href='charts-line.html'>Line</a>
                            </li>
                            <li>
                                <a href='charts-area.html'>Area</a>
                            </li>
                            <li>
                                <a href='charts-column.html'>Column</a>
                            </li>
                            <li>
                                <a href='charts-bar.html'>Bar</a>
                            </li>
                            <li>
                                <a href='charts-mixed.html'>Mixed</a>
                            </li>
                            <li>
                                <a href='charts-timeline.html'>Timeline</a>
                            </li>
                            <li>
                                <a href='charts-rangearea.html'>Range Area</a>
                            </li>
                            <li>
                                <a href='charts-funnel.html'>Funnel</a>
                            </li>
                            <li>
                                <a href='charts-candlestick.html'>Candlestick</a>
                            </li>
                            <li>
                                <a href='charts-boxplot.html'>Boxplot</a>
                            </li>
                            <li>
                                <a href='charts-bubble.html'>Bubble</a>
                            </li>
                            <li>
                                <a href='charts-scatter.html'>Scatter</a>
                            </li>
                            <li>
                                <a href='charts-heatmap.html'>Heatmap</a>
                            </li>
                            <li>
                                <a href='charts-treemap.html'>Treemap</a>
                            </li>
                            <li>
                                <a href='charts-pie.html'>Pie</a>
                            </li>
                            <li>
                                <a href='charts-radialbar.html'>Radialbar</a>
                            </li>
                            <li>
                                <a href='charts-radar.html'>Radar</a>
                            </li>
                            <li>
                                <a href='charts-polararea.html'>Polar</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarMaps" data-bs-toggle="collapse">
                        <i data-feather="map"></i>
                        <span> Maps </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarMaps">
                        <ul class="nav-second-level">
                            <li>
                                <a class='tp-link' href='maps-google.html'>Google Maps</a>
                            </li>
                            <li>
                                <a class='tp-link' href='maps-vector.html'>Vector Maps</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
</div>
