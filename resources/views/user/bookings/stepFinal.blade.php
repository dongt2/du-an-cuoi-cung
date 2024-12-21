@extends('theme.layouts.default')
@push('scripts')

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
            background-color: #f9f9f9;
            padding: 10px;
        }

        .card-img img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        /* Phần mô tả và giá */
        .card-title {
            font-size: 1.1rem;
            color: #333;
            margin-bottom: 10px;
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

        .payment-info,
        .payment-summary {
            padding: 20px;
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .payment-info h3,
        .payment-summary h3 {
            margin-bottom: 20px;
            font-size: 1.5rem;
            color: #333;
        }

        .payment-info a,
        .payment-summary a {
            display: inline-block;
            margin-top: 10px;
            background: #28a745;
            color: white;
            padding: 10px 15px;
            font-size: 0.9rem;
            border-radius: 5px;
            text-decoration: none;
        }

        .payment-info a:hover,
        .payment-summary a:hover {
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

        /* Giao diện thẻ combo */
        .combo-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.3s ease;
            text-align: center;
        }

        .combo-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        /* Đảm bảo văn bản trong ô tự động xuống dòng */
        .combo-table td {
            word-wrap: break-word;
            /* Xuống dòng khi từ dài */
            white-space: normal;
            /* Cho phép xuống dòng */
            max-width: 200px;
            /* Giới hạn chiều rộng của ô */
        }

        .combo-table th,
        .combo-table td {
            vertical-align: middle;
            text-align: center;
        }

        .combo-table img {
            object-fit: cover;
            border-radius: 8px;
        }



        .payment__price {
            font-size: 1.2rem;
            color: #d9534f;
            font-weight: bold;
            margin-bottom: 15px;
        }

        /* Sắp xếp label và input cùng hàng */
        .quantity-selector {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 10px;
            /* Khoảng cách giữa label và input */
        }


        .quantity-label {
            font-size: 1rem;
            color: #333;
            white-space: nowrap;
            /* Giữ label trên 1 dòng */
            margin-bottom: 0;
            /* Xóa margin mặc định */
        }

        /* Tăng giảm số lượng input */
        .quantity-input-group {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .quantity-input {
            width: 80px;
            /* Độ rộng cho ô input */
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 5px;
            font-size: 1rem;
            width: 60px;
        }

        /* Thông báo khi không có combo */
        .no-combo-message {
            font-size: 1.1rem;
            color: #555;
        }

        @media (max-width: 768px) {
            .combo-card {
                margin-bottom: 20px;
            }
        }


        .decrease-btn,
        .increase-btn {
            padding: 5px 10px;
            font-size: 1rem;
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
            <div class="table-responsive">
                @if (isset($combos) && $combos->isNotEmpty())
                    <table class="table table-bordered table-hover combo-table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="text-center">Ảnh</th>
                                <th scope="col" class="text-center">Tên sản phẩm</th>
                                <th scope="col" class="text-center">Giá</th>
                                <th scope="col" class="text-center">Số lượng</th>
                                <th scope="col" class="text-center">Gía tiền </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($combos as $combo)
                                <tr>
                                     <!-- Hiển thị ảnh combo -->
            <td class="text-center align-middle">
                <img src="{{ asset('images/combos/' . $combo->image) }}" alt="{{ $combo->combo_name }}" 
                {{-- <img src="{{ asset('images/movies/poster.jpg') }}" alt="Movie Poster"> --}}

                     class="img-thumbnail" style="width: 100px; height: 100px;">
            </td>

                                    <!-- Cột tên sản phẩm -->
                                    <td class="align-middle text-center">
                                        {{ $combo['short_description'] }}
                                    </td>

                                    <!-- Cột giá -->
                                    <td class="align-middle text-center text-danger font-weight-bold">
                                        {{ number_format($combo['price'], 0, ',', '.') }} VND
                                    </td>

                                    <!-- Cột số lượng -->
                                    <td class="align-middle text-center">
                                        <div class="input-group quantity-input-group justify-content-center">
                                            {{-- <button class="btn btn-outline-secondary decrease-btn" type="button">-</button> --}}
                                            {{-- <input type="number" id=`quantity-{{ $combo['id'] }}` --}}
                                            <input type="number" id="{{ $combo['id'] }}""
                                                class="form-control text-center quantity-input" min="0"
                                                max="5" value="0" data-id="{{ $combo['id'] }}"
                                                data-name="{{ $combo['name'] }}" data-price="{{ $combo['price'] }}"
                                                style="width: 60px;">
                                            {{-- <button class="btn btn-outline-secondary increase-btn" type="button">+</button> --}}

                                        </div>
                                    </td>
                                    <!-- Cột giá tiền -->
                                    <td class="align-middle text-center">
                                        {{-- <span id="total-price-{{ $combo['id'] }}" class="total-price"></span> VND --}}
                                        <span class="total-price" data-name="{{ $combo['name'] }}"></span> VND
                                    </td>
                                    {{-- <td>{{ number_format($combo->price * $combo->quantity) }}đ</td> --}}
                                </tr>
                            @endforeach

                            {{-- <tr>
                                    <td class="align-middle text-center">Vé xem phim</td>
                                    <td class="align-middle text-center text-danger font-weight-bold price" data-price="100000">100,000 VND</td>
                                    <td class="align-middle text-center">
                                        <div class="input-group quantity-input-group justify-content-center">
                                            <button class="btn btn-outline-secondary decrease" type="button">-</button>
                                            <input type="number" class="form-control text-center quantity-input" value="0" min="0" style="width: 60px;">
                                            <button class="btn btn-outline-secondary increase" type="button">+</button>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center item-total">0 VND</td>
                                </tr> --}}

                        </tbody>
                    </table>
                    <div class="text-right mt-3">
                        <h4>Tổng tiền tất cả : <span id="grand-total" class="text-danger font-weight-bold">0 VND</span></h4>
                    </div>
                @else
                    <p class="no-combo-message text-center">Không có combo nào để hiển thị.</p>
                @endif
                {{-- <!-- Hiển thị tổng tiền -->
                <div class="text-right mt-3">
                    <h4>Tổng tiền: <span id="total-price" class="text-danger font-weight-bold">0 VND</span></h4>
                </div> --}}

            </div>


        </div>

        {{-- <div id="combo-success-message" class="alert alert-success d-none mt-3">
            Chọn combo thành công!
        </div> --}}

        {{-- @if (isset($bookingStep1))
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
        @endif --}}

        <!-- Step Final -->
        {{-- <h1>Step Final</h1> --}}
        {{-- 
        @if (isset($seats) && count($seats) > 0)
            <h2>Seats and Prices</h2>
            <ul>
                @foreach ($seats as $seat)
                    <li>
                        Seat: {{ isset($seat['name']) ? $seat['name'] : 'N/A' }} -
                        Price: {{ isset($seat['price']) ? $seat['price'] : '0' }}
                    </li>
                @endforeach
            </ul>
            <h3>Total Amount: {{ $totalAmount }}</h3>
        @else
            <p>No seats selected</p>
        @endif --}}


    </section>

    <script>
        // Hàm tính toán giá tiền
        function calculateTotalPrice(id) {
            const quantityInput = document.getElementById(`quantity-${id}`);
            //console.log(quantityInput)
            const price = parseFloat(quantityInput.getAttribute('data-price')); // Lấy giá từ data-price
            const quantity = parseInt(quantityInput.value); // Lấy số lượng
            //console.log(price, quantity);
            const totalPrice = quantity * price; // Tính tổng giá

            // Hiển thị giá tiền vào ô tổng giá
            const totalPriceElement = document.getElementById(`total-price-${id}`);
            //console.log(`Total-${id}` + totalPrice)
            totalPriceElement.textContent = totalPrice.toLocaleString('vi-VN'); // Hiển thị dạng số có dấu chấm
        }
        // Gắn sự kiện cho nút tăng/giảm và ô nhập số lượng
        // document.addEventListener('DOMContentLoaded', function() {
        //     // Lấy tất cả các nút tăng/giảm và ô nhập số lượng
        //     const quantityInputs = document.querySelectorAll('.quantity-input');
        //     const totalPriceElement = document.querySelectorAll('.total-price');
        //     console.log(quantityInputs)
        //     console.log(totalPriceElement)
        //     let grandTotal = 0;
        //     // Sự kiện khi nhập số lượng trực tiếp
        //     quantityInputs.forEach((input, index) => {
        //         input.addEventListener('input', function() {                   

        //             const max = parseInt(this.getAttribute('max'));
        //             const min = parseInt(this.getAttribute('min'));
        //             const price = parseInt(this.getAttribute('data-price'))


        //             let value = parseInt(this.value);
        //             let totalPrice = price * value;

        //             // Kiểm tra giá trị trong khoảng hợp lệ
        //             if (isNaN(value) || value < min) {
        //                 this.value = min;
        //             } else if (value > max) {
        //                 this.value = max;
        //             }

        //             grandTotal += totalPrice; //               
        //             //calculateTotalPrice(id);
        //             totalPriceElement[index].textContent = totalPrice.toLocaleString('vi-VN'); // Hiển thị dạng số có dấu chấm

        //             document.getElementById('grand-total').textContent = grandTotal.toLocaleString('vi-VN') + ' VND';
        //         });

        //     });
        //     //  console.log(grandTotal);
        // });
        document.addEventListener('DOMContentLoaded', function() {
            const quantityInputs = document.querySelectorAll('.quantity-input');
            const totalPriceElements = document.querySelectorAll('.total-price');
            const grandTotalElement = document.getElementById('grand-total'); // Phần tử hiển thị tổng tiền

            // Sự kiện khi nhập số lượng trực tiếp
            quantityInputs.forEach((input, index) => {
                input.addEventListener('input', function() {
                    const max = parseInt(this.getAttribute('max'));
                    const min = parseInt(this.getAttribute('min'));
                    const price = parseInt(this.getAttribute('data-price'));

                    let value = parseInt(this.value);

                    // Kiểm tra giá trị trong khoảng hợp lệ
                    if (isNaN(value) || value < min) {
                        this.value = min;
                        value = min;
                    } else if (value > max) {
                        this.value = max;
                        value = max;
                    }

                    // Tính giá tiền cho combo này
                    const totalPrice = price * value;
                    totalPriceElements[index].textContent = totalPrice.toLocaleString(
                    'vi-VN'); // Hiển thị dạng số có dấu chấm

                    // Tính tổng tiền (grandTotal) lại từ đầu
                    let grandTotal = 0;
                    quantityInputs.forEach((input, idx) => {
                        const qty = parseInt(input.value) || 0;
                        const itemPrice = parseInt(input.getAttribute('data-price'));
                        grandTotal += qty * itemPrice;
                    });

                    // Hiển thị tổng tiền
                    grandTotalElement.textContent = grandTotal.toLocaleString('vi-VN') + ' VND';
                });
            });
        });

        // document.addEventListener('DOMContentLoaded',function() {
        //     let grandTotal = 1;

        //     // document.querySelectorAll('.quantity').forEach(input => {
        //     //     const price = parseInt(input.dataset.price);
        //     //     const quantity = parseInt(input.value);
        //     //     const rowTotal = price * quantity;

        //     //     // Cập nhật giá từng dòng
        //     //     input.closest('tr').querySelector('.row-total').textContent = rowTotal.toLocaleString('vi-VN') +
        //     //         ' VND';

        //     //     // Tính tổng tiền tất cả
        //     //     grandTotal += rowTotal;
        //     // });

        //     // Cập nhật tổng tiền tất cả
        //     document.getElementById('grand-total').textContent = grandTotal.toLocaleString('vi-VN') + ' VND';
        //     console.log(grandTotal);

        // })
    </script>
@endsection



@endpush
