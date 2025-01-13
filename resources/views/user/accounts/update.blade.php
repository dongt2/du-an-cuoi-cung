@extends('user.layout.default')

@section('title')
    @parent
    Tài khoản
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
        /* Account Section */
        .account-info {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);

        }

        .account-info h2 {
            color: #d32f2f;
            margin-bottom: 20px;
        }

        .account-info label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .account-info input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .account-info button {
            background-color: #d32f2f;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .account-info button:hover {
            background-color: #b71c1c;
        }

        .account-container {
            padding-top: 150px;
        }


        /* Tổng thể cho giao diện */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        /* Sidebar (Bên trái) */
        .account-sidebar {
            background: #343a40;
            color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .account-sidebar .account-title {
            font-size: 18px;
            font-weight: bold;
            color: #ffc107;
            margin-bottom: 15px;
            text-transform: uppercase;
            border-bottom: 2px solid #ffc107;
            padding-bottom: 5px;
        }

        .account-sidebar .user__list {
            list-style: none;
            padding: 0;
        }

        .account-sidebar .user__item {
            margin-bottom: 10px;
        }

        .account-sidebar .user__link {
            text-decoration: none;
            color: #ffc107;
            padding: 10px 15px;
            display: block;
            border-radius: 6px;
            transition: all 0.3s ease;
            font-size: 16px;
        }

        .account-sidebar .user__link:hover {
            background-color: #ffc107;
            color: #343a40;
            transform: translateX(5px);
        }

        /* Phần nội dung bên phải */
        .account-content {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Tiêu đề chính */
        .content__title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
            border-bottom: 2px solid #ffc107;
            padding-bottom: 5px;
        }

        /* Các thông tin tài khoản */
        .account-info {
            font-size: 16px;
            color: #555;
        }

        /* Form */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            font-size: 14px;
            color: #333;
            margin-bottom: 5px;
            display: inline-block;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            color: #555;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #ffc107;
            box-shadow: 0 0 5px rgba(255, 193, 7, 0.5);
            outline: none;
        }

        /* Nút bấm */
        .btn--warning {
            background-color: #ffc107;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-size: 16px;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn--warning:hover {
            background-color: #e0a800;
            transform: scale(1.05);
        }

        .btn--wide {
            display: block;
            margin-top: 20px;
            text-align: center;
            width: 100%;
        }

        /* Điều chỉnh bố cục */
        .col-md-3,
        .col-md-9 {
            padding: 15px;
        }

        /* Hiệu ứng khi hover vào Account Content */
        .account-content:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
    </style>
@endsection

@section('content')
    <section class="container account-container">
        <div class="row">
            <div class="col-md-3 account-sidebar">
                <div class="sidebar">
                    <div class="user">
                        <div class="user__head">
                            <div class="user__info">
                                <div class="content__title account-title">Account Information</div>

                            </div>
                        </div>
                        <div class="user__content">
                            <ul class="user__list">
                                <li class="user__item"><a href="{{ route('account.info') }}" class="user__link">Account
                                        Info</a></li>
                                <li class="user__item"><a href="{{ route('logout') }}" class="user__link">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 account-content">
                <div class="content__head">
                    <div class="content__title">Cập nhật tài khoản</div>
                </div>
                <div class="content__body">
                    <div class="user__info account-info">
                        <form action="{{ route('account.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Họ và tên</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $user->username }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <label for="phone">Số điện thoại</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="{{ $user->phone }}">
                            </div>

                            <div class="form-group">
                                <label for="old_password">Mật khẩu cũ</label>
                                <input type="password" class="form-control" id="old_password" name="old_password">
                            </div>
                            <div class="form-group">
                                <label for="new_password">Mật khẩu mới</label>
                                <input type="password" class="form-control" id="new_password" name="new_password">
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Xác nhận mật khẩu mới</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                            </div>
                            <button type="submit" class="btn btn-md btn--warning btn--wide">Cập nhật tài khoản</button>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection

@section('script')
    <!-- JavaScript-->
    <!-- jQuery 1.9.1-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="{{ asset('js/external/jquery-1.10.1.min.js') }}"><\/script>')
    </script>

    <!-- Migrate -->
    <script src="{{ asset('js/external/jquery-migrate-1.2.1.min.js') }}"></script>

    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

    <!-- Bootstrap 3-->
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>

    <!-- Mobile menu -->
    <script src="{{ asset('js/jquery.mobile.menu.js') }}"></script>

    <!-- Select -->
    <script src="{{ asset('js/external/jquery.selectbox-0.2.min.js') }}"></script>

    <!-- Swiper slider -->
    <script src="{{ asset('js/external/idangerous.swiper.min.js') }}"></script>

    <!-- Form validation -->
    <script src="{{ asset('js/form.js') }}"></script>

    <!-- Custom -->
    <script src="{{ asset('js/custom.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            init_BookingOne();
        });
    </script>
@endsection
