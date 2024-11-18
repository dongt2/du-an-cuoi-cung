@extends('fronted.index')

@section('main')
<div class="search-wrapper">
    <div class="container container--add">
        <form id='search-form' method='get' class="search">
            <input type="text" class="search__field" placeholder="Search">
            <select name="sorting_item" id="search-sort" class="search__sort" tabindex="0">
                <option value="1" selected='selected'>By title</option>
                <option value="2">By year</option>
                <option value="3">By producer</option>
                <option value="4">By title</option>
                <option value="5">By year</option>
            </select>
            <button type='submit' class="btn btn-md btn--danger search__button">search a movie</button>
        </form>
    </div>
</div>

<!-- Main content -->
        <form id="login-form" class="login" method='get' novalidate=''>
            <p class="login__title">sign in <br><span class="login-edition">welcome to A.Movie</span></p>

            <div class="social social--colored">
                    <a href='#' class="social__variant fa fa-facebook"></a>
                    <a href='#' class="social__variant fa fa-twitter"></a>
                    <a href='#' class="social__variant fa fa-tumblr"></a>
            </div>

            <p class="login__tracker">or</p>
            
            <div class="field-wrap">
            <input type='email' placeholder='Email' name='user-email' class="login__input">
            <input type='password' placeholder='Password' name='user-password' class="login__input">

            <input type='checkbox' id='#informed' class='login__check styled'>
            <label for='#informed' class='login__check-info'>remember me</label>
             </div>
            
            <div class="login__control">
                <button type='submit' class="btn btn-md btn--warning btn--wider">sign in</button>
                <a href="#" class="login__tracker form__tracker">Forgot password?</a>
            </div>
        </form>

<div class="clearfix"></div>
@endsection