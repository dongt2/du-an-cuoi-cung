@extends('layouts.master')

@section('title')
    Movie List
@endsection

@section('content')
    <div class="col-sm-12">
        <h2 class="page-heading">Movies</h2>

        <div class="select-area">
            <form class="select" method='get'>
                <select name="select_item" class="select__sort" tabindex="0">
                    <option value="1" selected='selected'>London</option>
                    <option value="2">New York</option>
                    <option value="3">Paris</option>
                    <option value="4">Berlin</option>
                    <option value="5">Moscow</option>
                    <option value="3">Minsk</option>
                    <option value="4">Warsawa</option>
                    <option value="5">Kiev</option>
                </select>
            </form>

            <div class="datepicker">
                <span class="datepicker__marker"><i class="fa fa-calendar"></i>Date</span>
                <input type="text" id="datepicker" value='03/10/2014' class="datepicker__input">
            </div>

            <form class="select select--cinema" method='get'>
                <select name="select_item" class="select__sort" tabindex="0">
                    <option value="1" selected='selected'>Cineworld</option>
                    <option value="2">Empire</option>
                    <option value="3">Everyman</option>
                    <option value="4">Odeon</option>
                    <option value="5">Picturehouse</option>
                </select>
            </form>

            <form class="select select--film-category" method='get'>
                <select name="select_item" class="select__sort" tabindex="0">
                    <option value="2" selected='selected'>Children's</option>
                    <option value="3">Comedy</option>
                    <option value="4">Drama</option>
                    <option value="5">Fantasy</option>
                    <option value="6">Horror</option>
                    <option value="7">Thriller</option>
                </select>
            </form>

        </div>

        <div class="tags-area">
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
        </div>

        <!-- Movie preview item -->
        <div class="movie movie--preview movie--full release">
            <div class="col-sm-3 col-md-2 col-lg-2">
                <div class="movie__images">
                    <img alt='' src="/template/amovie.gozha.net/images/movie/movie-sample1.jpg">
                </div>
                <div class="movie__feature">
                    <a href="#" class="movie__feature-item movie__feature--comment">123</a>
                    <a href="#" class="movie__feature-item movie__feature--video">7</a>
                    <a href="#" class="movie__feature-item movie__feature--photo">352</a>
                </div>
            </div>

            <div class="col-sm-9 col-md-10 col-lg-10 movie__about">
                <a href='movie-page-full.html' class="movie__title link--huge">Last Vegas (2013)</a>

                <p class="movie__time">105 min</p>

                <p class="movie__option"><strong>Country: </strong><a href="#">USA</a></p>
                <p class="movie__option"><strong>Category: </strong><a href="#">Comady</a></p>
                <p class="movie__option"><strong>Release date: </strong>November 1, 2013</p>
                <p class="movie__option"><strong>Director: </strong><a href="#">Jon Turteltaub</a></p>
                <p class="movie__option"><strong>Actors: </strong><a href="#">Robert De Niro</a>, <a
                        href="#">Michael Douglas</a>, <a href="#">Morgan Freeman</a>, <a href="#">Kevin
                        Kline</a>, <a href="#">Mary Steenburgen</a>, <a href="#">Jerry
                        Ferrara</a>, <a href="#">Romany Malco</a> <a href="#">...</a></p>
                <p class="movie__option"><strong>Age restriction: </strong><a href="#">13</a></p>

                <div class="movie__btns">
                    <a href="#" class="btn btn-md btn--warning">book a ticket <span class="hidden-sm">for this
                            movie</span></a>
                    <a href="#" class="watchlist">Add to watchlist</a>
                </div>

                <div class="preview-footer">
                    <div class="movie__rate">
                        <div class="score"></div><span class="movie__rate-number">170 votes</span> <span
                            class="movie__rating">5.0</span>
                    </div>


                    <a href="#" class="movie__show-btn">Showtime</a>
                </div>
            </div>

            <div class="clearfix"></div>

            <!-- Time table (choose film start time)-->
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
            <!-- end time table-->

        </div>
        <!-- end movie preview item -->

        <!-- Movie preview item -->
        <div class="movie movie--preview movie--full comments">
            <div class="col-sm-3 col-md-2 col-lg-2">
                <div class="movie__images">
                    <img alt='' src="/template/amovie.gozha.net/images/movie/movie-sample2.jpg">
                </div>
                <div class="movie__feature">
                    <a href="#" class="movie__feature-item movie__feature--comment">23</a>
                    <a href="#" class="movie__feature-item movie__feature--video">2</a>
                    <a href="#" class="movie__feature-item movie__feature--photo">85</a>
                </div>
            </div>

            <div class="col-sm-9 col-md-10 col-lg-10 movie__about">
                <a href='movie-page-full.html' class="movie__title link--huge">The Book Thief (2013) </a>

                <p class="movie__time">125 min</p>

                <p class="movie__option"><strong>Country: </strong><a href="#">USA</a></p>
                <p class="movie__option"><strong>Category: </strong><a href="#">Drama</a>, <a
                        href="#">War</a></p>
                <p class="movie__option"><strong>Release date: </strong>November 8, 2013</p>
                <p class="movie__option"><strong>Director: </strong><a href="#">Brian Percival</a></p>
                <p class="movie__option"><strong>Actors: </strong><a href="#">Sophie Nélisse</a>, <a
                        href="#">Geoffrey Rush</a>, <a href="#">Emily Watson</a>, <a href="#">Ben
                        Schnetzer</a>, <a href="#">Nico Liersch</a>, <a href="#"> Joachim Paul
                        Assböck</a>, <a href="#">Kirsten Block</a>, <a href="#">Nico Liersch</a> <a
                        href="#">...</a></p>
                <p class="movie__option"><strong>Age restriction: </strong><a href="#">13</a></p>

                <div class="movie__btns">
                    <a href="#" class="btn btn-md btn--warning">book a ticket <span class="hidden-sm">for this
                            movie</span></a>
                    <a href="#" class="watchlist">Add to watchlist</a>
                </div>

                <div class="preview-footer">
                    <div class="movie__rate">
                        <div class="score"></div><span class="movie__rate-number">30 votes</span> <span
                            class="movie__rating">5.0</span>
                    </div>


                    <a href="#" class="movie__show-btn">Showtime</a>
                </div>
            </div>

            <div class="clearfix"></div>

            <!-- Time table (choose film start time)-->
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
            <!-- end time table-->
        </div>
        <!-- end movie preview item -->

        <!-- Movie preview item -->
        <div class="movie movie--preview movie--full release">
            <div class="col-sm-3 col-md-2 col-lg-2">
                <div class="movie__images">
                    <img alt='' src="/template/amovie.gozha.net/images/movie/movie-sample3.jpg">
                </div>
                <div class="movie__feature">
                    <a href="#" class="movie__feature-item movie__feature--comment">93</a>
                    <a href="#" class="movie__feature-item movie__feature--video">9</a>
                    <a href="#" class="movie__feature-item movie__feature--photo">183</a>
                </div>
            </div>

            <div class="col-sm-9 col-md-10 col-lg-10 movie__about">
                <a href='movie-page-full.html' class="movie__title link--huge">Thor: The Dark World 3D (2013)</a>

                <p class="movie__time">112 min</p>

                <p class="movie__option"><strong>Country: </strong><a href="#">USA</a></p>
                <p class="movie__option"><strong>Category: </strong><a href="#">Action</a>, <a
                        href="#">Adventure</a>, <a href="#">Fantazy</a></p>
                <p class="movie__option"><strong>Release date: </strong>November 8, 2013</p>
                <p class="movie__option"><strong>Director: </strong><a href="#">Alan Taylor</a></p>
                <p class="movie__option"><strong>Actors: </strong><a href="#">Chris Hemsworth</a>, <a
                        href="#">Natalie Portman</a>, <a href="#">Tom Hiddleston</a>, <a
                        href="#">Stellan Skarsgård</a>, <a href="#">Idris Elba</a>, <a
                        href="#">Christopher Eccleston</a>, <a href="#">Adewale Akinnuoye-Agbaje</a> <a
                        href="#">...</a></p>
                <p class="movie__option"><strong>Age restriction: </strong><a href="#">13</a></p>

                <div class="movie__btns">
                    <a href="#" class="btn btn-md btn--warning">book a ticket <span class="hidden-sm">for this
                            movie</span></a>
                    <a href="#" class="watchlist">Add to watchlist</a>
                </div>

                <div class="preview-footer">
                    <div class="movie__rate">
                        <div class="score"></div><span class="movie__rate-number">96 votes</span> <span
                            class="movie__rating">4.9</span>
                    </div>


                    <a href="#" class="movie__show-btn">Showtime</a>
                </div>
            </div>

            <div class="clearfix"></div>

            <!-- Time table (choose film start time)-->
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
            <!-- end time table-->

        </div>
        <!-- end movie preview item -->

        <!-- Movie preview item -->
        <div class="movie movie--preview movie--full popularity">
            <div class="col-sm-3 col-md-2 col-lg-2">
                <div class="movie__images">
                    <img alt='' src="/template/amovie.gozha.net/images/movie/movie-sample4.jpg">
                </div>
                <div class="movie__feature">
                    <a href="#" class="movie__feature-item movie__feature--comment">123</a>
                    <a href="#" class="movie__feature-item movie__feature--video">7</a>
                    <a href="#" class="movie__feature-item movie__feature--photo">352</a>
                </div>
            </div>

            <div class="col-sm-9 col-md-10 col-lg-10 movie__about">
                <a href='movie-page-full.html' class="movie__title link--huge">The Counselor (2013)</a>

                <p class="movie__time">117 min</p>

                <p class="movie__option"><strong>Country: </strong><a href="#">USA</a></p>
                <p class="movie__option"><strong>Category: </strong><a href="#">Crime</a>, <a
                        href="#">Drama</a>, <a href="#">Thriller</a></p>
                <p class="movie__option"><strong>Release date: </strong>October 25, 2013</p>
                <p class="movie__option"><strong>Director: </strong><a href="#">Ridley Scott</a></p>
                <p class="movie__option"><strong>Actors: </strong><a href="#">Michael Fassbender</a>, <a
                        href="#">Penélope Cruz</a>, <a href="#">Cameron Diaz</a>, <a href="#">Javier
                        Bardem</a>, <a href="#">Cesar Aguirre</a>, <a href="#">Daniel Holguín</a>, <a
                        href="#">Christopher Obi</a>, <a href="#">Bruno Ganz</a>, <a href="#">Brad
                        Pitt</a> <a href="#">...</a></p>
                <p class="movie__option"><strong>Age restriction: </strong><a href="#">13</a></p>

                <div class="movie__btns">
                    <a href="#" class="btn btn-md btn--warning">book a ticket <span class="hidden-sm">for this
                            movie</span></a>
                    <a href="#" class="watchlist">Add to watchlist</a>
                </div>

                <div class="preview-footer">
                    <div class="movie__rate">
                        <div class="score"></div><span class="movie__rate-number">201 votes</span> <span
                            class="movie__rating">4.9</span>
                    </div>


                    <a href="#" class="movie__show-btn">Showtime</a>
                </div>
            </div>

            <div class="clearfix"></div>

            <!-- Time table (choose film start time)-->
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
            <!-- end time table-->

        </div>
        <!-- end movie preview item -->

        <!-- Movie preview item -->
        <div class="movie movie--preview movie--full ending">
            <div class="col-sm-3 col-md-2 col-lg-2">
                <div class="movie__images">
                    <img alt='' src="/template/amovie.gozha.net/images/movie/movie-sample5.jpg">
                </div>
                <div class="movie__feature">
                    <a href="#" class="movie__feature-item movie__feature--comment">23</a>
                    <a href="#" class="movie__feature-item movie__feature--video">2</a>
                    <a href="#" class="movie__feature-item movie__feature--photo">85</a>
                </div>
            </div>

            <div class="col-sm-9 col-md-10 col-lg-10 movie__about">
                <a href='movie-page-full.html' class="movie__title link--huge">Bad Grandpa (2013) </a>

                <p class="movie__time">92 min</p>

                <p class="movie__option"><strong>Country: </strong> <a href="#">USA</a></p>
                <p class="movie__option"><strong>Category: </strong><a href="#">Comedy</a></p>
                <p class="movie__option"><strong>Release date: </strong>October 25, 2013</p>
                <p class="movie__option"><strong>Director: </strong><a href="#">Jeff Tremaine</a></p>
                <p class="movie__option"><strong>Actors: </strong><a href="#">Johnny Knoxville</a>, <a
                        href="#">Jackson Nicoll</a>, <a href="#">Greg Harris</a>, <a href="#">Georgina
                        Cates</a>, <a href="#">Kamber Hejlik</a>, <a href="#">Jill Kill</a>, <a
                        href="#">Madison Davis</a> <a href="#">...</a>
                </p>
                <p class="movie__option"><strong>Age restriction: </strong><a href="#">none</a></p>

                <div class="movie__btns">
                    <a href="#" class="btn btn-md btn--warning">book a ticket <span class="hidden-sm">for this
                            movie</span></a>
                    <a href="#" class="watchlist">Add to watchlist</a>
                </div>

                <div class="preview-footer">
                    <div class="movie__rate">
                        <div class="score"></div><span class="movie__rate-number">30 votes</span> <span
                            class="movie__rating">4.9</span>
                    </div>


                    <a href="#" class="movie__show-btn">Showtime</a>
                </div>
            </div>

            <div class="clearfix"></div>

            <!-- Time table (choose film start time)-->
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
            <!-- end time table-->
        </div>
        <!-- end movie preview item -->

        <!-- Movie preview item -->
        <div class="movie movie--preview movie--full popularity">
            <div class="col-sm-3 col-md-2 col-lg-2">
                <div class="movie__images">
                    <img alt='' src="/template/amovie.gozha.net/images/movie/movie-sample6.jpg">
                </div>
                <div class="movie__feature">
                    <a href="#" class="movie__feature-item movie__feature--comment">93</a>
                    <a href="#" class="movie__feature-item movie__feature--video">9</a>
                    <a href="#" class="movie__feature-item movie__feature--photo">183</a>
                </div>
            </div>

            <div class="col-sm-9 col-md-10 col-lg-10 movie__about">
                <a href='movie-page-full.html' class="movie__title link--huge">Cloudy with a Chance of Meatballs 2 3D
                    (2013)</a>

                <p class="movie__time">95 min</p>

                <p class="movie__option"><strong>Country: </strong><a href="#">USA</a></p>
                <p class="movie__option"><strong>Category: </strong><a href="#">Animation</a>, <a
                        href="#">Comedt</a>, <a href="#">Family</a></p>
                <p class="movie__option"><strong>Release date: </strong>September 27, 2013</p>
                <p class="movie__option"><strong>Director: </strong><a href="#">Alan Taylor</a></p>
                <p class="movie__option"><strong>Actors: </strong><a href="#">Bill Hader</a>, <a
                        href="#">Anna Faris</a>, <a href="#">Will Forte</a>, <a href="#">Andy
                        Samberg</a>, <a href="#">Benjamin Bratt</a>, <a href="#">Neil Patrick Harris</a>
                    <a href="#">...</a>
                </p>

                <p class="movie__option"><strong>Age restriction: </strong><a href="#">none</a></p>

                <div class="movie__btns">
                    <a href="#" class="btn btn-md btn--warning">book a ticket <span class="hidden-sm">for this
                            movie</span></a>
                    <a href="#" class="watchlist">Add to watchlist</a>
                </div>

                <div class="preview-footer">
                    <div class="movie__rate">
                        <div class="score"></div><span class="movie__rate-number">96 votes</span> <span
                            class="movie__rating">4.8</span>
                    </div>


                    <a href="#" class="movie__show-btn">Showtime</a>
                </div>
            </div>

            <div class="clearfix"></div>

            <!-- Time table (choose film start time)-->
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
            <!-- end time table-->

        </div>
        <!-- end movie preview item -->

        <!-- Movie preview item -->
        <div class="movie movie--preview movie--full comments">
            <div class="col-sm-3 col-md-2 col-lg-2">
                <div class="movie__images">
                    <img alt='' src="/template/amovie.gozha.net/images/movie/movie-sample7.jpg">
                </div>
                <div class="movie__feature">
                    <a href="#" class="movie__feature-item movie__feature--comment">93</a>
                    <a href="#" class="movie__feature-item movie__feature--video">9</a>
                    <a href="#" class="movie__feature-item movie__feature--photo">183</a>
                </div>
            </div>

            <div class="col-sm-9 col-md-10 col-lg-10 movie__about">
                <a href='movie-page-full.html' class="movie__title link--huge">Prisoners (2013)</a>

                <p class="movie__time">153 min</p>

                <p class="movie__option"><strong>Country: </strong><a href="#">USA</a></p>
                <p class="movie__option"><strong>Category: </strong><a href="#">Crime</a>, <a
                        href="#">Drama</a>, <a href="#">Thriller</a></p>
                <p class="movie__option"><strong>Release date: </strong>September 20, 2013</p>
                <p class="movie__option"><strong>Director: </strong><a href="#">Alan Taylor</a></p>
                <p class="movie__option"><strong>Actors: </strong><a href="#">Hugh Jackman</a>, <a
                        href="#">Jake Gyllenhaal</a>, <a href="#">Viola Davis</a>, <a href="#">Maria
                        Bello</a>, <a href="#">Terrence Howard</a>, <a href="#">Melissa Leo</a>, <a
                        href="#">Paul Dano</a>, <a href="#">Maria
                        Bello</a>, <a href="#">Viola Davis</a> <a href="#">...</a></p>
                <p class="movie__option"><strong>Age restriction: </strong><a href="#">13</a></p>

                <div class="movie__btns">
                    <a href="#" class="btn btn-md btn--warning">book a ticket <span class="hidden-sm">for this
                            movie</span></a>
                    <a href="#" class="watchlist">Add to watchlist</a>
                </div>

                <div class="preview-footer">
                    <div class="movie__rate">
                        <div class="score"></div><span class="movie__rate-number">96 votes</span> <span
                            class="movie__rating">4.7</span>
                    </div>


                    <a href="#" class="movie__show-btn">Showtime</a>
                </div>
            </div>

            <div class="clearfix"></div>

            <!-- Time table (choose film start time)-->
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
            <!-- end time table-->


        </div>
        <!-- end movie preview item -->

        <!-- Movie preview item -->
        <div class="movie movie--preview movie--full ending">
            <div class="col-sm-3 col-md-2 col-lg-2">
                <div class="movie__images">
                    <img alt='' src="/template/amovie.gozha.net/images/movie/movie-sample8.jpg">
                </div>
                <div class="movie__feature">
                    <a href="#" class="movie__feature-item movie__feature--comment">93</a>
                    <a href="#" class="movie__feature-item movie__feature--video">9</a>
                    <a href="#" class="movie__feature-item movie__feature--photo">183</a>
                </div>
            </div>

            <div class="col-sm-9 col-md-10 col-lg-10 movie__about">
                <a href='movie-page-full.html' class="movie__title link--huge">The Fifth Estate (2013)</a>

                <p class="movie__time">128 min</p>

                <p class="movie__option"><strong>Country: </strong><a href="#">USA</a></p>
                <p class="movie__option"><strong>Category: </strong><a href="#">Action</a>, <a
                        href="#">Adventure</a>, <a href="#">Fantazy</a></p>
                <p class="movie__option"><strong>Release date: </strong>November 8, 2013</p>
                <p class="movie__option"><strong>Director: </strong><a href="#">Alan Taylor</a></p>
                <p class="movie__option"><strong>Actors: </strong><a href="#">Chris Hemsworth</a>, <a
                        href="#">Natalie Portman</a>, <a href="#">Tom Hiddleston</a>, <a
                        href="#">Stellan Skarsgård</a>, <a href="#">Idris Elba</a>, <a
                        href="#">Christopher Eccleston</a>, <a href="#">Adewale Akinnuoye-Agbaje</a> <a
                        href="#">...</a></p>
                <p class="movie__option"><strong>Age restriction: </strong><a href="#">13</a></p>

                <div class="movie__btns">
                    <a href="#" class="btn btn-md btn--warning">book a ticket <span class="hidden-sm">for this
                            movie</span></a>
                    <a href="#" class="watchlist">Add to watchlist</a>
                </div>

                <div class="preview-footer">
                    <div class="movie__rate">
                        <div class="score"></div><span class="movie__rate-number">96 votes</span> <span
                            class="movie__rating">4.7</span>
                    </div>


                    <a href="#" class="movie__show-btn">Showtime</a>
                </div>
            </div>

            <div class="clearfix"></div>

            <!-- Time table (choose film start time)-->
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
            <!-- end time table-->

        </div>
        <!-- end movie preview item -->

        <!-- Movie preview item -->
        <div class="movie movie--preview movie--full popularity ending">
            <div class="col-sm-3 col-md-2 col-lg-2">
                <div class="movie__images">
                    <img alt='' src="/template/amovie.gozha.net/images/movie/movie-sample9.jpg">
                </div>
                <div class="movie__feature">
                    <a href="#" class="movie__feature-item movie__feature--comment">93</a>
                    <a href="#" class="movie__feature-item movie__feature--video">9</a>
                    <a href="#" class="movie__feature-item movie__feature--photo">183</a>
                </div>
            </div>

            <div class="col-sm-9 col-md-10 col-lg-10 movie__about">
                <a href='movie-page-full.html' class="movie__title link--huge">Runner Runner (2013)</a>

                <p class="movie__time">91 min</p>

                <p class="movie__option"><strong>Country: </strong><a href="#">USA</a></p>
                <p class="movie__option"><strong>Category: </strong><a href="#">Action</a>, <a
                        href="#">Adventure</a>, <a href="#">Fantazy</a></p>
                <p class="movie__option"><strong>Release date: </strong>November 8, 2013</p>
                <p class="movie__option"><strong>Director: </strong><a href="#">Alan Taylor</a></p>
                <p class="movie__option"><strong>Actors: </strong><a href="#">Chris Hemsworth</a>, <a
                        href="#">Natalie Portman</a>, <a href="#">Tom Hiddleston</a>, <a
                        href="#">Stellan Skarsgård</a>, <a href="#">Idris Elba</a>, <a
                        href="#">Christopher Eccleston</a>, <a href="#">Adewale Akinnuoye-Agbaje</a> <a
                        href="#">...</a></p>
                <p class="movie__option"><strong>Age restriction: </strong><a href="#">13</a></p>

                <div class="movie__btns">
                    <a href="#" class="btn btn-md btn--warning">book a ticket <span class="hidden-sm">for
                            this movie</span></a>
                    <a href="#" class="watchlist">Add to watchlist</a>
                </div>

                <div class="preview-footer">
                    <div class="movie__rate">
                        <div class="score"></div><span class="movie__rate-number">96 votes</span> <span
                            class="movie__rating">4.6</span>
                    </div>


                    <a href="#" class="movie__show-btn">Showtime</a>
                </div>
            </div>

            <div class="clearfix"></div>

            <!-- Time table (choose film start time)-->
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
            <!-- end time table-->

        </div>
        <!-- end movie preview item -->

        <!-- Movie preview item -->
        <div class="movie movie--preview movie--full comments">
            <div class="col-sm-3 col-md-2 col-lg-2">
                <div class="movie__images">
                    <img alt='' src="/template/amovie.gozha.net/images/movie/movie-sample10.jpg">
                </div>
                <div class="movie__feature">
                    <a href="#" class="movie__feature-item movie__feature--comment">93</a>
                    <a href="#" class="movie__feature-item movie__feature--video">9</a>
                    <a href="#" class="movie__feature-item movie__feature--photo">183</a>
                </div>
            </div>

            <div class="col-sm-9 col-md-10 col-lg-10 movie__about">
                <a href='movie-page-full.html' class="movie__title link--huge">Free Birds (2013)</a>

                <p class="movie__time">91 min</p>

                <p class="movie__option"><strong>Country: </strong><a href="#">USA</a></p>
                <p class="movie__option"><strong>Category: </strong><a href="#">Action</a>, <a
                        href="#">Adventure</a>, <a href="#">Fantazy</a></p>
                <p class="movie__option"><strong>Release date: </strong>November 8, 2013</p>
                <p class="movie__option"><strong>Director: </strong><a href="#">Alan Taylor</a></p>
                <p class="movie__option"><strong>Actors: </strong><a href="#">Chris Hemsworth</a>, <a
                        href="#">Natalie Portman</a>, <a href="#">Tom Hiddleston</a>, <a
                        href="#">Stellan Skarsgård</a>, <a href="#">Idris Elba</a>, <a
                        href="#">Christopher Eccleston</a>, <a href="#">Adewale Akinnuoye-Agbaje</a> <a
                        href="#">...</a></p>
                <p class="movie__option"><strong>Age restriction: </strong><a href="#">13</a></p>

                <div class="movie__btns">
                    <a href="#" class="btn btn-md btn--warning">book a ticket <span class="hidden-sm">for
                            this movie</span></a>
                    <a href="#" class="watchlist">Add to watchlist</a>
                </div>

                <div class="preview-footer">
                    <div class="movie__rate">
                        <div class="score"></div><span class="movie__rate-number">96 votes</span> <span
                            class="movie__rating">4.4</span>
                    </div>


                    <a href="#" class="movie__show-btn">Showtime</a>
                </div>
            </div>

            <div class="clearfix"></div>

            <!-- Time table (choose film start time)-->
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
            <!-- end time table-->

        </div>
        <!-- end movie preview item -->
        <div class="coloum-wrapper">
            <div class="pagination paginatioon--full">
                <a href='#' class="pagination__prev">prev</a>
                <a href='#' class="pagination__next">next</a>
            </div>
        </div>

    </div>
@endsection
