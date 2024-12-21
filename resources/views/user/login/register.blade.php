@extends('user.layouts.master')
@section('title')
    Register
@endsection

@section('content')
    <form id="login-form" class="login" method='POST' action="{{ route('registerForm') }}">
        <p class="login__title">Dang ky <br><span class="login-edition">welcome to A.Movie</span></p>

        <div class="field-wrap">
            <input type='text' placeholder='Username' name='user-username' class="login__input">
            <input type='email' placeholder='Email' name='user-email' class="login__input">
            <input type='password' placeholder='Password' name='user-password' class="login__input">
            <input type='password' placeholder='Confirm Password' name='user-password' class="login__input">
        </div>

        <div class="login__control">
            <button type='submit' class="btn btn-md btn--warning btn--wider">Dang ky</button>
        </div>

    </form>
@endsection
