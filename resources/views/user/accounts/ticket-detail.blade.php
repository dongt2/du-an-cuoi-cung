@extends('user.layout.default')

@section('title')
    @parent
    Ticket Details
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

{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"--}}
{{--          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">--}}

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js"></script>
    <![endif]-->

    <style>
        .rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
        }

        .rating input {
            display: none;
        }

        .rating label {
            position: relative;
            width: 1em;
            font-size: 3rem;
            color: #FFD700;
            cursor: pointer;
        }

        .rating label::before {
            content: "★";
            position: absolute;
            opacity: 0;
        }

        .rating label:hover:before,
        .rating label:hover~label:before {
            opacity: 1 !important;
        }

        .rating input:checked~label:before {
            opacity: 1;
        }

        .rating input:checked+label:hover:before,
        .rating input:checked+label:hover~label:before,
        .rating input:checked~label:hover:before,
        .rating input:checked~label:hover~label:before,
        .rating label:hover~input:checked~label:before {
            opacity: 0.4;
        }

        /* Căn giữa container */
        .col-md-12 {
            margin: 20px auto;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            font-family: 'Arial', sans-serif;
            max-width: 1000px;
            /* Đặt chiều rộng tối đa */
            width: 90%;
            /* Chiếm 90% chiều rộng màn hình */
            box-sizing: border-box;
        }

        .account-info h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
            font-weight: bold;
            color: #333;
            border-bottom: 2px solid #007bff;
            display: inline-block;
            padding-bottom: 10px;
        }

        /* Ticket Details */
        .ticket-details p {
            font-size: 16px;
            margin: 10px 0;
            color: #555;
        }

        .ticket-details p strong {
            color: #333;
            font-weight: bold;
        }

        .ticket-details img {
            margin-top: 10px;
            max-width: 150px;
            height: auto;
            border: 2px solid #ddd;
            border-radius: 8px;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 16px;
            color: #333;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .form-group input[type="text"] {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 6px;
            transition: border-color 0.3s;
        }

        .form-group input[type="text"]:focus {
            border-color: #007bff;
            outline: none;
        }

        /* Phần Rating (từ trái sang phải) */
        .rating {
            display: flex;
            gap: 8px;
            direction: ltr;
            /* Đảm bảo hướng từ trái sang phải */
        }

        .rating label {
            font-size: 24px;
            color: #ccc;
            cursor: pointer;
            transition: color 0.3s, transform 0.2s;
        }

        .rating input {
            display: none;
        }

        /* Hiệu ứng hover: Sáng tất cả sao từ trái đến sao hiện tại */
        .rating label:hover,
        .rating label:hover~label {
            color: #ffc107;
            transform: scale(1.1);
        }

        /* Hiệu ứng checked: Sáng tất cả sao từ trái đến sao được chọn */
        .rating input:checked~label {
            color: #ffc107;
            transform: scale(1.1);
        }


        /* Button Styles */
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }
    </style>
@endsection

@section('content')
    <section class="container account-container">
        <div class="row">
            <div class="col-md-12">
                <div class="account-info">
                    <h2>Chi tiết vé</h2>
                    <div class="ticket-details">
                        <div class="d-flex" style="display: flex;gap: 100px;">
                            <div class="qr-code" style="margin-right: 15px;">
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($ticket->qr_code) }}" alt="QR Code">
                            </div>
                            <div class="ticket-info" style="margin-left: 15px;">
                                <p><strong>Mã vé:</strong> {{ $ticket->booking->order_code }}</p>
                                <p><strong>Tên phim:</strong> {{ $ticket->movie->title }}</p>
                                <p><strong>Xuất chiếu</strong> {{ \Carbon\Carbon::parse($ticket->showtime->time)->format('H:i') }}</p>
                                <p><strong>Phòng</strong> {{ $ticket->showtime->screen->screen_name }}</p>
                                <p><strong>Seats:</strong> {{ implode(', ', $ticket->seats) }}</p>
                                <p><strong>Ngày đặt:</strong> {{ $ticket->created_at->format('d-m-Y') }}</p>
                                <p><strong>Combo chọn:</strong> {{ $ticket->booking->combo->combo_name }} x {{ $ticket->booking->quantity_combo }}</p>

                                <p><strong>Giá:</strong> {{ number_format($ticket->booking->total_price, 0, ',', ',')  }} VNĐ</p>
                            </div>
                        </div>

                        @if ($ticket->checkin != 0 && $ticket->status != 0 && $ticket->token != 0)
                            <form action="{{ route('account.comment', $ticket->ticket_id) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Bình luận</label>
                                    <input type="text" name="comment">
                                </div>
                                <div class="form-group">
                                    <label>Rating</label>
                                    <div class="rating">
                                        <input type="radio" name="rating" value="5" id="5"><label
                                            for="5">☆</label>
                                        <input type="radio" name="rating" value="4" id="4"><label
                                            for="4">☆</label>
                                        <input type="radio" name="rating" value="3" id="3"><label
                                            for="3">☆</label>
                                        <input type="radio" name="rating" value="2" id="2"><label
                                            for="2">☆</label>
                                        <input type="radio" name="rating" value="1" id="1"><label
                                            for="1">☆</label>
                                    </div>
                                </div>
                                <button type="submit">Submit</button>
                            </form>
                        @else
                            <form action="{{ route('account.comment', $ticket->ticket_id) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Bình luận</label>
                                    @if ($review->comment == null)
                                        <input type="text" name="comment" disabled>
                                    @else
                                        <input type="text" name="comment" value="{{ $review->comment }}" disabled>
                                    @endif
                                </div>
                                @if($review->rating == 5)
                                    <div class="rating">
                                        <input type="radio" name="rating" value="5" id="5" checked><label
                                            for="5">☆</label>
                                        <input type="radio" name="rating" value="4" id="4"><label
                                            for="4">☆</label>
                                        <input type="radio" name="rating" value="3" id="3"><label
                                            for="3">☆</label>
                                        <input type="radio" name="rating" value="2" id="2"><label
                                            for="2">☆</label>
                                        <input type="radio" name="rating" value="1" id="1"><label
                                            for="1">☆</label>
                                    </div>

                                @endif

                                @if ($review->comment == null)
                                    <button type="submit">Submit</button>
                                @else
                                    <a href="{{ route('account.booking-history') }}" class="btn btn--info">Quay lại</a>

                                @endif

                            </form>
                        @endif
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
            init_TicketOne();
        });

        function init_TicketOne() {
            // Add your initialization code here
            console.log('init_TicketOne function called');
        }
    </script>
@endsection
