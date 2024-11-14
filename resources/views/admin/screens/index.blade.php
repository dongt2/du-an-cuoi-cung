@extends('admin.layouts.default')

@section('title')
    Danh sách Phòng phim
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
                        <h4>Quản lý phòng chiếu</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Lexa</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Bảng</a></li>
                            <li class="breadcrumb-item active">Quản lý phòng chiếu</li>
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
                                Danh sách Phòng phim
                            </h4>

                            <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a href="{{ route('admin.screen.create') }}" class="btn btn-primary mb-3">Thêm mới</a>
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Phòng phim</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach ($listScreens as $key => $screen)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $screen->screen_name }}</td>
                                                    <td class="d-flex gap-1">
                                                        <a href="{{ route('admin.screen.edit', $screen->screen_id) }}"
                                                           class="btn btn-primary">Edit</a>
                                                        <form action="{{ route('admin.screen.destroy', $screen->screen_id) }}"
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
                                        {{ $listScreens->links() }}
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="datatable-buttons_info" role="status" aria-live="polite">
                                            Showing 1 to 10 of 57 entries</div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="datatable-buttons_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous disabled"
                                                    id="datatable-buttons_previous"><a aria-controls="datatable-buttons"
                                                        aria-disabled="true" role="link" data-dt-idx="previous" tabindex="-1"
                                                        class="page-link">Previous</a></li>
                                                <li class="paginate_button page-item active"><a href="#"
                                                        aria-controls="datatable-buttons" role="link" aria-current="page"
                                                        data-dt-idx="0" tabindex="0" class="page-link">1</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="datatable-buttons" role="link" data-dt-idx="1"
                                                        tabindex="0" class="page-link">2</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="datatable-buttons" role="link" data-dt-idx="2"
                                                        tabindex="0" class="page-link">3</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="datatable-buttons" role="link" data-dt-idx="3"
                                                        tabindex="0" class="page-link">4</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="datatable-buttons" role="link" data-dt-idx="4"
                                                        tabindex="0" class="page-link">5</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="datatable-buttons" role="link" data-dt-idx="5"
                                                        tabindex="0" class="page-link">6</a></li>
                                                <li class="paginate_button page-item next" id="datatable-buttons_next"><a
                                                        href="#" aria-controls="datatable-buttons" role="link"
                                                        data-dt-idx="next" tabindex="0" class="page-link">Next</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> --}}
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
