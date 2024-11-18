@extends('admin.layouts.default')

@section('title')
    Users - Thêm User
@endsection

@section('head')
    <base href="/">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <form action="{{ route('users.update', $user->user_id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="" class="col-2 col-form-label">Tên Người Dùng : </label>
                    <div class="col-10">
                        <input type="text" class="form-control" name="username"
                            placeholder="username" value="{{ $user->username }}">
                    </div>
                </div>
                @if ($errors->has('username'))
                    <div class="row .text-danger">
                        <div class="col-2"></div>
                        <div class="col-10">
                            <p class="text-danger">{{ $errors->first('username') }}</p>
                        </div>
                    </div>
                @endif

                <div class="mb-3 row">
                    <label for="" class="col-2 col-form-label">Mật Khẩu : </label>
                    <div class="col-10">
                        <input type="password" class="form-control" name="password"
                            placeholder="password" value="{{ $user->password }}">
                    </div>
                </div>
                @if ($errors->has('password'))
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-10">
                            <p class="text-danger">{{ $errors->first('password') }}</p>
                        </div>
                    </div>
                @endif

                <div class="mb-3 row">
                    <label for="" class="col-2 col-form-label">Email : </label>
                    <div class="col-10">
                        <input type="email" class="form-control" name="email"  placeholder="email"
                        value="{{ $user->email }}">
                    </div>
                </div>
                @if ($errors->has('email'))
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-10">
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        </div>
                    </div>
                @endif

                <div class="mb-3 row">
                    <label for="" class="col-2 col-form-label">Số Điện Thoại : </label>
                    <div class="col-10">
                        <input type="text" class="form-control" name="phone"  placeholder="phone" value="{{ $user->phone }}">
                    </div>
                </div>
                @if ($errors->has('phone'))
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-10">
                            <p class="text-danger">{{ $errors->first('phone') }}</p>
                        </div>
                    </div>
                @endif

                <div class="mb-3 row">
                    <label for="" class="col-2 col-form-label">Địa Chỉ : </label>
                    <div class="col-10">
                        <input type="text" class="form-control" name="address"
                            placeholder="address" value="{{ $user->address }}">
                    </div>
                </div>
                @if ($errors->has('address'))
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-10">
                            <p class="text-danger">{{ $errors->first('address') }}</p>
                        </div>
                    </div>
                @endif

                <div class="mb-3 row">
                    <label for="" class="col-2 col-form-label">Quyền : </label>
                    <div class="col-10">
                        <select class="form-select form-select-lg" name="role">
                            <option @selected($user->role == 'Khách Hàng')  value="Khách hàng">Khách Hàng</option>
                            <option @selected($user->role == 'Nhân Viên') value="Nhân Viên">Nhân Viên</option>
                            <option @selected($user->role == 'Admin') value="Admin">Admin</option>
                        </select>
                    </div>
                </div>


                <div class="mb-3 row">
                    <label for="" class="col-2 col-form-label">Trạng Thái : </label>
                    <div class="col-10">
                        <select class="form-select form-select-lg" name="is_active">
                            <option @selected($user->is_active == 'Hoạt động') value="Hoạt động">Hoạt Động</option>
                            <option @selected($user->is_active == 'Tắt') value="Tắt">Tắt</option>
                        </select>
                    </div>
                </div>



                <div class="mb-3 row">
                    <label for="" class="col-2 col-form-label">Khách Hàng : </label>
                    <div class="col-10">
                        <select class="form-select form-select-lg" name="is_vip">
                            <option @selected($user->is_vip == 'Thường') value="Thường">Thường</option>
                            <option @selected($user->is_vip == 'Vip') value="Vip">Vip</option>
                        </select>
                    </div>
                </div>


                <div class="mb-3 row">
                    <label for="" class="col-2 col-form-label">Avatar : </label>
                    <div class="col-10">
                        <input type="file" class="form-control" name="imgavata">
                    </div>
                </div>
                @if ($user->avata)
                    <img src="{{ asset($user->avata) }}" alt="" width="100" class="mt-4">
                    @else

                    @endif
                @if ($errors->has('imgavata'))
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-10">
                            <p class="text-danger">{{ $errors->first('imgavata') }}</p>
                        </div>
                    </div>
                @endif


                <div class="mb-3 row">
                    <div>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">Quay lại</a>
                        <button type="submit" class="btn btn-success">
                            Sửa
                        </button>
                    </div>
                </div>
            </form>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection

@section('javascript')
    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>

    <!-- Table Editable plugin -->
    <script src="assets/libs/table-edits/build/table-edits.min.js"></script>

    <script src="assets/js/pages/table-editable.int.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>
@endsection
