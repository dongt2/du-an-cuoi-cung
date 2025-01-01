@extends('admin.layout.default')

@section('title')
    @parent
    Thêm mới người dùng
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
                    <h4 class="fs-18 fw-semibold m-0">User</h4>
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

                        <form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="mb-3">
                                            <label class="form-label">Tên người dùng</label>
                                            <input type="text" class="form-control" id="" name="username"
                                                placeholder="Tên người dùng">
                                            @error('username')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Ảnh</label>
                                            <input type="file" class="form-control" id="" name="avata"
                                                placeholder="Thêm hình ảnh">
                                            @error('avata')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="text" class="form-control" id="" name="email"
                                                placeholder="Email">
                                            @error('email')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input type="text" class="form-control" id="" name="password"
                                                placeholder="Nhập password">
                                            @error('password')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Số điện thoại</label>
                                            <input type="text" class="form-control" id="" name="phone"
                                                placeholder="Nhập số điện thoại">
                                            @error('phone')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Địa chỉ</label>
                                            <input type="text" class="form-control" id="" name="address"
                                                placeholder="Nhập Địa chỉ">
                                            @error('address')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Chọn vai trò</label>
                                            <select class="form-control" id="" name="role">
                                                <option value=""></option>
                                                <option value="Admin">Admin</option>
                                                <option value="Nhan Vien">Nhan Vien</option>
                                                <option value="Khach Hang">Khach Hang</option>
                                            </select>
                                            @error('role')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="col-xl-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="is_active">Trạng thái hoạt động</label>
                                            <input type="text" class="form-control" name="is_active"
                                                placeholder="Chọn trang thái hoạt động (0 : không , 1: có)">
                                            @error('is_active')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="is_vip">Trạng thái vip</label>
                                            <input type="text" class="form-control" name="is_vip"
                                                placeholder="Chọn trang thái vip (0 : không , 1: có)">
                                            @error('is_vip')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        {{-- <div>
                                            <label class="form-label">Nhớ</label>
                                            <input type="date" class="form-control" id="inline-datepicker"
                                                name="remember_token" value="{{ $data->remember_token }}"
                                                placeholder="Chọn ngày phát hành">
                                            @error('remember_token')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div> --}}
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
