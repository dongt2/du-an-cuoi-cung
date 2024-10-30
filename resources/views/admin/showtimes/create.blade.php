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
                    <form action="{{ route('admin.showtime.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="screen_name" class="form-label">Tên Phim</label>
                            <select name="movie_id" id="" class="form-control">
                                <option value="">Chọn Phim</option>
                                @foreach ($listMovies as $movie)
                                    <option value="{{ $movie->movie_id }}">{{ $movie->title }}</option>
                                @endforeach
                            </select>
                            {{-- @error('movie_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror --}}
                        </div>
                        <div class="mb-3">
                            <label for="screen_name" class="form-label">Tên Phòng</label>
                            <select name="screen_id" id="" class="form-control">
                                <option value="">Chọn Phòng</option>
                                @foreach ($listScreens as $screen)
                                    <option value="{{ $screen->screen_id }}">{{ $screen->screen_name }}</option>
                                @endforeach
                            </select>
                            {{-- @error('screen_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror --}}
                        </div>
                        <div class="mb-3">
                            <label for="showtime_date" class="form-label">Ngày chiếu phim</label>
                            <input type="date" name="showtime_date" id="" class="form-control">
                            {{-- @error('showtime_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror --}}
                        </div>
                        <div class="mb-3">
                            <label for="time" class="form-label">Thời lượng phim</label>
                            <div class="d-flex">
                                <input type="number" name="hours" id="hours" min="0" max="23" class="form-control me-2" placeholder="Giờ">
                                <input type="number" name="minutes" id="minutes" min="0" max="59" class="form-control" placeholder="Phút">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Save</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection
