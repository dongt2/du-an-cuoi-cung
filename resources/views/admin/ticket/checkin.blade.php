@extends('admin.layout.default')

@section('title')
    Dashboard | Lexa - Admin & Dashboard Template
@endsection

@section('head')
    <base href="/">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">

            </div>

            <!-- Advance Form -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Checkin Vé</strong></h5>
                        </div><!-- end card header -->

                        <form action="{{route('admin.checkin.update', $ticket->ticket_id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-4">

                                        <div class="mb-3">
                                            <img src="{{ Storage::url($ticket->qr_code) }}" alt="" class="img-fluid"
                                                 width="230px" height="130px">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Tên phim</label>
                                            <input type="text" class="form-control" name="release_date"
                                                   value="{{ $ticket->movie->title }}" disabled>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Phòng</label>
                                            <input type="text" class="form-control" name="release_date"
                                                   value="{{ $ticket->showtime->screen->screen_name }}" disabled>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Xuất chiếu</label>
                                            <input type="text" class="form-control" name="release_date"
                                                   value="{{ \Carbon\Carbon::parse($ticket->showtime->time)->format('H:m') }}" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Ngày chiếu</label>
                                            <input type="text" class="form-control" id="" name=""
                                                   value="{{ \Carbon\Carbon::parse($ticket->showtime->showtime_date)->format('d-m-Y') }}" disabled>
                                        </div>
                                        @php
                                            $ticket->seats = json_decode($ticket->seats, true);
                                        @endphp
                                        <div class="mb-3">
                                            <label class="form-label">Ghế</label>
                                            <input type="text" class="form-control" name="release_date"
                                                   value="{{ implode(', ', $ticket->seats) }}" disabled>
                                        </div>


                                        @if(isset($ticket->booking->combo_id))
                                            <span class="text-danger">Đây là giá đã cộng combo</span>
                                            <div class="mb-3">
                                                <label class="form-label">Giá</label>
                                                <input type="text" class="form-control" id="" name=""
                                                       value="{{ number_format($ticket->booking->total_price, 0, ',', ',')  }} VNĐ" disabled>

                                            </div>
                                        @else
                                            <div class="mb-3">
                                                <label class="form-label">Giá</label>
                                                <input type="text" class="form-control" id="" name=""
                                                       value="{{ number_format($ticket->transaction->total, 0, ',', ',')  }} VNĐ" disabled>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-xl-8">
                                        <div class="mb-3">
                                            <label class="form-label">Mã vé</label>
                                            <input type="text" class="form-control" id="" name=""
                                                   value="{{ $ticket->booking->order_code }}" disabled>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Tên người mua</label>
                                            <input type="text" class="form-control" id="" name="trailer_url"
                                                   value="{{ $ticket->user->username }}" disabled>
                                        </div>

                                        @if($ticket->booking->combo_id != null)
                                            <div class="mb-3">
                                                <label class="form-label">Combo</label>
                                                <input type="text" class="form-control" id="" name="trailer_url"
                                                       value="{{ $ticket->booking->combo->combo_name }}" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Số lượng combo</label>
                                                <input type="text" class="form-control" id="" name="trailer_url"
                                                       value="{{ $ticket->booking->quantity_combo }}" disabled>
                                            </div>
                                        @else
                                            <div class="mb-3">
                                                <label class="form-label">Chọn Combo</label>
                                                <select class="form-select" name="combo_id" >
                                                    <option value="">Chọn Combo</option>
                                                    @foreach($combos as $combo)
                                                        <option value="{{ $combo->combo_id }}"
                                                                @if($ticket->booking->combo_id == $combo->combo_id) selected @endif>{{ $combo->combo_name }} &diamondsuit; Giá {{ $combo->price }} &diamondsuit; Số lượng: {{$combo->quantity}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="mb-3">
                                                <input type="number" class="form-control-sm" name="quantity_combo">
                                            </div>
                                        @endif
                                        @if($ticket->booking->voucher_id != null)
                                            <div class="mb-3">
                                                <label class="form-label">Voucher sử dụng</label>
                                                <input type="text" class="form-control" id="" name="trailer_url"
                                                       value="{{ $ticket->booking->voucher->voucher_name }}" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Số tiền trừ</label>
                                                <input type="text" class="form-control" id="" name="trailer_url"
                                                       value="{{ $ticket->booking->voucher->voucher_name }}" disabled>
                                            </div>
                                        @endif
                                        <div class="mb-3">
                                            <label class="form-label">Hình thức thanh toán: </label>
                                            @if($ticket->transaction->payment_method == 'online')
                                                <strong style="font-size: 19px"><span class="badge bg-success">Thanh toán online</span></strong>
                                            @endif
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Checkin: </label>
                                            @if($ticket->checkin == 0)
                                                <strong style="font-size: 19px"><span class="badge bg-danger" >Chưa checkin</span></strong>
                                            @else
                                                <strong style="font-size: 19px"><span class="badge bg-success">Đã checkin</span></strong>
                                            @endif
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Trạng thái: </label>
                                            @if($ticket->status == 0)
                                                <strong style="font-size: 19px"><span class="badge bg-warning" >Chưa xem</span></strong>
                                            @elseif ($ticket->status == 1)
                                                <strong style="font-size: 19px"><span class="badge bg-success">Đã xem</span></strong>
                                            @else
                                                <strong style="font-size: 19px"><span class="badge bg-danger">Đã hủy</span></strong>
                                            @endif
                                        </div>

                                        <div class="mb-3">
                                            <input type="hidden" name="checkin" value="1">

                                            <button type="submit" class="btn btn-primary">Checkin</button>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div> <!-- container-fluid -->

    </div> <!-- content -->

@endsection

@section('javascript')
    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>

    <!-- Table Editable plugin -->
    <script src="assets/libs/table-edits/build/table-edits.min.js"></script>

    <script src="assets/js/pages/table-editable.int.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>
@endsection
