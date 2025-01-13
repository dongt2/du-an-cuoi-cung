@extends('admin.layout.default')

@section('title')
    @parent
    Thêm mới combo
@endsection

@push('style')
    <!-- Flatpickr Timepicker css -->
    <link href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('summernote-0.9.0-dist/summernote-lite.min.css') }}">
@endpush

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Combo</h4>
                </div>

            </div>

            <!-- Advance Form -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Thêm mới</h5>
                        </div><!-- end card header -->

                        <form action="{{ route('admin.combo.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="mb-3">
                                            <label class="form-label">Tên sản phẩm</label>
                                            <input type="text" class="form-control" id="" name="combo_name"
                                                placeholder="Tên combo">
                                            @error('combo_name')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Ảnh</label>
                                            <input type="file" class="form-control" id="" name="image"
                                                placeholder="Thêm hình ảnh">
                                            @error('image')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Giá</label>
                                            <input type="text" class="form-control" name="price"
                                                placeholder="Nhập giá">
                                            @error('price')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Số lượng</label>
                                            <input type="number" class="form-control" name="quantity"
                                                   placeholder="Nhập số lượng">
                                            @error('quantity')
                                            <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="short_description">Mô tả</label>
                                        <textarea class="form-control" id="summernote" name="short_description" rows="3"
                                            placeholder="Nhập mô tả combo"></textarea>
                                        @error('short_description')
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

<script src="{{ asset('summernote-0.9.0-dist/summernote-lite.min.js') }}"></script>
    <script>


        $('#summernote').summernote({
            placeholder: 'Nhập mô tả sản phẩm',
            tabsize: 2,
            height: 100
        });
    </script>

@endpush
