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

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js"></script>
                            <![endif]-->
    <style>
        .screen-card {
            cursor: pointer;
            border: 1px solid #ddd;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
        }

        .screen-name {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        }

        .screen-overflow {
            min-height: 60px;
            max-height: 200px;
            overflow-y: auto;
            overflow-x: hidden;
            padding: 10px;
        }

        .time-select .time-select__item:before {
            width: 90px;
        }
    </style>
@endsection

@section('content')
    <br>
    <section class="container">
        <div class="order-container">
            <div class="order">
                <img class="order__images" alt='' src="{{ asset('images/tickets.png') }}">
                <p class="order__title">Đặt vé <br><span class="order__descript">chúc bạn có thời gian xem phim vui
                        vẻ</span></p>
            </div>
        </div>
        <div class="order-step-area">
            <div class="order-step first--step">1. Chọn phim &amp; phòng &amp; xuất chiếu</div>
        </div>

        <h2 class="page-heading heading--outcontainer">Phim</h2>
    </section>

    <div class="choose-film">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="choose-container choose-container--short">
                    @foreach ($data as $item)
                        <img alt="" src="{{ Storage::url($item->cover_image) }}" width="180" height="260"
                            style="margin-left: 210px;" data-film="{{ $item->title }}"
                            data-movie-id="{{ $item->movie_id }}">
                        <p class="choose-film__title"></p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- @php
        echo session('movie.movie_id');
        echo session('movie.title');
    @endphp --}}

    <section class="container">
        <div class="col-sm-12">
            <div class="choose-indector choose-indector--film">
                <strong>Chọn: </strong><span class="choosen-area">
                    @if (count($data) == 1)
                        @foreach ($data as $item)
                            {{ $item->title }}
                        @endforeach
                    @endif
                </span>
            </div>

            <h2 class="page-heading">Chọn phòng</h2>

            @if (session('movie.movie_id'))
                @if (count($screens) > 0)
                    <div class="row screen-overflow" id="screen-list-container">
                        <div class="row" style="width: 100%; box-sizing: border-box;" id="screen-list">
                            @foreach ($screens as $item)
                                <div class="col-md-2 mb-4" style="padding: 10px; box-sizing: border-box;">
                                    <div class="screen-card" data-screen-id="{{ $item->screen_id }}"
                                        data-screen-name="{{ $item->screen_name }}" onclick="getShowtimes(this)">
                                        <span class="screen-name">{{ $item->screen_name }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <p>&emsp;Không có phòng chiếu cho bộ phim này.</p>
                @endif
            @endif
            <div class="row screen-overflow" id="screen-list-container" style="display: none;">
                <div class="row" style="width: 100%; box-sizing: border-box;" id="screen-list">
                    <!-- Các phòng chiếu sẽ được hiển thị ở đây -->

                </div>
            </div>
            <div class="choose-indector choose-indector-screen">
                <strong>Chọn: </strong><span class="choosen-area" id="choosen-screen"></span>
            </div>

            <h2 class="page-heading" style="clear: both;">Chọn xuất chiếu</h2>

            <div class="time-select time-select--wide">
                <!-- Đây sẽ là nơi các nhóm ngày và giờ sẽ được hiển thị -->
            </div>

            <div class="choose-indector">
                <strong>Chọn: </strong><span class="choosen-area" id="choosen-time"></span>
            </div>
        </div>

    </section>

    <div class="clearfix"></div>

    <form id='film-and-time' class="booking-form" method='post' action='{{ route('user.bookingStore2') }}'>
        @csrf
        <input type="text" name="movie_id" class="choosen-movie-id" id="chosen-movie-id"
            value="{{ $data->first()->movie_id }}">
        <input type='text' name='screen_id' class="choosen-screen" id="chosen-screen-id">
        <input type='text' name='showtime_date' class="choosen-cinema" id="chosen-showtime-date">
        <input type='text' name='showtime_time' class="choosen-time" id="chosen-time">

        <style>
            #film-and-time input {
                        display: block;
                    }
        </style>

        <div class="booking-pagination">
            <a href="#" class="booking-pagination__prev hide--arrow">
                <span class="arrow__text arrow--prev"></span>
                <span class="arrow__info"></span>
            </a>
            <a href="#" class="booking-pagination__next" id="submit-form">
                <span class="arrow__text arrow--next">Bước tiếp theo</span>
                <span class="arrow__info">Chọn ghế ngồi</span>
            </a>
        </div>

    </form>
