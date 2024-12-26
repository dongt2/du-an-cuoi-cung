@extends('admin.layout.default')

@section('title')
    @parent
    Sửa mã giảm giá
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
                    <h4 class="fs-18 fw-semibold m-0">Voucher</h4>
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
                            <h5 class="card-title mb-0">Sửa</h5>
                        </div><!-- end card header -->

                        <form action="{{ route('admin.voucher.update', $data->voucher_id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="mb-3">
                                            <label class="form-label">Tên mã giảm giá</label>
                                            <input type="text" class="form-control" id="" name="voucher_name"
                                                placeholder="Ví dụ: abc" value="{{ $data->voucher_name }}">
                                            @error('voucher_name')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Số lượng</label>
                                            <input type="number" class="form-control" id="" name="quantity"
                                                value="{{ $data->quantity }}">
                                            @error('quantity')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Ngày bắt đầu</label>
                                            <input type="date" class="form-control" id="inline-datepicker"
                                                name="start_date" placeholder="Chọn ngày bắt đầu" value="{{ $data->start_date->format('Y-m-d') }}">
                                            @error('start_date')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="mb-3">
                                            <label class="form-label">Code</label>
                                            <input type="text" class="form-control" id="" name="code"
                                                placeholder="Ví dụ: abc" value="{{ $data->code }}">
                                            @error('code')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Chiếu khấu %</label>
                                            <input type="number" class="form-control" id="" name="deduct_amount"
                                                value="{{ $data->deduct_amount }}">
                                            @error('deduct_amount')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div>
                                            <label class="form-label">Ngày kết thúc</label>
                                            <input type="date" class="form-control" id="inline-datepicker"
                                                name="end_date" placeholder="Chọn ngày kết thúc" value="{{ $data->end_date->format('Y-m-d') }}">
                                            @error('end_date')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary">Lưu</button>
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
