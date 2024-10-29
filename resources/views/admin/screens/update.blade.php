@extends('admin.layouts.default')

@section('title')
    Sửa Phòng phim
@endsection

@section('content')
    <div class="row mt-3">
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mt-3">Sửa Phòng phim</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <form action="{{ route('admin.screen.update', $screen->screen_id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="screen_name" class="form-label mb-4">Tên phòng</label>
                            <input type="text" class="form-control mb-3" id="screen_name" name="screen_name" value="{{ $screen->screen_name }}">
                            @error('screen_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary ">Save</button>
                        <a href="{{ route('admin.screen.index') }}" class="btn btn-primary">Quay lại</a>
                    </form>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection
