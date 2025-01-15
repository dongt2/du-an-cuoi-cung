@extends('admin.layout.default')

@section('title')
    @parent
    Thêm mới xuất chiếu
@endsection

@push('style')
    <!-- Flatpickr Timepicker css -->
    <link href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            </div>

            <!-- Advance Form -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0"><strong>Thêm mới</strong></h5>
                        </div><!-- end card header -->

                        <form action="{{ route('admin.showtime.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="mb-3">
                                            <label for="movie_id" class="form-label">Tên Phim</label>
                                            <select name="movie_id" id="movie_id" class="form-control">
                                                <option value="" hidden> -- Chọn Phim -- </option>
                                                @foreach ($listMovies as $movie)
                                                    <option value="{{ $movie->movie_id }}">{{ $movie->title }}</option>
                                                @endforeach
                                            </select>
                                            @error('movie_id')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="mb-3">
                                            <label for="screen_id" class="form-label">Tên Phòng</label>
                                            <select name="screen_id" id="screen_id" class="form-control">
                                                <option value="" hidden> -- Chọn Phòng -- </option>
                                                @foreach ($listScreens as $screen)
                                                    <option value="{{ $screen->screen_id }}">{{ $screen->screen_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('screen_id')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="mb-3">
                                            <label for="showtime_date" class="form-label">Ngày chiếu phim</label>
                                            <input type="date" name="showtime_date" id="inline-datepicker"
                                                class="form-control" placeholder="dd/mm/yyyy">
                                            @error('showtime_date')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="mb-3">
                                            <label for="time" class="form-label">Thời gian</label>
                                            <input type="time" name="time" id="time" min="0"
                                                max="23" class="form-control">
                                            @error('time')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary">Thêm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- container-fluid -->

    </div> <!-- content -->
@endsection

@push('script')
    <!-- Flatpickr Timepicker Plugin js -->
    <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>

    <script src="{{ asset('assets/js/pages/form-picker.js') }}"></script>
@endpush
