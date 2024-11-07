@extends('admin.layouts.default')

@section('title')
    Lexa - Admin & Category
@endsection

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
          type="text/css"/>

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
          type="text/css"/>

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
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
            $screen_id = request()->input('screen', 1);
        @endphp

        <form action="{{ route('admin.seat.index') }}" method="GET">
            <label for="screen">Chọn Phòng Chiếu:</label>
            <select id="screen" name="screen">
                @foreach ($screen as $item)
                    <option value="{{ $item->screen_id }}" {{ $item->screen_id == $screen_id ? 'selected' : '' }}>
                        {{ $item->screen_id . '. ' . $item->screen_name }}
                    </option>
                @endforeach
            </select>
            <button type="submit">Xác nhận</button>
        </form>

        <div class="choose-sits">
            <ul>
                <li class="sits-price"><strong>Price</strong></li>
                <li class="sits-price">
                    <div class="square color-1"></div>
                    $10
                </li>
                <li class="sits-price">
                    <div class="square color-2"></div>
                    $20
                </li>
                <li class="sits-price">
                    <div class="square color-3"></div>
                    $30
                </li>&ensp;||&ensp;
                <li class="sits-price">
                    <div class="square color-4"></div>
                    Ghế đã đặt
                </li>
                <li class="sits-price">
                    <div class="square color-5"></div>
                    Ghế đã hỏng
                </li>
                <li class="sits-price">
                    <div class="square" style="background-color: #4c4145"></div>
                    Chọn
                </li>
            </ul>
        </div>

        <div class="sits-area">
            <div class="sits-anchor">{{ $screen[$screen_id - 1]->screen_name }}</div>
            <div class="screen"></div>
        </div>
        <br><br>

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
                            <div class="grid-cell click {{ $class }}">{{ $item->place }}</div>
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
                            <div class="grid-cell click {{ $class }}">{{ $item->place }}</div>
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
                            <div class="grid-cell click {{ $class }}">{{ $item->place }}</div>
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
                            <div class="grid-cell click {{ $class }}">{{ $item->place }}</div>
                        @endif
                    @endforeach
                </div>

                <!-- 4 hàng giữa -->
                <div class="grid-row">
                    @foreach ($data as $item)
                        @if (str_starts_with($item->place, 'E'))
                            @php
                                if ($item->status === 'Đã đặt') {
                                    $class = 'color-4';
                                } elseif ($item->status === 'Đã hỏng') {
                                    $class = 'color-5';
                                } else {
                                    $class = 'color-2';
                                }
                            @endphp
                            <div class="grid-cell click {{ $class }}">{{ $item->place }}</div>
                        @endif
                    @endforeach
                </div>
                <div class="grid-row">
                    @foreach ($data as $item)
                        @if (str_starts_with($item->place, 'F'))
                            @php
                                if ($item->status === 'Đã đặt') {
                                    $class = 'color-4';
                                } elseif ($item->status === 'Đã hỏng') {
                                    $class = 'color-5';
                                } else {
                                    $class = 'color-2';
                                }
                            @endphp
                            <div class="grid-cell click {{ $class }}">{{ $item->place }}</div>
                        @endif
                    @endforeach
                </div>
                <div class="grid-row">
                    @foreach ($data as $item)
                        @if (str_starts_with($item->place, 'G'))
                            @php
                                if ($item->status === 'Đã đặt') {
                                    $class = 'color-4';
                                } elseif ($item->status === 'Đã hỏng') {
                                    $class = 'color-5';
                                } else {
                                    $class = 'color-2';
                                }
                            @endphp
                            <div class="grid-cell click {{ $class }}">{{ $item->place }}</div>
                        @endif
                    @endforeach
                </div>
                <div class="grid-row">
                    @foreach ($data as $item)
                        @if (str_starts_with($item->place, 'I'))
                            @php
                                if ($item->status === 'Đã đặt') {
                                    $class = 'color-4';
                                } elseif ($item->status === 'Đã hỏng') {
                                    $class = 'color-5';
                                } else {
                                    $class = 'color-2';
                                }
                            @endphp
                            <div class="grid-cell click {{ $class }}">{{ $item->place }}</div>
                        @endif
                    @endforeach
                </div>

                <!-- 3 hàng cuối -->
                <div class="grid-row">
                    @foreach ($data as $item)
                        @if (str_starts_with($item->place, 'J'))
                            @php
                                if ($item->status === 'Đã đặt') {
                                    $class = 'color-4';
                                } elseif ($item->status === 'Đã hỏng') {
                                    $class = 'color-5';
                                } else {
                                    $class = 'color-3';
                                }
                            @endphp
                            <div class="grid-cell click {{ $class }}">{{ $item->place }}</div>
                        @endif
                    @endforeach
                </div>
                <div class="grid-row">
                    @foreach ($data as $item)
                        @if (str_starts_with($item->place, 'K'))
                            @php
                                if ($item->status === 'Đã đặt') {
                                    $class = 'color-4';
                                } elseif ($item->status === 'Đã hỏng') {
                                    $class = 'color-5';
                                } else {
                                    $class = 'color-3';
                                }
                            @endphp
                            <div class="grid-cell click {{ $class }}">{{ $item->place }}</div>
                        @endif
                    @endforeach
                </div>
                <div class="grid-row">
                    @foreach ($data as $item)
                        @if (str_starts_with($item->place, 'L'))
                            @php
                                if ($item->status === 'Đã đặt') {
                                    $class = 'color-4';
                                } elseif ($item->status === 'Đã hỏng') {
                                    $class = 'color-5';
                                } else {
                                    $class = 'color-3';
                                }
                            @endphp
                            <div class="grid-cell click {{ $class }}">{{ $item->place }}</div>
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

        <div class="btn-seat">
            <div class="action-button" id="btn-add-seat" style="background-color: #800080;" onclick="showModal()">Thêm
                ghế
            </div>
            <form action="{{ route('admin.seat.update', $screen_id) }}" style="display: flex;" method="POST">
                @csrf
                @method('PUT')
                <div id="input-container"></div>
                <input type="hidden" name="screen_id" value="{{ $screen_id }}">
                <div class="action-button" id="btn-update-seat" style="background-color: #20B2AA;"
                     onclick="editModal()">Sửa ghế
                </div>
                <div class="action-button" id="btn-empty" style="background-color: #00BFFF;">Còn trống</div>
                <div class="action-button" id="btn-occupied" style="background-color: #008000;">Đã đặt</div>
                <div class="action-button" id="btn-broken" style="background-color: #FFD700;">Đã hỏng</div>
                <button class="action-button" style="background-color: #FFA500;" type="submit">Cập nhật</button>
            </form>&emsp;
            <form action="{{ route('admin.seat.destroy', $screen_id) }}" method="POST">
                @csrf
                @method('delete')
                <div id="input-container-destroy"></div>
                <input type="hidden" name="screen_id" value="{{ $screen_id }}">
                <button class="action-button" style="background-color: #FF4500;"
                        onclick="return confirm('Bạn có chắc chắn muốn xóa')">Xóa ghế
                </button>
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
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                    <option value="G">G</option>
                    <option value="I">I</option>
                    <option value="J">J</option>
                    <option value="K">K</option>
                    <option value="L">L</option>
                </select>
                <br>
                <label for="column">Chọn Cột:</label>
                <select id="column" name="column">
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
                <label for="price">Nhập Giá:</label>
                <input type="text" name="price" id="price">
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
                        onclick="addSeat()">Thêm
                </button>
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
                    <option value="I">I</option>
                    <option value="J">J</option>
                    <option value="K">K</option>
                    <option value="L">L</option>
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
                <label for="edit-price">Nhập Giá:</label>
                <input type="text" name="edit-price" id="edit-price">
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
                        onclick="updateSeat()">Cập nhật
                </button>
            </div>
        </div>


        <script>
            function editModal() {
                let inputElements = document.querySelectorAll('#input-container input');

                // Kiểm tra số lượng input
                if (inputElements.length === 1) {
                    let inputName = inputElements[0].getAttribute('name');
                    let row = inputName.charAt(0); // Hàng từ tên ghế
                    let column = inputName.slice(1); // Cột từ tên ghế
                    let place = row + column;
                    let screen_id = {{ $screen_id }};

                    // Gửi yêu cầu đến server để lấy thông tin ghế
                    fetch(`/seat/${place}?screen_id=${screen_id}`, {
                        method: 'GET',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                        .then(response => {
                            if (!response.ok) {
                                return response.json().then(data => {
                                    throw new Error(data.message);
                                });
                            }
                            return response.json();
                        })
                        .then(data => {
                            // Hiển thị modal sửa ghế
                            document.getElementById("edit-seat-modal").style.display = "block";

                            // Di chuyển modal sửa ghế
                            const editModal = document.getElementById('edit-seat-modal');
                            let isEditDragging = false;
                            let editStartX, editStartY, editInitialMouseX, editInitialMouseY;

                            editModal.querySelector('.modal-content').addEventListener('mousedown', function (e) {
                                isEditDragging = true;
                                editStartX = editModal.offsetLeft;
                                editStartY = editModal.offsetTop;
                                editInitialMouseX = e.clientX;
                                editInitialMouseY = e.clientY;
                            });

                            document.addEventListener('mousemove', function (e) {
                                if (isEditDragging) {
                                    const editDx = e.clientX - editInitialMouseX;
                                    const editDy = e.clientY - editInitialMouseY;
                                    editModal.style.left = editStartX + editDx + 'px';
                                    editModal.style.top = editStartY + editDy + 'px';
                                }
                            });

                            document.addEventListener('mouseup', function () {
                                isEditDragging = false;
                            });


                            // Điền dữ liệu vào các trường trong modal
                            document.getElementById("edit-row").value = row; // Hàng
                            document.getElementById("edit-column").value = column; // Cột
                            document.getElementById("edit-price").value = data.price; // Giá
                            document.getElementById("edit-stt").value = data.status; // Trạng thái
                        })
                        .catch(error => {
                            console.error('Error:', error.message);
                            alert(error.message);
                        });
                } else {
                    alert("Chỉ được chọn một ghế.");
                }
            }

            // Hàm để đóng modal
            function closeEditModal() {
                document.getElementById("edit-seat-modal").style.display = "none";
            }
        </script>


        <script>
            function showModal() {
                document.getElementById('add-seat-modal').style.display = 'flex'; // Hiện modal
            }

            function closeModal() {
                document.getElementById('add-seat-modal').style.display = 'none'; // Ẩn modal
            }

            // Di chuyển modal
            const modal = document.getElementById('add-seat-modal');
            let isDragging = false;
            let startX, startY, initialMouseX, initialMouseY;

            modal.querySelector('.modal-content').addEventListener('mousedown', function (e) {
                isDragging = true;
                startX = modal.offsetLeft;
                startY = modal.offsetTop;
                initialMouseX = e.clientX;
                initialMouseY = e.clientY;
            });

            document.addEventListener('mousemove', function (e) {
                if (isDragging) {
                    const dx = e.clientX - initialMouseX;
                    const dy = e.clientY - initialMouseY;
                    modal.style.left = startX + dx + 'px';
                    modal.style.top = startY + dy + 'px';
                }
            });

            document.addEventListener('mouseup', function () {
                isDragging = false;
            });

            function addSeat() {
                var row = document.getElementById("row").value;
                var column = document.getElementById("column").value;
                var price = document.getElementById("price").value;
                var status = document.getElementById("stt").value;
                var place = row + column;

                if (row === "" || column === "" || price === "" || status === "") {
                    alert("Vui lòng điền đầy đủ thông tin!");
                    return;
                }

                // Gửi dữ liệu đến controller của Laravel
                fetch('/seat', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content') // Thêm CSRF token
                    },
                    body: JSON.stringify({
                        screen_id: {{ $screen_id }},
                        place: place,
                        price: price,
                        status: status
                    })
                })
                    .then(response => {
                        const contentType = response.headers.get("content-type");
                        if (!contentType || !contentType.includes("application/json")) {
                            throw new Error("Server trả về HTML thay vì JSON.");
                        }
                        // Kiểm tra mã lỗi HTTP
                        if (!response.ok) {
                            return response.json().then(data => {
                                throw new Error(data.message || "Có lỗi xảy ra.");
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log("Dữ liệu đã được lưu:", data);
                        location.reload();
                        closeModal();
                    })
                    .catch((error) => {
                        alert(error.message); // Hiển thị thông báo lỗi
                        console.error("Có lỗi xảy ra:", error);
                    });
            }
        </script>

        <script>
            function updateSeat() {
                var row = document.getElementById("edit-row").value;
                var column = document.getElementById("edit-column").value;
                var price = document.getElementById("edit-price").value;
                var status = document.getElementById("edit-stt").value;
                var place = row + column;

                if (row === "" || column === "" || price === "" || status === "") {
                    alert("Vui lòng điền đầy đủ thông tin!");
                    return;
                }

                // Gửi dữ liệu đến controller của Laravel
                fetch(`/seat/update/${place}`, {
                    method: 'PUT', // Đảm bảo là PUT
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        screen_id: {{ $screen_id }},
                        place: place,
                        price: price,
                        status: status
                    })
                })
                    .then(response => {
                        const contentType = response.headers.get("content-type");
                        if (!contentType || !contentType.includes("application/json")) {
                            throw new Error("Server trả về HTML thay vì JSON.");
                        }
                        // Kiểm tra mã lỗi HTTP
                        if (!response.ok) {
                            return response.json().then(data => {
                                throw new Error(data.message || "Có lỗi xảy ra.");
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log("Dữ liệu đã được lưu:", data);
                        location.reload();
                        closeModal();
                    })
                    .catch((error) => {
                        alert(error.message); // Hiển thị thông báo lỗi
                        console.error("Có lỗi xảy ra:", error);
                    });
            }
        </script>


        <script>
            // css
            document.querySelectorAll('.action-button').forEach(button => {
                button.addEventListener('click', function () {
                    // Loại bỏ class 'active-btn' khỏi các nút khác
                    document.querySelectorAll('.action-button').forEach(btn => btn.classList.remove(
                        'active-btn'));
                    // Thêm class 'active-btn' vào nút đã nhấn
                    this.classList.add('active-btn');
                });
            });

            // click
            const cells = document.querySelectorAll('.click');

            cells.forEach(cell => {
                // Lưu nội dung ban đầu cho mỗi ô trong vòng lặp
                const originalContent = cell.textContent.trim(); // Sử dụng textContent để lấy nội dung văn bản

                cell.addEventListener('click', function () {
                    if (this.classList.contains('active')) {
                        // Nếu đã active, xóa active và khôi phục nội dung ban đầu
                        this.classList.remove('active'); // Xóa class active
                        this.style.removeProperty('color'); // Xóa thuộc tính color
                        this.innerHTML = originalContent; // Đổi về nội dung ban đầu

                        // Xóa ô input nếu có
                        if (this.inputElement) {
                            this.inputElement.remove(); // Xóa input từ input-container
                            this.inputElementClone.remove(); // Xóa input clone từ input-container-destroy
                            this.inputElement = null;
                            this.inputElementClone = null;
                        }
                    } else {
                        // Nếu chưa active, thêm active và hiện hình ảnh
                        this.classList.add('active'); // Thêm class active
                        this.style.color = 'white'; // Thiết lập màu chữ
                        this.innerHTML = originalContent;

                        const input = document.createElement('input'); // Tạo thẻ input mới
                        input.type = 'text'; // Đặt loại input là text
                        input.name = originalContent; // Gán thuộc tính name cho input
                        input.hidden = true;

                        // Thêm input vào vùng chứa chính
                        document.getElementById('input-container').appendChild(input);

                        // Tạo và thêm input clone vào vùng chứa xóa
                        const inputClone = input.cloneNode(true);
                        document.getElementById('input-container-destroy').appendChild(inputClone);

                        // Lưu tham chiếu đến ô input trong cell
                        this.inputElement = input;
                        this.inputElementClone = inputClone; // Lưu tham chiếu đến input clone
                    }
                });

                // Hàm để gán giá trị cho tất cả ô input
                function setInputValue(value) {
                    const inputs = document.querySelectorAll('#input-container input');
                    inputs.forEach(input => {
                        input.value = value;
                    });
                }

                // Thêm sự kiện cho các nút mới
                document.getElementById('btn-empty').addEventListener('click', () => setInputValue('Còn trống'));
                document.getElementById('btn-occupied').addEventListener('click', () => setInputValue('Đã đặt'));
                document.getElementById('btn-broken').addEventListener('click', () => setInputValue('Đã hỏng'));
            });
        </script>
    </div>
@endsection



@section('javascript')
    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>

    <!-- Required datatable js -->
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/libs/jszip/jszip.min.js"></script>
    <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="assets/js/pages/datatables.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>
@endsection
