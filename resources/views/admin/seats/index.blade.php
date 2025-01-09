@extends('admin.layout.default')

@section('title')
    @parent
    Seat
@endsection

@push('style')
    <!-- Datatables css -->
    <link href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"
          type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet"
          type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-keytable-bs5/css/keyTable.bootstrap5.min.css') }}" rel="stylesheet"
          type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet"
          type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css') }}" rel="stylesheet"
          type="text/css" />
@endpush

@section('content')
    <style>
        .choose-sits {
            padding: 10px;
            width: 80%;
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
            height: 4px;
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
            height: 503px;
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
            /* pointer-events: none; */
            /* cursor: default; */
        }

        .color-5 {
            background-color: #fa5050;
        }

        .btn-seat {
            width: 50%;
            display: flex;
            margin: 0 auto;
            padding-top: 20px;
        }

        .action-button {
            margin: 5px;
            padding: 5px;
            color: white;
            text-align: center;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            transition: background-color 0.1s, transform 0.1s;
        }

        .action-button:hover {
            background-color: #0066d2;
        }

        .action-button:active {
            background-color: #004b9c;
            transform: scale(0.95);
        }

        .active-btn {
            background-color: #00448d !important;
        }

        .modal {
            font-family: 'Arial', sans-serif;
            display: flex;
            position: fixed;
            z-index: 1;
            left: 605px;
            top: -60px;
            width: 100%;
            height: 100%;
            overflow: auto;
        }

        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 260px;
            position: relative;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>

    <div class="page-content">
        @php
            $showtime_id = request()->input('showtime');
            // echo $showtime_id;
        @endphp
        <form action="{{ route('admin.seat.index') }}" method="GET">
            <label for="showtime">Chọn Xuất Chiếu:</label>
            <select id="showtime" name="showtime">
                <option value="0" selected>Chọn xuất chiếu</option>
                @foreach ($showtimes as $item)
                    <option value="{{ $item->showtime_id }}">{{ $item->showtime_id }}--&emsp;Phim:
                        {{ $item->movie->title ?? 'Chưa xác định' }}&emsp;-&emsp;Phòng:
                        {{ $item->screen->screen_name ?? 'Chưa xác định' }}&emsp;-
                        &emsp;Ngày: {{ $item->showtime_date }}&emsp;-&emsp;Giờ: {{ $item->time }}</option>
                @endforeach
            </select>
            <button type="submit">Xác nhận</button>
        </form>


        <div class="choose-sits">
            <ul>
                <li class="sits-price"><strong>Giá</strong></li>
                <li class="sits-price">
                    <div class="square color-1"></div>Ghế cùi: 30.000Đ - 49.000Đ
                </li>
                <li class="sits-price">
                    <div class="square color-2"></div>Ghế thường: 50.000Đ - 79.000Đ
                </li>
                <li class="sits-price">
                    <div class="square color-3"></div>Ghế vip: 80.000Đ - 200.000Đ
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
            <div class="sits-anchor">screen</div>
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
                @php
                    $rows = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K'];
                @endphp
                @foreach ($rows as $row)
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
                                <div class="grid-cell click {{ $class }}">{{ $item->place }}</div>
                            @endif
                        @endforeach
                    </div>
                @endforeach

                <!-- hàng số -->
                <div class="grid-row" style="margin-top: auto;">
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

        <div class="btn-seat">
            <div class="action-button" id="btn-add-seat" style="background-color: #800080;" onclick="showModal()">Thêm
                ghế</div>
            <div class="action-button" id="btn-add-seat" style="background-color: #42d17d;" onclick="showModal1()">Thêm
                nhiều
                ghế</div>
            <form action="{{ route('admin.seat.update', $showtime_id) }}" style="display: flex;" method="POST">
                @csrf
                @method('PUT')
                <div id="input-container"></div>
                <input type="hidden" name="showtime_id" value="{{ $showtime_id }}">
                <div class="action-button" id="btn-update-seat" style="background-color: #20B2AA;" onclick="editModal()">Sửa
                    ghế</div>
                <div class="action-button" id="btn-empty" style="background-color: #00BFFF;"
                     onclick="setInputValue('Còn trống')">Còn trống</div>
                <div class="action-button" id="btn-occupied" style="background-color: #008000;"
                     onclick="setInputValue('Đã đặt')">Đã đặt</div>
                <div class="action-button" id="btn-broken" style="background-color: #FFD700;"
                     onclick="setInputValue('Đã hỏng')">Đã hỏng</div>
                <button hidden class="action-button auto-submit" type="submit">Cập nhật</button>
            </form>&emsp;&emsp;
            <form action="{{ route('admin.seat.destroy', $showtime_id) }}" method="POST" id="delete-form">
                @csrf
                @method('delete')
                <div id="input-container-destroy"></div>
                <button type="button" class="action-button" style="background-color: #FF4500;"
                        onclick="checkInputsAndSubmit()">Xóa ghế</button>
            </form>
        </div>

        <!-- Modal thêm ghế -->
        <div id="add-seat-modal" class="modal" style="display: none;">
            <div class="modal-content">
                <br>
                <span class="close" onclick="closeModal()">&times;</span>
                <h2>Thêm Ghế</h2>
                <label for="row">Chọn Hàng:</label>
                <select id="row" name="row">
                    <option value=""></option>
                    <!-- Các hàng sẽ được điền vào qua JavaScript -->
                </select>
                <br>
                <label for="column">Chọn Cột:</label>
                <select id="column" name="column">
                    <option value=""></option>
                    <!-- Các cột sẽ được điền vào qua JavaScript -->
                </select>
                <br>
                <label for="price">Giá:</label>
                <input type="number" name="price" id="price" min="20000" max="120000"
                       placeholder="20.000 - 120.000">
                <br>
                <label for="stt">Trạng thái:</label>
                <select id="stt" name="status">
                    <option value=""></option>
                    <option value="Còn trống">Còn trống</option>
                    <option value="Đã đặt">Đã đặt</option>
                    <option value="Đã hỏng">Đã hỏng</option>
                </select>
                <br><br>
                <button style="width: 35%; margin: 0 auto; border-radius: 5px;" id="save-seat"
                        onclick="addSeat()">Thêm</button>
            </div>
        </div>

        <!-- Modal thêm hàng ghế -->
        <div id="add-seat-modal1" class="modal" style="display: none;">
            <div class="modal-content">
                <br>
                <span class="close" onclick="closeModal1()">&times;</span>
                <h2>Thêm Ghế</h2>
                <label for="row1">Chọn Hàng:</label>
                <select for="row1" id="row1" name="row1">
                    <option value=""></option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                    <option value="G">G</option>
                    <option value="H">H</option>
                    <option value="I">I</option>
                    <option value="J">J</option>
                    <option value="K">K</option>
                </select>
                <br>
                <label for="price1">Giá:</label>
                <input type="text" name="price1" id="price1" min="20000" max="120000"
                       placeholder="20.000 - 120.000">
                <br>
                <label for="stt1">Trạng thái:</label>
                <select id="stt1" name="status1">
                    <option value=""></option>
                    <option value="Còn trống">Còn trống</option>
                    <option value="Đã đặt">Đã đặt</option>
                    <option value="Đã hỏng">Đã hỏng</option>
                </select>
                <br><br>
                <button style="width: 35%; margin: 0 auto; border-radius: 5px;" id="save-seat"
                        onclick="addSeat1()">Thêm</button>
            </div>
        </div>

        <!-- Modal sửa ghế -->
        <div id="edit-seat-modal" class="modal" style="display: none; top: 100px;">
            <div class="modal-content">
                <br>
                <span class="close" onclick="closeEditModal()">&times;</span>
                <h2>Sửa Ghế</h2>
                <label for="edit-row">Chọn Hàng:</label>
                <select id="edit-row" name="edit-row" disabled>
                    <option value=""></option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                    <option value="G">G</option>
                    <option value="H">H</option>
                    <option value="I">I</option>
                    <option value="J">J</option>
                    <option value="K">K</option>
                </select>
                <br>
                <label for="edit-column">Chọn Cột:</label>
                <select id="edit-column" name="edit-column" disabled>
                    <option value=""></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                </select>
                <br>
                <label for="edit-price">Giá:</label>
                <input type="text" name="edit-price" id="edit-price" min="20000" max="120000"
                       placeholder="20.000 - 120.000">
                <br>
                <label for="edit-stt">Trạng thái:</label>
                <select id="edit-stt" name="edit-status">
                    <option value=""></option>
                    <option value="Còn trống">Còn trống</option>
                    <option value="Đã đặt">Đã đặt</option>
                    <option value="Đã hỏng">Đã hỏng</option>
                </select>
                <br><br>
                <button style="width: 35%; margin: 0 auto; border-radius: 5px;" id="update-seat"
                        onclick="updateSeat()">Cập nhật</button>
            </div>
        </div>
    </div>
