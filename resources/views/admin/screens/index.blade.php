@extends('admin.layouts.default')

@section('title')
    Danh sách Phòng phim
@endsection

@section('content')
    <div class="row mt-3">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title p-3">
                        Danh sách Phòng phim
                    </h4>

                    <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dt-buttons btn-group flex-wrap"> <button
                                        class="btn btn-secondary buttons-copy buttons-html5" tabindex="0"
                                        aria-controls="datatable-buttons" type="button"><span>Copy</span></button> <button
                                        class="btn btn-secondary buttons-excel buttons-html5" tabindex="0"
                                        aria-controls="datatable-buttons" type="button"><span>Excel</span></button> <button
                                        class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0"
                                        aria-controls="datatable-buttons" type="button"><span>PDF</span></button>
                                    <div class="btn-group"><button
                                            class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis"
                                            tabindex="0" aria-controls="datatable-buttons" type="button"
                                            aria-haspopup="dialog"><span>Column visibility</span></button></div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="datatable-buttons_filter" class="dataTables_filter"><label>Search:<input
                                            type="search" class="form-control form-control-sm" placeholder=""
                                            aria-controls="datatable-buttons"></label></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="{{ route('admin.screen.create') }}" class="btn btn-primary mb-3">Thêm mới</a>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Phòng phim</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($listScreens as $key => $screen)
                                            <tr>
                                                <td scope="row">{{ $screen->screen_id }}</td>
                                                <td>{{ $screen->screen_name }}</td>
                                                <td class="d-flex gap-1">
                                                    <a href="{{ route('admin.screen.edit', $screen->screen_id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <form action="{{ route('admin.screen.destroy', $screen->screen_id) }}"
                                                        method="post" class="">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Are you delete?')" type="submit"
                                                            class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- {{ $screen->links() }} --}}
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="datatable-buttons_info" role="status" aria-live="polite">
                                    Showing 1 to 10 of 57 entries</div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="datatable-buttons_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled"
                                            id="datatable-buttons_previous"><a aria-controls="datatable-buttons"
                                                aria-disabled="true" role="link" data-dt-idx="previous" tabindex="-1"
                                                class="page-link">Previous</a></li>
                                        <li class="paginate_button page-item active"><a href="#"
                                                aria-controls="datatable-buttons" role="link" aria-current="page"
                                                data-dt-idx="0" tabindex="0" class="page-link">1</a></li>
                                        <li class="paginate_button page-item "><a href="#"
                                                aria-controls="datatable-buttons" role="link" data-dt-idx="1"
                                                tabindex="0" class="page-link">2</a></li>
                                        <li class="paginate_button page-item "><a href="#"
                                                aria-controls="datatable-buttons" role="link" data-dt-idx="2"
                                                tabindex="0" class="page-link">3</a></li>
                                        <li class="paginate_button page-item "><a href="#"
                                                aria-controls="datatable-buttons" role="link" data-dt-idx="3"
                                                tabindex="0" class="page-link">4</a></li>
                                        <li class="paginate_button page-item "><a href="#"
                                                aria-controls="datatable-buttons" role="link" data-dt-idx="4"
                                                tabindex="0" class="page-link">5</a></li>
                                        <li class="paginate_button page-item "><a href="#"
                                                aria-controls="datatable-buttons" role="link" data-dt-idx="5"
                                                tabindex="0" class="page-link">6</a></li>
                                        <li class="paginate_button page-item next" id="datatable-buttons_next"><a
                                                href="#" aria-controls="datatable-buttons" role="link"
                                                data-dt-idx="next" tabindex="0" class="page-link">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
@endsection
