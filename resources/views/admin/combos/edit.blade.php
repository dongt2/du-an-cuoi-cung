@extends('admin.layouts.default')

@section('title')
Combos - Thêm Combo
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <form action="{{ route('admin.combos.store') }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="" class="form-label">Name Combo :</label>
                    <input type="text" class="form-control" id="" name="combo_name"
                        placeholder="Mời nhập combo" value="{{ old('combo_name') }}">
                </div>

                @if ($errors->has('combo_name'))
                    <div class="text-danger mb-3">
                        {{ $errors->first('combo_name') }}
                    </div>
                @endif

                <div class="mb-3">
                    <label for="" class="form-label">Giá :</label>
                    <input type="text" class="form-control" id="" name="price"
                        placeholder="Mời nhập giá">
                </div>

                @if ($errors->has('price'))
                    <div class="text-danger mb-3">
                        {{ $errors->first('price') }}
                    </div>
                @endif


                <div class="mb-3">
                    <label for="" class="form-label">Mô tả ngắn :</label>
                    <textarea class="form-control" id="" rows="3" name="short_description"></textarea>
                </div>

                <a href="{{ route('admin.combos.index') }}" class="btn btn-primary">Quay lại</a>
                <button type="submit" class="btn btn-success">Thêm Combo</button>
            </form>
            <!-- end page title -->
            @if (Session::has('success'))
                <script>
                    swal("success", "{{ Session::get('success') }}", 'success', {
                        button: true,
                        button: "OK",
                        timer: 2000,
                    })
                </script>
            @endif

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
