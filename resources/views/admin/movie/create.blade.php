@extends('admin.layout.default')

@section('title')
    @parent
    Thêm mới phim
@endsection

@push('style')
    <!-- Flatpickr Timepicker css -->
    <!-- CSS Select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />


    <link href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />


    <link rel="stylesheet" href="{{ asset('summernote-0.9.0-dist/summernote-lite.min.css') }}">
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
                            <h5 class="card-title mb-0"><strong>Thêm mới phim</strong></h5>
                        </div><!-- end card header -->

                        <form action="{{ route('admin.movie.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="mb-3">
                                            <label class="form-label">Tên phim</label>
                                            <input type="text" class="form-control" id="" name="title"
                                                placeholder="Tên phim" value="{{ old('title') }}">
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
                                                name="duration" max="1000" placeholder="Thời lượng phim"
                                                value="{{ old('duration') }}">
                                            @error('duration')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Quốc gia</label>
                                            <input type="text" class="form-control" id="" name="country"
                                                placeholder="Nhập quốc gia" value="{{ old('country') }}">
                                            @error('country')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Năm sản xuất</label>
                                            <input type="number" class="form-control" id="year" min="1500"
                                                max="{{ date('Y') }}" name="year" placeholder="Nhập năm sản xuất"
                                                value="{{ old('year') }}">
                                            @error('year')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Tác giả</label>
                                            <select class="form-control select2" id="directors" name="directors[]"
                                                multiple="multiple">

                                                @foreach ($director as $item)
                                                    <option value="{{ $item->id }}">{{ $item->directors }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('directors')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Diễn viên</label>
                                            <select class="form-control select2" id="actors" name="actors[]"
                                                multiple="multiple">

                                                @foreach ($actor as $item)
                                                    <option value="{{ $item->id }}">{{ $item->actor_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('actors')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Thể loại</label>
                                            <select class="form-control select2" id="categories" name="categories[]"
                                                multiple="multiple">

                                                @foreach ($data as $item)
                                                    <option value="{{ $item->category_id }}">{{ $item->category_name }}
                                                    </option>
                                                @endforeach
                                            </select>


                                            @error('categories')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
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

                                    <div class="mb-3">
                                        <label class="form-label" for="description">Mô tả</label>
                                        <textarea class="form-control" id="summernote" name="description" rows="3" placeholder="Nhập mô tả phim"></textarea>
                                        @error('description')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
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
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- JS Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>

    <script src="{{ asset('summernote-0.9.0-dist/summernote-lite.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });

        $('#summernote').summernote({
            placeholder: 'mô tả',
            tabsize: 2,
            height: 100
        });
    </script>

    {{-- <script>
        $(document).ready(function() {
            $('.selectactors').select2({
                placeholder: "Chon tac gia",
                allowClear: true,
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.selectcategories').select2({
                placeholder: "Chon tac gia",
                allowClear: true,
            });
        }); --}}
    </script>

    <!-- Flatpickr Timepicker Plugin js -->
    <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>

    <script src="{{ asset('assets/js/pages/form-picker.js') }}"></script>
@endpush
