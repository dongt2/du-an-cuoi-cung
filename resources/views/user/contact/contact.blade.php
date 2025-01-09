@extends('user.layout.default')

@section('title')
    @parent
    Contacts
@endsection

@section('style')
    <!-- Mobile Specific Metas-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="telephone=no" name="format-detection">

    <!-- Fonts -->
    <!-- Font awesome - icon font -->
    <link href="{{ asset('../netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css') }}" rel="stylesheet">
    <!-- Roboto -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,700' rel='stylesheet' type='text/css'>
    <!-- Open Sans -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:800italic' rel='stylesheet' type='text/css'>

    <!-- Stylesheets -->

    <!-- Mobile menu -->
    <link href="{{ asset('css/gozha-nav.css') }}" rel="stylesheet" />
    <!-- Select -->
    <link href="{{ asset('css/external/jquery.selectbox.css') }}" rel="stylesheet" />

    <!-- REVOLUTION BANNER CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('rs-plugin/css/settings.css') }}" media="screen" />

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
    <!-- Slider -->
    @include('user.layout.slide')

    <!-- Main content -->
    <section class="container">
        <h2 class="page-heading heading--outcontainer">Contact</h2>
        <div class="contact">
            <p class="contact__title">You have any questions or need help, <br><span class="contact__describe">don’t be shy
                    and contact us</span></p>
            <span class="contact__mail">support@amovie.com</span>
            <span class="contact__tel">support@amovie.com</span>
        </div>
    </section>
    <!-- open/close -->
    <div class="overlay overlay-hugeinc">

        <section class="container">

            <div class="col-sm-4 col-sm-offset-4">
                <button type="button" class="overlay-close">Close</button>
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
            </div>

        </section>
    </div>
    <div class="contact-form-wrapper">
        <div class="container">
            <div class="col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                <form id='contact-form' class="form row" method='post' novalidate=""
                    action="https://amovie.gozha.net/send.php">
                    <p class="form__title">Drop us a line</p>
                    <div class="col-sm-6">
                        <input type='text' placeholder='Your name' name='user-name' class="form__name">
                    </div>
                    <div class="col-sm-6">
                        <input type='email' placeholder='Your email' name='user-email' class="form__mail">
                    </div>
                    <div class="col-sm-12">
                        <textarea placeholder="Your message" name="user-message" class="form__message"></textarea>
                    </div>
                    <button type="submit" class='btn btn-md btn--danger'>send message</button>
                </form>
            </div>
        </div>
    </div>

    <section class="container">
        <div class="contact">
            <p class="contact__title">Trying to find our location? <br> <span class="contact__describe">we are here</span>
            </p>
        </div>
    </section>

    <div id='location-map' class="map"></div>

    <div class="clearfix"></div>

    <section class="container">
    </section>
@endsection

@section('script')
    <!-- JavaScript-->
        <!-- jQuery 1.9.1--> 
        <script src="../ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/external/jquery-1.10.1.min.js"><\/script>')</script>
        <!-- Migrate --> 
        <script src="js/external/jquery-migrate-1.2.1.min.js"></script>
        <!-- Bootstrap 3--> 
        <script src="../netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>

        <!-- Mobile menu -->
        <script src="js/jquery.mobile.menu.js"></script>
         <!-- Select -->
        <script src="js/external/jquery.selectbox-0.2.min.js"></script>

        <!--*** Google map  ***-->
        <script src="https://maps.google.com/maps/api/js?sensor=true"></script> 
        <!--*** Google map infobox  ***-->
        <script src="js/external/infobox.js"></script>

        <!-- Form element -->
        <script src="js/external/form-element.js"></script>
        <!-- Form validation -->
        <script src="js/form.js"></script>

        <!-- Custom -->
        <script src="js/custom.js"></script> 
		
		<script type="text/javascript">
            $(document).ready(function() {
                init_Contact ();
            });
		</script>
@endsection
