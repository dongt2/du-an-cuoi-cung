@extends('theme.layouts.default')

@section('title', 'AMovie - Booking Step 3')

@section('head')
    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <style>
        .checkout-wrapper {
            height: 100%;
            margin-top: 20px;
            margin-bottom: 20px;
            border-bottom: none !important;
        }

        .card {
            height: 280px;
            min-height: 250px;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 8px;
            transition: transform 0.3s ease;
            margin-bottom: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-body {
            height: 30%;
            text-align: center;
        }

        .card-img {
            width: 100%;
            height: 60%;
            background-color: white !important;
        }

        .card-title {
            padding-top: 5px;
            padding-bottom: 5px;
            border-bottom: 1px solid #dddddd;
            border-top: 1px solid #dddddd;
            font-size: 1.1rem;
            font-weight: bold;
        }

        .select-combo {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 0.9rem;
            border-radius: 5px;
            cursor: pointer;
        }

        .select-combo:hover {
            background-color: #0056b3;
        }

        .payment-info, .payment-summary {
            padding: 20px;
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .payment-info h3, .payment-summary h3 {
            margin-bottom: 20px;
            font-size: 1.5rem;
            color: #333;
        }

        .payment-info a, .payment-summary a {
            display: inline-block;
            margin-top: 10px;
            background: #28a745;
            color: white;
            padding: 10px 15px;
            font-size: 0.9rem;
            border-radius: 5px;
            text-decoration: none;
        }

        .payment-info a:hover, .payment-summary a:hover {
            background: #218838;
        }

        #combo-success-message {
            max-width: 500px;
            margin: 0 auto;
            padding: 15px;
            text-align: center;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            border-radius: 5px;
        }
        #combo-success-message {
            max-height: 60px;
            overflow: hidden;
        }

    </style>
@endsection

@section('content')
    <section class="container">
        <div class="order-container">
            <div class="order">
                <img class="order__images" alt="Order Tickets" src="{{ asset('images/tickets.png') }}">
                <p class="order__title">Book a ticket <br><span class="order__descript">and have fun movie time</span></p>
            </div>
        </div>

        <div class="order-step-area">
            <div class="order-step first--step order-step--disable">1. What &amp; Where &amp; When</div>
            <div class="order-step first--step order-step--disable">2. Choose a sit</div>
            <div class="order-step second--step">3. Combo</div>
        </div>
        
        <div class="checkout-wrapper">
            <h3>Chọn Combo</h3>
            <div class="row">
                @if (isset($combos) && $combos->isNotEmpty())
                    @foreach ($combos as $combo)
                        <div class="col-md-4 mb-2">
                            <div class="card">
                                <div class="card-img">
                                    <img src="{{ asset('images/combo.png') }}" alt="Combo Image">
                                </div>
                                <div class="card-title">{{ $combo['short_description'] }}</div>
                                <div class="card-body">
                                    <span class="payment__price">{{ number_format($combo['price'], 0, ',', '.') }} VND</span>
                                    <button class="btn btn-primary select-combo" 
                                            data-id="{{ $combo['id'] }}" 
                                            data-name="{{ $combo['name'] }}" 
                                            data-price="{{ $combo['price'] }}">
                                        Chọn sản phẩm combo
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>Không có combo nào để hiển thị.</p>
                @endif
            </div>
        </div>

        <div id="combo-success-message" class="alert alert-success d-none mt-3">
            Chọn combo thành công!
        </div>

        @if(isset($bookingStep1))
        <div class="payment-summary">
            <h3>Tổng Hóa Đơn</h3>
            <p><strong>Phim:</strong> {{ $bookingStep1['movie_title'] }}</p>
            <p><strong>Ngày:</strong> {{ $bookingStep1['date'] }}</p>
            <p><strong>Giờ:</strong> {{ $bookingStep1['time'] }}</p>
            <p><strong>Combo:</strong> {{ $selectedCombo['name'] ?? 'Không có' }}</p>
            <p><strong>Tổng tiền:</strong> {{ number_format($finalTotal, 0, ',', '.') }} VND</p>
            <a href="{{ route('payment.process') }}" class="btn btn-primary">Thanh Toán</a>
        </div>
        @else
        <p>Thông tin hóa đơn chưa được hoàn thành. Vui lòng quay lại bước 1.</p>
        @endif
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const comboButtons = document.querySelectorAll('.select-combo');
            const successMessage = document.getElementById('combo-success-message');

            comboButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const comboId = this.getAttribute('data-id');
                    const comboName = this.getAttribute('data-name');
                    const comboPrice = this.getAttribute('data-price');

                    fetch('{{ route('booking.combo.select') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            combo_id: comboId,
                            combo_name: comboName,
                            combo_price: comboPrice
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Hiển thị thông báo thành công
                            successMessage.classList.remove('d-none');
                            successMessage.textContent = data.message;

                            // Ẩn thông báo sau 3 giây
                            setTimeout(() => {
                                successMessage.classList.add('d-none');
                            }, 3000);
                        } else {
                            alert('Đã xảy ra lỗi khi chọn combo.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Đã xảy ra lỗi trong quá trình gửi yêu cầu.');
                    });
                });
            });
        });
    </script>
@endpush
