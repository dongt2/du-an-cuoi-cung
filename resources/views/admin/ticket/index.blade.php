@extends('admin.layout.default')

@section('title')
Bookings - Danh Sách Booking
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
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            {{-- <div class="row">
                <div class="col-sm-6">
                    <div class="page-title-box">
                        <h4>Bảng Users</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Lexa</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Bảng</a></li>
                            <li class="breadcrumb-item active">Danh sách Vé</li>
                        </ol>
                    </div>
                </div>
            </div> --}}
            <!-- end page title -->


            <div class="row mt-5">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">


                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Mã vé</th>
                                            <th>Người mua</th>
                                            <th>Tên phim</th>
                                            <th>Xuất chiếu</th>
                                            <th>Chỗ ngồi</th>
                                            <th>Ngày đặt</th>
                                            <th>Giá</th>
                                            <th>Hành Động</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($ticket as $item)
                                            <tr>
                                                <td>{{ $item->booking->order_code}}</td>
                                                <td>{{ $item->user->username}}</td>
                                                <td>{{ $item->movie->title}}</td>
                                                <td>{{ $item->showtime->showtime_date }}</td>
                                                <td>{{ $item->seats }}</td>
                                                <td>{{ $item->created_at->format('d-m-Y')}}</td>
                                                <td>{{ number_format($item->transaction->total, 0, ',', ',')  }} VNĐ</td>
                                                <td>
                                                    <a href="{{ route('admin.ticket.show', $item->ticket_id) }}" class="btn btn-info">Xem</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
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
