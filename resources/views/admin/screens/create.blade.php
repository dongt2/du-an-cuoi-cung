@extends('admin.layouts.default')

@section('title')
    Thêm Phòng phim
@endsection

@section('content')
    <div class="row mt-3">
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mt-3">Thêm Phòng phim</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <form action="{{ route('admin.screen.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="screen_name" class="form-label">Tên phòng</label>
                            <input type="text" class="form-control mb-2" id="screen_name" name="screen_name">
                            @error('screen_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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
