@extends('user.layouts.master')

@section('title')
    {{ $detail->title }} | Chi tiết phim
@endsection

@section('content')
    <div class="col-sm-12">
        <div class="movie">
            <h2 class="page-heading">NỘI DUNG PHIM</h2>

            <div class="movie__info">
                <div class="col-sm-4 col-md-3 movie-mobile">
                    {{-- <div class="movie__images">
                        <span class="movie__rating">5.0</span>
                        <img alt='' src="{{ \Storage::url($detail->image) }}">
                    </div> --}}
                    <div class="image-container movie__images">
                        <span class="movie__rating">5.0</span>
                        <img src="{{ asset($detail->cover_image) }}" alt="Venom Poster" class="main-image">
                        <div class="zoomed-image" style="background-image: url('{{ asset($detail->cover_image) }}');">
                        </div>
                    </div>

                </div>

                <div class="col-sm-8 col-md-9">
                    <p class="movie__time">{{ $detail->duration }} phút</p>

                    <p class="movie__option" style="font-size: 30px">{{ $detail->title }}</p>
                    <hr>
                    <p class="movie__option"><strong>Đạo diễn: </strong>{{ $detail->director }}</p>
                    <p class="movie__option"><strong>Diễn viên: </strong>{{ $detail->actors }}</p>
                    <p class="movie__option"><strong>Thể loại: </strong>{{ $detail->category_name }}</p>
                    <p class="movie__option"><strong>Khởi chiếu: </strong>
                        {{ \Carbon\Carbon::parse($detail->release_date)->format('d/m/Y') }}
                    </p>
                    <p class="movie__option"><strong>Quốc gia: </strong>{{ $detail->country }}</p>
                    <p class="movie__option"><strong>Age restriction: </strong>16+</p>
                    {{-- <p class="movie__option"><strong>Box office: </strong><a href="#">$1 017 003 568</a></p> --}}

                    {{-- <a href="#" class="comment-link">Comments: 15</a> --}}

                    <div class="movie__btns movie__btns--full">
                        <a href="{{ route('bookingMovie', ['id' => $detail->movie_id]) }}" class="btn btn-md btn--warning">book a ticket for this movie</a>
                        {{-- <a href="#Trailer" class="watchlist" id="trailerButton" style="cursor: pointer;">Trailer</a> --}}
                    </div>

                    {{-- <div class="share">
                        <span class="share__marker">Share: </span>
                        <div class="addthis_toolbox addthis_default_style ">
                            <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                            <a class="addthis_button_tweet"></a>
                            <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                        </div>
                    </div> --}}
                </div>
            </div>

            <div class="clearfix"></div>

            <h2 class="page-heading">Tóm tắt</h2>

            <p class="movie__describe">{{ $detail->description }}</p>

        </div>

        {{-- <h2 class="page-heading">showtime &amp; tickets</h2> --}}
        <div class="choose-container">

            <a class="page-heading" href="#Trailer" class="watchlist" id="trailerButton" style="cursor: pointer;">Trailer</a>

            <div class="movie__media" id="trailerContainer" style="display: none;">
                <div>
                    <iframe width="560" height="315" src="{{ $detail->trailer_url }}" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>

            <script>
                // Lấy các phần tử cần thiết
                const trailerButton = document.getElementById('trailerButton');
                const trailerContainer = document.getElementById('trailerContainer');

                // Thêm sự kiện click cho nút Trailer
                trailerButton.addEventListener('click', function (event) {
                    event.preventDefault(); // Ngăn chặn hành động mặc định của liên kết

                    // Kiểm tra trạng thái hiện tại của trailerContainer
                    if (trailerContainer.style.display === 'none' || trailerContainer.style.display === '') {
                        trailerContainer.style.display = 'block'; // Hiển thị video
                    } else {
                        trailerContainer.style.display = 'none'; // Ẩn video
                    }
                });
            </script>

            <!-- hiden maps with multiple locator-->
            {{-- <div class="map">
                <div id='cimenas-map'></div>
            </div> --}}

            <h2 class="page-heading">comments (15)</h2>

            <div class="comment-wrapper">
                <form id="comment-form" class="comment-form" method='post'>
                    <textarea class="comment-form__text" placeholder='Add you comment here'></textarea>
                    <label class="comment-form__info">250 characters left</label>
                    <button type='submit' class="btn btn-md btn--danger comment-form__btn">add comment</button>
                </form>

                <div class="comment-sets">

                    <div class="comment">
                        <div class="comment__images">
                            <img alt='' src="images/comment/avatar.jpg">
                        </div>

                        <a href='#' class="comment__author"><span class="social-used fa fa-facebook"></span>Roberta
                            Inetti</a>
                        <p class="comment__date">today | 03:04</p>
                        <p class="comment__message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae
                            enim
                            sollicitudin, euismod erat id, fringilla lacus. Cras ut rutrum lectus. Etiam ante justo,
                            volutpat at viverra a, mattis in velit. Morbi molestie rhoncus enim, vitae sagittis dolor
                            tristique et.</p>
                        <a href='#' class="comment__reply">Reply</a>
                    </div>

                    <div class="comment">
                        <div class="comment__images">
                            <img alt='' src="images/comment/avatar-olia.jpg">
                        </div>

                        <a href='#' class="comment__author"><span class="social-used fa fa-vk"></span>Olia
                            Gozha</a>
                        <p class="comment__date">22.10.2013 | 14:40</p>
                        <p class="comment__message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae
                            enim
                            sollicitudin, euismod erat id, fringilla lacus. Cras ut rutrum lectus. Etiam ante justo,
                            volutpat at viverra a, mattis in velit. Morbi molestie rhoncus enim, vitae sagittis dolor
                            tristique et.</p>
                        <a href='#' class="comment__reply">Reply</a>
                    </div>

                    <div class="comment comment--answer">
                        <div class="comment__images">
                            <img alt='' src="images/comment/avatar-dmitriy.jpg">
                        </div>

                        <a href='#' class="comment__author"><span class="social-used fa fa-vk"></span>Dmitriy
                            Pustovalov</a>
                        <p class="comment__date">today | 10:19</p>
                        <p class="comment__message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae
                            enim
                            sollicitudin, euismod erat id, fringilla lacus. Cras ut rutrum lectus. Etiam ante justo,
                            volutpat at viverra a, mattis in velit. Morbi molestie rhoncus enim, vitae sagittis dolor
                            tristique et.</p>
                        <a href='#' class="comment__reply">Reply</a>
                    </div>

                    <div class="comment comment--last">
                        <div class="comment__images">
                            <img alt='' src="images/comment/avatar-sia.jpg">
                        </div>

                        <a href='#' class="comment__author"><span class="social-used fa fa-facebook"></span>Sia
                            Andrews</a>
                        <p class="comment__date"> 22.10.2013 | 12:31 </p>
                        <p class="comment__message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae
                            enim
                            sollicitudin, euismod erat id, fringilla lacus. Cras ut rutrum lectus. Etiam ante justo,
                            volutpat at viverra a, mattis in velit. Morbi molestie rhoncus enim, vitae sagittis dolor
                            tristique et.</p>
                        <a href='#' class="comment__reply">Reply</a>
                    </div>

                    <div id='hide-comments' class="hide-comments">
                        <div class="comment">
                            <div class="comment__images">
                                <img alt='' src="images/comment/avatar.jpg">
                            </div>

                            <a href='#' class="comment__author"><span
                                        class="social-used fa fa-facebook"></span>Roberta Inetti</a>
                            <p class="comment__date">today | 03:04</p>
                            <p class="comment__message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut
                                vitae
                                enim sollicitudin, euismod erat id, fringilla lacus. Cras ut rutrum lectus. Etiam ante
                                justo, volutpat at viverra a, mattis in velit. Morbi molestie rhoncus enim, vitae
                                sagittis
                                dolor tristique et.</p>
                            <a href='#' class="comment__reply">Reply</a>
                        </div>

                        <div class="comment">
                            <div class="comment__images">
                                <img alt='' src="images/comment/avatar-olia.jpg">
                            </div>

                            <a href='#' class="comment__author"><span class="social-used fa fa-vk"></span>Olia
                                Gozha</a>
                            <p class="comment__date">22.10.2013 | 14:40</p>
                            <p class="comment__message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut
                                vitae
                                enim sollicitudin, euismod erat id, fringilla lacus. Cras ut rutrum lectus. Etiam ante
                                justo, volutpat at viverra a, mattis in velit. Morbi molestie rhoncus enim, vitae
                                sagittis
                                dolor tristique et.</p>
                            <a href='#' class="comment__reply">Reply</a>
                        </div>
                    </div>

                    <div class="comment-more">
                        <a href="#" class="watchlist">Show more comments</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
