@extends('admin.layouts.default')

@section('title')
    Danh sách Xuất chiếu
@endsection

@section('content')
    <div class="row mt-3">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title p-3">
                        Danh sách Xuất chiếu
                    </h4>

                    <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="{{ route('admin.showtime.create') }}" class="btn btn-primary mb-3">Thêm mới</a>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên phim</th>
                                            <th>Tên phòng</th>
                                            <th>Ngày chiếu</th>
                                            <th>Thời gian</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($data as $key => $showtime)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $showtime->movie_title }}</td>

                                                <td>{{ $showtime->screen_name }}</td>

                                                <td>{{ \Carbon\Carbon::parse($showtime->showtime_date)->format('d-m-Y') }}
                                                </td>

                                                <td>{{ \Carbon\Carbon::parse($showtime->time)->format('H:i') }}</td>


                                                <td class="d-flex gap-1">
                                                    <a href="{{ route('admin.showtime.edit', $showtime->showtime_id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <form
                                                        action="{{ route('admin.showtime.destroy', $showtime->showtime_id) }}"
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
                                {{ $data->links() }}
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
