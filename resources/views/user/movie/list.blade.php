@extends('user.layout.default')

@section('title')
    @parent
    AMovie - Movie list
@endsection

@section('style')
    <!-- Mobile Specific Metas-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="telephone=no" name="format-detection">

    <!-- Fonts -->
    <!-- Font awesome - icon font -->
    <link href="{{ asset('../netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css') }}" rel="stylesheet">
    <!-- Roboto -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>

    <!-- Stylesheets -->
    <!-- jQuery UI -->
    <link href="{{ asset('../code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css') }}" rel="stylesheet">

    <!-- Mobile menu -->
    <link href="{{ asset('css/gozha-nav.css') }}" rel="stylesheet" />
    <!-- Select -->
    <link href="{{ asset('css/external/jquery.selectbox.css') }}" rel="stylesheet" />

    <!-- Custom -->
    <link href="{{ asset('css/style3860.css?v=1') }}" rel="stylesheet" />

    <!-- Modernizr -->
    <script src="{{ asset('js/external/modernizr.custom.js') }}"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js"></script>
    <![endif]-->
    <style>
        /* Đặt chung cho form */
        form {
            display: flex;
            flex-wrap: nowrap;
            /* Đảm bảo các phần tử nằm trên một hàng */
            gap: 10px;
            /* Khoảng cách giữa các phần tử */
            align-items: center;
            /* Canh giữa theo chiều dọc */
            margin-bottom: 20px;
        }

        /* Styling cho các ô chọn */
        form select {
            padding: 5px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 150px;
            /* Tùy chỉnh kích thước */
        }

        /* Styling cho nút lọc */
        form button {
            padding: 6px 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease;
            white-space: nowrap;
            /* Đảm bảo không bị xuống dòng */
        }

        form button:hover {
            background-color: #0056b3;
        }
    </style>
@endsection

