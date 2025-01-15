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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
            background-color: #ffd564;
            color: #4c4145;
            display: flex;
            align-items: center;
            justify-content: center;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            font: 12px Tahoma;
            font-weight: bold;
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

        .voucher {
            float: left;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: calc(100% - 120px);
        }

        .btnVoucher {
            padding: 10px 20px;
            background-color: #ffd564;
            color: #4c4145;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font: 12px Tahoma;
            font-weight: bold;
        }
        .vnd{
            color: #fe505a;
            font-size: 20px;
            font-weight: bold;
            position: relative;
            top: 2px;
            right: 23px
        }
    </style>
@endsection

@section('content')
    <br><br>
    <section class="container">
        <div class="order-container">
            <div class="order">
                <img class="order__images" alt='' src="{{ asset('images/tickets.png') }}">
                <p class="order__title">Đặt vé <br><span class="order__descript">chúc bạn có thời gian xem phim vui vẻ</span></p>
            </div>
        </div>
        <div class="order-step-area">
            <div class="order-step first--step order-step--disable">1. Chọn phim &amp; phòng &amp; xuất chiếu</div>
            <div class="order-step second--step order-step--disable">2. Chọn ghế ngồi</div>
            <div class="order-step third--step">3. Chọn combo &amp; thanh toán</div>
        </div>

        <div id="payment-timer" style="font-size: 20px; color: #FF0000; font-weight: bold; margin: 20px 0; text-align: end">

        </div>
        <div class="col-sm-12">

            <div class="checkout-wrapper">
                <div class="container mt-5">
                    <h2 class="page-heading">Combo</h2>
                    <div class="btn btn--warning btn-md" id="buyComboBtn">Chọn combo tại đây!!!</div>
                </div>

                <!-- Modal -->
                <div id="comboModal" class="modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <p style="padding-top: 20px; font-size: 24px; color:azure">Combo</p>
                        </div>
                        <div class="modal-body">
                            @foreach ($combos as $item)
                                <div style="display: flex;">
                                    <img src="{{ Storage::url($item->image) }}" alt="Hình ảnh combo"
                                         style="flex: 1; padding-right: 5px; max-width: 150px;">
                                    <div style="flex: 3;">
                                        <strong style="font-size: 18px;">{{ $item->combo_name }} -
                                            {{ number_format($item->price) }} VNĐ</strong>
                                        <p>{!! $item->short_description !!}</p>
                                        <input type="number" class="combo-quantity" data-price="{{ $item->price }}"
                                               data-combo-id="{{ $item->combo_id }}" value="0" min="0"
                                               max="7">

                                        <span style="float: right">Số lượng còn lại: {{ $item->quantity }}</span>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                        <div class="modal-footer">
                            <div class="price">Tổng cộng: <span id="price-combo">0 VNĐ</span></div>
                            <button class="btn btn-success" onclick="getPriceCombo()">Xác nhận</button>
                        </div>
                    </div>
                </div>
                <!-- Voucher -->
                <h2 class="page-heading" style="clear: both;">Voucher</h2>
                <div class="container" style="float: left; max-width: 600px;">

                    <div class="input-group" style="display: flex; gap: 3px">
                        @if(session('booking.voucher_code') != null)
                        <input type="text" name="voucher" id="voucher" value="{{ session('booking.voucher_code') }}"
                            placeholder="Nhập mã giảm giá" class="voucher" disabled>
                            <button id="destroy-voucher" class="btn btnVoucher"> Hủy mã </button>

                        @else
                            <input type="text" name="voucher" id="voucher"
                                   placeholder="Nhập mã giảm giá" class="voucher">
                            <button id="submit-voucher" class="btn btnVoucher"> Xác nhận </button>
                        @endif
                            <div class="btn btn--warning btn-md" id="showVoucherBtn">Nhận mã giảm giá tại đây !!!</div>

                            <div id="voucherModal" class="modal">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <p style="padding-top: 20px; font-size: 24px;">Voucher</p>
                                    </div>
                                    <div class="modal-body">
                                        @foreach($voucher as $item)
                                            <div class="combo-container">
                                                <input type="hidden" name="voucher_id" value="{{ $item->id }}">

                                                <div class="combo-details">
                                                    <p>{{$item->voucher_name}}</p>

                                                    <strong class="combo-title">
                                                        <span style="color: darkred">{{ $item->code }}</span> - Giảm ngay {{ $item-> deduct_amount }}%
                                                    </strong>
                                                    <p>
                                                        Ngày bắt đầu từ {{ $item->start_date->format('d-m-Y') }} đến {{ $item->end_date->format('d-m-Y') }}<span style="text-align: end; display: inherit">Số lượng chỉ còn {{ $item->quantity }}</span>
                                                    </p>
                                                    <button style="display: inherit; text-align: end" class="copy-button" data-code="{{ $item->code }}">Copy</button>
                                                </div>
                                            </div>
                                            <hr>

                                        @endforeach
                                    </div>
                                    <div class="modal-footer">
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <br>
                <!-- Tổng -->
                <h2 class="page-heading" style="clear: both;">Tổng</h2>
                <ul class="book-result">
                    <li class="book-result__item">Phim: <span
                            class="book-result__count booking-ticket">{{ $movie_name }}</span></li>
                    <li class="book-result__item">Phòng chiếu: <span
                            class="book-result__count booking-price">{{ $screen_name }}</span></li>
                    <li class="book-result__item">Ngày chiếu: <span
                            class="book-result__count booking-price">{{ \Carbon\Carbon::parse(session('booking.showtime_date'))->format('d-m-Y') }}</span></li>
                    <li class="book-result__item">Giờ chiếu: <span
                            class="book-result__count booking-price">{{ session('booking.showtime_time') }}</span></li>
                    <li class="book-result__item">Ghế:
                        <span class="book-result__count booking-price">
                            @foreach (session('booking.seats') as $seat)
                                {{ $seat }},
                            @endforeach
                        </span>
                    </li>
                    <br>
                    <li class="book-result__item">Giá vé: <span
                            class="book-result__count booking-cost price-ticket">{{ number_format(session('booking.price_ticket'), 0, ',', '.') }}
                            VNĐ</span>
                    </li>

                    <li class="book-result__item">Giá combo: <span
                            class="book-result__count booking-cost price-combo">{{ number_format(session('booking.price_combo'), 0, ',', '.') }}
                            VNĐ</span></li>

                    <li class="book-result__item">Giảm giá voucher: <span
                            class="book-result__count booking-cost price-combo"><del>{{ number_format(session('booking.price_voucher'), 0, ',', '.') }}</del>
                            VNĐ</span></li>

                    @php
