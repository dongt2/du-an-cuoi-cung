@extends('admin.layouts.default')

@section('title')
    Danh sách Xuất chiếu
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
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title-box">
                        <h4>Quản lý xuất chiếu</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Lexa</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Bảng</a></li>
                            <li class="breadcrumb-item active">Quản lý xuất chiếu</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row mt-3">
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                Danh sách Xuất chiếu
                            </h4>

                            <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a href="{{ route('admin.showtime.create') }}" class="btn btn-primary mb-3">Thêm mới</a>
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên phim</th>
                                                <th>Tên phòng</th>
                                                <th>Ngày chiếu</th>
                                                <th>Thời gian</th>
                                                <th>Hành động</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach ($data as $key => $showtime)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $showtime->movie_title }}</td>

                                                    <td>{{ $showtime->screen_name }}</td>

                                                    <td>{{ \Carbon\Carbon::parse($showtime->showtime_date)->format('d-m-Y') }}</td>

                                                    <td>{{ \Carbon\Carbon::parse($showtime->time)->format('H:i') }}</td>


                                                    <td class="d-flex gap-1">
                                                        <a href="{{ route('admin.showtime.edit', $showtime->showtime_id) }}"
                                                           class="btn btn-primary">Edit</a>
                                                        <form
                                                            action="{{ route('admin.showtime.destroy', $showtime->showtime_id) }}"
                                                            method="post" class="">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button onclick="return confirm('Are you delete?')" type="submit"
                                                                    class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        {{ $data->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
        </div>
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

    <!-- Table Editable plugin -->
    <script src="assets/libs/table-edits/build/table-edits.min.js"></script>

    <script src="assets/js/pages/table-editable.int.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>
@endsection
