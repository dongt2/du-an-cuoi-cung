@extends('admin.layout.default')

@section('title')
    @parent
    Thêm mới phim
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
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Movie</h4>
                </div>

                {{-- <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                        <li class="breadcrumb-item active">Form Pickers</li>
                    </ol>
                </div> --}}
            </div>

            <!-- Advance Form -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Thêm mới</h5>
                        </div><!-- end card header -->

                        <form action="{{ route('admin.movie.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="mb-3">
                                            <label class="form-label">Tên phim</label>
                                            <input type="text" class="form-control" id="" name="title"
                                                placeholder="Tên phim">
                                            @error('title')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Ảnh</label>
                                            <input type="file" class="form-control" id="" name="cover_image"
                                                placeholder="Thêm hình ảnh">
                                            @error('cover_image')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Thời lượng</label>
                                            <input type="text" class="form-control" id="" min="1"
                                                name="duration" max="1000" placeholder="Thời lượng phim">
                                            @error('duration')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Quốc gia</label>
                                            <input type="text" class="form-control" id="" name="country"
                                                placeholder="Nhập quốc gia">
                                            @error('country')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Năm sản xuất</label>
                                            <input type="number" class="form-control" id="year" min="1500"
                                                max="{{ date('Y') }}" name="year" placeholder="Nhập năm sản xuất">
                                            @error('year')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Tác giả</label>
                                            <input type="text" class="form-control" id="" name="director"
                                                placeholder="Nhập tên tác giả">
                                            @error('director')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Diễn viên</label>
                                            <input type="text" class="form-control" id="" name="actors"
                                                placeholder="Nhập tên diễn viên">
                                            @error('actors')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Thể loại</label>
                                            <select class="form-control" id="" name="category_id">
                                                <option value="" disabled selected
                                                    style="color: #6c757d; opacity: 0.1;">--Chọn thể loại--</option>
                                                @foreach ($data as $item)
                                                    <option value="{{ $item->category_id }}">{{ $item->category_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="description">Mô tả</label>
                                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Nhập mô tả phim"></textarea>
                                            @error('description')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Trailer-url</label>
                                            <input type="text" class="form-control" id="" name="trailer_url"
                                                placeholder="Đường dẫn trailer">
                                            @error('trailer_url')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div>
                                            <label class="form-label">Ngày phát hành</label>
                                            <input type="date" class="form-control" id="inline-datepicker"
                                                name="release_date" placeholder="Chọn ngày phát hành">
                                            @error('release_date')
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
