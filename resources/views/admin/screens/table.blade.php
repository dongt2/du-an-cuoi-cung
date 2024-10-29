@extends('admin.layouts.default')

@section('title')
    Table
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Add, Edit & Remove</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="listjs-table" id="customerList">
                        <div class="row g-4 mb-3">
                            <div class="col-sm-7">
                                <div>
                                    <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal"
                                        id="create-btn" data-bs-target="#showModal"><a
                                            href="{{ route('admin.posts.create') }}">
                                            <i class="ri-add-line align-bottom me-1"></i> Add</button>
                                    </a>
                                    <a href="{{ route('admin.posts.deleteAll') }}">
                                        <button class="btn btn-soft-danger"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"><i
                                                class="ri-delete-bin-2-line"></i></button>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <form action="{{ route('admin.posts.filter') }}" method="GET">
                                    <div class="col-sm">
                                        <div class="d-flex justify-content-sm-end">
                                            <div class="ms-2">
                                                <select name="category_id" class="form-control">
                                                    <option value="">Select Category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="search-box ms-2">
                                                <input type="text" name="search" class="form-control search"
                                                    placeholder="Search...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                            <div class="ms-2">
                                                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="table-responsive table-card mt-3 mb-1">
                            <table class="table align-middle" id="customerTable">
                                <thead class="table-secondary">
                                    <tr>
                                        
                                        <th data-sort="id">ID</th>
                                        <th data-sort="title">Title</th>
                                        <th data-sort="image">Image</th>
                                        {{-- <th data-sort="views">Views</th> --}}
                                        <th data-sort="category">Category</th>
                                        <th data-sort="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    @foreach ($data as $new)
                                        <tr>
                                            
                                            <td class="id">{{ $new->id }}</td>
                                            <td class="title">{{ $new->title }}</td>
                                            <td>
                                                <img style="width:100px; height:100px;"
                                                    src="{{ asset('images/' . $new->image) }}" alt="{{ $new->title }}">
                                            </td>
                                            {{-- <td class="views">{{ $new->views }}</td> --}}
                                            <td class="category">{{ $new->category_name }}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <div class="edit">
                                                        <a href="{{ route('admin.posts.edit', ['id' => $new->id]) }}">
                                                            <button class="btn btn-sm btn-success edit-item-btn"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#showModal">Edit</button>
                                                        </a>
                                                    </div>
                                                    <div class="details">
                                                        <a href="{{ route('admin.posts.details', ['id' => $new->id]) }}">
                                                            <button class="btn btn-sm btn-success details-item-btn"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#showModal">Details</button>
                                                        </a>
                                                    </div>
                                                    <div class="remove">
                                                        <a href="{{ route('admin.posts.delete', ['id' => $new->id]) }}">
                                                            <button class="btn btn-sm btn-danger remove-item-btn"
                                                                data-bs-toggle="modal" data-bs-target="#deleteRecordModal"
                                                                onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Remove</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="noresult" style="display: none">
                                <div class="text-center">
                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                        colors="primary:#121331,secondary:#08a88a"
                                        style="width:75px;height:75px"></lord-icon>
                                    <h5 class="mt-2">Sorry! No Result Found</h5>
                                    <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any
                                        orders for you search.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-end">
                            <div class="pagination-wrap hstack gap-2">
                                <!-- Previous Link -->
                                @if ($data->onFirstPage())
                                    <a class="page-item pagination-prev disabled" href="#">
                                        Previous
                                    </a>
                                @else
                                    <a class="page-item pagination-prev" href="{{ $data->previousPageUrl() }}">
                                        Previous
                                    </a>
                                @endif

                                <!-- Pagination Links -->


                                <!-- Next Link -->
                                @if ($data->hasMorePages())
                                    <a class="page-item pagination-next" href="{{ $data->nextPageUrl() }}">
                                        Next
                                    </a>
                                @else
                                    <a class="page-item pagination-next disabled" href="#">
                                        Next
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    @endsection