@endsection

@push('script')
    {{-- js thêm , chi tiết ghế --}}
    <script>
        // Hàm kéo thả modal
        function enableDrag(modalId) {
            let modal = document.getElementById(modalId);
            let isDragging = false,
                startX, startY, initialMouseX, initialMouseY;

            modal.querySelector('.modal-content').addEventListener('mousedown', function(e) {
                isDragging = true;
                startX = modal.offsetLeft;
                startY = modal.offsetTop;
                initialMouseX = e.clientX;
                initialMouseY = e.clientY;
            });

            document.addEventListener('mousemove', function(e) {
                if (isDragging) {
                    modal.style.left = startX + (e.clientX - initialMouseX) + 'px';
                    modal.style.top = startY + (e.clientY - initialMouseY) + 'px';
                }
            });

            document.addEventListener('mouseup', function() {
                isDragging = false;
            });
        }

        // Hàm chỉnh sửa modal ghế
        function editModal() {
            let inputElements = document.querySelectorAll('#input-container input');
            if (inputElements.length === 0) {
                alert('Bạn chưa chọn ghế');
                return;
            }

            if (inputElements.length === 1) {
                let inputName = inputElements[0].getAttribute('name');
                let row = inputName.charAt(0);
                let column = inputName.slice(1);
                let place = row + column;
                let showtime_id = {{ $showtime_id }};
                console.log(place, showtime_id);

                // Gửi yêu cầu đến server để lấy thông tin ghế
                $.ajax({
                    url: `seat/${place}`,
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        showtime_id: showtime_id
                    },
                    success: function(data) {
                        document.getElementById("edit-seat-modal").style.display = "block";
                        fillEditModal(data, row, column);
                    },
                    error: function(xhr) {
                        alert(xhr.responseJSON?.message || 'Đã xảy ra lỗi khi lấy thông tin ghế!');
                    }
                });
            } else {
                alert("Chỉ được chọn một ghế.");
            }
        }

        function fillEditModal(data, row, column) {
            document.getElementById("edit-row").value = row;
            document.getElementById("edit-column").value = column;
            document.getElementById("edit-price").value = data.price;
            document.getElementById("edit-stt").value = data.status;
        }

        // Hàm đóng modal
        function closeEditModal() {
            document.getElementById("edit-seat-modal").style.display = "none";
        }

        // Hàm hiển thị modal thêm ghế
        function showModal() {
            document.getElementById('add-seat-modal').style.display = 'flex';
        }

        function showModal1() {
            document.getElementById('add-seat-modal1').style.display = 'flex';
        }

        // Hàm đóng modal thêm ghế
        function closeModal() {
            document.getElementById('add-seat-modal').style.display = 'none';
        }

        function closeModal1() {
            document.getElementById('add-seat-modal1').style.display = 'none';
        }

        // Hàm thêm ghế
        function addSeat() {
            let row = document.getElementById("row").value;
            let column = document.getElementById("column").value;
            let price = document.getElementById("price").value;
            let status = document.getElementById("stt").value;
            let place = row + column;

            if (!row || !column || !price || !status) {
                alert("Vui lòng điền đầy đủ thông tin!");
                return;
            }

            if (price < 30000 || price > 200000) {
                alert("Giá phải nằm trong khoảng từ 20.000 đến 200.000!");
                return;
            }

            $.ajax({
                url: '{{ route('admin.seat.store') }}',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    showtime_id: {{ $showtime_id }},
                    place: place,
                    price: price,
                    status: status
                },
                success: function(response) {
                    console.log("Dữ liệu đã được lưu:", response);
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error("Chi tiết lỗi:", error);
                }
            });
        }

        function addSeat1() {
            let row = document.getElementById("row1").value;
            let price = document.getElementById("price1").value;
            let status = document.getElementById("stt1").value;

            if (!row || !price || !status) {
                alert("Vui lòng điền đầy đủ thông tin!");
                return;
            }

            if (price < 30000 || price > 200000) {
                alert("Giá phải nằm trong khoảng từ 20.000 đến 200.000!");
                return;
            }

            $.ajax({
                url: '{{ route('admin.seat.store1') }}',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    showtime_id: {{ $showtime_id }},
                    row: row,
                    price: price,
                    status: status
                },
                success: function(response) {
                    console.log("Dữ liệu đã được lưu:", response);
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error("Chi tiết lỗi:", error);
                }
            });
        }

        // Hàm điền dữ liệu vào các dropdown (hàng và cột)
        const seats = @json($seats);
        const fullRows = @json($fullRows);

        function populateRowOptions() {
            const rowSelect = document.getElementById('row');
            rowSelect.innerHTML = '<option value=""></option>';
            ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K'].forEach(row => {
                if (!fullRows.includes(row)) {
                    const option = document.createElement('option');
                    option.value = row;
                    option.textContent = row;
                    rowSelect.appendChild(option);
                }
            });
        }

        function populateColumnOptions() {
            const row = document.getElementById('row').value;
            const columnSelect = document.getElementById('column');
            columnSelect.innerHTML = '<option value=""></option>';

            const takenColumns = seats
                .filter(seat => seat.startsWith(row))
                .map(seat => seat.slice(1)); // Lấy số cột của ghế

            for (let i = 1; i <= 18; i++) {
                if (!takenColumns.includes(i.toString())) {
                    const option = document.createElement('option');
                    option.value = i;
                    option.textContent = i;
                    columnSelect.appendChild(option);
                }
            }
        }

        // Gọi hàm mỗi khi trang được tải hoặc khi hàng được chọn
        window.addEventListener('load', populateRowOptions);
        document.getElementById('row').addEventListener('change', populateColumnOptions);

        // Kích hoạt tính năng kéo thả cho các modal
        enableDrag('edit-seat-modal');
        enableDrag('add-seat-modal');
    </script>

    {{-- js sửa ghế --}}
    <script>
        function updateSeat() {
            let row = document.getElementById("edit-row").value;
            let column = document.getElementById("edit-column").value;
            let price = document.getElementById("edit-price").value;
            let status = document.getElementById("edit-stt").value;
            let place = row + column;

            if (!row || !column || !price || !status) {
                alert("Vui lòng điền đầy đủ thông tin!");
                return;
            }

            if (price < 30000 || price > 200000) {
                alert("Giá phải nằm trong khoảng từ 20.000 đến 200.000!");
                return;
            }

            $.ajax({
                url: `seat/update/${place}`,
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                contentType: 'application/json',
                data: JSON.stringify({
                    showtime_id: {{ $showtime_id }},
                    place: place,
                    price: price,
                    status: status
                }),
                success: function(response) {
                    console.log("Dữ liệu đã được lưu:", response);
                    location.reload();
                    closeEditModal();
                },
                error: function(xhr, status, error) {
                    alert(xhr.responseJSON?.message || 'Có lỗi xảy ra!');
                    console.error("Có lỗi xảy ra:", error);
                }
            });
        }
    </script>

    {{-- js xóa ghế --}}
    <script>
        function checkInputsAndSubmit() {
            const inputs = document.querySelectorAll('#input-container-destroy input');
            if (inputs.length === 0) {
                alert('Bạn chưa chọn ghế');
            } else {
                if (confirm('Bạn có chắc chắn muốn xóa')) {
                    document.getElementById('delete-form').submit();
                }
            }
        }
    </script>

    {{-- js status --}}
    <script>
        document.addEventListener('click', (e) => {
            if (e.target.matches('.action-button')) {
                document.querySelectorAll('.action-button').forEach(btn => btn.classList.remove('active-btn'));
                e.target.classList.add('active-btn');
            }
        });

        document.querySelectorAll('.click').forEach(cell => {
            const originalContent = cell.textContent.trim();

            cell.addEventListener('click', function() {
                if (this.classList.toggle('active')) {
                    this.style.color = 'white';
                    this.innerHTML = originalContent;

                    const input = Object.assign(document.createElement('input'), {
                        type: 'text',
                        name: originalContent,
                        hidden: true
                    });
                    const inputClone = input.cloneNode(true);

                    document.getElementById('input-container').appendChild(input);
                    document.getElementById('input-container-destroy').appendChild(inputClone);

                    Object.assign(this, {
                        inputElement: input,
                        inputElementClone: inputClone
                    });
                } else {
                    this.style.removeProperty('color');
                    this.innerHTML = originalContent;
                    this.inputElement?.remove();
                    this.inputElementClone?.remove();
                    this.inputElement = this.inputElementClone = null;
                }
            });
        });

        function setSeatStatus(status) {
            const inputs = document.querySelectorAll('#input-container input');
            if (!inputs.length) return alert('Bạn chưa chọn ghế');

            inputs.forEach(input => input.value = status);
            if (confirm(`Bạn có muốn thay đổi trạng thái ghế thành "${status}"?`)) {
                document.querySelector('.auto-submit').click();
            }
        }

        ['btn-empty', 'btn-occupied', 'btn-broken'].forEach((id, i) => {
            const statuses = ['Còn trống', 'Đã đặt', 'Đã hỏng'];
            document.getElementById(id).onclick = () => setSeatStatus(statuses[i]);
        });
    </script>

    <!-- Datatables js -->
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>

    <!-- dataTables.bootstrap5 -->
    <script src="{{ asset('assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>

    <!-- buttons.colVis -->
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>

    <!-- buttons.bootstrap5 -->
    <script src="{{ asset('assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>

    <!-- dataTables.keyTable -->
    <script src="{{ asset('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-keytable-bs5/js/keyTable.bootstrap5.min.js') }}"></script>

    <!-- dataTable.responsive -->
    <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>

    <!-- dataTables.select -->
    <script src="{{ asset('assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-select-bs5/js/select.bootstrap5.min.js') }}"></script>

    <!-- Datatable Demo App Js -->
    <script src="{{ asset('assets/js/pages/datatable.init.js') }}"></script>
@endpush
