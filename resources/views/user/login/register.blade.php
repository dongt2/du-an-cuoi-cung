@extends('user.layout.default')

@section('title')
    @parent
    Đăng kí
@endsection

@section('style')
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="telephone=no" name="format-detection">

    <!-- Fonts -->
    <!-- Font awesome - icon font -->
    <link href="{{ asset('netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css') }}" rel="stylesheet">
    <!-- Roboto -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet" type="text/css">

    <!-- Stylesheets -->
    <!-- Mobile menu -->
    <link href="{{ asset('css/gozha-nav.css') }}" rel="stylesheet">
    <!-- Select -->
    <link href="{{ asset('css/external/jquery.selectbox.css') }}" rel="stylesheet">

    <!-- Custom -->
    <link href="{{ asset('css/style3860.css?v=1') }}" rel="stylesheet">

    <!-- Modernizr -->
    <script src="{{ asset('js/external/modernizr.custom.js') }}"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
@endsection

@section('content')
    <br><br><br>
    <form class="login" method='post' action="{{ route('register.store') }}">
        @csrf
        <p class="login__title">sign up <br><span class="login-edition">welcome to A.Movie</span></p>

        <div class="social social--colored">
            <a href='#' class="social__variant fa fa-facebook"></a>
            <a href='#' class="social__variant fa fa-twitter"></a>
            <a href='#' class="social__variant fa fa-tumblr"></a>
        </div>

        <p class="login__tracker">or</p>

        <div class="field-wrap">
            <input type='text' placeholder='Tên người dùng' name='username' class="login__input">
            @error('username')
            <span style="color: red;">{{ $message }}</span>
            @enderror

            <input type='email' placeholder='Email' name='email' class="login__input">
            @error('email')
            <span style="color: red;">{{ $message }}</span>
            @enderror

            <input type='password' placeholder='Mật khẩu' name='password' class="login__input">
            @error('password')
            <span style="color: red;">{{ $message }}</span>
            @enderror

            <input type='password' placeholder='Nhập lại mật khẩu' name='phone' class="login__input">
            @error('phone')
            <span style="color: red;">{{ $message }}</span>
            @enderror

            <input type="hidden" name="role">
            <input type="hidden" name="is_active">
            <input type="hidden" name="is_vip">

            <input type='checkbox' id='#informed' class='login__check styled'>
            <label for='#informed' class='login__check-info'>Ghi nhớ</label>
        </div>

        <div class="login__control">
            <button type='submit' class="btn btn-md btn--warning btn--wider">Đăng kí</button>
            <a href="{{ route('login.index') }}" class="login__tracker form__tracker">Bạn đã có tài khoản? Đăng nhập</a>
            <a href="#" class="login__tracker form__tracker">Forgot password?</a>
        </div>
    </form>
@endsection

@section('script')
    <!-- JavaScript -->
    <!-- jQuery 1.9.1 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="{{ asset('js/external/jquery-1.10.1.min.js') }}"><\/script>')
    </script>
    <!-- Migrate -->
    <script src="{{ asset('js/external/jquery-migrate-1.2.1.min.js') }}"></script>
    <!-- Bootstrap 3 -->
    <script src="{{ asset('netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js') }}"></script>

    <!-- Mobile menu -->
    <script src="{{ asset('js/jquery.mobile.menu.js') }}"></script>
    <!-- Select -->
    <script src="{{ asset('js/external/jquery.selectbox-0.2.min.js') }}"></script>
    <!-- Form element -->
    <script src="{{ asset('js/external/form-element.js') }}"></script>
    <!-- Custom -->
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection
