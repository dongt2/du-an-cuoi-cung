@extends('admin.layouts.default')

@section('title')
Categories - Danh Sách Category
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
    {{-- sweet alert  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- font icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title-box">
                        <h4>Bảng Categorys</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Lexa</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Bảng</a></li>
                            <li class="breadcrumb-item active">Danh sách Categorys</li>
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
                                <div class="d-flex justify-content-end mb-5">
                                    <a href="{{ route('category.create') }}" class="btn btn-success">Thêm</a>
                                </div>
                                @if (Session::has('success'))
                                    <script>
                                        swal("success", "{{ Session::get('success') }}", 'success', {
                                            button: true,
                                            button: "OK",
                                        })
                                    </script>
                                @endif

                                @if (session('errors'))
                                    <div class="alert alert-danger" role="alert">
                                        <p class="text-danger">{{ session('errors') }}</p>
                                    </div>
                                @endif

                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên Thể Loại</th>
                                            <th>Tổng Thể Loại</th>
                                            <th>Hành Động</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($category as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->category_name }}</td>
                                                <td>{{ $item->movies()->count() }}</td>
                                                <td class="text-nowrap" style="width: 0px;">
                                                    <a href="{{ route('category.show', $item->category_id) }}"
                                                        class="btn btn-primary">Xem</a>
                                                    <a href="{{ route('category.edit', $item->category_id) }}"
                                                        class="btn btn-warning">Sửa</a>
                                                    <!-- Button to Open the Modal -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#myModal">
                                                        Xóa
                                                    </button>

                                                    <!-- The Modal -->
                                                    <div class="modal" id="myModal">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <!-- Modal Header -->
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title text-danger"><i class="fa-solid fa-triangle-exclamation"></i> Cảnh
                                                                        báo</h4>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"></button>
                                                                </div>

                                                                <!-- Modal body -->
                                                                <div class="modal-body">
                                                                    Bạn có chắc không?
                                                                </div>

                                                                <!-- Modal footer -->
                                                                <div class="modal-footer">
                                                                    <form
                                                                        action="{{ route('category.destroy', $item->category_id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Xóa</button>
                                                                    </form>
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $category->links() }}
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