@endsection

@section('script')
    <script>
        document.getElementById('submit-form').addEventListener('click', function(event) {
            event.preventDefault();

            var movieId = document.querySelector('input[name="movie_id"]');
            var screenId = document.querySelector('input[name="screen_id"]');
            var showtimeDate = document.querySelector('input[name="showtime_date"]');
            var showtimeTime = document.querySelector('input[name="showtime_time"]');

            if (!movieId.value) {
                alert("Bạn chưa chọn phim.");
                return;
            }

            if (!screenId.value) {
                alert("Bạn chưa chọn phòng.");
                return;
            }

            if (!showtimeTime.value) {
                alert("Bạn chưa chọn xuất chiếu.");
                return;
            }

            document.getElementById('film-and-time').submit();
        });
    </script>

    <script>
        let movieIdGlobal = null;

        function getScreens(element) {
            const movieId = element.getAttribute('data-movie-id');
            movieIdGlobal = movieId; // Lưu movieId vào biến toàn cục
            document.getElementById('chosen-movie-id').value = movieId;

            // Reset các input về trạng thái rỗng
            document.getElementById('chosen-screen-id').value = '';
            document.getElementById('chosen-showtime-date').value = '';
            document.getElementById('chosen-time').value = '';
            document.getElementById('choosen-screen').textContent = '';
            document.getElementById('choosen-time').textContent = '';

            // Ẩn phần xuất chiếu
            document.querySelector('.time-select').style.display = 'none';

            $.ajax({
                url: '{{ route('user.get.screens') }}',
                method: 'POST',
                data: {
                    movie_id: movieId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response); // In ra danh sách phòng chiếu
                    showScreens(response); // Gọi hàm showScreens để hiển thị phòng chiếu
                },
                error: function(xhr, status, error) {
                    console.error('Có lỗi xảy ra:', error);
                }
            });
        }

        function showScreens(screens) {
            const screenListContainer = document.getElementById('screen-list-container');
            const screenList = document.getElementById('screen-list');

            // Xóa các phòng chiếu cũ trước khi thêm mới
            screenList.innerHTML = '';

            if (screens.length === 0) {
                screenList.innerHTML = '<p>&emsp;&emsp;&emsp;Không có phòng chiếu cho bộ phim này.</p>';
            } else {
                // Tạo danh sách phòng chiếu từ dữ liệu trả về
                screens.forEach(function(screen) {
                    const screenDiv = document.createElement('div');
                    screenDiv.classList.add('col-md-2', 'mb-4');
                    screenDiv.style.padding = '10px';
                    screenDiv.innerHTML = `
                <div class="screen-card" data-screen-id="${screen.screen_id}" data-screen-name="${screen.screen_name}" onclick="getShowtimes(this)">
                    <span class="screen-name">${screen.screen_name}</span>
                </div>
            `;
                    screenList.appendChild(screenDiv);
                });
            }

            // Hiển thị phần danh sách phòng chiếu
            screenListContainer.style.display = 'block';
        }

        function getShowtimes(element) {
            const screenId = element.getAttribute('data-screen-id'); // Lấy screen_id
            const screenName = element.getAttribute('data-screen-name'); // Lấy screen_name
            @if (session('movie.movie_id'))
                movieIdGlobal = @json(session('movie.movie_id'));
            @endif
            console.log(movieIdGlobal);
            console.log(screenId);

            // Reset các input về trạng thái rỗng
            document.getElementById('chosen-showtime-date').value = '';
            document.getElementById('chosen-time').value = '';
            document.getElementById('choosen-time').textContent = '';

            // Hiển thị tên phòng chiếu
            document.getElementById('chosen-screen-id').value = screenId;
            const chosenScreen = document.getElementById('choosen-screen');
            if (chosenScreen) {
                chosenScreen.textContent = screenName;
            }

            $.ajax({
                url: '{{ route('user.get.showtimes') }}',
                method: 'POST',
                data: {
                    movie_id: movieIdGlobal,
                    screen_id: screenId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response);
                    showShowtimes(response); // Gọi hàm showShowtimes để hiển thị xuất chiếu
                },
                error: function(xhr, status, error) {
                    console.error('Có lỗi xảy ra:', error);
                }
            });

            // Hiển thị phần xuất chiếu
            document.querySelector('.time-select').style.display = 'block';
        }

        function showShowtimes(showtimes) {
            const timeSelectContainer = document.querySelector('.time-select');

            // Xóa tất cả các nhóm suất chiếu cũ trong giao diện
            timeSelectContainer.innerHTML = '';

            // Lặp qua các ngày và hiển thị các suất chiếu tương ứng
            Object.keys(showtimes).forEach(function(date) {
                const showtimeGroup = showtimes[date]; // Lấy các suất chiếu trong ngày
                const groupElement = document.createElement('div');
                groupElement.classList.add('time-select__group');

                // Chuyển đổi định dạng ngày từ yyyy-mm-dd sang dd/mm/yyyy
                const [year, month, day] = date.split('-'); // Tách các thành phần ngày
                const formattedDate = `${day}/${month}/${year}`; // Ghép lại theo định dạng dd/mm/yyyy

                // Thêm ngày vào nhóm
                const dateElement = document.createElement('div');
                dateElement.classList.add('col-sm-3');
                dateElement.innerHTML =
                `<p class="time-select__place">${formattedDate}</p>`; // Sử dụng ngày đã định dạng
                groupElement.appendChild(dateElement);

                // Thêm các suất chiếu (theo giờ) vào nhóm
                const listElement = document.createElement('ul');
                listElement.classList.add('col-sm-6', 'items-wrap');

                showtimeGroup.forEach(function(showtime) {
                    const timeOnly = showtime.time.substring(0, 5); // Lấy giờ bắt đầu (HH:MM)
                    const endTime = showtime.end_time; // Lấy giờ kết thúc từ dữ liệu

                    const timeElement = document.createElement('li');
                    timeElement.classList.add('time-select__item');
                    timeElement.setAttribute('data-time', timeOnly);
                    timeElement.setAttribute('data-end-time', endTime);
                    timeElement.textContent =
                        `${timeOnly} - ${endTime}`; // Hiển thị giờ bắt đầu - giờ kết thúc

                    timeElement.addEventListener('click', function() {
                        document.getElementById('chosen-showtime-date').value = date;
                        document.getElementById('chosen-time').value = timeOnly;

                        const chosenDateTime =
                        `${formattedDate} và ${timeOnly} - ${endTime}`; // Hiển thị ngày/tháng/năm
                        document.getElementById('choosen-time').textContent = chosenDateTime;

                        const allTimeElements = timeSelectContainer.querySelectorAll(
                            '.time-select__item');
                        allTimeElements.forEach(function(item) {
                            item.classList.remove('active');
                        });

                        timeElement.classList.add('active');
                    });

                    listElement.appendChild(timeElement);
                });

                groupElement.appendChild(listElement);

                // Thêm nhóm vào container
                timeSelectContainer.appendChild(groupElement);
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
    {{-- <script src="{{ asset('js/external/form-element.js') }}"></script> --}}

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