@section('content')
    <section class="container">
        <div class="col-sm-12">
            <h2 class="page-heading" style="margin-top: 100px;">Danh sách phim</h2>

            <form action="{{ route('movie.index') }}" method="GET" class="search">
                <input type="text" id="search-input" name="query" value="{{ old('query', request('query')) }}"
                       class="search__field" placeholder="Tìm kiếm phim...">
                <button type="submit" class="btn btn-md btn--danger search__button">Tìm kiếm</button>
            </form>

            <div class="col-sm-12">
                <div class="p-3 mb-2 bg-secondary text-white">
                    <!-- Bộ lọc -->
                    <form method="GET" action="{{ route('movie.index') }}" class="mb-4">

                        <!-- Bộ lọc thể loại -->
                        <div class="col-md-2">
                            <select name="category" class="form-control">
                                <option value="" hidden>Thể Loại</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->category_id }}"
                                        {{ request('category') == $category->category_id ? 'selected' : '' }}>
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Bộ lọc năm -->
                        <div class="col-md-2">
                            <select name="year" class="form-control">
                                <option value="">Năm</option>
                                @for ($year = now()->year; $year >= 2000; $year--)
                                    <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                                        {{ $year }}
                                    </option>
                                @endfor
                            </select>
                        </div>

                        <div class="col-md-2">
                            <select name="director" class="form-control">
                                <option value="" hidden>Đạo diễn</option>
                                @foreach ($directors as $director)
                                    <option value="{{ $director->id }}"
                                        {{ request('director') == $director->id ? 'selected' : '' }}>
                                        {{ $director->directors }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-2">
                            <select name="actors" class="form-control">
                                <option value="" hidden>Diễn viên</option>
                                @foreach ($actors as $actor)
                                    <option value="{{ $actor->id }}"
                                        {{ request('actors') == $actor->id ? 'selected' : '' }}>
                                        {{ $actor->actor_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <!-- Nút lọc -->
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary w-100">Lọc</button>
                        </div>
                    </form>
                </div>
            </div>

            <hr style="border: 1px solid #ccc; margin-top:30px; margin-bottom:30px">

            <!-- Hiển thị kết quả tìm kiếm nếu có query, nếu không hiển thị danh sách tất cả phim -->
            <div id="search-results">
                @if (request('query'))
                    <!-- Nếu có tham số query, hiển thị kết quả tìm kiếm -->
                    <h3>Kết quả tìm kiếm cho: "{{ request('query') }}"</h3>
                @else
                    <!-- Nếu không có tham số query, hiển thị toàn bộ phim -->
                    <h3>Danh sách phim</h3>
                @endif

                @foreach ($movies as $movie)
                    <div class="movie movie--preview movie--full release">
                        <div class="col-sm-3 col-md-2 col-lg-2">

                            <div class="movie__images">

                                {{-- <img alt='' src="images/movie/movie-sample1.jpg"> --}}
                                <img alt='' src="{{ Storage::url($movie->cover_image) }}" width="170px"
                                     height="260px">
                                <span class="movie__rating"
                                      style="left: 111px">{{ number_format($movie->reviews ? $movie->reviews->avg('rating') ?? 0 : 0, 1, '.', ',') }}</span>
                            </div>
                        </div>

                        <div class="col-sm-9 col-md-10 col-lg-10 movie__about">
                            <a href='{{ route('movie.show', $movie->movie_id) }}'
                               class="movie__title link--huge">{{ $movie->title }}</a>

                            <p class="movie__time">{{ $movie->duration }} min</p>

                            <p class="movie__option"><strong>Quốc gia: </strong><a href="#">{{ $movie->country }}</a>
                            </p>
                            <p class="movie__option"><strong>Thể loại: </strong>
                                @foreach ($movie->categories as $category)
                                    <a href="#">
                                        {{ $category->category_name }}@if (!$loop->last)
                                            ,
                                        @endif
                                    </a>
                            @endforeach
                            <p class="movie__option"><strong>Ngày phát hành: </strong>{{ $movie->release_date }}
                            </p>
                            <p class="movie__option"><strong>Đạo diễn: </strong>
                                @foreach ($movie->directors as $director)
                                    <a href="#">
                                        {{ $director->directors }}@if (!$loop->last)
                                            ,
                                        @endif
                                    </a>
                                @endforeach
                            </p>
                            <p class="movie__option"><strong>Diễn viên: </strong>
                                @foreach ($movie->actors as $actor)
                                    <a href="#">
                                        {{ $actor->actor_name }}@if (!$loop->last)
                                            ,
                                        @endif
                                    </a>
                                @endforeach
                            </p>
                            <p class="movie__option"><strong>Giới hạn độ tuổi: </strong><a href="#">13</a></p>

                            <div class="movie__btns">
                                <a href="{{ route('movie.show', $movie->movie_id) }}" class="btn btn-md btn--warning">Đặt
                                    vé
                                    <a style="display: none;" href="#" class="watchlist">Add to watchlist</a>
                                </a>
                            </div>

                            <div class="preview-footer">
                                <div class="movie__rate">
                                    {{--                                    <span class="movie__rate-number">{{ $movie->reviews_today->count() ?? 0 }} người đã đánh giá hôm nay</span> --}}
                                </div>


                                {{-- <a href="#" class="movie__show-btn">Showtime</a> --}}

                            </div>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                @endforeach


            </div>

            <!-- end movie preview movie -->
            <div class="coloum-wrapper">
                <div class="pagination paginatioon--full">
                    <a href='#' class="pagination__prev">prev</a>
                    <a href='#' class="pagination__next">next</a>
                </div>
            </div>

        </div>

    </section>
@endsection

@section('script')
    <!-- JavaScript-->
    <!-- jQuery 1.9.1-->
    <script src="{{ asset('../ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js') }}"></script>
    <script>
        window.jQuery || document.write('<script src="js/external/jquery-1.10.1.min.js"><\/script>')
    </script>
    <!-- Migrate -->
    <script src="{{ asset('js/external/jquery-migrate-1.2.1.min.js') }}"></script>
    <!-- jQuery UI -->
    <script src="{{ asset('../code.jquery.com/ui/1.10.4/jquery-ui.js') }}"></script>
    <!-- Bootstrap 3-->
    <script src="{{ asset('../netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js') }}"></script>

    <!-- Mobile menu -->
    <script src="{{ asset('js/jquery.mobile.menu.js') }}"></script>
    <!-- Select -->
    <script src="{{ asset('js/external/jquery.selectbox-0.2.min.js') }}"></script>

    <!-- Stars rate -->
    <script src="{{ asset('js/external/jquery.raty.js') }}"></script>

    <!-- Form element -->
    <script src="{{ asset('js/external/form-element.js') }}"></script>
    <!-- Form validation -->
    <script src="{{ asset('js/form.js') }}"></script>

    <!-- Custom -->
    <script src="{{ asset('js/custom.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            init_MovieList();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Xóa tham số query khỏi URL khi trang được tải lại
            const url = new URL(window.location.href);
            if (url.searchParams.has('query')) {
                url.searchParams.delete('query');
                window.history.replaceState({}, document.title, url.toString());
            }

            // Xóa dữ liệu trong ô tìm kiếm
            const searchInput = document.querySelector('#search-input');
            if (searchInput) {
                searchInput.value = ''; // Xóa dữ liệu trong ô tìm kiếm
            }
        });
    </script>
@endsection
