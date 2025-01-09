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
        <div id="timer-display" style="text-align: center; font-size: 20px; font-weight: bold; color: #FF0000; margin-top: 10px;"></div>
        <br>


        <div class="page-content">
            <div class="choose-sits">
                <ul>
                    <li class="sits-price"><strong>Price</strong></li>
                    <li class="sits-price">
                        <div class="square color-1"></div>Ghế cùi
                    </li>
                    <li class="sits-price">
                        <div class="square color-2"></div>Ghế thường
                    </li>
                    <li class="sits-price">
                        <div class="square color-3"></div>Ghế vip
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
                                        } elseif ($item->price >= 30000 && $item->price < 50000) {
                                            $class = 'color-1';
                                        } elseif ($item->price >= 50000 && $item->price < 80000) {
                                            $class = 'color-2';
                                        } elseif ($item->price >= 80000 && $item->price <= 200000) {
                                            $class = 'color-3';
                                        } else {
                                            $class = 'color-5';
                                        }
                                    @endphp
                                    {{-- <div class="grid-cell click {{ $class }}" data-price="{{ $item->price }}">
                                        {{ $item->place }}
                                    </div> --}}
                                    <div class="grid-cell click {{ $class }}" data-seat-id="{{ $item->seat_id }}"
                                         data-price="{{ $item->price }}">
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
                                alert("Hết giờ rồi! Bạn không còn có thể đặt chỗ.");
                                window.location.href = '{{ route('user.booking1') }}';
                            } else if (timeLimit > 0) {
                                let timeRemaining = timeLimit * 60; // Convert minutes to seconds

                                const timerInterval = setInterval(() => {
                                    timeRemaining--;

                                    // Update the timer display
                                    const minutes = Math.floor(timeRemaining / 60);
                                    const seconds = timeRemaining % 60;
                                    document.getElementById('timer-display').textContent = `Thời gian đặt chỗ còn lại: ${minutes}:${seconds.toString().padStart(2, '0')}`;

                                    // Show a warning when 2 minutes are left
                                    if (timeRemaining === 2 * 60) {
                                        alert("Bạn còn 2 phút để hoàn tất việc đặt chỗ của mình!");
                                    }

                                    // Redirect when the timer expires
                                    if (timeRemaining <= 0) {
                                        clearInterval(timerInterval); // Stop the countdown
                                        alert("Hết giờ rồi! Trở lại màn hình chính.");
                                        window.location.href = '{{ route('home') }}';
                                    }
                                }, 1000);
                            }
                        })
                        .catch(error => {
                            console.error("An error occurred:", error);
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

        // Hàm để lấy danh sách các ghế liền kề xung quanh một ghế đã chọn
        function getAdjacentSeats(row, col) {
            const adjacentSeats = [{
                row: String.fromCharCode(row.charCodeAt(0) - 1),
                col: col
            }, // Dưới
                {
                    row: String.fromCharCode(row.charCodeAt(0) + 1),
                    col: col
                }, // Trên
                {
                    row: row,
                    col: col - 1
                }, // Trái
                {
                    row: row,
                    col: col + 1
                }, // Phải
                {
                    row: String.fromCharCode(row.charCodeAt(0) - 1),
                    col: col - 1
                }, // Dưới trái
                {
                    row: String.fromCharCode(row.charCodeAt(0) - 1),
                    col: col + 1
                }, // Dưới phải
                {
                    row: String.fromCharCode(row.charCodeAt(0) + 1),
                    col: col - 1
                }, // Trên trái
                {
                    row: String.fromCharCode(row.charCodeAt(0) + 1),
                    col: col + 1
                }, // Trên phải
            ];

            return adjacentSeats.filter(seat => seat.col >= 1 && seat.col <= 18 && seat.row >= 'A' && seat.row <= 'K');
        }

        // Kiểm tra nếu ghế bị bỏ chọn là một trong các ghế "giữa" trong một chuỗi liên tiếp
        function isMiddleSeat(seat, selectedSeats) {
            // Tạo mảng ghế theo thứ tự cột
            const colSeats = selectedSeats.filter(s => s.row === seat.row).sort((a, b) => a.col - b.col);
            const rowSeats = selectedSeats.filter(s => s.col === seat.col).sort((a, b) => a.row.localeCompare(b.row));


            // Kiểm tra nếu ghế là ghế giữa (có ghế trước và sau)
            return (
                (colSeats.length > 2 && colSeats[1].col === seat.col) ||
                (rowSeats.length > 2 && rowSeats[1].row === seat.row)
            );
        }

        cells.forEach(cell => {
            const originalContent = cell.textContent.trim();

            cell.addEventListener('click', function() {
                const row = originalContent.charAt(0);
                const col = parseInt(originalContent.slice(1));
                const price = this.getAttribute('data-price');

                // Nếu ghế đã được chọn, kiểm tra nếu ghế đó nằm trong những ghế liền kề
                if (this.classList.contains('active')) {
                    // Kiểm tra nếu ghế đang hủy là ghế "giữa"
                    const seatToRemove = {
                        row,
                        col
                    };
                    const isMiddle = isMiddleSeat(seatToRemove, selectedSeats);

                    if (isMiddle) {
                        alert("Không thể bỏ chọn ghế giữa vì các ghế bên cạnh sẽ bị cách nhau!");
                        return;
                    }

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

                    // Kiểm tra nếu ghế thứ 2 hoặc sau phải nằm trong vùng xung quanh bất kỳ ghế nào đã chọn
                    if (selectedSeats.length > 0) {
                        const isValidSeat = selectedSeats.some(seat => {
                            const adjacentSeats = getAdjacentSeats(seat.row, seat.col);
                            return adjacentSeats.some(adjSeat => adjSeat.row === row && adjSeat
                                .col === col);
                        });

                        if (!isValidSeat) {
                            alert("Ghế phải nằm trong khu vực xung quanh ít nhất một ghế đã chọn!");
                            return;
                        }
                    }

                    // Thêm ghế vào mảng đã chọn
                    selectedSeats.push({
                        row,
                        col
                    });

                    // Thêm active và thay đổi màu sắc
                    this.classList.add('active');
                    this.style.color = 'white';
                    this.textContent = originalContent;

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
