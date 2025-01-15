@extends('user.layout.default')

@section('title')
    @parent
    AMovie - Movie page
@endsection

@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <!-- Swiper slider -->
    <link href="{{ asset('css/external/idangerous.swiper.css') }}" rel="stylesheet" />
    <!-- Magnific-popup -->
    <link href="{{ asset('css/external/magnific-popup.css') }}" rel="stylesheet" />


    <!-- Custom -->
    <link href="{{ asset('css/style3860.css?v=1') }}" rel="stylesheet" />

    <!-- Modernizr -->
    <script src="{{ asset('js/external/modernizr.custom.js') }}"></script>

    <script src="{{ asset('https://code.jquery.com/jquery-3.6.4.min.js') }}" integrity="sha384-UG8ao2jwOWB7/oDdObZc6ItJmwUkR/PfMyt9Qs5AwX7PsnYn1CRKCTWyncPTWvaS" crossorigin="anonymous"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
                                                                                                                    <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
                                                                                                                    <script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js"></script>
                                                                                                                <![endif]-->
    <style>
        .comment-sets {
            max-height: 500px;
            /* Chiều cao tối đa của vùng bình luận */
            overflow-y: auto;
            /* Thêm thanh cuộn dọc khi có quá nhiều bình luận */
            margin-bottom: 20px;
        }

        .comment {
            margin-bottom: 10px;
            /* Khoảng cách giữa các bình luận */
        }

        .comment__images img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .comment__author {
            font-weight: bold;
        }

        .comment__date {
            font-size: 0.9em;
            color: #888;
        }

        .comment__message {
            margin-top: 10px;
        }

        .time-select .time-select__item:before {
            content: '';
            width: 95px;
            height: 28px;
            border: 1px solid #ffffff;
            position: absolute;
            top: 3px;
            left: 3px;
        }
        .rating-display label {
            font-size: 24px;
            color: gold;
        }
        .movie-trailer iframe {
            width: 100%; /* Make iframe responsive */
            max-width: 560px; /* Restrict to original size */
            height: 315px;
            border: none;
        }
    </style>

@endsection

@section('content')
    <br><br>
    <section class="container">
        <div class="col-sm-250">
            <div class="movie">
                <h2 class="page-heading">{{ $data->title }}</h2>

                <div class="movie__info">
                    <div class="col-sm-4 col-md-3 movie-mobile">
                        <div class="movie__images">
                            <span class="movie__rating">{{ number_format($data->reviews ? $data->reviews->avg('rating') ?? 0 : 0, 1, '.', ',') }}</span>
                            <img alt='' src="{{ Storage::url($data->cover_image) }}" width="270px" height="380px">
                        </div>
                    </div>

                    <div class="col-sm-8 col-md-9">
                        <p class="movie__time">{{ $data->duration }} phút</p>

                        <p class="movie__option"><strong>Quốc gia: </strong><a href="#">{{ $data->country }}</a>
                        <p class="movie__option"><strong>Năm sản xuất: </strong><a href="#">{{ $data->year }}</a>
                        </p>
                        <p class="movie__option"><strong>Thể loại: </strong>
                            @foreach ($data->categories as $category)
                                <a href="#">
                                    {{ $category->category_name }}@if(!$loop->last), @endif
                                </a>
                            @endforeach
                        </p>
                        <p class="movie__option"><strong>Ngày phát hành: </strong>{{ $data->release_date->format('d-m-Y') }}</p>
                        <p class="movie__option"><strong>Tác giả: </strong>
                                @foreach ($data->directors as $director)
                                    <a href="#">
                                        {{ $director->directors }}@if(!$loop->last), @endif
                                    </a>
                                @endforeach
                        </p>
                        <p class="movie__option"><strong>Diễn viên: </strong>
                                @foreach ($data->actors as $actor)
                                    <a href="#">
                                        {{ $actor->actor_name }}@if(!$loop->last), @endif
                                    </a>
                                @endforeach
                            </p>




                        <div class="movie__btns movie__btns--full">
                            <a href="{{ route('user.bookingStore1', $data->movie_id) }}"
                                class="btn btn-md btn--warning">Đặt vé phim này</a>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <h2 class="page-heading" style="clear: both;">Mô tả</h2>

                <p class="movie__describe">
                    {!! $data->description !!}
                </p>

                <div class="clearfix"></div>

                <h2 class="page-heading" style="clear: both;">Trailer</h2>
                <div class="movie-trailer">
                    @if (!empty($data->trailer_url))
                        <iframe
                            width="560"
                            height="315"
                            src="{{ $data->trailer_url }}"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                    @else
                        <p>Trailer not available.</p>
                    @endif
                </div>
            </div>

            <h2 class="page-heading">Lịch chiếu</h2>
            <div class="choose-container">
                <div class="time-select">
                    @foreach ($showtimes as $screenAndDate => $items)
                        <div class="time-select__group">
                            <div class="col-sm-4">
                                <p class="time-select__place">{{ \Carbon\Carbon::parse(explode(' - ', $screenAndDate)[0])->format('d-m-Y') }} :
                                    {{ explode(' - ', $screenAndDate)[1] }}</p>
                            </div>
                            <ul class="col-sm-8 items-wrap">
                                @foreach ($items as $item)
                                    <li class="time-select__item" data-time="{{ $item->time }}" data-movie-id="{{ $data->movie_id }}" data-duration="{{ $data->duration }}" style="cursor: pointer;">
                                        {{ date('H:i', strtotime($item->time)) }} ~ {{ date('H:i', strtotime($item->time . ' + ' . $data->duration . ' minutes')) }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>


                <h2 class="page-heading">Bình luận ({{ $reviews->count() }})</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first() }}</strong>
                    </div>
                @endif

