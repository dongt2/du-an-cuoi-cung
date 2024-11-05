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
                    <input type="text" class="form-control" id="" name="title" placeholder="Mời nhập tên" value="{{ $movie->title }}">
                </div>

                @if ($errors->has('title'))
                    <div class="text-danger mb-3">
                        {{ $errors->first('title') }}
                    </div>
                @endif

                <div class="mb-3">
                    <label for="" class="form-label">Thời Lượng :</label>
                    <input type="text" class="form-control" id="" name="duration"
                        placeholder="Mời nhập thời lượng" value="{{ $movie->duration }}">
                </div>

                @if ($errors->has('duration'))
                    <div class="text-danger mb-3">
                        {{ $errors->first('duration') }}
                    </div>
                @endif

                <div class="mb-3">
                    <label for="" class="form-label">Quốc Gia :</label>
                    <input type="text" class="form-control" id="" name="country"
                        placeholder="Mời nhập quốc gia" value="{{ $movie->country }}">
                </div>

                @if ($errors->has('country'))
                    <div class="text-danger mb-3">
                        {{ $errors->first('country') }}
                    </div>
                @endif

                <div class="mb-3">
                    <label for="" class="form-label">Mô Tả :</label>
                    <textarea class="form-control" id="" rows="3" name="description">{{ $movie->description }}</textarea>
                </div>

                @if ($errors->has('description'))
                    <div class="text-danger mb-3">
                        {{ $errors->first('description') }}
                    </div>
                @endif

                <div class="mb-3">
                    <label for="" class="form-label">Năm Xuất Bản:</label>
                    <input type="text" class="form-control" id="" name="year" placeholder="YYYY"
                        min="1900" max="2099" value="{{ $movie->year }}">
                </div>

                @if ($errors->has('year'))
                    <div class="text-danger mb-3">
                        {{ $errors->first('year') }}
                    </div>
                @endif

                <div class="mb-3">
                    <label for="" class="form-label">Ngày Phát Hành :</label>
                    <input type="date" class="form-control" id="" name="release_date" value="{{ $movie->release_date }}">
                </div>

                @if ($errors->has('release_date'))
                    <div class="text-danger mb-3">
                        {{ $errors->first('release_date') }}
                    </div>
                @endif

                <div class="mb-3">
                    <label for="" class="form-label">Diễn Viên:</label>
                    <input type="text" class="form-control" id="" name="actors"
                        placeholder="Mời nhập diễn viên" value="{{ $movie->actors }}">
                </div>

                @if ($errors->has('actors'))
                    <div class="text-danger mb-3">
                        {{ $errors->first('actors') }}
                    </div>
                @endif

                <div class="mb-3">
                    <label for="" class="form-label">Trailer:</label>
                    <input type="text" class="form-control" id="" name="trailer_url" placeholder="Link..." value="{{ $movie->trailer_url }}">
                </div>

                @if ($errors->has('trailer_url'))
                    <div class="text-danger mb-3">
                        {{ $errors->first('trailer_url') }}
                    </div>
                @endif

                <div class="mb-3">
                    <label for="" class="form-label">Thể Loại:</label>
                    <select class="form-select" name="category_id">
                        @foreach ($category as $cat)
                            <option value="{{ $cat->category_id }}" @selected($cat->category_id == $movie->category_id)>{{ $cat->category_name }}</option>
                        @endforeach
                    </select>

                </div>

                @if ($errors->has('category_id'))
                    <div class="text-danger mb-3">
                        {{ $errors->first('category_id') }}
                    </div>
                @endif

                <div class="mb-3">
                    <label for="" class="form-label">Hình Ảnh:</label>
                    <input type="file" class="form-control" id="" name="image">
                    @if ($movie->cover_image)
                    <img src="{{ asset($movie->cover_image) }}" alt="" width="100" class="mt-4">
                    @else

                    @endif

                </div>
                @if ($errors->has('image'))
                    <div class="text-danger mb-3">
                        {{ $errors->first('image') }}
                    </div>
                @endif

                <a href="{{ route('movie.index') }}" class="btn btn-primary">Quay lại</a>
                <button type="submit" class="btn btn-success">Sửa phim</button>
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
