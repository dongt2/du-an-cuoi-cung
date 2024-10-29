<div class="right-bar">
    <div data-simplebar class="h-100">

        <div class="rightbar-title d-flex align-items-center px-3 py-4">

            <h5 class="m-0 me-2">Settings</h5>

            <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                <i class="mdi mdi-close noti-icon"></i>
            </a>
        </div>

        <!-- Settings -->
        <hr class="mt-0" />


        <div class="px-4 py-2">
            <h6 class="mb-3">Select Custome Colors</h6>
            <div class="form-check form-check-inline">
                <input class="form-check-input theme-color" type="radio" name="theme-mode" id="theme-default"
                    value="default" onchange="document.documentElement.setAttribute('data-theme-mode', 'default')"
                    checked>
                <label class="form-check-label" for="theme-default">Default</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input theme-color" type="radio" name="theme-mode" id="theme-red"
                    value="red" onchange="document.documentElement.setAttribute('data-theme-mode', 'red')">
                <label class="form-check-label" for="theme-red">Red</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input theme-color" type="radio" name="theme-mode" id="theme-teal"
                    value="teal" onchange="document.documentElement.setAttribute('data-theme-mode', 'teal')">
                <label class="form-check-label" for="theme-teal">Teal</label>
            </div>
        </div>


        <h6 class="text-center mb-0 mt-3">Choose Layouts</h6>

        <div class="p-4">
            <div class="mb-2">
                <img src="/assets/images/layouts/layout-1.jpg" class="img-thumbnail" alt="">
            </div>
            <div class="form-check form-switch mb-3">
                <input type="checkbox" class="form-check-input theme-choice" id="light-mode-switch" checked />
                <label class="form-check-label" for="light-mode-switch">Light Mode</label>
            </div>

            <div class="mb-2">
                <img src="/assets/images/layouts/layout-2.jpg" class="img-thumbnail" alt="">
            </div>
            <div class="form-check form-switch mb-3">
                <input type="checkbox" class="form-check-input theme-choice" id="dark-mode-switch"
                    data-bsStyle="assets/css/bootstrap-dark.min.css"
                    data-appStyle="assets/css/app-dark.min.html" />
                <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
            </div>

            <div class="mb-2">
                <img src="/assets/images/layouts/layout-3.jpg" class="img-thumbnail" alt="">
            </div>
            <div class="form-check form-switch mb-5">
                <input type="checkbox" class="form-check-input theme-choice" id="rtl-mode-switch"
                    data-appStyle="assets/css/app-rtl.min.css" />
                <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
            </div>


        </div>

    </div> <!-- end slimscroll-menu-->
</div>