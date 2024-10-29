@extends('admin.layouts.default')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mt-3">Quản lý phòng phim</h4>
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Phòng phim</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <div class="ckeditor-classic"></div>
@endsection
