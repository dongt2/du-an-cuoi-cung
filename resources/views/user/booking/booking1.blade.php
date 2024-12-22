@extends('user.layout.default')

@section('title')
    @parent
    AMovie - Booking step 1
@endsection

@section('style')
    <!-- Mobile Specific Metas-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="telephone=no" name="format-detection">

    <!-- Fonts -->
    <!-- Font awesome - icon font -->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!-- Roboto -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet" type="text/css">

    <!-- Stylesheets -->
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="stylesheet">

    <!-- Mobile menu -->
    <link href="{{ asset('css/gozha-nav.css') }}" rel="stylesheet" />
    <!-- Select -->
    <link href="{{ asset('css/external/jquery.selectbox.css') }}" rel="stylesheet" />
    <!-- Swiper slider -->
    <link href="{{ asset('css/external/idangerous.swiper.css') }}" rel="stylesheet" />

    <!-- Custom -->
    <link href="{{ asset('css/style3860.css?v=1') }}" rel="stylesheet" />

    <!-- Modernizr -->
    <script src="{{ asset('js/external/modernizr.custom.js') }}"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
                                                            <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
                                                            <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js"></script>
                                                        <![endif]-->
@endsection

@section('content')
    <br>
    <section class="container">
        <div class="order-container">
            <div class="order">
                <img class="order__images" alt='' src="{{ asset('images/tickets.png') }}">
                <p class="order__title">Book a ticket <br><span class="order__descript">and have fun movie time</span></p>
                <div class="order__control">
                    <a href="#" class="order__control-btn active">Purchase</a>
                    <a href="#" class="order__control-btn">Reserve</a>
                </div>
            </div>
        </div>
        <div class="order-step-area">
            <div class="order-step first--step">1. What &amp; Where &amp; When</div>
        </div>

        <h2 class="page-heading heading--outcontainer">Phim</h2>
    </section>

    <div class="choose-film">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @if (count($data) == 1)
                    <div class="choose-container choose-container--short">
                        <div class="datepicker">
                            @foreach ($data as $item)
                                <img alt="" src="{{ Storage::url($item->cover_image) }}" width="180"
                                    height="260" style="margin-left: 150px;">
                                <p class="choose-film__title"></p>
                            @endforeach
                        </div>
                    </div>
                @else
                    @foreach ($data as $item)
                        <div class="swiper-slide" data-film="{{ $item->movie_id }}">
                            <div class="film-images">
                                <img alt="" src="{{ Storage::url($item->cover_image) }}" width="260"
                                    height="260">
                            </div>
                            <p class="choose-film__title">{{ $item->title }}</p>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <section class="container">
        <div class="col-sm-12">
            <div class="choose-indector choose-indector--film">
                <strong>Choosen: </strong><span class="choosen-area">
                    @if (count($data) == 1)
                        @foreach ($data as $item)
                            {{ $item->title }}
                        @endforeach
                    @endif
                </span>
            </div>

            <h2 class="page-heading">Chọn phòng</h2>

            <div class="choose-container choose-container--short">
                <div class="row" style="min-height: 150px;">
                    <div class="row">
                        @foreach ($screens as $item)
                            <div class="col-md-2 mb-4" style="padding: 10px">
                                <div class="screen-card" data-id="{{ $item->id }}"
                                    onclick="setScreen('{{ $item->screen_id }}', '{{ $item->screen_name }}')"
                                    style="cursor: pointer; border: 1px solid #ddd; height: 50px; display: flex; justify-content: center; align-items: center; background-color: #f8f9fa;">
                                    <span class="screen-name"
                                        style="font-size: 18px; font-weight: bold;">{{ $item->screen_name }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div><br>

            <h2 class="page-heading" style="clear: both;">Chọn thời gian chiếu</h2>

            <div id="showtimes-container">
                <div class="time-select time-select--wide">
                    <div class="time-select__group group--first">
                        <div class="col-sm-3">
                            <p class="time-select__place">date</p>
                        </div>
                        <ul class="col-sm-6 items-wrap">
                            <li class="time-select__item" data-time="time">time1</li>
                            <li class="time-select__item" data-time="time">time2</li>
                            <li class="time-select__item" data-time="time">time3</li>
                            <li class="time-select__item" data-time="time">time4</li>
                            <li class="time-select__item" data-time="time">time5</li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="choose-indector choose-indector--time">
                <strong>Choosen: </strong><span class="choosen-area"></span>
            </div>
        </div>

    </section>

    <div class="clearfix"></div>

    <form id='film-and-time' class="booking-form" method='post' action='{{ route('user.bookingStore2') }}'>
        @csrf
        <input type="text" name="movie_id" class="choosen-movie"
            @if (count($data) == 1) value="{{ $data->first()->movie_id }}" @endif>
        <input type='text' name='screen_id' class="choosen-screen">
        <input type='text' name='showtime_date' class="choosen-cinema">
        <input type='text' name='showtime_time' class="choosen-time">


        <div class="booking-pagination">
            <a href="#" class="booking-pagination__prev hide--arrow">
                <span class="arrow__text arrow--prev"></span>
                <span class="arrow__info"></span>
            </a>
            <a href="#" class="booking-pagination__next" id="submit-form">
                <span class="arrow__text arrow--next">next step</span>
                <span class="arrow__info">choose a sit</span>
            </a>
        </div>
    </form>
    <script>
        document.getElementById('submit-form').addEventListener('click', function(e) {
            e.preventDefault(); 
            document.getElementById('film-and-time').submit();
        });
    </script>
@endsection

@section('script')
    <script>
        function setScreen(screenId, screenName) {
            document.querySelector('.choosen-screen').value = screenId;

            var movieId = '{{ session('movie.movie_id') }}' ? '{{ session('movie.movie_id') }}' : document.querySelector(
                '.choosen-movie').value;
            console.log(movieId);
            console.log(screenId);

            $.ajax({
                url: '{{ route('user.get-showtimes') }}',
                method: 'POST',
                data: {
                    screen_id: screenId,
                    movie_id: movieId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    let showtimesHtml = '<div class="time-select time-select--wide">';
                    $.each(response, function(date, times) {
                        showtimesHtml += `<div class="time-select__group group--first">
                                <div class="col-sm-3">
                                    <p class="time-select__place">${date}</p>
                                </div>
                                <ul class="col-sm-6 items-wrap">`;
                        $.each(times, function(index, time) {
                            showtimesHtml += `<li class="time-select__item" data-time="${time.time}" data-date="${date}">
                                    ${time.time}
                                </li>`;
                        });
                        showtimesHtml += '</ul></div>';
                    });
                    showtimesHtml += '</div>';
                    $('#showtimes-container').html(showtimesHtml);
                    $('.time-select__item').on('click', function() {
                        $('.time-select__item').removeClass('active');
                        $(this).addClass('active');
                        var selectedDate = $(this).data('date');
                        var selectedTime = $(this).data('time');
                        $('.choosen-cinema').val(selectedDate);
                        $('.choosen-time').val(selectedTime);
                        $('.choosen-area').html(selectedDate + ' - ' + selectedTime);
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error: " + error);
                }
            });
        }
    </script>

    <!-- JavaScript-->
    <!-- jQuery 1.9.1-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="{{ asset('js/external/jquery-1.10.1.min.js') }}"><\/script>')
    </script>

    <!-- Migrate -->
    <script src="{{ asset('js/external/jquery-migrate-1.2.1.min.js') }}"></script>

    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

    <!-- Bootstrap 3-->
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>

    <!-- Mobile menu -->
    <script src="{{ asset('js/jquery.mobile.menu.js') }}"></script>

    <!-- Select -->
    <script src="{{ asset('js/external/jquery.selectbox-0.2.min.js') }}"></script>

    <!-- Swiper slider -->
    <script src="{{ asset('js/external/idangerous.swiper.min.js') }}"></script>

    <!-- Form element -->
    <script src="{{ asset('js/external/form-element.js') }}"></script>

    <!-- Form validation -->
    <script src="{{ asset('js/form.js') }}"></script>

    <!-- Custom -->
    <script src="{{ asset('js/custom.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            init_BookingOne();
        });
    </script>
@endsection
