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
                                            <div class="d-flex justifu-content-start">
                                                <form class="d-flex">
                                                    <input class="form-control me-2" type="text" placeholder="Tìm kiếm...">
                                                    <button class="btn btn-primary" type="button">Search</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="d-flex justify-content-end mb-5">
                                                <a href="{{ route('admin.movie.create') }}" class="btn btn-success">Thêm</a>
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
                                            <th>Tên Phim</th>
                                            <th>Thời Lượng</th>
                                            <th>Quốc Gia</th>
                                            <th>Mô Tả</th>
                                            <th>Năm</th>
                                            <th>Ngày Phát Hành</th>
                                            <th>Diễn Viên</th>
                                            <th>Trailer</th>
                                            <th>Tên Thể Loại</th>
                                            <th>Hình Ảnh</th>
                                            <th>Hành Động</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @if($movie->count() > 0)
                                        @foreach ($movie as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->duration }}</td>
                                                <td>{{ $item->country }}</td>
                                                <td>{{ $item->description }}</td>
                                                <td>{{ $item->year }}</td>
                                                <td>{{ $item->release_date }}</td>
                                                <td>{{ $item->actors }}</td>
                                                <td>
                                                    <iframe width="460" height="315"
                                                            src="{{ $item->trailer_url }}" title="YouTube video player"
                                                            frameborder="0"
                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                            referrerpolicy="strict-origin-when-cross-origin"
                                                            allowfullscreen></iframe>
                                                </td>
                                                <td>{{ $item->category->category_name }}</td>
                                                <td>

                                                    <img src="{{ asset($item->cover_image) }}" alt="Avatar"
                                                         width="100">
                                                </td>
                                                <td class="text-nowrap" style="width: 0px;">
                                                    <a href="{{ route('admin.movie.show', $item->movie_id) }}"
                                                       class="btn btn-primary">Xem</a>
                                                    <a href="{{ route('admin.movie.edit', $item->movie_id) }}"
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
                                                                    <h4 class="modal-title">Modal Heading</h4>
                                                                    <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"></button>
                                                                </div>

                                                                <!-- Modal body -->
                                                                <div class="modal-body">
                                                                    Bạn có chắc muốn xóa?
                                                                </div>

                                                                <!-- Modal footer -->
                                                                <div class="modal-footer">
                                                                    <form
                                                                        action="{{ route('admin.movie.destroy', $item->movie_id) }}"
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
