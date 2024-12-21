@extends('admin.layouts.master')

@section('title')
    Create
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
    @include('admin.components.breadcump', ['name' => 'Table'])

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Examples</h4>
                </div><!-- end card header -->

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-nowrap align-middle justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 50%;">
                                        Trường dữ liệu
                                    </th>
                                    <th scope="col" class="text-center">
                                        Giá trị
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>
                                        ID
                                    </td>
                                    <td class="text-center">
                                        {{ $data->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Title
                                    </td>
                                    <td class="text-center">
                                        {{ $data->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Views
                                    </td>
                                    <td class="text-center">
                                        {{ $data->views }}
                                    </td>
                                </tr>
                                {{-- <tr>
                                    <td>
                                        Create_at
                                    </td>
                                    <td class="text-center">
                                        {{ $data->create_at }}
                                    </td>
                                </tr> --}}
                                <tr>
                                    <td>
                                        Category
                                    </td>
                                    <td class="text-center">
                                        {{ $data->category_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Image
                                    </td>
                                    <td class="text-center">
                                        <img style="width:100px; height:100px;" src="{{ asset('images/' . $data->image) }}"
                                            alt="{{ $data->title }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Description
                                    </td>
                                    <td class="text-center">
                                        {{ $data->description }}
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                        <!-- end table -->
                    </div>
                    <!-- end table responsive -->
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
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
