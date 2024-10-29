<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>

                <li>
                    <a href="{{ route('admin.index') }}" class="waves-effect">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="badge rounded-pill bg-primary float-end">2</span>
                        <span>Dashboard</span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('admin.screen.index') }}" class="has-arrow waves-effect">
                        <i class="mdi mdi-buffer"></i>
                        <span>Quản lý Phòng phim</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-buffer"></i>
                        <span>Quản lý Xuất chiếu</span>
                    </a>
                </li>
                <li class="menu-title">Extras</li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>