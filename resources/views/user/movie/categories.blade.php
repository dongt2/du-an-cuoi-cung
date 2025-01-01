@extends('user.layout.default')

@section('title')
    @parent
    AMovie - Category List
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
@endsection

@section('content')
    <section class="container">
        <div class="col-sm-12">
            <h2>Thể Loại Phim</h2>
            <div class="p-3 mb-2 bg-secondary text-white">
                <!-- Bộ lọc -->
                <form method="GET" action="{{ route('movie.categories') }}" class="mb-4">

                    <!-- Bộ lọc thể loại -->
                    <div class="col-md-3">
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
                    <div class="col-md-3">
                        <select name="year" class="form-control">
                            <option value="">Năm</option>
                            @for ($year = now()->year; $year >= 2000; $year--)
                                <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                                    {{ $year }}
                                </option>
                            @endfor
                        </select>
                    </div>

                    <div class="col-md-3">
                        <select name="director" class="form-control">
                            <option value="" hidden>Đạo Diễn</option>
                            @foreach ($movies->unique('director')->pluck('director') as $director)
                                <option value="{{ $director }}"
                                    {{ request('director') == $director ? 'selected' : '' }}>
                                    {{ $director }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <select name="actors" class="form-control">
                            <option value="" hidden>Diễn Viên</option>
                            @foreach ($movies->unique('actors')->pluck('actors') as $actors)
                                <option value="{{ $actors }}" {{ request('actors') == $actors ? 'selected' : '' }}>
                                    {{ $actors }}
                                </option>
                            @endforeach
                        </select>
                    </div>



                    <!-- Nút lọc -->
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary w-100">Lọc</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Danh sách phim -->
        <div class="row">
            @foreach ($movies as $movie)
                <div class="movie movie--preview movie--full release">
                    <div class="col-sm-3 col-md-2 col-lg-2">
                        <div class="movie__images">
                            {{-- <img alt='' src="images/movie/movie-sample1.jpg"> --}}
                            <img alt='' src="{{ Storage::url($movie->cover_image) }}" width="170px"
                                height="260px">
                        </div>
                        <div class="movie__feature">
                            <a href="#" class="movie__feature-item movie__feature--comment">123</a>
                            <a href="#" class="movie__feature-item movie__feature--video">7</a>
                            <a href="#" class="movie__feature-item movie__feature--photo">352</a>
                        </div>
                    </div>

                    <div class="col-sm-9 col-md-10 col-lg-10 movie__about">
                        <a href='movie-page-full.html' class="movie__title link--huge">{{ $movie->title }}</a>

                        <p class="movie__time">{{ $movie->duration }} min</p>

                        <p class="movie__option"><strong>Quốc gia: </strong><a href="#">{{ $movie->country }}</a></p>
                        <p class="movie__option"><strong>Thể loại: </strong><a
                                href="#">{{ $movie->category->category_name }}</a></p>
                        <p class="movie__option"><strong>Ngày phát hành: </strong>{{ $movie->release_date }}</p>
                        <p class="movie__option"><strong>Đạo diễn: </strong><a href="#">{{ $movie->director }}</a>
                        </p>
                        <p class="movie__option"><strong>Diễn viên: </strong><a href="#">{{ $movie->actors }}</a>, <a
                                href="#">Michael Douglas</a>, <a href="#">Morgan Freeman</a>, <a
                                href="#">Kevin Kline</a>, <a href="#">Mary Steenburgen</a>, <a
                                href="#">Jerry
                                Ferrara</a>, <a href="#">Romany Malco</a> <a href="#">...</a></p>
                        {{-- <p class="movie__option"><strong>Giới hạn độ tuổi: </strong><a href="#">13</a></p> --}}

                        <div class="movie__btns">
                            <a href="{{ route('movie.show', $movie->movie_id) }}" class="btn btn-md btn--warning">Đặt vé
                                <a style="display: none;" href="#" class="watchlist">Add to watchlist</a>
                        </div>

                        <div class="preview-footer">
                            <div class="movie__rate">
                                <div class="score"></div><span class="movie__rate-number">170 votes</span> <span
                                    class="movie__rating">5.0</span>
                            </div>


                            {{-- <a href="#" class="movie__show-btn">Showtime</a> --}}

                        </div>
                    </div>

                    <div class="clearfix"></div>

                </div>
            @endforeach
        </div>

        <div class="coloum-wrapper">
            <div class="pagination paginatioon--full">
                <a href='#' class="pagination__prev">prev</a>
                <a href='#' class="pagination__next">next</a>
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
@endsection
