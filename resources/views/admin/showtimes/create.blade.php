@extends('admin.layouts.default')

@section('title')
    Thêm Xuất chiếu
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
    <div class="row mt-3">
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mt-3">Thêm Xuất chiếu</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <form action="{{ route('admin.showtime.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="movie_id" class="form-label">Tên Phim</label>
                            <select name="movie_id" id="movie_id" class="form-control">
                                <option value="">Chọn Phim</option>
                                @foreach ($listMovies as $movie)
                                    <option value="{{ $movie->movie_id }}">{{ $movie->title }}</option>
                                @endforeach
                            </select>
                            @error('movie_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="screen_id" class="form-label">Tên Phòng</label>
                            <select name="screen_id" id="screen_id" class="form-control">
                                <option value="">Chọn Phòng</option>
                                @foreach ($listScreens as $screen)
                                    <option value="{{ $screen->screen_id }}">{{ $screen->screen_name }}</option>
                                @endforeach
                            </select>
                            @error('screen_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="showtime_date" class="form-label">Ngày chiếu phim</label>
                            <input type="date" name="showtime_date" id="showtime_date" class="form-control"
                                placeholder="dd/mm/yyyy" required>
                            @error('showtime_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="time" class="form-label">Thời gian</label>
                            <input type="time" name="time" id="time" min="0" max="23"
                                class="form-control" required>
                            @error('time')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Lưu</button>
                    </form>

                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
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
