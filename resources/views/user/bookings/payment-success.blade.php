@extends('user.layout.default')

@section('title')
    @parent
    Thanh toán thành
@endsection

@section('style')
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>AMovie - Booking step 3</title>
    <meta name="description" content="A Template by Gozha.net">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Gozha.net">

    <!-- Mobile Specific Metas-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="telephone=no" name="format-detection">

    <!-- Fonts -->
    <!-- Font awesome - icon font -->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!-- Roboto -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet" type="text/css">

    <!-- Stylesheets -->

    <!-- Mobile menu -->
    <link href="{{ asset('css/gozha-nav.css') }}" rel="stylesheet" />
    <!-- Select -->
    <link href="{{ asset('css/external/jquery.selectbox.css') }}" rel="stylesheet" />

    <!-- Custom -->
    <link href="{{ asset('css/style3860.css?v=1') }}" rel="stylesheet" />

    <!-- Modernizr -->
    <script src="{{ asset('js/external/modernizr.custom.js') }}"></script>

    <script>
        function downloadSVG() {
            const svg = document.getElementById('container').innerHTML;
            const blob = new Blob([svg.toString()]);
            const element = document.createElement("a");
            element.download = "w3c.svg";
            element.href = window.URL.createObjectURL(blob);
            element.click();
            element.remove();
        }
    </script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
                                                                                                                                                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
                                                                                                                                                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js"></script>
                                                                                                                                                                    <![endif]-->
@endsection

@section('content')
    <section class="container">
        <div class="order-container">
            <div class="order">
                <img class="order__images" alt='' src="images/tickets.png">
                <p class="order__title">Thank you <br><span class="order__descript">you have successfully purchased tickets</span></p>
            </div>

            <div class="ticket">
                <div class="ticket-position">
                    <div class="ticket__indecator indecator--pre"><div class="indecator-text pre--text">online ticket</div> </div>
                    <div class="ticket__inner">

                        <div class="ticket-secondary">
                            <span class="ticket__item">Ticket number <strong class="ticket__number">a126bym4</strong></span>
                            <span class="ticket__item ticket__date">25/10/2013</span>
                            <span class="ticket__item ticket__time">17:45</span>
                            <span class="ticket__item">Cinema: <span class="ticket__cinema">Cineworld</span></span>
                            <span class="ticket__item">Hall: <span class="ticket__hall">Visconti</span></span>
                            <span class="ticket__item ticket__price">price: <strong class="ticket__cost">$60</strong></span>
                        </div>

                        <div class="ticket-primery">
                            <span class="ticket__item ticket__item--primery ticket__film">Film<br><strong class="ticket__movie">The Fifth Estate (2013)</strong></span>
                            <span class="ticket__item ticket__item--primery">Sits: <span class="ticket__place">11F, 12F, 13F</span></span>
                        </div>


                    </div>
                    <div class="ticket__indecator indecator--post"><div class="indecator-text post--text">online ticket</div></div>
                </div>
            </div>
            <hr>
            <div class="text-center">
                {!! $simple !!}
            </div>

            <div class="ticket-control">
                <button class="watchlist list--download">Download</button>
                <a href="#" class="watchlist list--print">Print</a>
            </div>

        </div>
    </section>

@endsection

@section('script')
    <!-- JavaScript-->
    <!-- jQuery 1.9.1-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="{{ asset('js/external/jquery-1.10.1.min.js') }}"><\/script>')
    </script>

    <!-- Migrate -->
    <script src="{{ asset('js/external/jquery-migrate-1.2.1.min.js') }}"></script>

    <!-- Bootstrap 3-->
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>

    <!-- Mobile menu -->
    <script src="{{ asset('js/jquery.mobile.menu.js') }}"></script>

    <!-- Select -->
    <script src="{{ asset('js/external/jquery.selectbox-0.2.min.js') }}"></script>

    <!-- Form element -->
    <script src="{{ asset('js/external/form-element.js') }}"></script>

    <!-- Form validation -->
    <script src="{{ asset('js/form.js') }}"></script>

    <!-- Custom -->
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection
