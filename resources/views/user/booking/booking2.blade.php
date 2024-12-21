@extends('user.layout.default')

@section('title')
    @parent
    Movie
@endsection

@section('style')
    <!-- Mobile Specific Metas-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="telephone=no" name="format-detection">

    <!-- Fonts -->
    <!-- Font awesome - icon font -->
    <link href="{{ asset('../netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css') }}" rel="stylesheet">
    <!-- Roboto -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>

    <!-- Stylesheets -->

    <!-- Mobile menu -->
    <link href="{{ asset('css/gozha-nav.css') }}" rel="stylesheet" />
    <!-- Select -->
    <link href="{{ asset('css/external/jquery.selectbox.css') }}" rel="stylesheet" />

    <!-- Custom -->
    <link href="{{ asset('css/style3860.css?v=1') }}" rel="stylesheet" />

    <!-- Modernizr -->
    <script src="{{ asset('js/external/modernizr.custom.js') }}"></script>

    <style>
        .choose-sits {
            padding: 10px;
            width: 50%;
            margin: 0 auto;
        }

        .choose-sits ul {
            display: flex;
            justify-content: space-between;
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sits-price {
            display: flex;
            align-items: center;
        }

        .square {
            width: 10px;
            height: 10px;
            margin-right: 8px;
            display: inline-block;
        }

        .sits-anchor {
            text-align: center;
            color: #969b9f;
        }

        .screen {
            margin: 0 auto;
            background-color: #969b9f;
            width: 25%;
        }

        .seat {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 90%;
            margin: 0 auto;
            /* border: 2px solid #333; */
            height: 520px;
        }

        .grid-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
            width: 70%;
            /* border: 2px solid #333; */
        }

        .grid-left {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .grid-row {
            display: flex;
            justify-content: center;
            gap: 5px;
            font-size: 13px;
        }

        .grid-left .grid-row {
            flex-direction: column;
            align-items: center;
        }

        .grid-left .grid-cell {
            margin-top: 5.5px;
        }

        .grid-cell,
        .grid-letter,
        .grid-number {
            width: 30px;
            height: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #4c4145;
            font-family: 'Arial', sans-serif;
        }

        .click {
            font-size: 11px;
            color: transparent;
            transition: background-color 0.2s, color 0.2s;
        }

        .click:hover {
            background-color: #65565c;
            color: white;
        }

        .click.active {
            background-color: #4c4145;
            color: white;
        }

        .color-1 {
            background-color: #fff0c7;
        }

        .color-2 {
            background-color: #ffc8cb;
        }

        .color-3 {
            background-color: #cdb4bd;
        }

        .color-4 {
            background-color: #dbdee1;
            pointer-events: none;
            cursor: default;
        }

        .color-5 {
            background-color: #fa5050;
            pointer-events: none;
            cursor: default;
        }
    </style>
@endsection

@section('content')
    <br><br><br><br>
    <div class="place-form-area">
        <div class="container">
            <div class="order">
                <img class="order__images" alt='' src="{{ asset('images/tickets.png') }}">
                <p class="order__title">Book a ticket <br><span class="order__descript">and have fun movie time</span></p>
                <div class="order__control">
                    <a href="#" class="order__control-btn active">Purchase</a>
                    <a href="#" class="order__control-btn">Reserve</a>
                </div>
            </div>
            <br><br>
            <div class="order-step-area">
                <div class="order-step first--step order-step--disable ">1. What &amp; Where &amp; When</div>
                <div class="order-step second--step">2. Choose a sit</div>
            </div>
        </div>
        <br><br><br>
        <div class="page-content">
            <div class="choose-sits">
                <ul>
                    <li class="sits-price"><strong>Price</strong></li>
                    <li class="sits-price">
                        <div class="square color-1"></div>$10
                    </li>
                    <li class="sits-price">
                        <div class="square color-2"></div>$20
                    </li>
                    <li class="sits-price">
                        <div class="square color-3"></div>$30
                    </li>&ensp;||&ensp;
                    <li class="sits-price">
                        <div class="square color-4"></div>Ghế đã đặt
                    </li>
                    <li class="sits-price">
                        <div class="square color-5"></div>Ghế đã hỏng
                    </li>
                    <li class="sits-price">
                        <div class="square" style="background-color: #4c4145"></div>Chọn
                    </li>
                </ul>
            </div>

            <div class="sits-area">
                <div class="sits-anchor">Screen</div>
                <div class="screen"></div>
            </div><br><br>

            <div class="seat">
                <div class="grid-left">
                    <div class="grid-row">
                        <div class="grid-cell grid-letter">A</div>
                        <div class="grid-cell grid-letter">B</div>
                        <div class="grid-cell grid-letter">C</div>
                        <div class="grid-cell grid-letter">D</div>
                        <div class="grid-cell grid-letter">E</div>
                        <div class="grid-cell grid-letter">F</div>
                        <div class="grid-cell grid-letter">G</div>
                        <div class="grid-cell grid-letter">I</div>
                        <div class="grid-cell grid-letter">J</div>
                        <div class="grid-cell grid-letter">K</div>
                        <div class="grid-cell grid-letter">L</div>
                    </div>
                </div>
                <div class="grid-container">
                    <!-- 4 hàng đầu -->
                    <div class="grid-row">
                        @foreach ($data as $item)
                            @if (strpos($item->place, 'A') === 0)
                                @php
                                    if ($item->status === 'Đã đặt') {
                                        $class = 'color-4';
                                    } elseif ($item->status === 'Đã hỏng') {
                                        $class = 'color-5';
                                    } else {
                                        $class = 'color-1';
                                    }
                                @endphp
                                <div class="grid-cell click {{ $class }}" data-price="{{ $item->price }}">
                                    {{ $item->place }}</div>
                            @endif
                        @endforeach
                    </div>
                    <div class="grid-row">
                        @foreach ($data as $item)
                            @if (strpos($item->place, 'B') === 0)
                                @php
                                    if ($item->status === 'Đã đặt') {
                                        $class = 'color-4';
                                    } elseif ($item->status === 'Đã hỏng') {
                                        $class = 'color-5';
                                    } else {
                                        $class = 'color-1';
                                    }
                                @endphp
                                <div class="grid-cell click {{ $class }}" data-price="{{ $item->price }}">
                                    {{ $item->place }}</div>
                            @endif
                        @endforeach
                    </div>
                    <div class="grid-row">
                        @foreach ($data as $item)
                            @if (strpos($item->place, 'C') === 0)
                                @php
                                    if ($item->status === 'Đã đặt') {
                                        $class = 'color-4';
                                    } elseif ($item->status === 'Đã hỏng') {
                                        $class = 'color-5';
                                    } else {
                                        $class = 'color-1';
                                    }
                                @endphp
                                <div class="grid-cell click {{ $class }}" data-price="{{ $item->price }}">
                                    {{ $item->place }}</div>
                            @endif
                        @endforeach
                    </div>
                    <div class="grid-row">
                        @foreach ($data as $item)
                            @if (strpos($item->place, 'D') === 0)
                                @php
                                    if ($item->status === 'Đã đặt') {
                                        $class = 'color-4';
                                    } elseif ($item->status === 'Đã hỏng') {
                                        $class = 'color-5';
                                    } else {
                                        $class = 'color-1';
                                    }
                                @endphp
                                <div class="grid-cell click {{ $class }}" data-price="{{ $item->price }}">
                                    {{ $item->place }}</div>
                            @endif
                        @endforeach
                    </div>

                    <!-- 4 hàng giữa -->
                    <div class="grid-row">
                        @foreach ($data as $item)
                            @if (strpos($item->place, 'E') === 0)
                                @php
                                    if ($item->status === 'Đã đặt') {
                                        $class = 'color-4';
                                    } elseif ($item->status === 'Đã hỏng') {
                                        $class = 'color-5';
                                    } else {
                                        $class = 'color-2';
                                    }
                                @endphp
                                <div class="grid-cell click {{ $class }}" data-price="{{ $item->price }}">
                                    {{ $item->place }}</div>
                            @endif
                        @endforeach
                    </div>
                    <div class="grid-row">
                        @foreach ($data as $item)
                            @if (strpos($item->place, 'F') === 0)
                                @php
                                    if ($item->status === 'Đã đặt') {
                                        $class = 'color-4';
                                    } elseif ($item->status === 'Đã hỏng') {
                                        $class = 'color-5';
                                    } else {
                                        $class = 'color-2';
                                    }
                                @endphp
                                <div class="grid-cell click {{ $class }}" data-price="{{ $item->price }}">
                                    {{ $item->place }}</div>
                            @endif
                        @endforeach
                    </div>
                    <div class="grid-row">
                        @foreach ($data as $item)
                            @if (strpos($item->place, 'G') === 0)
                                @php
                                    if ($item->status === 'Đã đặt') {
                                        $class = 'color-4';
                                    } elseif ($item->status === 'Đã hỏng') {
                                        $class = 'color-5';
                                    } else {
                                        $class = 'color-2';
                                    }
                                @endphp
                                <div class="grid-cell click {{ $class }}" data-price="{{ $item->price }}">
                                    {{ $item->place }}</div>
                            @endif
                        @endforeach
                    </div>
                    <div class="grid-row">
                        @foreach ($data as $item)
                            @if (strpos($item->place, 'I') === 0)
                                @php
                                    if ($item->status === 'Đã đặt') {
                                        $class = 'color-4';
                                    } elseif ($item->status === 'Đã hỏng') {
                                        $class = 'color-5';
                                    } else {
                                        $class = 'color-2';
                                    }
                                @endphp
                                <div class="grid-cell click {{ $class }}" data-price="{{ $item->price }}">
                                    {{ $item->place }}</div>
                            @endif
                        @endforeach
                    </div>

                    <!-- 3 hàng cuối -->
                    <div class="grid-row">
                        @foreach ($data as $item)
                            @if (strpos($item->place, 'J') === 0)
                                @php
                                    if ($item->status === 'Đã đặt') {
                                        $class = 'color-4';
                                    } elseif ($item->status === 'Đã hỏng') {
                                        $class = 'color-5';
                                    } else {
                                        $class = 'color-3';
                                    }
                                @endphp
                                <div class="grid-cell click {{ $class }}" data-price="{{ $item->price }}">
                                    {{ $item->place }}</div>
                            @endif
                        @endforeach
                    </div>
                    <div class="grid-row">
                        @foreach ($data as $item)
                            @if (strpos($item->place, 'K') === 0)
                                @php
                                    if ($item->status === 'Đã đặt') {
                                        $class = 'color-4';
                                    } elseif ($item->status === 'Đã hỏng') {
                                        $class = 'color-5';
                                    } else {
                                        $class = 'color-3';
                                    }
                                @endphp
                                <div class="grid-cell click {{ $class }}" data-price="{{ $item->price }}">
                                    {{ $item->place }}</div>
                            @endif
                        @endforeach
                    </div>
                    <div class="grid-row">
                        @foreach ($data as $item)
                            @if (strpos($item->place, 'L') === 0)
                                @php
                                    if ($item->status === 'Đã đặt') {
                                        $class = 'color-4';
                                    } elseif ($item->status === 'Đã hỏng') {
                                        $class = 'color-5';
                                    } else {
                                        $class = 'color-3';
                                    }
                                @endphp
                                <div class="grid-cell click {{ $class }}" data-price="{{ $item->price }}">
                                    {{ $item->place }}</div>
                            @endif
                        @endforeach
                    </div>
                    <!-- hàng số -->
                    <div class="grid-row" style="padding-top: 30px;">
                        <div class="grid-cell grid-number">1</div>
                        <div class="grid-cell grid-number">2</div>
                        <div class="grid-cell grid-number">3</div>
                        <div class="grid-cell grid-number">4</div>
                        <div class="grid-cell grid-number">5</div>
                        <div class="grid-cell grid-number">6</div>
                        <div class="grid-cell grid-number">7</div>
                        <div class="grid-cell grid-number">8</div>
                        <div class="grid-cell grid-number">9</div>
                        <div class="grid-cell grid-number">10</div>
                        <div class="grid-cell grid-number">11</div>
                        <div class="grid-cell grid-number">12</div>
                        <div class="grid-cell grid-number">13</div>
                        <div class="grid-cell grid-number">14</div>
                        <div class="grid-cell grid-number">15</div>
                        <div class="grid-cell grid-number">16</div>
                        <div class="grid-cell grid-number">17</div>
                        <div class="grid-cell grid-number">18</div>
                    </div>
                </div>
            </div>

            <div id="price-display" style="text-align: center;">Giá: 0</div>


            <form id='film-and-time' class="booking-form" method='post' action='{{ route('user.bookingStore3') }}'>
                @csrf
                <input type="text" id="total-price" name="total_price" value="0" readonly />
                <div id="input-container"></div>

                <div class="booking-pagination booking-pagination--margin">
                    <a href="javascript:void(0);" class="booking-pagination__prev" onclick="history.back()">
                        <span class="arrow__text arrow--prev">prev step</span>
                        <span class="arrow__info">what&amp;where&amp;when</span>
                    </a>
                    <a href="javascript:void(0);" class="booking-pagination__next" id="submit-form">
                        <span class="arrow__text arrow--next">next step</span>
                        <span class="arrow__info">checkout</span>
                    </a>
                </div>
            </form>
            <script>
                document.getElementById('submit-form').addEventListener('click', function(e) {
                    e.preventDefault(); // Ngăn việc gửi form mặc định

                    // Kiểm tra xem có bất kỳ input nào trong container không (tức là người dùng đã chọn ghế)
                    const inputContainer = document.getElementById('input-container');
                    if (inputContainer.children.length === 0) {
                        alert("Vui lòng chọn ít nhất một ghế.");
                        return; // Dừng không gửi form nếu không có ghế được chọn
                    }

                    // Nếu có ghế được chọn, tiến hành gửi form
                    document.getElementById('film-and-time').submit();
                });
            </script>


        </div>
    </div>
@endsection

@section('script')
    <script>
        // click
        const cells = document.querySelectorAll('.click');
        const maxSeats = 8; // Giới hạn số ghế
        let selectedSeats = [];

        cells.forEach(cell => {
            // Lưu nội dung ban đầu cho mỗi ô trong vòng lặp
            const originalContent = cell.textContent.trim();

            cell.addEventListener('click', function() {
                const row = originalContent.charAt(0);
                const col = parseInt(originalContent.slice(1));

                // Lấy giá trị data-price từ ô đã click
                const price = this.getAttribute('data-price');

                if (this.classList.contains('active')) {
                    // Nếu đã active, xóa active và khôi phục nội dung ban đầu
                    this.classList.remove('active'); // Xóa class active
                    this.style.removeProperty('color'); // Xóa thuộc tính color
                    this.textContent = originalContent; // Khôi phục lại nội dung ban đầu

                    // Xóa ghế đã chọn khỏi mảng
                    selectedSeats = selectedSeats.filter(seat => seat.row !== row || seat.col !== col);

                    // Xóa thẻ input đã thêm
                    const inputElement = document.getElementById(`input-${row}${col}`);
                    if (inputElement) {
                        inputElement.remove(); // Xóa thẻ input
                    }

                } else {
                    // Nếu chưa active, kiểm tra số ghế đã chọn
                    if (selectedSeats.length >= maxSeats) {
                        alert("Bạn chỉ được chọn nhiều nhất 8 ghế!");
                        return; // Dừng không cho chọn thêm
                    }

                    // Kiểm tra khoảng cách với các ghế đã chọn
                    for (let seat of selectedSeats) {
                        const rowDiff = Math.abs(seat.row.charCodeAt(0) - row.charCodeAt(
                            0)); // Khoảng cách hàng
                        const colDiff = Math.abs(seat.col - col); // Khoảng cách cột
                        if (rowDiff > 3 || colDiff > 3) {
                            alert("Vui lòng chọn ghế cách nhau tối đa 3 ô!");
                            return; // Dừng không cho chọn thêm
                        }
                    }

                    // Thêm active và hiện hình ảnh
                    this.classList.add('active'); // Thêm class active
                    this.style.color = 'white'; // Thiết lập màu chữ
                    this.textContent = originalContent;

                    // Thêm ghế vào mảng đã chọn
                    selectedSeats.push({
                        row,
                        col
                    });

                    // Tạo thẻ input
                    const input = document.createElement('input');
                    input.type = 'text'; // Đặt loại input là text
                    input.value = originalContent;
                    input.id = `input-${row}${col}`;
                    input.name = originalContent;
                    // input.style.display = 'block';

                    // Thêm data-price vào input
                    input.setAttribute('data-price', price); // Gán giá trị data-price cho input

                    // Thêm input vào vùng chứa chính
                    document.getElementById('input-container').appendChild(input);
                }

                // Tính tổng data-price của các ô input đã tạo
                const inputs = document.querySelectorAll('#input-container input');
                let totalPrice = 0;

                inputs.forEach(input => {
                    const price = parseFloat(input.getAttribute('data-price'));
                    if (!isNaN(price)) {
                        totalPrice += price; // Cộng dồn giá trị của data-price
                    }
                });

                // console.log('Tổng giá trị của các ghế đã chọn: ' + totalPrice);
                document.getElementById('total-price').value = totalPrice;
                document.getElementById('price-display').textContent = `Giá: ${totalPrice}`;
            });
        });
    </script>
@endsection
