@extends('user.layout.default')

@section('title')
    @parent
    Movie
@endsection

@section('style')
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>AMovie - Booking step 3</title>
    <meta name="description" content="A Template by Gozha.net">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Gozha.net">

    <!-- Mobile Specific Metas-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="telephone=no" name="format-detection">

    <!-- Fonts -->
    <!-- Font awesome - icon font -->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!-- Roboto -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet" type="text/css">

    <!-- Stylesheets -->

    <!-- Mobile menu -->
    <link href="{{ asset('css/gozha-nav.css') }}" rel="stylesheet" />
    <!-- Select -->
    <link href="{{ asset('css/external/jquery.selectbox.css') }}" rel="stylesheet" />

    <!-- Custom -->
    <link href="{{ asset('css/style3860.css?v=1') }}" rel="stylesheet" />

    <!-- Modernizr -->
    <script src="{{ asset('js/external/modernizr.custom.js') }}"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
                                                                                                                                                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
                                                                                                                                                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js"></script>
                                                                                                                                                                    <![endif]-->
    <style>
        /* Modal background */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Nền tối */
        }

        /* Modal content */
        .modal-content {
            margin: 2% auto;
            /* Giảm khoảng cách trên và dưới */
            background-color: white;
            width: 40%;
            /* Độ rộng modal */
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            height: 90%;
        }

        /* Phần đầu */
        .modal-header {
            flex: 0 0 1%;
            height: 80px;
            background-color: #0f6bce;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        /* Phần giữa */
        .modal-body {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }

        /* Phần cuối */
        .modal-footer {
            flex: 0 0 10%;
            /* Chiếm 15% chiều cao */
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            border-top: 1px solid #ddd;
            background-color: #f9f9f9;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        /* Nút xác nhận */
        #confirmBtn {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #confirmBtn:hover {
            background-color: #218838;
        }

        .price {
            font-size: 18px;
            font-weight: bold;
        }
    </style>
@endsection

@section('content')
    <br><br>
    <section class="container">
        <div class="order-container">
            <div class="order">
                <img class="order__images" alt='' src="{{ asset('images/tickets.png') }}">
                <p class="order__title">Book a ticket <br><span class="order__descript">and have fun movie time</span></p>
                <div class="order__control">
                    <a href="#" class="order__control-btn active">Purchase</a>
                    <a href="book3-reserve.html" class="order__control-btn">Reserve</a>
                </div>
            </div>
        </div>
        <div class="order-step-area">
            <div class="order-step first--step order-step--disable ">1. What &amp; Where &amp; When</div>
            <div class="order-step second--step order-step--disable">2. Choose a sit</div>
            <div class="order-step third--step">3. Check out</div>
        </div>

        <div class="col-sm-12">
            <div class="checkout-wrapper">
                <div class="container mt-5">
                    <h2 class="page-heading">Combo</h2>
                    <div class="btn btn-primary" id="buyComboBtn">Mua combo</div>
                </div>

                <!-- Modal -->
                <div id="comboModal" class="modal">
                    <div class="modal-content">
                        <!-- Phần đầu -->
                        <div class="modal-header">
                            <p style="padding-top: 20px; font-size: 24px; color:azure">Combo</p>
                        </div>
                        <!-- Phần giữa -->
                        <div class="modal-body">
                            @foreach ($combos as $item)
                                <div class="row" style="display: flex;">
                                    <div class="col-3" style="flex: 1;">
                                        <img src="" alt="ảnh combo">
                                    </div>
                                    <div class="col-9" style="flex: 3;">
                                        <Strong style="font-size: 21px;">{{ $item->combo_name }} -
                                            {{ $item->price }}</Strong>
                                        <p>{{ $item->short_description }}</p>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                        <!-- Phần cuối -->
                        <div class="modal-footer">
                            <div class="price">Tổng cộng: 0$</div>
                            <button class="btn btn-success" id="confirmBtn">Xác nhận</button>
                        </div>
                    </div>
                </div>



                <h2 class="page-heading" style="clear: both;">Voucher</h2>
                <div class="container" style="float: left; max-width: 600px;">
                    <form action="" method="get">
                        <div class="input-group">
                            <input type="text" name="voucher" placeholder="Nhập mã giảm giá"
                                style="float: left; padding: 8px; font-size: 16px; border: 1px solid #ccc; border-radius: 4px; width: calc(100% - 120px);">&emsp;
                            <button class="btn" type="submit"
                                style="padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer;">
                                Xác nhận
                            </button>
                        </div>
                    </form>
                </div>

                <br>
                <h2 class="page-heading" style="clear: both;">Tổng</h2>
                <ul class="book-result">
                    <li class="book-result__item">Phim: <span
                            class="book-result__count booking-ticket">{{ session('bookings.movie_id') }}</span></li>
                    <li class="book-result__item">Phòng chiếu: <span
                            class="book-result__count booking-price">{{ session('bookings.screen_id') }}</span></li>
                    <li class="book-result__item">Ngày chiếu: <span
                            class="book-result__count booking-price">{{ session('bookings.showtime_date') }}</span></li>
                    <li class="book-result__item">Giờ chiếu: <span
                            class="book-result__count booking-price">{{ session('bookings.showtime_time') }}</span></li>
                    <li class="book-result__item">Ghế:
                        <span class="book-result__count booking-price">
                            @foreach (session('bookings.seats') as $seat)
                                {{ $seat }},
                            @endforeach
                        </span>
                    </li>


                    <li class="book-result__item">Giá vé: <span
                            class="book-result__count booking-cost">${{ session('bookings.total_price') }}</span></li>
                    <li class="book-result__item">Giá combo: <span class="book-result__count booking-cost">$0</span></li>
                    <li class="book-result__item">Tổng: <span class="book-result__count booking-cost"
                            id="total">${{ session('bookings.total_price') }}</span></li>
                </ul>

                <h2 class="page-heading">Chọn phương thức thanh toán</h2>
                <div class="payment">
                    <h2>Thanh toán qua VNPAY</h2>
                    <form action="{{ route('payment') }}" method="POST">
                        @csrf
                        <input type="hidden" name="total" value="{{ session('bookings.total_price') }}">
                        <button type="submit" name="redirect" class="btn btn-md btn--warning btn--wide">Thanh toán</button>
                    </form>

{{--                    <h2>Thanh toán qua PayPal</h2>--}}

                    <!-- PayPal button container -->
{{--                    <div id="paypal-button-container"></div>--}}

                    <!-- PayPal SDK Script -->
                    <script
                        src="https://www.paypal.com/sdk/js?client-id=ASkovqr25bwIpAotlWHOZlLWsrFR_XmQSZ-oChF0Tm_DmF70QkZc5cehXWbVl13hDfCDIRnQES0WU6pE&currency=USD&components=buttons,funding-eligibility">
                    </script>
                    <script>
                        // Lấy giá trị của total từ phần tử DOM và chuyển đổi thành số (loại bỏ bất kỳ ký tự không phải số nào)
                        var total = parseFloat(document.getElementById('total').innerText.replace(/[^0-9.-]+/g, ''));

                        // Kiểm tra xem giá trị total có hợp lệ không
                        if (isNaN(total) || total <= 0) {
                            console.log("Giá trị tổng không hợp lệ");
                        } else {
                            // Render PayPal button
                            paypal.Buttons({
                                createOrder: function(data, actions) {
                                    return actions.order.create({
                                        purchase_units: [{
                                            amount: {
                                                value: total.toFixed(
                                                    2) // Đảm bảo giá trị là số với 2 chữ số thập phân
                                            }
                                        }]
                                    });
                                },
                                onApprove: function(data, actions) {
                                    return actions.order.capture().then(function(details) {
                                        alert('Thanh toán thành công! ' + details.payer.name.given_name);
                                        // Có thể xử lý thêm ở đây sau khi thanh toán thành công
                                    });
                                }
                            }).render('#paypal-button-container');
                        }
                    </script>
                </div>

                @php
                    // echo session('bookings.movie_id') . '</br>';
                    // echo session('bookings.screen_id') . '</br>';
                    // echo session('bookings.showtime_date') . '</br>';
                    // echo session('bookings.showtime_time') . '</br>';

                    // if ($seats = session('bookings.seats')) {
                    //     foreach ($seats as $seat) {
                    //         echo $seat . '</br>';
                    //     }
                    // }

                    // echo session('bookings.total_price');
                @endphp

                {{-- <h2 class="page-heading">Contact information</h2>
                <form id='contact-info' method='post' novalidate="" class="form contact-info">
                    <div class="contact-info__field contact-info__field-mail">
                        <input type='email' name='user-mail' placeholder='Your email' class="form__mail">
                    </div>
                    <div class="contact-info__field contact-info__field-tel">
                        <input type='tel' name='user-tel' placeholder='Phone number' class="form__mail">
                    </div>
                </form> --}}
            </div>

{{--            <div class="order">--}}
{{--                <form action="{{ route('payment') }}" method="POST">--}}
{{--                    @csrf--}}
{{--                    <input type="hidden" name="payment_method" value="vnpay">--}}
{{--                    <button type="submit" class="btn btn-md btn--warning btn--wide">Thanh toán</button>--}}
{{--                </form>--}}
{{--            </div>--}}
        </div>
    </section>

    <div class="clearfix"></div>

    <div class="booking-pagination">
        <a href="javascript:void(0);" class="booking-pagination__prev" onclick="history.back()">
            <p class="arrow__text arrow--prev">prev step</p>
            <span class="arrow__info">choose a sit</span>
        </a>
        <a href="#" class="booking-pagination__next hide--arrow">
            <p class="arrow__text arrow--next">next step</p>
            <span class="arrow__info"></span>
        </a>
    </div>
@endsection

@section('script')
    <script>
        // Lấy các phần tử cần thao tác
        const modal = document.getElementById("comboModal");
        const buyComboBtn = document.getElementById("buyComboBtn");
        const closeBtn = document.querySelector(".close-btn");
        const confirmBtn = document.getElementById("confirmBtn");

        // Mở modal khi bấm nút "Mua combo"
        buyComboBtn.addEventListener("click", function() {
            modal.style.display = "block";
        });

        // Đóng modal khi bấm ngoài modal
        window.addEventListener("click", function(event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });

        // Thêm hành động khi bấm nút xác nhận
        confirmBtn.addEventListener("click", function() {
            alert("Bạn đã xác nhận mua combo!");
            modal.style.display = "none";
        });
    </script>
    <!-- JavaScript-->
    <!-- jQuery 1.9.1-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="{{ asset('js/external/jquery-1.10.1.min.js') }}"><\/script>')
    </script>

    <!-- Migrate -->
    <script src="{{ asset('js/external/jquery-migrate-1.2.1.min.js') }}"></script>

    <!-- Bootstrap 3-->
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>

    <!-- Mobile menu -->
    <script src="{{ asset('js/jquery.mobile.menu.js') }}"></script>

    <!-- Select -->
    <script src="{{ asset('js/external/jquery.selectbox-0.2.min.js') }}"></script>

    <!-- Form element -->
    <script src="{{ asset('js/external/form-element.js') }}"></script>

    <!-- Form validation -->
    <script src="{{ asset('js/form.js') }}"></script>

    <!-- Custom -->
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection
