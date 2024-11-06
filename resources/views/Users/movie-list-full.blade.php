@extends('Users.layouts.master')

@section('title')
    Movie List
@endsection

@section('content')
    <div class="col-sm-12">

        <div class="phim-section">
            <div class="left">
                <h1 class="page-heading text-movie">Phim đang chiếu</h1>
            </div>
            <div class="right">
                <h5 class="item-wrap">
                    <a href="" class="tags__item item-active">Phim sắp chiếu</a>
                </h5>
            </div>
        </div>
        <hr>


        {{-- <div class="tags-area">
            <div class="tags tags--unmarked">
                <span class="tags__label">Sorted by:</span>
                <ul>
                    <li class="item-wrap"><a href="#" class="tags__item item-active" data-filter='all'>all</a>
                    </li>
                    <li class="item-wrap"><a href="#" class="tags__item" data-filter='release'>release date</a>
                    </li>
                    <li class="item-wrap"><a href="#" class="tags__item" data-filter='popularity'>popularity</a>
                    </li>
                    <li class="item-wrap"><a href="#" class="tags__item" data-filter='comments'>comments</a></li>
                    <li class="item-wrap"><a href="#" class="tags__item" data-filter='ending'>ending soon</a></li>
                </ul>
            </div>
        </div> --}}

        <!-- Movie preview item -->
        <div class="movie movie--preview movie--full  ">
            @foreach ($movies as $movie)
                <div class="col-sm-3 movie-card-compact">
                    <div class="movie__images">
                        <a href="{{ route('detailMovie', ['id' => $movie->movie_id]) }}">
                            <img class="movie-poster" src="{{ \Storage::url($movie->image) }}">
                        </a>
                    </div>

                    {{-- <div class=""> --}}
                    <div class="text-movies">
                        <h3 class="movie-title">{{ $movie->title }}</h3>
                        <p><strong>Thể loại:</strong> Hành Động, Khoa Học Viễn Tưởng, Phiêu Lưu, Thần thoại</p>
                        <p><strong>Thời lượng:</strong> {{ $movie->duration }} phút</p>
                        <p>
                            <strong>Khởi chiếu:</strong> {{ \Carbon\Carbon::parse($movie->release_date)->format('d/m/Y') }}
                        </p>

                        <div class="movie-actions">
                            <button class="btn-like">
                                <i class="fa fa-thumbs-up"></i> Like 351
                            </button>
                            <button class="btn-ticket open-modal">
                                <i class="fa fa-ticket"></i> Mua vé
                            </button>
                        </div>
                    </div>
                    {{-- </div> --}}
                </div>
            @endforeach
        </div>
        <!-- end movie preview item -->
        <!-- Modal (ẩn đi mặc định) -->
        <div id="ticketModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Thông tin đặt vé</h2>
                <p>Chi tiết về suất chiếu và đặt vé tại rạp bạn chọn.</p>
                <!-- Thêm nội dung form đặt vé ở đây -->
                <form id='select' class="select" method='get'>
                    <select name="select_item" id="select-sort" class="select__sort" tabindex="0">
                        <option value="1" selected='selected'>Hà Nội</option>
                        {{-- <option value="2">New York</option>
                        <option value="3">Paris</option>
                        <option value="4">Berlin</option>
                        <option value="5">Moscow</option>
                        <option value="3">Minsk</option>
                        <option value="4">Warsawa</option>
                        <option value="5">Kiev</option> --}}
                    </select>
                </form>

                <div class="datepicker">
                    <span class="datepicker__marker"><i class="fa fa-calendar"></i>Date</span>
                    <input type="date" id="datepicker" class="datepicker_input">
                </div>

                <script>
                    // Lấy ngày hôm nay
                    const today = new Date();

                    // Định dạng theo yyyy-mm-dd
                    const day = String(today.getDate()).padStart(2, '0');
                    const month = String(today.getMonth() + 1).padStart(2, '0');
                    const year = today.getFullYear();
                    const formattedDate = `${year}-${month}-${day}`;

                    // Gán giá trị tối thiểu là ngày hôm nay
                    const datepicker = document.getElementById('datepicker');
                    datepicker.min = formattedDate; // Ngăn chọn ngày trước ngày hôm nay
                    datepicker.value = formattedDate; // Đặt ngày mặc định
                </script>




                <a href="#" id="map-switch" class="watchlist watchlist--map watchlist--map-full"><span
                        class="show-map">Show cinemas on map</span><span class="show-time">Show cinema time table</span></a>

                <div class="clearfix"></div>

                <div class="time-select">

                    <div class="time-select__group">
                        <div class="col-sm-4">
                            <p class="time-select__place">ZietAhh</p>
                        </div>
                        <ul class="col-sm-8 items-wrap">
                            <li class="time-select__item" data-time='09:00'>07:00</li>
                            <li class="time-select__item" data-time='09:00'>08:00</li>
                            <li class="time-select__item" data-time='09:00'>09:00</li>
                            <li class="time-select__item" data-time='09:00'>10:00</li>
                            <li class="time-select__item" data-time='11:00'>11:00</li>
                            <li class="time-select__item" data-time='13:00'>13:00</li>
                            <li class="time-select__item" data-time='15:00'>15:00</li>
                            <li class="time-select__item" data-time='17:00'>17:00</li>
                            <li class="time-select__item" data-time='19:0'>19:00</li>
                            <li class="time-select__item" data-time='21:0'>21:00</li>
                            <li class="time-select__item" data-time='23:0'>23:00</li>
                            <li class="time-select__item" data-time='01:0'>01:00</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- end movie preview item -->
        <div class="coloum-wrapper">
            <div class="pagination paginatioon--full">
                <a href='#' class="pagination__prev">prev</a>
                <a href='#' class="pagination__next">next</a>
            </div>
        </div>
        <script>
            // Lấy modal
            var modal = document.getElementById("ticketModal");

            // Lấy nút mở modal
            var btn = document.querySelector(".open-modal");

            // Lấy nút đóng modal
            var span = document.querySelector(".close");

            // Khi người dùng ấn vào nút, hiển thị modal
            btn.onclick = function() {
                modal.style.display = "block";
            }

            // Khi người dùng ấn vào nút x để đóng modal
            span.onclick = function() {
                modal.style.display = "none";
            }

            // Khi người dùng ấn ra ngoài modal, cũng đóng modal
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>

    </div>
@endsection
