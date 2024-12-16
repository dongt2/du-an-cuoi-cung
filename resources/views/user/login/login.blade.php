@extends('user.layouts.master')
@section('title')
    Login
@endsection

@section('content')
    <form id="login-form" class="login" method='get' novalidate=''>
        <p class="login__title">Dang nhap <br><span class="login-edition">welcome to A.Movie</span></p>

        <div class="field-wrap">
            <input type='email' placeholder='Email' name='user-email' class="login__input">
            <input type='password' placeholder='Password' name='user-password' class="login__input">

            <input type='checkbox' id='#informed' class='login__check styled'>
            <label for='#informed' class='login__check-info'>remember me</label>
        </div>

        <div class="login__control">
            <button type='submit' class="btn btn-md btn--warning btn--wider">sign in</button>
            <a href="#" class="login__tracker form__tracker">Forgot password?</a>

            <p class="login__tracker">Ban chua co tai khoan? <a href="{{ route('register') }}" class="btn btn-md btn--warning btn--wider">Tao tai khoan</a></p>

        </div>

    </form>
@endsection
