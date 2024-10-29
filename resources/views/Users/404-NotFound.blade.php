@extends('Users.layouts.master')

@section('title')
    404 - Not found
@endsection

@section('content')
    <div class="error-wrapper" style="margin-top: -90px; margin-bottom: -50px">
        <a href='index.html' class="logo logo--dark">
            <img alt='logo' src="images/logo-dark.png">
            <p class="slogan--dark">fun to search, fun to watch</p>
        </a>

        <div class="error">
            <img alt='' src='/template/amovie.gozha.net/images/error.png' class="error__image">
            <h1 class="error__text">sorry, but page can’t be found</h1>
            <a href="index.html" class="btn btn-md btn--warning">return to homepage</a>
        </div>
    </div>

    <div class="copy-bottom">
        <p class="copy">&copy; A.Movie, 2013. All rights reserved. Done by Olia Gozha</p>
    </div>
@endsection
