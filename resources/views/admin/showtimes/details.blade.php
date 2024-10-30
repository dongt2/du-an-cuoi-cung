@extends('admin.layouts.master')

@section('title')
    Create
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
