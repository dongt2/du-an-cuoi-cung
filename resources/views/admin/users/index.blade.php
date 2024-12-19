@extends('admin.layouts.default')

@section('title')
Users - Danh Sách User
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
                        <h4>Bảng Users</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Lexa</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Bảng</a></li>
                            <li class="breadcrumb-item active">Danh sách Users</li>
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
                                            <a href="{{ route('admin.users.create') }}" class="btn btn-success"><i
                                                class="fa-solid fa-plus"></i> Thêm</a>
                                        </div>
                                        @if (session('success'))
                                            <div class="alert alert-success" role="alert">
                                                <p class="text-success">{{ session('success') }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>



                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên </th>
                                            <th>Phone</th>
                                            <th>Cấp</th>
                                            <th>VIP</th>
                                            <th>Trạng thái</th>
                                            <th>Avatar</th>
                                            <th>Hành Động</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($users as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->username }}</td>
                                                <td>{{ $item->phone }}</td>
                                                <td>{{ $item->role }}</td>
                                                <td>{{ $item->is_vip }}</td>
                                                <td><span class="badge bg-primary">{{ $item->is_active }}</span></td>
                                                <td>
                                                    <img src="{{ asset($item->avata) }}" alt="" width="50" height="50">
                                                </td>
                                                <td class="text-nowrap" style="width: 0px;">
                                                        <a href="{{ route('admin.users.show', $item->user_id) }}"
                                                            class="btn btn-info"><i class="fa-solid fa-eye"></i></a>

                                                        <a href="{{ route('admin.users.edit', $item->user_id) }}"
                                                            class="btn btn-warning"><i
                                                            class="fa-solid fa-triangle-exclamation"></i></a>

                                                            <form action="{{ route('admin.users.destroy', $item->user_id) }}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')"><i
                                                                    class="fa-solid fa-trash" ></i></button>
                                                            </form>
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