{{--                @php--}}
{{--                $ticket = $ticket->toArray();--}}
{{--                $ticket = $ti--}}
{{--                    dd($ticket)--}}
{{--                @endphp--}}

                <div class="comment-wrapper">
                    @if ($ticket = 0)
                    <h3 class="comment-title">Viết bình luận</h3>
                    <form id="comment-form" class="comment-form" method='post' action="{{ route('movie.store') }}">
                        @csrf
                        <input type="hidden" name="movie_id" value="{{ $movie_id }}">
                        <input type="hidden" name="user_id" value="{{ session('user.user_id') }}">
                        <textarea class="comment-form__text" name="comment" placeholder='Thêm bình luận của bạn ở đây' maxlength="250"></textarea>
                        <label class="comment-form__info">Còn lại <span id="remaining-chars">250</span> kí tự</label>
                        <button type='submit' class="btn btn-md btn--danger comment-form__btn">Thêm comment</button>
                    </form>
                    @endif
                        <div class="comment-sets" id="comment-list">
                            <div class="comments-container">
                                @foreach ($reviews as $item)
                                    <div class="comment">


                                        <a href='#' class="comment__author">{{ $item->user->username }}</a>
                                        <p class="comment__date">{{ $item->review_date }} | {{ $item->review_time }}</p>
                                        <p class="comment__message" style="word-wrap: break-word; white-space: normal;">{{ $item->comment }}</p>
                                        <div class="rating-display">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <label>{{ $i <= $item->rating ? '★' : '☆' }}</label>
                                            @endfor
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    {{-- <div class="comment-more">
                        <a href="javascript:void(0);" id="load-more-comments" class="watchlist">Hiển thị thêm bình
                            luận</a>
                    </div> --}}
                </div>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        const textarea = document.querySelector('.comment-form__text');
                        const remainingCharsLabel = document.getElementById('remaining-chars');
                        const maxLength = 250;

                        // Cập nhật số ký tự còn lại khi người dùng nhập
                        textarea.addEventListener('input', function() {
                            const currentLength = textarea.value.length;
                            const remainingChars = maxLength - currentLength;

                            // Cập nhật thông báo
                            remainingCharsLabel.textContent = remainingChars;

                            // Nếu số ký tự vượt quá 250, cắt bớt
                            if (remainingChars < 0) {
                                textarea.value = textarea.value.slice(0, maxLength);
                            }
                        });
                    });
                </script>

{{--                <script>--}}
{{--                    // Define routes in the global JavaScript scope--}}
{{--                    const routes = {--}}
{{--                        bookingStore: @json(route('user.bookingStore2')),--}}
{{--                        bookingPage: @json(route('user.booking2'))--}}
{{--                    };--}}

{{--                    $(document).ready(function() {--}}
{{--                        $('.time-select__item').on('click', function() {--}}
{{--                            const time = $(this).data('time');--}}
{{--                            const movieId = $(this).data('movie-id');--}}
{{--                            const duration = $(this).data('duration');--}}

{{--                            // Validate data before sending the AJAX request--}}
{{--                            if (!time || !movieId || !duration) {--}}
{{--                                alert('Some essential data is missing. Please try again.');--}}
{{--                                return;--}}
{{--                            }--}}

{{--                            // Send AJAX request--}}
{{--                            $.ajax({--}}
{{--                                url: routes.bookingStore,--}}
{{--                                method: "POST",--}}
{{--                                headers: {--}}
{{--                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Fetch token dynamically--}}
{{--                                },--}}
{{--                                data: {--}}
{{--                                    time: time,--}}
{{--                                    movie_id: movieId,--}}
{{--                                    duration: duration--}}
{{--                                },--}}
{{--                                success: function(response) {--}}
{{--                                    // Redirect on success--}}
{{--                                    window.location.href = routes.bookingPage;--}}
{{--                                    console.log(response);--}}
{{--                                },--}}
{{--                                error: function(xhr) {--}}
{{--                                    // Handle errors and show feedback--}}
{{--                                    alert('An error occurred: ' + (xhr.responseJSON?.message || 'Please try again later.'));--}}
{{--                                }--}}
{{--                            });--}}
{{--                        });--}}
{{--                    });--}}
{{--                </script>--}}
{{--                <script>--}}
{{--                    $(document).ready(function() {--}}
{{--                        console.log('jQuery is loaded!');--}}
{{--                    });--}}
{{--                </script>--}}
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
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <!-- Bootstrap 3 -->
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>

    <!-- Mobile menu -->
    <script src="{{ asset('js/jquery.mobile.menu.js') }}"></script>
    <!-- Select -->
    <script src="{{ asset('js/external/jquery.selectbox-0.2.min.js') }}"></script>

    <!-- Stars rate -->
    <script src="{{ asset('js/external/jquery.raty.js') }}"></script>
    <!-- Swiper slider -->
    <script src="{{ asset('js/external/idangerous.swiper.min.js') }}"></script>
    <!-- Magnific-popup -->
    <script src="{{ asset('js/external/jquery.magnific-popup.min.js') }}"></script>

    <!--*** Google map ***-->
    <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
    <!--*** Google map infobox ***-->
    <script src="{{ asset('js/external/infobox.js') }}"></script>

    <!-- Share buttons -->
    <script type="text/javascript">
        var addthis_config = {
            "data_track_addressbar": true
        };
    </script>
    <script type="text/javascript" src="https://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-525fd5e9061e7ef0"></script>

    <!-- Form element -->
    <script src="{{ asset('js/external/form-element.js') }}"></script>
    <!-- Form validation -->
    <script src="{{ asset('js/form.js') }}"></script>

    <!-- Custom -->
    <script src="{{ asset('js/custom.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            init_MoviePage();
            init_MoviePageFull();
        });
    </script>


@endsection
