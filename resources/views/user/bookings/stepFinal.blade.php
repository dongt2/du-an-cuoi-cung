@extends('theme.layouts.default')

@section('title', 'AMovie - Booking Step 3')

@section('head')
    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <style>
        .checkout-wrapper {
            margin-top: 20px;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            transition: transform 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-body {
            text-align: center;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .card-text {
            margin: 10px 0;
            font-size: 1rem;
            color: #555;
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

        .payment-info {
            margin-top: 40px;
            padding: 20px;
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .payment-info h3 {
            margin-bottom: 20px;
            font-size: 1.5rem;
            color: #333;
        }

        .payment-info p {
            margin: 5px 0;
            font-size: 1rem;
            color: #555;
        }

        .payment-info a {
            display: inline-block;
            margin-top: 10px;
            background: #28a745;
            color: white;
            padding: 10px 15px;
            font-size: 0.9rem;
            border-radius: 5px;
            text-decoration: none;
        }

        .payment-info a:hover {
            background: #218838;
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
        <div class="order-step order-step--disable">1. What &amp; Where &amp; When</div>
        <div class="order-step order-step--disable">2. Choose a sit</div>
        <div class="order-step order-step--active">3. Combo</div>
    </div>

    <div class="checkout-wrapper">
        <h3>Chọn Combo</h3>
        <div class="row">
            @if(isset($combos) && $combos->isNotEmpty())
                @foreach ($combos as $combo)
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $combo['name'] }}</h5>
                            <p class="card-text">Giá: {{ number_format($combo['price'], 0, ',', '.') }} VND</p>
                            <h3 class="payment__title">{{ $combo['name'] }}</h3>
                            <p class="payment__subtitle">{{ $combo['short_description'] ?? 'Mô tả không khả dụng' }}</p>
                            <span class="payment__price">{{ number_format($combo['price'], 0, ',', '.') }} VND</span>
                            <button 
                                class="btn btn-primary select-combo" 
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

    <div class="payment-info">
        <h3>Thông tin Thanh Toán</h3>
        @if (isset($selectedCombo) && $selectedCombo)
            <p><strong>Tên Combo:</strong> {{ $selectedCombo['name'] }}</p>
            <p><strong>Giá:</strong> {{ number_format($selectedCombo['price'], 0, ',', '.') }} VND</p>
            <a href="{{ route('booking.payment') }}" class="btn btn-success">Tiếp tục Thanh Toán</a>
        @else
            <p>Không có combo nào được chọn.</p>
        @endif
    </div>
</section>
@endsection

@section('javascript')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.querySelectorAll('.select-combo').forEach(button => {
            button.addEventListener('click', function() {
                const comboId = this.getAttribute('data-id');
                const comboName = this.getAttribute('data-name');
                const comboPrice = this.getAttribute('data-price');

                fetch('{{ route("booking.combo.select") }}', {
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
                        alert(data.message);
                        window.location.href = '{{ route("booking.payment") }}';
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    </script>
@endsection
