@extends('admin.layout.default')

@section('title')
    @parent
    Thêm mới phòng 
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
                    <h4 class="fs-18 fw-semibold m-0">Screen</h4>
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

                        <form action="{{ route('admin.screen.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="mb-3">
                                            <label class="form-label">Tên phòng phim</label>
                                            <input type="text" class="form-control" id="" name="screen_name"
                                                placeholder="Tên phòng phim">
                                            @error('screen_name')
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
