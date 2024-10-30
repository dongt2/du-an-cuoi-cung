@extends('admin.layouts.default')

@section('title')
    hello
@endsection

@section('head')
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
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
            /* justify-content: center; */
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
            transition: background-color 0.1s, color 0.1s;
        }

        .click:hover {
            background-color: #4c4145;
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
            #dbdee1
        }

        .color-4 {
            background-color: #dbdee1;
            pointer-events: none;
            cursor: default;
        }

        .color-5 {
            background-color: #cf1919;
        }

        .btn-seat {
            width: 40%;
            display: flex;
            margin: 0 auto;
            justify-content: space-between;
            padding-top: 20px;
        }
    </style>

    <div class="page-content">
        <div class="choose-sits">
            <ul>
                <li class="sits-price"><strong>Price</strong></li>
                <li class="sits-price" style="background-color: "><div class="square" style="background-color: #fff0c7"></div>$10</li>
                <li class="sits-price" style="background-color: "><div class="square" style="background-color: #ffc8cb"></div>$20</li>
                <li class="sits-price" style="background-color: "><div class="square" style="background-color: #cdb4bd"></div>$30</li>&ensp;||&ensp;
                <li class="sits-price" style="background-color: "><div class="square" style="background-color: #dbdee1"></div>Ghế đã đặt</li>
                <li class="sits-price" style="background-color: "><div class="square" style="background-color: #cf1919"></div>Ghế đã hỏng</li>
                <li class="sits-price" style="background-color: "><div class="square" style="background-color: #4c4145"></div>Chọn</li>
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
                    <div class="grid-cell grid-letter">I</div>
                    <div class="grid-cell grid-letter">J</div>
                    <div class="grid-cell grid-letter">K</div>
                    <div class="grid-cell grid-letter">L</div>
                </div>
            </div>
            <div class="grid-container">
                <!-- 4 hàng đầu -->
                <div class="grid-row">
                    @for ($i = 2; $i <= 17; $i++)
                        <div class="grid-cell click 
                            @if($data->{'A' . $i} == "Đã đặt") color-4 
                            @elseif($data->{'A' . $i} == "Đã hỏng") color-5 
                            @else color-1 
                            @endif">
                            A{{ $i }}
                        </div>
                    @endfor
                </div>
                <div class="grid-row">
                    @for ($i = 1; $i <= 18; $i++)
                        <div class="grid-cell click 
                            @if($data->{'B' . $i} == "Đã đặt") color-4 
                            @elseif($data->{'B' . $i} == "Đã hỏng") color-5 
                            @else color-1 
                            @endif">
                            B{{ $i }}
                        </div>
                    @endfor
                </div>
                <div class="grid-row">
                    @for ($i = 1; $i <= 18; $i++)
                        <div class="grid-cell click 
                            @if($data->{'C' . $i} == "Đã đặt") color-4 
                            @elseif($data->{'C' . $i} == "Đã hỏng") color-5 
                            @else color-1 
                            @endif">
                            C{{ $i }}
                        </div>
                    @endfor
                </div>
                <div class="grid-row">
                    @for ($i = 1; $i <= 18; $i++)
                        <div class="grid-cell click 
                            @if($data->{'D' . $i} == "Đã đặt") color-4 
                            @elseif($data->{'D' . $i} == "Đã hỏng") color-5 
                            @else color-1 
                            @endif">
                            D{{ $i }}
                        </div>
                    @endfor
                </div>

                <!-- 4 hàng giữa -->
                <div class="grid-row">
                    @for ($i = 1; $i <= 18; $i++)
                        <div class="grid-cell click 
                            @if($data->{'E' . $i} == "Đã đặt") color-4 
                            @elseif($data->{'E' . $i} == "Đã hỏng") color-5 
                            @else color-2 
                            @endif">
                            E{{ $i }}
                        </div>
                    @endfor
                </div>
                <div class="grid-row">
                    @for ($i = 1; $i <= 18; $i++)
                        <div class="grid-cell click 
                            @if($data->{'F' . $i} == "Đã đặt") color-4 
                            @elseif($data->{'F' . $i} == "Đã hỏng") color-5 
                            @else color-2 
                            @endif">
                            F{{ $i }}
                        </div>
                    @endfor
                </div>
                <div class="grid-row">
                    @for ($i = 1; $i <= 18; $i++)
                        <div class="grid-cell click 
                            @if($data->{'G' . $i} == "Đã đặt") color-4 
                            @elseif($data->{'G' . $i} == "Đã hỏng") color-5 
                            @else color-2 
                            @endif">
                            G{{ $i }}
                        </div>
                    @endfor
                </div>
                <div class="grid-row">
                    @for ($i = 3; $i <= 16; $i++)
                        <div class="grid-cell click 
                            @if($data->{'I' . $i} == "Đã đặt") color-4 
                            @elseif($data->{'I' . $i} == "Đã hỏng") color-5 
                            @else color-2 
                            @endif">
                            I{{ $i }}
                        </div>
                    @endfor
                </div>

                <!-- 3 hàng cuối -->
                <div class="grid-row">
                    @for ($i = 5; $i <= 14; $i++)
                        <div class="grid-cell click 
                            @if($data->{'J' . $i} == "Đã đặt") color-4 
                            @elseif($data->{'J' . $i} == "Đã hỏng") color-5 
                            @else color-3 
                            @endif">
                            J{{ $i }}
                        </div>
                    @endfor
                </div>
                <div class="grid-row">
                    @for ($i = 5; $i <= 14; $i++)
                        <div class="grid-cell click 
                            @if($data->{'K' . $i} == "Đã đặt") color-4 
                            @elseif($data->{'K' . $i} == "Đã hỏng") color-5 
                            @else color-3 
                            @endif">
                            K{{ $i }}
                        </div>
                    @endfor
                </div>
                <div class="grid-row">
                    @for ($i = 6; $i <= 13; $i++)
                        <div class="grid-cell click 
                            @if($data->{'L' . $i} == "Đã đặt") color-4 
                            @elseif($data->{'L' . $i} == "Đã hỏng") color-5 
                            @else color-3 
                            @endif">
                            L{{ $i }}
                        </div>
                    @endfor
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
            {{-- <form action="" style="display: flex;">
                @csrf
                <button>Đã hỏng</button>
                <button>Đã Sứa</button>
                <button>Reset</button>
            </form> --}}
            <form action="{{ url('/seat/1') }}" method="POST">
                @csrf
                @method('PUT')
                <div style="display: flex; align-items: center;">
                    A2:    
                    <select name="A2" style="margin: 0 10px;">
                        <option value="">Chọn trạng thái</option>
                        <option value="Đã đặt">Đã đặt</option>
                        <option value="Còn trống">Còn trống</option>
                        <option value="Đã hỏng">Đã hỏng</option>
                    </select>
                    A3:     
                    <select name="A3" style="margin: 0 10px;"> 
                        <option value="">Chọn trạng thái</option>
                        <option value="Đã đặt">Đã đặt</option>
                        <option value="Còn trống">Còn trống</option>
                        <option value="Đã hỏng">Đã hỏng</option>
                    </select>
                    A4:     
                    <select name="A4" style="margin: 0 10px;"> 
                        <option value="">Chọn trạng thái</option>
                        <option value="Đã đặt">Đã đặt</option>
                        <option value="Còn trống">Còn trống</option>
                        <option value="Đã hỏng">Đã hỏng</option>
                    </select>
                </div><br>
                <button type="submit">Cập nhật</button>
            </form>
        </div>
    </div>
    <script>
        const cells = document.querySelectorAll('.click');

        cells.forEach(cell => {
            // Lưu nội dung ban đầu cho mỗi ô trong vòng lặp
            const originalContent = cell.textContent; // Sử dụng textContent để lấy nội dung văn bản

            cell.addEventListener('click', function() {
                if (this.classList.contains('active')) {
                    // Nếu đã active, xóa active và khôi phục nội dung ban đầu
                    this.classList.remove('active'); // Xóa class active
                    this.style.removeProperty('color'); // Xóa thuộc tính color
                    this.innerHTML = originalContent; // Đổi về nội dung ban đầu
                } else {
                    // Nếu chưa active, thêm active và hiện hình ảnh
                    this.classList.add('active'); // Thêm class active
                    this.style.color = 'white'; // Thiết lập màu chữ
                    this.innerHTML = '<img src="data:image/jpeg;base64,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" alt="" style="width: 20px; height: auto;">'; // Thay nội dung bên trong bằng hình ảnh
                    // this.innerHTML = originalContent;
                }
            });
        });
    </script>
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
