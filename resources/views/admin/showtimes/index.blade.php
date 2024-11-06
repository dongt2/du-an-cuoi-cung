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

                                                <td>{{ \Carbon\Carbon::parse($showtime->showtime_date)->format('d-m-Y') }}</td>

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
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
@endsection
