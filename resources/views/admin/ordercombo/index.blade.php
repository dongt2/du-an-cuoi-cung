@extends('admin.layouts.default')

@section('title')
    OrederCombos - Danh Sách Order Combo
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title-box">
                        <h4>Bảng Users</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Lexa</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Bảng</a></li>
                            <li class="breadcrumb-item active">Danh sách Order Combo</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="">
                                    <div class="col">
                                        <div class="d-flex justify-content-end mb-5">
                                            <a href="{{ route('admin.combos.create') }}" class="btn btn-success">Thêm</a>
                                        </div>
                                        @if (Session::has('success'))
                                            <script>
                                                swal("success", "{{ Session::get('success') }}", 'success', {
                                                    button: true,
                                                    button: "OK",
                                                    timer: 2000,
                                                })
                                            </script>
                                        @endif
                                    </div>
                                </div>



                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Combo đặt</th>
                                            <th>Số lượng</th>
                                            <th>Giá</th>
                                            <th>Hành Động</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->combo->combo_name }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ $item->total_price }}</td>
                                                <td></td>
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
