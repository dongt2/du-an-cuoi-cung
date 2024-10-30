@extends('admin.layouts.default')

@section('title')
    Thêm Xuất chiếu
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
                            <input type="text" name="showtime_date" id="showtime_date" class="form-control"
                                placeholder="dd/mm/yyyy" required>
                            @error('showtime_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="hours" class="form-label">Giờ</label>
                            <input type="number" name="hours" id="hours" min="0" max="23"
                                class="form-control" required>
                            @error('hours')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="minutes" class="form-label">Phút</label>
                            <input type="number" name="minutes" id="minutes" min="0" max="59"
                                class="form-control" required>
                            @error('minutes')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="seconds" class="form-label">Giây</label>
                            <input type="number" name="seconds" id="seconds" min="0" max="59"
                                class="form-control" required>
                            @error('seconds')
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