//                    dd(session('booking'));
                        $total =
                            session('booking.price_ticket') +
                            session('booking.price_combo') -
                            session('booking.price_voucher');
                    @endphp

                    <li class="book-result__item">Tổng: <span class="book-result__count booking-cost price-total"
                            id="total" name="total">{{ number_format($total, 0, ',', '.') }} </span><span class="vnd">VNĐ</span>
                    </li>
                </ul>


                @php
                    // dd(session()->get('booking'));
                @endphp

                <h2 class="page-heading">Chọn phương thức thanh toán</h2>

                    <h2>Thanh toán qua VNPAY</h2>
                    <form action="{{ route('payment') }}" method="POST">
                        @csrf
                        <input type="hidden" name="total" value="{{ $total }}">
                        <button type="submit" name="redirect" class="btn btn-md btn--warning btn--wide">Thanh toán</button>
                    </form>


                </div>
            </div>
        </div>
    </section>

    <div class="clearfix"></div>

    <div class="booking-pagination">
        <a href="javascript:void(0);" class="booking-pagination__prev" onclick="history.back()">
            <span class="arrow__text arrow--prev">Quay lại</span>
            <span class="arrow__info">Chọn ghế</span>
        </a>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Attach event listener to all copy buttons
            document.querySelectorAll('.copy-button').forEach(button => {
                button.addEventListener('click', function() {
                    // Get the voucher code from the data attribute
                    const code = this.getAttribute('data-code');

                    // Use the Clipboard API to copy the code
                    navigator.clipboard.writeText(code).then(() => {
                        alert('Mã voucher đã được sao chép: ' + code);
                    }).catch(err => {
                        console.error('Không thể sao chép mã voucher:', err);
                        alert('Không thể sao chép mã voucher. Vui lòng thử lại.');
                    });
                });
            });
        });




        // Combo Modal
        const comboModal = document.getElementById("comboModal");
        const buyComboBtn = document.getElementById("buyComboBtn");

        // Open the combo modal
        buyComboBtn.addEventListener("click", () => comboModal.style.display = "block");

        // Close the combo modal when clicking outside it
        window.addEventListener("click", event => {
            if (event.target === comboModal) comboModal.style.display = "none";
        });

        // Voucher Modal
        const voucherModal = document.getElementById("voucherModal");
        const showVoucherBtn = document.getElementById("showVoucherBtn");

        // Open the voucher modal
        showVoucherBtn.addEventListener("click", () => voucherModal.style.display = "block");

        // Close the voucher modal when clicking outside it
        window.addEventListener("click", event => {
            if (event.target === voucherModal) voucherModal.style.display = "none";
        });

        // Cập nhật tổng giá
        document.querySelectorAll('.combo-quantity').forEach(input =>
            input.addEventListener('input', updateTotalPrice)
        );

        function validateQuantity(input) {
            const max = parseInt(input.max) || 7; // Lấy giá trị max từ thuộc tính `max`
            const value = parseInt(input.value) || 0;

            if (value < 0 || isNaN(value)) {
                input.value = 0; // Đặt giá trị về 0 nếu nhỏ hơn 0 hoặc không hợp lệ
            } else if (value > max) {
                input.value = max; // Đặt giá trị về max nếu vượt quá giá trị tối đa
            }
        }

        function updateTotalPrice() {
            document.querySelectorAll('.combo-quantity').forEach(input => validateQuantity(input));

            const price_combo = [...document.querySelectorAll('.combo-quantity')].reduce((sum, input) => {
                const quantity = parseInt(input.value) || 0;
                const price = parseFloat(input.dataset.price) || 0;
                return sum + (quantity * price);
            }, 0);

            document.getElementById('price-combo').textContent = new Intl.NumberFormat('vi-VN').format(price_combo) +
                ' VNĐ';
        }

        function getPriceCombo() {
            const combos = [...document.querySelectorAll('.combo-quantity')].map(input => ({
                id: input.dataset.comboId,
                quantity: parseInt(input.value) || 0,
                price: parseFloat(input.dataset.price) || 0
            }));
            console.log(combos);
            $.ajax({
                url: '{{ route('user.get.price-combo') }}',
                method: 'POST',
                data: {
                    combos: combos,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response);
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error('Có lỗi xảy ra:', error);
                }
            });
        }
        window.addEventListener('load', function() {
            const sessionCombos = @json(session('booking.combos', []));

            document.querySelectorAll('.combo-quantity').forEach(input => {
                const combo = sessionCombos.find(combo => combo.id == input.dataset.comboId);
                if (combo) {
                    input.value = combo.quantity || 0;
                }
            });
            updateTotalPrice();
        });
        $(document).ready(function() {
            $('#submit-voucher').on('click', function(e) {
                e.preventDefault();
                var voucherCode = $('#voucher').val();

                $.ajax({
                    url: "{{ route('user.get.price-voucher') }}",
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        voucher: voucherCode,
                    },
                    success: function(response) {
                        if (response.success) {
                            alert(response.success); // Hiển thị thông báo thành công
                        } else if (response.error) {
                            alert(response.error); // Hiển thị thông báo lỗi
                        }
                        location.reload(); // Tải lại trang sau khi áp dụng mã giảm giá
                    },
                    error: function(xhr, status, error) {
                        console.error('Có lỗi xảy ra:', error);
                        alert('Có lỗi xảy ra khi áp dụng mã giảm giá.');
                    }
                });
            });
        });

        $(document).ready(function() {
            $('#destroy-voucher').on('click', function(e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ route('user.destroy-voucher') }}", // Updated route for destroying voucher
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}" // CSRF token for Laravel
                    },
                    success: function(response) {
                        if (response.success) {
                            alert(response.success); // Display success message
                        } else if (response.error) {
                            alert(response.error); // Display error message
                        }
                        location.reload(); // Reload page to update voucher state
                    },
                    error: function(xhr, status, error) {
                        console.error('An error occurred:', error);
                        alert('An error occurred while removing the voucher.');
                    }
                });
            });
        });

    </script>

    <t>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const countdownTime = 5 * 60; // 5 minutes in seconds
            let timeRemaining = countdownTime;

            // Function to format time to mm:ss
            function formatTime(seconds) {
                const minutes = Math.floor(seconds / 60);
                const remainingSeconds = seconds % 60;
                return `${minutes}:${remainingSeconds.toString().padStart(2, '0')}`;
            }

            // Update the countdown display every second
            const timerInterval = setInterval(() => {
                const timerDisplay = document.getElementById('payment-timer');

                // Decrease the time remaining
                timeRemaining--;

                if (timeRemaining >= 0) {
                    // Update the displayed timer
                    timerDisplay.textContent = `Thời gian thanh toán: ${formatTime(timeRemaining)}`;
                } else {
                    // Clear the timer and redirect on timeout
                    clearInterval(timerInterval);
                    alert("Thời gian thanh toán của bạn đã hết. Đang chuyển hướng về trang chủ");
                    window.location.href = "{{ route('home') }}"; // Redirect to the previous step
                }
            }, 1000);
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
