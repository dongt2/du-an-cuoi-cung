@extends('admin.layouts.default')

@section('title')
    Lexa - Admin & Movies
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
                        <h4>Danh sách Movie</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Lexa</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Bảng</a></li>
                            <li class="breadcrumb-item active">Danh sách Movie</li>
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
                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex justify-content-end mb-5">
                                            <a href="{{ route('admin.movie.create') }}" class="btn btn-success"><i
                                                class="fa-solid fa-plus"></i> Thêm</a>
                                        </div>
                                    </div>
                                </div>



                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr style="text-align: center; font-family: 'Times New Roman', Times, serif">
                                            <th>STT</th>
                                            <th>Tên Phim</th>
                                            <th>Thời Lượng</th>
                                            <th>Ngày Phát Hành</th>
                                            <th>Trailer</th>
                                            <th>Tên Thể Loại</th>
                                            <th>Hình Ảnh</th>
                                            <th>Hành Động</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if ($movie->count() > 0)
                                            @foreach ($movie as $item)
                                                <tr>
                                                    <td><strong>{{ $loop->iteration }}</strong></td>
                                                    <td>{{ $item->title }}</td>
                                                    <td>{{ $item->duration }}</td>
                                                    <td>{{ $item->release_date->format('d-m-Y') }}</td>
                                                    <td>

                                                            <iframe src="{{ $item->trailer_url }}" frameborder="0"></iframe>
                                                    </td>
                                                    <td>{{ $item->category?->category_name }}</td>
                                                    <td>

                                                        <img src="{{ asset($item->cover_image) }}" alt="Avatar"
                                                            width="100">
                                                    </td>
                                                    <td class="text-nowrap" style="width: 0px;">
                                                        <a href="{{ route('admin.movie.show', $item->movie_id) }}"
                                                            class="btn btn-info"><i class="fa-solid fa-eye"></i></a>
                                                        <a href="{{ route('admin.movie.edit', $item->movie_id) }}"
                                                            class="btn btn-warning"><i
                                                            class="fa-solid fa-triangle-exclamation"></i></a>
                                                        <form action="{{ route('admin.movie.destroy', $item->movie_id) }}"
                                                            method="post" class="mt-2">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')"><i
                                                                class="fa-solid fa-trash" ></i></button>
                                                        </form>



                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="12" class="text-center">Không có dữ liệu</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                                {{ $movie->links() }}
                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
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
