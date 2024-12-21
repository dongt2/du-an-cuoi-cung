@extends('user.layout.default')

@section('title')
    @parent
    AMovie - Movie page
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
    <!-- Swiper slider -->
    <link href="{{ asset('css/external/idangerous.swiper.css') }}" rel="stylesheet" />
    <!-- Magnific-popup -->
    <link href="{{ asset('css/external/magnific-popup.css') }}" rel="stylesheet" />


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
    <br><br>
    <section class="container">
        <div class="col-sm-12">
            <div class="movie">
                <h2 class="page-heading">{{ $data->title }}</h2>

                <div class="movie__info">
                    <div class="col-sm-4 col-md-3 movie-mobile">
                        <div class="movie__images">
                            <span class="movie__rating">5.0</span>
                            {{-- <img alt='' src="{{ asset('images/movie/single-movie.jpg') }}"> --}}
                            <img alt='' src="{{ Storage::url($data->cover_image) }}" width="260px" height="380px">
                        </div>
                        <div class="movie__rate">Your vote: <div id='score' class="score"></div>
                        </div>
                    </div>

                    <div class="col-sm-8 col-md-9">
                        <p class="movie__time">{{ $data->duration }} min</p>

                        <p class="movie__option"><strong>Quốc gia: </strong><a href="#">{{ $data->country }}</a>
                        <p class="movie__option"><strong>Năm sản xuất: </strong><a href="#">{{ $data->year }}</a></p>
                        <p class="movie__option"><strong>Thể loại: </strong><a href="#">{{ $data->category->category_name }}</a>, <a
                                href="#">Thể loại 2</a></p>
                        <p class="movie__option"><strong>Ngày phát hành: </strong>{{ $data->release_date }}</p>
                        <p class="movie__option"><strong>Tác giả: </strong><a href="#">{{ $data->director }}</a></p>
                        <p class="movie__option"><strong>Diễn viên: </strong><a href="#">{{ $data->actors }}</a>, <a
                                href="#">Ian McKellen</a>, <a href="#">Richard Armitage</a>, <a
                                href="#">Ken Stott</a>, <a href="#">Graham McTavish</a></p>
                        <p class="movie__option"><strong>Giới hạn độ tuổi: </strong><a href="#">13</a></p>
                        <p class="movie__option"><strong>Box office: </strong><a href="#">$1 017 003 568</a></p>

                        <a href="#" class="comment-link">Comments: 15</a>

                        <div class="movie__btns movie__btns--full">
                            <a href="{{ route('user.bookingStore1', $data->movie_id ) }}" class="btn btn-md btn--warning">Đặt vé phim này</a>
                            <a href="#" class="watchlist">Add to watchlist</a>
                        </div>

                        <div class="share">
                            <span class="share__marker">Share: </span>
                            <div class="addthis_toolbox addthis_default_style ">
                                <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                                <a class="addthis_button_tweet"></a>
                                <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <h2 class="page-heading">The plot</h2>

                <p class="movie__describe">
                    {{  $data->description}}
                </p>

                <h2 class="page-heading">photos &amp; videos</h2>

                <div class="movie__media">
                    <div class="movie__media-switch">
                        <a href="#" class="watchlist list--photo" data-filter='media-photo'>234 photos</a>
                        <a href="#" class="watchlist list--video" data-filter='media-video'>10 videos</a>
                    </div>

                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <!--First Slide-->
                            <div class="swiper-slide media-video">
                                <a href='https://www.youtube.com/watch?v=Y5AehBA3IsE' class="movie__media-item ">
                                    <img alt='' src="{{ asset('images/movie/movie-video1.jpg') }}">
                                </a>
                            </div>

                            <!--Second Slide-->
                            <div class="swiper-slide media-video">
                                <a href='https://www.youtube.com/watch?v=Kb3ykVYvT4U' class="movie__media-item">
                                    <img alt='' src="{{ asset('images/movie/movie-video2.jpg') }}">
                                </a>
                            </div>

                            <!--Third Slide-->
                            <div class="swiper-slide media-photo">
                                <a href='images/movie/movie-img1-lg.jpg' class="movie__media-item">
                                    <img alt='' src="{{ asset('images/movie/movie-img1.jpg') }}">
                                </a>
                            </div>

                            <!--Four Slide-->
                            <div class="swiper-slide media-photo">
                                <a href='images/movie/movie-img2-lg.jpg' class="movie__media-item">
                                    <img alt='' src="{{ asset('images/movie/movie-img2.jpg') }}">
                                </a>
                            </div>

                            <!--Slide-->
                            <div class="swiper-slide media-photo">
                                <a href='images/gallery/large/item-7.jpg' class="movie__media-item">
                                    <img alt='' src="{{ asset('images/movie/movie-img3.jpg') }}">
                                </a>
                            </div>

                            <!--Slide-->
                            <div class="swiper-slide media-photo">
                                <a href='images/gallery/large/item-11.jpg' class="movie__media-item">
                                    <img alt='' src="{{ asset('images/movie/movie-img4.jpg') }}">
                                </a>
                            </div>

                            <!--First Slide-->
                            <div class="swiper-slide media-video">
                                <a href='https://www.youtube.com/watch?v=Y5AehBA3IsE' class="movie__media-item ">
                                    <img alt='' src="{{ asset('images/movie/movie-video1.jpg') }}">
                                </a>
                            </div>

                            <!--Second Slide-->
                            <div class="swiper-slide media-video">
                                <a href='https://www.youtube.com/watch?v=Kb3ykVYvT4U' class="movie__media-item">
                                    <img alt='' src="{{ asset('images/movie/movie-video2.jpg') }}">
                                </a>
                            </div>

                            <!--Slide-->
                            <div class="swiper-slide media-photo">
                                <a href='images/gallery/large/item-15.jpg' class="movie__media-item">
                                    <img alt='' src="{{ asset('images/movie/movie-img5.jpg') }}">
                                </a>
                            </div>

                            <!--Slide-->
                            <div class="swiper-slide media-photo">
                                <a href='images/gallery/large/item-16.jpg' class="movie__media-item">
                                    <img alt='' src="{{ asset('images/movie/movie-img6.jpg') }}">
                                </a>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

            <h2 class="page-heading">Lịch chiếu &amp; vé</h2>
            <div class="choose-container">
                <a href="#" id="map-switch" class="watchlist watchlist--map watchlist--map-full"><span
                        class="show-map">Hiển thị rạp chiếu phim trên bản đồ</span><span class="show-time">Hiển thị bảng thời gian chiếu phim</span></a>

                <div class="clearfix"></div>

                <div class="time-select">
                    <div class="time-select__group group--first">
                        <div class="col-sm-4">
                            <p class="time-select__place">Cineworld</p>
                        </div>
                        <ul class="col-sm-8 items-wrap">
                            <li class="time-select__item" data-time='09:40'>09:40</li>
                            <li class="time-select__item" data-time='13:45'>13:45</li>
                            <li class="time-select__item active" data-time='15:45'>15:45</li>
                            <li class="time-select__item" data-time='19:50'>19:50</li>
                            <li class="time-select__item" data-time='21:50'>21:50</li>
                        </ul>
                    </div>

                    <div class="time-select__group">
                        <div class="col-sm-4">
                            <p class="time-select__place">Empire</p>
                        </div>
                        <ul class="col-sm-8 items-wrap">
                            <li class="time-select__item" data-time='10:45'>10:45</li>
                            <li class="time-select__item" data-time='16:00'>16:00</li>
                            <li class="time-select__item" data-time='19:00'>19:00</li>
                            <li class="time-select__item" data-time='21:15'>21:15</li>
                            <li class="time-select__item" data-time='23:00'>23:00</li>
                        </ul>
                    </div>

                    <div class="time-select__group">
                        <div class="col-sm-4">
                            <p class="time-select__place">Curzon</p>
                        </div>
                        <ul class="col-sm-8 items-wrap">
                            <li class="time-select__item" data-time='09:00'>09:00</li>
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

                    <div class="time-select__group">
                        <div class="col-sm-4">
                            <p class="time-select__place">Odeon</p>
                        </div>
                        <ul class="col-sm-8 items-wrap">
                            <li class="time-select__item" data-time='10:45'>10:45</li>
                            <li class="time-select__item" data-time='16:00'>16:00</li>
                            <li class="time-select__item" data-time='19:00'>19:00</li>
                            <li class="time-select__item" data-time='21:15'>21:15</li>
                            <li class="time-select__item" data-time='23:00'>23:00</li>
                        </ul>
                    </div>

                    <div class="time-select__group group--last">
                        <div class="col-sm-4">
                            <p class="time-select__place">Picturehouse</p>
                        </div>
                        <ul class="col-sm-8 items-wrap">
                            <li class="time-select__item" data-time='17:45'>17:45</li>
                            <li class="time-select__item" data-time='21:30'>21:30</li>
                            <li class="time-select__item" data-time='02:20'>02:20</li>
                        </ul>
                    </div>
                </div>

                <!-- hiden maps with multiple locator-->
                <div class="map">
                    <div id='cimenas-map'></div>
                </div>

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
                                <img alt='' src="{{ asset('images/comment/avatar.jpg') }}">
                            </div>

                            <a href='#' class="comment__author"><span
                                    class="social-used fa fa-facebook"></span>Roberta Inetti</a>
                            <p class="comment__date">today | 03:04</p>
                            <p class="comment__message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae
                                enim sollicitudin, euismod erat id, fringilla lacus. Cras ut rutrum lectus. Etiam ante
                                justo, volutpat at viverra a, mattis in velit. Morbi molestie rhoncus enim, vitae sagittis
                                dolor tristique et.</p>
                            <a href='#' class="comment__reply">Reply</a>
                        </div>

                        <div class="comment">
                            <div class="comment__images">
                                <img alt='' src="{{ asset('images/comment/avatar-olia.jpg') }}">
                            </div>

                            <a href='#' class="comment__author"><span class="social-used fa fa-vk"></span>Olia
                                Gozha</a>
                            <p class="comment__date">22.10.2013 | 14:40</p>
                            <p class="comment__message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae
                                enim sollicitudin, euismod erat id, fringilla lacus. Cras ut rutrum lectus. Etiam ante
                                justo, volutpat at viverra a, mattis in velit. Morbi molestie rhoncus enim, vitae sagittis
                                dolor tristique et.</p>
                            <a href='#' class="comment__reply">Reply</a>
                        </div>

                        <div class="comment comment--answer">
                            <div class="comment__images">
                                <img alt='' src="{{ asset('images/comment/avatar-dmitriy.jpg') }}">
                            </div>

                            <a href='#' class="comment__author"><span class="social-used fa fa-vk"></span>Dmitriy
                                Pustovalov</a>
                            <p class="comment__date">today | 10:19</p>
                            <p class="comment__message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae
                                enim sollicitudin, euismod erat id, fringilla lacus. Cras ut rutrum lectus. Etiam ante
                                justo, volutpat at viverra a, mattis in velit. Morbi molestie rhoncus enim, vitae sagittis
                                dolor tristique et.</p>
                            <a href='#' class="comment__reply">Reply</a>
                        </div>

                        <div class="comment comment--last">
                            <div class="comment__images">
                                <img alt='' src="{{ asset('images/comment/avatar-sia.jpg') }}">
                            </div>

                            <a href='#' class="comment__author"><span class="social-used fa fa-facebook"></span>Sia
                                Andrews</a>
                            <p class="comment__date"> 22.10.2013 | 12:31 </p>
                            <p class="comment__message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae
                                enim sollicitudin, euismod erat id, fringilla lacus. Cras ut rutrum lectus. Etiam ante
                                justo, volutpat at viverra a, mattis in velit. Morbi molestie rhoncus enim, vitae sagittis
                                dolor tristique et.</p>
                            <a href='#' class="comment__reply">Reply</a>
                        </div>

                        <div id='hide-comments' class="hide-comments">
                            <div class="comment">
                                <div class="comment__images">
                                    <img alt='' src="{{ asset('images/comment/avatar.jpg') }}">
                                </div>

                                <a href='#' class="comment__author"><span
                                        class="social-used fa fa-facebook"></span>Roberta Inetti</a>
                                <p class="comment__date">today | 03:04</p>
                                <p class="comment__message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut
                                    vitae enim sollicitudin, euismod erat id, fringilla lacus. Cras ut rutrum lectus. Etiam
                                    ante justo, volutpat at viverra a, mattis in velit. Morbi molestie rhoncus enim, vitae
                                    sagittis dolor tristique et.</p>
                                <a href='#' class="comment__reply">Reply</a>
                            </div>

                            <div class="comment">
                                <div class="comment__images">
                                    <img alt='' src="{{ asset('images/comment/avatar-olia.jpg') }}">
                                </div>

                                <a href='#' class="comment__author"><span class="social-used fa fa-vk"></span>Olia
                                    Gozha</a>
                                <p class="comment__date">22.10.2013 | 14:40</p>
                                <p class="comment__message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut
                                    vitae enim sollicitudin, euismod erat id, fringilla lacus. Cras ut rutrum lectus. Etiam
                                    ante justo, volutpat at viverra a, mattis in velit. Morbi molestie rhoncus enim, vitae
                                    sagittis dolor tristique et.</p>
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
