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

        /* Đặt kiểu tổng thể cho Sidebar và Account Content */
        .account-sidebar {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .account-content {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Tiêu đề của Sidebar */
        .account-title {
            font-size: 20px;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
            text-transform: uppercase;
            border-bottom: 2px solid #ffc107;
            padding-bottom: 5px;
        }

        /* Danh sách trong Sidebar */
        .user__list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .user__item {
            margin-bottom: 10px;
        }

        .user__link {
            text-decoration: none;
            font-size: 16px;
            color: #333;
            padding: 10px 15px;
            display: block;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .user__link:hover {
            background: #ffc107;
            color: #fff;
            transform: translateX(5px);
        }

        /* Thông tin tài khoản trong Account Content */
        .account-info {
            font-size: 16px;
            line-height: 1.8;
            color: #555;
        }

        .user__name,
        .user__email {
            font-size: 16px;
            margin-bottom: 10px;
            color: #333;
        }

        /* Nút cập nhật tài khoản */
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

        /* Điều chỉnh bố cục chung */
        .col-md-3,
        .col-md-9 {
            padding: 15px;
        }

        /* Hiệu ứng khi hover trên Sidebar */
        .account-sidebar:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        /* Booking History Styles */
        .account-content {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }

        .table thead {
            background-color: #ffc107;
            color: #2b2b2c;
        }

        .table th,
        .table td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .table-striped tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        .label {
            padding: 5px 10px;
            font-size: 9px;
            border-radius: 4px;
            text-transform: uppercase;
            font-weight: bold;
            text-align: center;

        }

        .label-warning {
            background-color: #ffc107;
            color: #fff;
        }

        .label-success {
            background-color: #28a745;
            color: #fff;
        }

        .label-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .button-account {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .button-account:hover {
            color: #0056b3;
        }

        /* Responsive Design */
        @media (max-width: 768px) {

            .col-md-3,
            .col-md-9 {
                width: 100%;
                padding: 0;
            }
        }

    </style>
@endsection

@section('content')
    <section class="container account-container">
        <div class="row" >
            <div class="col-md-2 account-sidebar">
                <div class="sidebar">
                    <div class="user">
                        <div class="user__head">
                            <div class="user__info">
                                <div class="content__title account-title">Thông tin tài khoản</div>

                            </div>
                        </div>
                        <div class="user__content">
                            <ul class="user__list">
                                <li class="user__item"><a href="{{ route('account.info') }}" class="user__link">Thông tin
                                        tài khoản</a></li>

                                <li class="user__item"><a href="{{ route('account.booking-history') }}"
                                                          class="user__link">Lịch sử đặt vé</a></li>

                                <li class="user__item"><a href="{{ route('logout') }}" class="user__link">Đăng xuất</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <h2>Lịch sử đặt vé</h2>
                @if ($bookings->isEmpty())
                    <p>No bookings found.</p>
                @else
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Mã vé</th>
                            <th>Tên phim</th>
                            <th>Phòng chiếu</th>
                            <th>Xuất chiếu</th>
                            <th>Giá vé</th>
                            <th>Ngày đặt vé</th>
                            <th>Trạng thái</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>



                        @foreach ($bookings as $booking)
                            <tr>
                                <td>{{ $booking->booking->order_code }}</td>
                                <td>{{ $booking->movie->title }}</td>
                                <td>{{ $booking->showtime->screen->screen_name }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->showtime->time)->format('H:i') }}</td>
                                <td>{{ number_format($booking->transaction->total, 0, '.', '.') }}đ</td>

                                <td>{{ $booking->created_at->format('d/m/Y') }}</td>
                                <td>
                                    @if ($booking->status == 0)
                                        <span class="label label-warning">Vé chưa xem</span>
                                    @elseif($booking->status == 1)
                                        <span class="label label-success">Vé đã xem</span>
                                    @else
                                        <span class="label label-danger">Vé đã hủy</span>
                                    @endif
                                </td>

                                <td><a class="button-account" href="{{ route('account.booking-detail', $booking->ticket_id) }}">Xem chi tiết</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
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
