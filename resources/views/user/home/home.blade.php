@extends('user.layout.default')

@section('title')
    @parent
    Movie
@endsection

@section('style')
    <!-- Mobile Specific Metas-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="telephone=no" name="format-detection">

    <!-- Fonts -->
    <!-- Font awesome - icon font -->
    <link href="{{ asset('../netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css') }}" rel="stylesheet">
    <!-- Roboto -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,700' rel='stylesheet' type='text/css'>
    <!-- Open Sans -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:800italic' rel='stylesheet' type='text/css'>

    <!-- Stylesheets -->

    <!-- Mobile menu -->
    <link href="{{ asset('css/gozha-nav.css') }}" rel="stylesheet" />
    <!-- Select -->
    <link href="{{ asset('css/external/jquery.selectbox.css') }}" rel="stylesheet" />

    <!-- REVOLUTION BANNER CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('rs-plugin/css/settings.css') }}" media="screen" />

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
    <!-- Slider -->
    @include('user.layout.slide')

    <section class="container">
        <div class="movie-best">
            <div class="col-sm-10 col-sm-offset-1 movie-best__rating">
                Lựa chọn tốt nhất hôm nay</div>
            <div class="col-sm-12 change--col">
                @if ($todayTheBestChoice->isNotEmpty())
                    @foreach ($todayTheBestChoice as $choice)
                        @php
                            $movie = \App\Models\Movie::find($choice->movie_id);
//                            dd($movie);
                        @endphp
                        <div class="movie-beta__item">
                            <img alt='' src="{{ Storage::url($movie->cover_image) }}">
                            <span class="best-rate">{{ number_format($movie->average_rating ?? 0, 1, '.', ',') }}</span>

                            <ul class="movie-beta__info">
                                <li>
                                    <span class="best-voted" style="font-size: 19px;
                                                font-weight: bold;">
                                        {{ $movie->title }}
                                    </span>
                                   <span class="best-voted">
                                       {{ $movie->reviews_today->count() ?? 0 }} người đã đánh giá hôm nay
                                   </span>
                                </li>
                                <li>
                                    <p class="movie__time">{{ $movie->duration }} phút</p>
                                    @foreach ($movie->categories as $category)
                                        <p >
                                            {{ $category->category_name }}@if(!$loop->last), @endif
                                        </p>
                                    @endforeach


                                </li>
                                <li class="last-block">
                                    <a href="{{ route('movie.show', $movie->movie_id) }}" class="slide__link">more</a>
                                </li>
                            </ul>
                        </div>
                    @endforeach
                @else
                    <p style="text-align: center;
                                padding: 10px;
                                padding-top: 30px;
                                font-size: large;
                                           ">
                        Không có sự lựa chọn tốt nhất cho ngày hôm nay.</p>
                @endif
            </div>
        </div>



        <div class="clearfix"></div>

        <h2 id='target' class="page-heading heading--outcontainer">Phim đang chiếu</h2>

        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-8 col-md-9">
                    <!-- Movie variant with time -->
                    @foreach ($data as $item)
                        <div class="movie movie--test movie--test--dark movie--test--left">
                            <div class="movie__images">
                                <a href="{{ route('movie.show', $item->movie_id) }}" class="movie-beta__link">
                                    <img alt='' src="{{ Storage::url($item->cover_image) }}" width="210px"
                                        height="210px">
                                </a>
                            </div>

                            <div class="movie__info">
                                <a href="{{ route('movie.show', $item->movie_id) }}" class="movie__title">{{ $item->title }}</a>

                                <p class="movie__time">{{ $item->duration }} phút</p>

                                <p class="movie__option">
                                    @foreach ($item->categories as $category)
                                    <a href="#">
                                            {{ $category->category_name }}@if(!$loop->last), @endif
                                    </a>
                                    @endforeach

                                </p>

                                <div class="movie__rate">


                                    <span class="movie__rating">{{ number_format($item->average_rating ?? 0, 1, '.', ',') }}</span>

                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <aside class="col-sm-4 col-md-3">
                    <div class="sitebar first-banner--left">
                        <div class="banner-wrap first-banner--left">
                            <img alt='banner' src="{{ asset('images/banners/sale.jpg') }}">
                        </div>

                        <div class="banner-wrap">
                            <img alt='banner' src="{{ asset('images/banners/sport.jpg') }}">
                        </div>

                        <div class="banner-wrap banner-wrap--last">
                            <img alt='banner' src="{{ asset('images/banners/boots.jpg') }}">
                        </div>


                    </div>
                </aside>
            </div>
        </div>

    </section>
@endsection

@section('script')
    <!-- JavaScript-->
    <!-- jQuery 1.9.1 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="{{ asset('js/external/jquery-1.10.1.min.js') }}"><\/script>')
    </script>

    <!-- Migrate -->
    <script src="{{ asset('js/external/jquery-migrate-1.2.1.min.js') }}"></script>

    <!-- Bootstrap 3 -->
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>

    <!-- jQuery REVOLUTION Slider -->
    <script type="text/javascript" src="{{ asset('rs-plugin/js/jquery.themepunch.plugins.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>

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

    <!-- Twitter feed -->
    <script src="{{ asset('js/external/twitterfeed.js') }}"></script>

    <!-- Custom -->
     <script src="{{ asset('js/custom.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            init_Home();
        });
    </script>
@endsection
