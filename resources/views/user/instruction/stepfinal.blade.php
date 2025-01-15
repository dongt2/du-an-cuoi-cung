@extends('user.layout.default')

@section('title')
    @parent
    AMovie - Instruction Booking
@endsection

@section('style')
    <!-- Mobile Specific Metas-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="telephone=no" name="format-detection">

    <!-- Fonts -->
    <!-- Font awesome - icon font -->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!-- Roboto -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet" type="text/css">

    <!-- Stylesheets -->
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="stylesheet">

    <!-- Mobile menu -->
    <link href="{{ asset('css/gozha-nav.css') }}" rel="stylesheet" />
    <!-- Select -->
    <link href="{{ asset('css/external/jquery.selectbox.css') }}" rel="stylesheet" />
    <!-- Swiper slider -->
    <link href="{{ asset('css/external/idangerous.swiper.css') }}" rel="stylesheet" />

    <!-- Custom -->
    <link href="{{ asset('css/style3860.css?v=1') }}" rel="stylesheet" />

    <!-- Modernizr -->
    <script src="{{ asset('js/external/modernizr.custom.js') }}"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js"></script>
    <![endif]-->
    <style>
        .container h2 {
            margin-top: 100px;
        }
        p {
            font-size: 15px;
            color: #555;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        img {
            width: 100%;
            max-width: 800px;
            /* Kích thước tối đa */
            height: auto;
            /* Giữ tỷ lệ ảnh */
            border-radius: 8px;
            /* Bo góc ảnh */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Đổ bóng ảnh */
            margin-top: 15px;
            /* Thêm khoảng cách phía trên */
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <h2 class="page-heading heading--outcontainer">Bước 1</h2>
        <p>- Người dùng sau khi vào trang web tiến hành <strong>Đăng nhập</strong></p>
        <img src="/imageBooking/datve1.png" alt="Hướng dẫn đăng nhập">
        <h2 class="page-heading heading--outcontainer">Bước 2</h2>
        <p>- Người dùng sau sau khi đăng nhập thì chọn một phim bất kì trong danh sách phim</p>
        <img src="/imageBooking/datve2.png">
        <h2 class="page-heading heading--outcontainer">Bước 3</h2>
        <p>- Nhhấn nút <strong>Đặt vé</strong></p>
        <img src="/imageBooking/datve3.png" alt="Hướng dẫn đăng nhập">
        <h2 class="page-heading heading--outcontainer">Bước 4</h2>
        <p>- Chọn xuất chiếu cho phim đã chọn và nhấn <strong>Next step</strong></p>
        <img src="/imageBooking/datve4.png" alt="Hướng dẫn đăng nhập">
        <h2 class="page-heading heading--outcontainer">Bước 5</h2>
        <p>- Chọn ghế mà người dùng muốn đặt và nhấn <strong>Next step</strong></p>
        <img src="/imageBooking/datve5.png" alt="Hướng dẫn đăng nhập">
        <h2 class="page-heading heading--outcontainer">Bước 6</h2>
        <p>- Chọn phương thức mà bạn muốn thanh toán và nhấn <strong>Purchase</strong> để thanh toán</p>
        <img src="/imageBooking/datve6.png" alt="Hướng dẫn đăng nhập">
    </div>
@endsection
@section('script')
    <!-- JavaScript-->
    <!-- jQuery 1.9.1-->
    <script src="../ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/external/jquery-1.10.1.min.js"><\/script>')
    </script>
    <!-- Migrate -->
    <script src="js/external/jquery-migrate-1.2.1.min.js"></script>
    <!-- Bootstrap 3-->
    <script src="../netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>

    <!-- Mobile menu -->
    <script src="js/jquery.mobile.menu.js"></script>
    <!-- Select -->
    <script src="js/external/jquery.selectbox-0.2.min.js"></script>

    <!--*** Google map  ***-->
    <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
    <!--*** Google map infobox  ***-->
    <script src="js/external/infobox.js"></script>

    <!-- Form element -->
    <script src="js/external/form-element.js"></script>
    <!-- Form validation -->
    <script src="js/form.js"></script>

    <!-- Custom -->
    <script src="js/custom.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            init_Instruction();
        });
    </script>
@endsection
