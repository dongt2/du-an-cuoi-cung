@extends('admin.layouts.default')

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
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <form action="{{ route('movie.update', $movie->movie_id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="" class="form-label">Tên Phim :</label>
                    <input type="text" class="form-control" id="" name="title" placeholder="Mời nhập tên" value="{{ $movie->title }}" disabled>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Thời Lượng :</label>
                    <input type="text" class="form-control" id="" name="duration"
                        placeholder="Mời nhập thời lượng" value="{{ $movie->duration }}" disabled>
                </div>


                <div class="mb-3">
                    <label for="" class="form-label">Quốc Gia :</label>
                    <input type="text" class="form-control" id="" name="country"
                        placeholder="Mời nhập quốc gia" value="{{ $movie->country }}" disabled>
                </div>


                <div class="mb-3">
                    <label for="" class="form-label">Mô Tả :</label>
                    <textarea class="form-control" id="" rows="3" name="description" disabled>{{ $movie->description }} </textarea>
                </div>



                <div class="mb-3">
                    <label for="" class="form-label">Năm Xuất Bản:</label>
                    <input type="text" class="form-control" id="" name="year" placeholder="YYYY"
                        min="1900" max="2099" value="{{ $movie->year }}" disabled>
                </div>



                <div class="mb-3">
                    <label for="" class="form-label">Ngày Phát Hành :</label>
                    <input type="date" class="form-control" id="" name="release_date" value="{{ $movie->release_date }}" disabled>
                </div>



                <div class="mb-3">
                    <label for="" class="form-label">Diễn Viên:</label>
                    <input type="text" class="form-control" id="" name="actors"
                        placeholder="Mời nhập diễn viên" value="{{ $movie->actors }}" disabled>
                </div>



                <div class="mb-3">
                    <label for="" class="form-label">Trailer:</label>
                    <input type="text" class="form-control" id="" name="trailer_url" placeholder="Link..." value="{{ $movie->trailer_url }}" disabled>
                </div>



                <div class="mb-3">
                    <label for="" class="form-label">Thể Loại:</label>
                    <select class="form-select" name="category_id" disabled>
                        @foreach ($category as $cat)
                            <option value="{{ $cat->category_id }}" @selected($cat->category_id == $movie->category_id)>{{ $cat->category_name }}</option>
                        @endforeach
                    </select>

                </div>



                <div class="mb-3">
                    <label for="" class="form-label">Hình Ảnh:</label>
                    {{-- <input type="file" class="form-control" id="" name="image"> --}}
                    <img src="{{ asset($movie->cover_image) }}" alt="" width="400" class="mt-4" disabled>


                </div>


                <a href="{{ route('movie.index') }}" class="btn btn-secondary mt-5 mb-5">Quay lại</a>

            </form>
            <!-- end page title -->


        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
@section('content')
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
