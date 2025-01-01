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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
            width: 55%;
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
            margin-bottom: 4px;
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

        #timer-display{
            text-align: center;
            font-size: 20px;
            font-weight: 700;
            color: #fe505a;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        }
    </style>
@endsection

@section('content')
    <br><br><br><br>
    <div class="place-form-area">
        <div class="container">
            <div class="order">
                <img class="order__images" alt='' src="{{ asset('images/tickets.png') }}">
                <p class="order__title">Đặt vé <br><span class="order__descript">chúc bạn có thời gian xem phim vui vẻ</span></p>
            </div>
            <br><br>
            <div class="order-step-area">
                <div class="order-step first--step order-step--disable">1. Chọn phim &amp; phòng &amp; xuất chiếu</div>
                <div class="order-step second--step">2. Chọn ghế ngồi</div>
            </div>
        </div>
        <br><br>
        <div id="timer-display"></div>
        <br>


        <div class="page-content">
            <div class="choose-sits">
                <ul>
                    <li class="sits-price"><strong>Giá ghế</strong></li>
                    <li class="sits-price">
                        <div class="square color-1"></div>30.000 VNĐ
                    </li>
                    <li class="sits-price">
                        <div class="square color-2"></div>50.000 VNĐ
                    </li>
                    <li class="sits-price">
                        <div class="square color-3"></div>70.000 VNĐ
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
                <div class="sits-anchor">Màn hình</div>
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
                        <div class="grid-cell grid-letter">H</div>
                        <div class="grid-cell grid-letter">I</div>
                        <div class="grid-cell grid-letter">J</div>
                        <div class="grid-cell grid-letter">K</div>
                    </div>
                </div>
                <div class="grid-container">
                    <!-- hàng chữ -->
                    @foreach (range('A', 'K') as $row)
                        <div class="grid-row">
                            @foreach ($data as $item)
                                @if (strpos($item->place, $row) === 0)
                                    @php
                                        if ($item->status === 'Đã đặt') {
                                            $class = 'color-4';
                                        } elseif ($item->status === 'Đã hỏng') {
                                            $class = 'color-5';
                                        } elseif ($item->price === '30000') {
                                            $class = 'color-1';
                                        } elseif ($item->price === '50000') {
                                            $class = 'color-2';
                                        } elseif ($item->price === '70000') {
                                            $class = 'color-3';
                                        } else {
                                            $class = 'color-5';
                                        }
                                    @endphp
                                    {{-- <div class="grid-cell click {{ $class }}" data-price="{{ $item->price }}">
                                        {{ $item->place }}
                                    </div> --}}
                                    <div class="grid-cell ghe click {{ $class }}" data-seat-id="{{ $item->seat_id }}" data-price="{{ $item->price }}">
                                        {{ $item->place }}
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
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
            <br>
            <div id="price-display" class="display-price">Giá: 0 VNĐ</div>


            <form id='film-and-time' class="booking-form" method='post' action='{{ route('user.bookingStore3') }}'>
                @csrf
                <input type="text" id="price_ticket" name="price_ticket" value="0" readonly />
                <div id="input-container"></div>

                <div class="booking-pagination booking-pagination--margin">
                    <a href="javascript:void(0);" class="booking-pagination__prev" onclick="history.back()">
                        <span class="arrow__text arrow--prev">Quay lại</span>
                        <span class="arrow__info">1. Chọn phim &amp; phòng &amp; xuất chiếu</span>
                    </a>
                    <a href="javascript:void(0);" class="booking-pagination__next" id="submit-form">
                        <span class="arrow__text arrow--next">Bước tiếp theo</span>
                        <span class="arrow__info">Chọn combo &amp; thanh toán</span>
                    </a>
                </div>
            </form>
            <script>
                document.getElementById('submit-form').addEventListener('click', function(e) {
                    e.preventDefault();

                    // Kiểm tra xem ghế đã được chọn chưa
                    const inputContainer = document.getElementById('input-container');
                    if (inputContainer.children.length === 0) {
                        alert("Vui lòng chọn ít nhất một ghế.");
                        return;
                    }

                    // Nếu có ghế được chọn, tiến hành gửi form
                    document.getElementById('film-and-time').submit();
                });
            </script>


            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    fetch('{{ route('booking.timeLimit') }}')
                        .then(response => response.json())
                        .then(data => {
                            const timeLimit = data.time_limit;

                            if (timeLimit === -1) {
                                alert("Không có thời gian để sắp xếp chỗ ngồi. Hệ thống sẽ tự động hủy bước xếp chỗ ngồi.");
                                window.location.href = '{{ route('user.booking1') }}';
                            } else if (timeLimit > 0) {
                                let timeRemaining = timeLimit * 60; // Convert minutes to seconds
                                const warningTime = 2 * 60; // 2 minutes before time limit

                                const timerInterval = setInterval(() => {
                                    timeRemaining--;


                                        if (timeRemaining === warningTime) {
                                            alert("Bạn còn 2 phút để chọn chỗ ngồi.");
                                        }


                                    if (timeRemaining <= 0) {
                                        clearInterval(timerInterval);
                                        alert("Đã hết thời gian! Hệ thống sẽ tự động hủy bước xếp chỗ ngồi.");
                                        window.location.href = '{{ route('user.booking1') }}';
                                    }

                                    // Update the timer display (if you have one)
                                    document.getElementById('timer-display').textContent = `Thời gian chờ: ${Math.floor(timeRemaining / 60)}:${timeRemaining % 60}`;
                                }, 1000);
                            }
                        });
                });
            </script>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const cells = document.querySelectorAll('.click');
        const maxSeats = 9; // Giới hạn số ghế
        let selectedSeats = [];

        cells.forEach(cell => {
            const originalContent = cell.textContent.trim();

            cell.addEventListener('click', function() {
                const row = originalContent.charAt(0);
                const col = parseInt(originalContent.slice(1));
                const price = this.getAttribute('data-price');

                if (this.classList.contains('active')) {
                    // Nếu đã active, xóa active và khôi phục nội dung ban đầu
                    this.classList.remove('active');
                    this.style.removeProperty('color');
                    this.textContent = originalContent;

                    // Xóa ghế đã chọn khỏi mảng
                    selectedSeats = selectedSeats.filter(seat => seat.row !== row || seat.col !== col);

                    // Xóa thẻ input đã thêm
                    const inputElement = document.getElementById(`input-${row}${col}`);
                    if (inputElement) {
                        inputElement.remove();
                    }
                } else {
                    // Kiểm tra số ghế đã chọn
                    if (selectedSeats.length >= maxSeats) {
                        alert("Bạn chỉ được chọn nhiều nhất 9 ghế!");
                        return;
                    }

                    // Kiểm tra tính hợp lệ của ghế được chọn
                    if (selectedSeats.length > 0) {
                        const isSameRow = selectedSeats.every(seat => seat.row === row);
                        const isSameCol = selectedSeats.every(seat => seat.col === col);

                        if (isSameRow) {
                            // Kiểm tra tính liền kề trong cùng hàng
                            const cols = selectedSeats.map(seat => seat.col).sort((a, b) => a - b);
                            const minCol = cols[0];
                            const maxCol = cols[cols.length - 1];
                            if (col < minCol - 1 || col > maxCol + 1) {
                                alert("Các ghế cùng hàng phải liền kề nhau!");
                                return;
                            }
                        } else if (isSameCol) {
                            // Kiểm tra tính liền kề trong cùng cột
                            const rows = selectedSeats.map(seat => seat.row.charCodeAt(0)).sort((a, b) =>
                                a - b);
                            const minRow = rows[0];
                            const maxRow = rows[rows.length - 1];
                            if (row.charCodeAt(0) < minRow - 1 || row.charCodeAt(0) > maxRow + 1) {
                                alert("Các ghế cùng cột phải liền kề nhau!");
                                return;
                            }
                        } else {
                            // Kiểm tra khoảng cách giữa các ghế không cùng hàng/cột
                            for (let seat of selectedSeats) {
                                const rowDiff = Math.abs(seat.row.charCodeAt(0) - row.charCodeAt(0));
                                const colDiff = Math.abs(seat.col - col);
                                if (rowDiff > 2 || colDiff > 2) {
                                    alert("Vui lòng chọn ghế cách nhau không quá 2 ô!");
                                    return;
                                }
                            }
                        }
                    }

                    // Thêm active và hiện hình ảnh
                    this.classList.add('active');
                    this.style.color = 'white';
                    this.textContent = originalContent;

                    // Thêm ghế vào mảng đã chọn
                    selectedSeats.push({
                        row,
                        col
                    });

                    // Tạo thẻ input
                    const input = document.createElement('input');
                    input.type = 'text';
                    input.value = originalContent;
                    input.id = `input-${row}${col}`;
                    input.name = originalContent;
                    input.setAttribute('data-price', price);
                    document.getElementById('input-container').appendChild(input);
                }

                // Tính tổng giá trị data-price
                const inputs = document.querySelectorAll('#input-container input');
                let totalPrice = 0;

                inputs.forEach(input => {
                    const price = parseFloat(input.getAttribute('data-price'));
                    if (!isNaN(price)) {
                        totalPrice += price;
                    }
                });

                // Định dạng số với dấu chấm phân cách hàng nghìn và thêm "đ" vào cuối
                const formattedPrice = new Intl.NumberFormat('vi-VN').format(totalPrice);

                document.getElementById('price_ticket').value = totalPrice;
                document.getElementById('price-display').textContent = `Giá: ${formattedPrice} VNĐ`;

            });
        });


    </script>

@endsection
