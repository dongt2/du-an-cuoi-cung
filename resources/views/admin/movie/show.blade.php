@extends('admin.layout.default')

@section('title')
    @parent
    Xem thông tin phim
@endsection

@push('style')
    <!-- Flatpickr Timepicker css -->
    <!-- CSS Select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />


    <link href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />


    <link rel="stylesheet" href="{{ asset('summernote-0.9.0-dist/summernote-lite.min.css') }}">
@endpush

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">

            </div>

            <!-- Advance Form -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0"><strong>Thông tin phim - {{ $data->movie_id }}</strong></h5>
                        </div><!-- end card header -->

                        <form action="\#" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="mb-3">
                                            <label class="form-label">Tên phim</label>
                                            <input type="text" class="form-control" id="" name="title"
                                                value="{{ $data->title }}" disabled>

                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Ảnh</label><br>
                                            <img src="{{ Storage::url($data->cover_image) }}" alt=""
                                                class="img-fluid" width="230px" height="130px">
                                            <br><br>


                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Thời lượng</label>
                                            <input type="text" class="form-control" id="" min="1"
                                                name="duration" value="{{ $data->duration }}" max="1000"
                                                disabled>

                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Quốc gia</label>
                                            <input type="text" class="form-control" id="" name="country"
                                                value="{{ $data->country }}" disabled>

                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Năm sản xuất</label>
                                            <input type="number" class="form-control" id="year" min="1500"
                                                max="{{ date('Y') }}" name="year" value="{{ $data->year }}"
                                                disabled>

                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Tác giả</label>
                                            <select name="directors[]" id="directors" class="form-control select2" multiple disabled>
                                                @foreach ($director as $dir)
                                                    <option value="{{ $dir->id }}"
                                                        {{ in_array($dir->id, $data->directors->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                        {{ $dir->directors }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Diễn viên</label>
                                            <select name="actors[]" id="actors" class="form-control select2" multiple disabled>
                                                @foreach ($actor as $act)
                                                    <option value="{{ $act->id }}"
                                                        {{ in_array($act->id, $data->actors->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                        {{ $act->actor_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Thể loại</label>
                                            <select name="categories[]" class="form-control select2" multiple disabled>
                                                @foreach ($category as $item)
                                                    <option value="{{ $item->category_id }}"
                                                        {{ $data->categories->pluck('category_id')->contains($item->category_id) ? 'selected' : '' }}>
                                                        {{ $item->category_name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>

                                    </div>

                                    <div class="col-xl-6">
                                        <div class="mb-3">
                                            <label class="form-label">Trailer-url</label>
                                            <input type="text" class="form-control" id="" name="trailer_url"
                                                value="{{ $data->trailer_url }}" disabled">
                                            <iframe src="{{ $data->trailer_url }}" frameborder="0"></iframe>
                                        </div>

                                        <div>
                                            <label class="form-label">Ngày phát hành</label>
                                            <input type="date" class="form-control"
                                                name="release_date" value="{{ $data->release_date->format('Y-m-d') }}"
                                                disabled>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="description">Mô tả</label>
                                        <textarea class="form-control" id="summernote" name="description" rows="3">{!! $data->description !!}</textarea>
                                    </div>
                                </div>
                                <a href="{{ route('admin.movie.index') }}" class="btn btn-primary">Quay lại</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- container-fluid -->

    </div> <!-- content -->
@endsection

@push('script')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- JS Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>

    <script src="{{ asset('summernote-0.9.0-dist/summernote-lite.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });

        $('#summernote').summernote({
            placeholder: 'mô tả',
            tabsize: 2,
            height: 100
        });
    </script>
    </script>

    {{-- <script>
        $(document).ready(function() {
            $('.selectactors').select2({
                placeholder: "Chon tac gia",
                allowClear: true,
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.selectcategories').select2({
                placeholder: "Chon tac gia",
                allowClear: true,
            });
        }); --}}
    </script>

    <!-- Flatpickr Timepicker Plugin js -->
    <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>

    <script src="{{ asset('assets/js/pages/form-picker.js') }}"></script>
@endpush
