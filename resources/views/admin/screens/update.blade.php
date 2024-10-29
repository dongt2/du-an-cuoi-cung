@extends('admin.layouts.master')

@section('title')
    Edit {{ $data->title }}
@endsection

@section('content')
    @include('admin.components.breadcump', ['name' => 'Edit'])

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Edit New</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <form action="{{ route('admin.posts.update', ['id' => $data->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control" value='{{ $data->title }}'
                                            id="title" name="title" required>
                                    </div>
                                </div><!-- end col -->

                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label for="category_id" class="form-label">Category</label>
                                        <select name="category_id" id="category_id" class="form-control" required>
                                            @foreach ($categories as $cate)
                                            <option value="{{ $cate->id }}">
                                                @if ($cate->id == $post->category_id)
                                                    selected
                                                @endif
                                                {{ $cate->name }}
                                            </option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div>
                        <div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label for="create_at" class="form-label">Date</label>
                                        <input type="date" class="form-control" value='{{ $data->create_at }}'
                                            id="create_at" name="create_at" required>
                                    </div>
                                </div><!-- end col -->

                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label for="views" class="form-label">Views</label>
                                        <input type="number" class="form-control" value='{{ $data->views }}'
                                            id="views" name="views" required>
                                    </div>
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" value='{{ $data->image }}' id="image"
                                name="image" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5"
                                required>{{ $data->description }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Save</button>
                    </form><!-- end form -->
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection
