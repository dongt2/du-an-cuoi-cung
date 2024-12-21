{{-- <div class="container"> --}}
<div class="row">
    <div class="col-sm-8 col-md-9">
        <!-- Movie variant with time -->
        {{-- @dd($movie); --}}
        @foreach ($movie as $item)
            <div class="movie movie--test movie--test--light movie--test--left">
                <div class="movie__images">
                    <a href="{{ route('movies.show', $item->movie_id) }}" class="movie-beta__link">
                        <img alt='image' src="{{ asset($item->cover_image) }}" height="355px" width="240px">
                    </a>
                </div>

                <div class="movie__info">
                    <a href='{{ route('movies.show', $item->movie_id) }}' class="movie__title">{{$item->title}} </a>

                    <p class="movie__time">{{$item->duration}} phút</p>

                    <p class="movie__option">
                        <a href="#">{{ $item->category_name }}</a>
                    </p>

                    <div class="movie__rate">
                        <div class="score"></div>
                        <span class="movie__rating">4.1</span>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Movie variant with time -->


    </div>

    <aside class="col-sm-4 col-md-3">
        <div class="sitebar first-banner--left">
            <div class="banner-wrap first-banner--left">
                <img alt='banner' src="/template/amovie.gozha.net/images/banners/sale.jpg">
            </div>

            <div class="banner-wrap">
                <img alt='banner' src="/template/amovie.gozha.net/images/banners/sport.jpg">
            </div>

            <div class="banner-wrap banner-wrap--last">
                <img alt='banner' src="/template/amovie.gozha.net/images/banners/boots.jpg">
            </div>

            <div class="promo marginb-sm">
                <div class="promo__head">A.Movie app</div>
                <div class="promo__describe">for all smartphones<br> and tablets</div>
                <div class="promo__content">
                    <ul>
                        <li class="store-variant"><a href="#"><img alt=''
                                                                   src="/template/amovie.gozha.net/images/apple-store.svg"></a></li>
                        <li class="store-variant"><a href="#"><img alt=''
                                                                   src="/template/amovie.gozha.net/images/google-play.svg"></a></li>
                        <li class="store-variant"><a href="#"><img alt=''
                                                                   src="/template/amovie.gozha.net/images/windows-store.svg"></a></li>
                    </ul>
                </div>
            </div>

        </div>
    </aside>
</div>

{{-- </div> --}}
