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
                    <div class="btn btn--warning btn-md" id="buyComboBtn">Mua combo</div>
                </div>

                <!-- Modal -->
                <div id="comboModal" class="modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <p style="padding-top: 20px; font-size: 24px;">Combo</p>
                        </div>
                        <div class="modal-body">
                            @foreach ($combos as $item)
                                <div class="combo-container">
                                    <img src="{{ $item->image && Storage::exists($item->image) ? Storage::url($item->image) : asset('images/default.jpg') }}"
                                         alt="Combo Image" class="combo-image">
                                    <div class="combo-details">
                                        <strong class="combo-title">
                                            {{ $item->combo_name ?? 'Unknown' }} - {{ $item->price ? number_format($item->price) : 'N/A' }} VNĐ
                                        </strong>
                                        <p>{{ $item->short_description ?? 'No description available.' }}</p>
                                        <input type="number" class="combo-quantity" data-price="{{ $item->price }}" data-combo-id="{{ $item->combo_id }}" value="0" min="0" max="{{ $item->max_quantity ?? 10 }}" aria-label="Quantity for {{ $item->combo_name }}" aria-describedby="combo-{{ $item->combo_id }}">
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                        <div class="modal-footer">
                            <div class="price">Tổng cộng: <span id="price-combo">0 VNĐ</span></div>
                            <button class="btn btn-success" id="confirmCombos" onclick="getPriceCombo()" disabled>Xác nhận</button>
                        </div>
                    </div>
                </div>
                <!-- Voucher -->
                <h2 class="page-heading" style="clear: both;">Voucher</h2>
                <div class="container" style="float: left; max-width: 600px;">
                    <div class="input-group">
                        <input type="text" name="voucher" id="voucher" value="{{ old('voucher') }}"
                            placeholder="Nhập mã giảm giá" class="voucher">&emsp;
                        <button id="submit-voucher" class="btn btnVoucher"> Xác nhận </button>
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
                            class="book-result__count booking-price">{{ session('booking.showtime_date') }}</span></li>
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
                            class="book-result__count booking-cost price-combo">{{ number_format(session('booking.price_voucher'), 0, ',', '.') }}
                            VNĐ</span></li>

                    @php
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



                    <script>
                        window.addEventListener('load', function() {
                            var totalText = document.getElementById('total').textContent;
                            var totalVND = parseFloat(totalText.replace(/[^\d.-]/g, '').replace(',',
                                '.'));

                            // Kiểm tra xem giá trị total có hợp lệ không
                            if (isNaN(totalVND) || totalVND <= 0) {
                                console.log("Giá trị tổng không hợp lệ");
                            } else {
                                // Giả sử tỷ giá hối đoái là 1 USD = 23,000 VNĐ
                                var exchangeRate = 23000;


                                var totalUSD = (totalVND * 1000 / exchangeRate).toFixed(2);

                                console.log("Tổng giá trị bằng USD: " + totalUSD);

                                // Render PayPal button
                                paypal.Buttons({
                                    createOrder: function(data, actions) {
                                        return actions.order.create({
                                            purchase_units: [{
                                                amount: {
                                                    value: totalUSD // Giá trị tính bằng USD
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
                        });
                    </script>
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
        const modal = document.getElementById("comboModal");
        const buyComboBtn = document.getElementById("buyComboBtn");

        // Mở modal
        buyComboBtn.addEventListener("click", () => modal.style.display = "block");

        // Đóng modal khi bấm ngoài modal
        window.addEventListener("click", event => {
            if (event.target === modal) modal.style.display = "none";
        });

        // Cập nhật tổng giá
        document.querySelectorAll('.combo-quantity').forEach(input =>
            input.addEventListener('input', updateTotalPrice)
        );

        function updateTotalPrice() {
            const MAX_COMBOS = 8; // Total limit

            let totalCombos = 0;
            let valid = true;

            // Calculate the total number of combos selected
            const price_combo = [...document.querySelectorAll('.combo-quantity')].reduce((sum, input) => {
                const quantity = parseInt(input.value) || 0;

                // Increment the total selected combos
                totalCombos += quantity;

                if (totalCombos > MAX_COMBOS) {
                    alert(`You can only select a maximum of ${MAX_COMBOS} combos per ticket.`);
                    input.value = quantity - 1; // Reset the last invalid update
                    valid = false; // Prevent further actions
                }

                const price = parseFloat(input.dataset.price) || 0;
                return valid ? sum + (quantity * price) : sum;
            }, 0);

            // Update the total price display
            document.getElementById('price-combo').textContent = new Intl.NumberFormat('vi-VN').format(price_combo) + ' VNĐ';

            // If needed, disable the confirm button while the limit is breached
            const confirmButton = document.querySelector('.btn-success');
            confirmButton.disabled = totalCombos > MAX_COMBOS;
        }

        function getPriceCombo() {
            const combos = [...document.querySelectorAll('.combo-quantity')].map(input => ({
                id: input.dataset.comboId,
                quantity: parseInt(input.value) || 0,
                price: parseFloat(input.dataset.price) || 0
            }));

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
                        voucher: voucherCode
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
