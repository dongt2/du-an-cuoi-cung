@extends('admin.layout.default')

@section('title')
    @parent
    Thêm mới mã giảm giá
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

                        <form action="{{ route('admin.voucher.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="mb-3">
                                            <label class="form-label">Tên mã giảm giá</label>
                                            <input type="text" class="form-control" id="" name="voucher_name"
                                                placeholder="Ví dụ: abc">
                                            @error('voucher_name')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Số lượng</label>
                                            <input type="number" class="form-control" id="" name="quantity"
                                                value="0">
                                            @error('quantity')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Ngày bắt đầu</label>
                                            <input type="date" class="form-control" id="inline-datepicker"
                                                name="start_date" placeholder="Chọn ngày bắt đầu">
                                            @error('start_date')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="mb-3">
                                            <label class="form-label">Code</label>
                                            <input type="text" class="form-control" id="" name="code"
                                                placeholder="Ví dụ: abc">
                                            @error('code')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Chiếu khấu %</label>
                                            <input type="number" class="form-control" id="" name="deduct_amount"
                                                value="0">
                                            @error('deduct_amount')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div>
                                            <label class="form-label">Ngày kết thúc</label>
                                            <input type="date" class="form-control" id="inline-datepicker"
                                                name="end_date" placeholder="Chọn ngày kết thúc">
                                            @error('end_date')
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
