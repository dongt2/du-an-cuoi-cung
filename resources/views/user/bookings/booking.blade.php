@extends('user.layouts.master')

@section('title')
    Booking
@endsection
@section('style')
    <link href="../netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!-- Roboto -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>

    <!-- Stylesheets -->
    <!-- jQuery UI -->
    <link href="../code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="stylesheet">

    <!-- Mobile menu -->
    <link href="css/gozha-nav.css" rel="stylesheet" />
    <!-- Select -->
    <link href="css/external/jquery.selectbox.css" rel="stylesheet" />
    <!-- Swiper slider -->
    <link href="css/external/idangerous.swiper.css" rel="stylesheet" />

    <!-- Custom -->
    <link href="css/style3860.css?v=1" rel="stylesheet" />

    <!-- Modernizr -->
    <script src="{{ asset('js/external/modernizr.custom.js') }}"></script>
@endsection

@section('content')
    <section class="container">
        <div class="order-container">
            <div class="order">
                <img class="order__images" alt='' src="images/tickets.png">
                <p class="order__title">Book a ticket <br><span class="order__descript">and have fun movie
                        time</span></p>
                <div class="order__control">
                    <a href="#" class="order__control-btn active">Purchase</a>
                    <a href="#" class="order__control-btn">Reserve</a>
                </div>
            </div>
        </div>
        <div class="order-step-area">
            <div class="order-step first--step">1. What &amp; Where &amp; When</div>
        </div>

        <h2 class="page-heading heading--outcontainer">Choose a movie</h2>
    </section>

    <div class="choose-film">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @if (isset($movie))
                    <div data-value="{{ $movie->movie_id }}" data-film="{{ $movie->title }}">
                        <div class="film-images">
                            <img style="width: 200px; height: 200px;" alt='' src="{{ asset($movie->cover_image) }}">
                        </div>
                        <p class="choose-film__title">{{ $movie->title }}</p>
                    </div>
                @elseif (isset($movies) && count($movies) > 0)
                    @foreach ($movies as $item)
                        <div class="swiper-slide" data-value="{{ $item->movie_id }}" data-film="{{ $item->title }}">
                            <div class="film-images">
                                <img alt='' src="{{ asset($item->cover_image) }}">
                            </div>
                            <p class="choose-film__title">{{ $item->title }}</p>
                        </div>
                    @endforeach
                @else
                    <p class="text-center">Không có phim</p>
                @endif
            </div>
        </div>
    </div>

    <section class="container">
        <div class="col-sm-12">
            <div class="col-sm-12">
                <div class="choose-indector choose-indector--film">
                    <strong>Choosen: </strong>
                    @if (isset($movie))
                        <span id="choosen-movie" class="choosen-area" data-value="{{ $movie->movie_id }}"
                            data-film="{{ $movie->title }}">
                            {{ $movie->title }}
                        </span>
                    @else
                        <span class="choosen-area">Không có phim nào được chọn.</span>
                    @endif
                </div>

            </div>

            <h2 class="page-heading">Date</h2>

            <div class="choose-container choose-container--short">

                <div class="datepicker">
                    <span class="datepicker__marker"><i class="fa fa-calendar"></i>Date</span>
                    <input type="date" id="datepicker" data-date="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}">
                </div>
            </div>

            <h2 class="page-heading">Pick time</h2>

            <div class="time-select time-select--wide">
                @if (isset($showtime) && is_array($showtime) && count($showtime) > 0)
                    @foreach ($showtime as $item)
                        <div class="time-select__group group--first">
                            <div class="col-sm-3">
                                <p class="time-select__place">{{ $item->screen_name }}</p>
                            </div>
                            <ul class="col-sm-6 items-wrap">
                                <li class="time-select__item" data-time='{{ $item->time }}'>{{ $item->time }}</li>
                            </ul>
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="choose-indector choose-indector--time">
                <strong>Choosen: </strong><span class="choosen-area"></span>
            </div>
        </div>

    </section>

    <form class="booking-form" method="POST" action="{{ route('storeBooking') }}">
        @csrf

        <input type="hidden" name="movie_id">
        <input type="hidden" name="movie_title">
        <input type="hidden" name="date">
        <input type="hidden" name="time">

        <div class="booking-pagination">
            <button type="submit" class="booking-pagination__next">
                <span class="arrow__text arrow--next">next step</span>
                <span class="arrow__info">choose a seat</span>
            </button>
        </div>
    </form>

    <div class="clearfix"></div>
@endsection

@section('script')
    <script src="{{ asset('../ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js') }}"></script>
    <script>
        window.jQuery || document.write('<script src="{{ asset('js/external/jquery-1.10.1.min.js') }}"><\/script>')
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

        document.addEventListener('DOMContentLoaded', function() {
            const movieSlides = document.querySelectorAll('.swiper-slide');
            const datePicker = document.querySelector('#datepicker');
            const timeItems = document.querySelectorAll('.time-select__item');
            const bookingForm = document.querySelector('.booking-form');

            const movieInput = document.querySelector('input[name="movie_id"]');
            const movieTitleInput = document.querySelector('input[name="movie_title"]');
            const dateInput = document.querySelector('input[name="date"]');
            const timeInput = document.querySelector('input[name="time"]');

            @if (isset($movie))
                movieInput.value = "{{ $movie->movie_id }}";
                movieTitleInput.value = "{{ $movie->title }}";

                document.querySelector('.choose-indector--film .choosen-area').textContent = "{{ $movie->title }}";
            @else
                movieSlides.forEach(slide => {
                    slide.addEventListener('click', function() {
                        const movieId = this.dataset.value;
                        const movieTitle = this.dataset.film;

                        movieInput.value = movieId;
                        movieTitleInput.value = movieTitle;

                        document.querySelector('.choose-indector--film .choosen-area').textContent =
                            movieTitle;
                    });
                });
            @endif

            datePicker.addEventListener('change', function() {
                dateInput.value = this.value;
            });

            timeItems.forEach(item => {
                item.addEventListener('click', function() {
                    timeItems.forEach(t => t.classList.remove('active'));

                    this.classList.add('active');

                    const time = this.dataset.time;
                    timeInput.value = time;
                });
            });

            bookingForm.addEventListener('submit', function(e) {
                const movieName = movieInput.value;
                const date = dateInput.value;
                const time = timeInput.value;

                if (!movieName || !date || !time) {
                    e.preventDefault();
                    alert('Chưa chọn đủ thông tin');
                }
            });
        });
    </script>
@endsection
