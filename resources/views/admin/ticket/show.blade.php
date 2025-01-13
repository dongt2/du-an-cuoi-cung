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
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row mt-5">
                <form action="\#" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4">

                                <div class="mb-3" style="margin-left: 170px">
                                    <label class="form-label">Ảnh</label><br>
                                    <img src="{{ Storage::url($ticket->qr_code) }}" alt="" class="img-fluid"
                                        width="230px" height="130px">
                                </div>
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
                                        value="{{ $ticket->user->username }}" disabled">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Tên phim</label>
                                    <input type="text" class="form-control" name="release_date"
                                        value="{{ $ticket->movie->title }}" disabled>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Ghế</label>
                                    <input type="text" class="form-control" name="release_date"
                                        value="{{ $ticket->seats }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Ngày đặt</label>
                                    <input type="text" class="form-control" id="" name=""
                                        value="{{ $ticket->showtime->showtime_date }}" disabled>
                                </div>
                        
                                <div class="mb-3">
                                    <label class="form-label">Giá</label>
                                    <input type="text" class="form-control" id="" name=""
                                        value="{{ number_format($ticket->transaction->total, 0, ',', ',')  }} VNĐ" disabled>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Checkin</label>
                                    <input type="text" class="form-control" id="" name=""
                                        value="{{ $ticket->checkin }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Trạng thái</label>
                                    <input type="text" class="form-control" id="" name=""
                                        value="{{ $ticket->status }}" disabled>
                                </div>


                                <div class="mb-3">
                                    <a href="{{ route('admin.ticket.index') }}" class="btn btn-primary">Quay lại</a>
                                </div>
                            </div>

                        </div>

                    </div>
                </form>
            </div> <!-- end row -->
            <!-- end page title -->


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
