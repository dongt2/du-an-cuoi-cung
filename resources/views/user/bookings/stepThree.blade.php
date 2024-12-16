@extends('theme.layouts.default')

@section('title', 'AMovie - Booking Step 3')

@section('head')
    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> <!-- Bootstrap -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"> <!-- Custom CSS -->

    <!-- Modernizr -->
    <script src="{{ asset('js/external/modernizr.custom.js') }}"></script>

    <!-- HTML5 Shim and Respond.js for IE8 support -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
@endsection

@section('content')
    <!-- Header -->
    <header class="header">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="header__logo">
                <a href="/"><img src="{{ asset('images/logo.png') }}" alt="PhimMoi Logo"></a>
            </div>
            <nav class="header__nav">
                <ul class="d-flex gap-3 list-unstyled">
                    <li><a href="/">Home</a></li>
                    <li><a href="#">Movies</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Pages List -->
    <section class="pages-list py-4">
        <div class="container">
            <h2 class="mb-3">Pages</h2>
            <ul class="pages-list__items list-unstyled">
                <li><a href="#">Single movie (right sidebar)</a></li>
                <li><a href="#">Single movie (left sidebar)</a></li>
                <li><a href="#">Movies list (full width)</a></li>
                <li><a href="#">Trailers</a></li>
                <li><a href="#">Rates</a></li>
                <li><a href="#">Offers</a></li>
                <li><a href="#">Contact us</a></li>
                <li><a href="#">Login/Registration</a></li>
            </ul>
        </div>
    </section>

    <!-- Checkout Section -->
    <section class="checkout-wrapper py-5">
        <div class="container">
            <!-- Price Information -->
            <h2 class="page-heading mb-4">Price</h2>
            <ul class="book-result list-unstyled">
                <li class="book-result__item">Tickets: <span class="book-result__count booking-ticket">3</span></li>
                <li class="book-result__item">One item price: <span class="book-result__count booking-price">$20</span></li>
                <li class="book-result__item">Total: <span class="book-result__count booking-cost">$60</span></li>
            </ul>

            <!-- Payment Method -->
            <h2 class="page-heading mt-5 mb-4">Choose Payment Method</h2>
            <div class="payment d-flex flex-wrap justify-content-center">
                @foreach(range(1, 7) as $pay)
                    <a href="#" class="payment__item mx-2">
                        <img src="{{ asset("images/payment/pay{$pay}.png") }}" alt="Payment Method {{ $pay }}">
                    </a>
                @endforeach
            </div>

            <!-- Contact Information -->
            <h2 class="page-heading mt-5 mb-4">Contact Information</h2>
            <form id="contact-info" method="post" class="form contact-info">
                @csrf
                <div class="contact-info__field mb-3">
                    <input type="email" name="user-mail" placeholder="Your email" class="form-control" required>
                </div>
                <div class="contact-info__field mb-3">
                    <input type="tel" name="user-tel" placeholder="Phone number" class="form-control" required>
                </div>
            </form>

            <!-- Purchase Button -->
            <div class="order mt-4">
                <a href="{{ route('booking.final') }}" class="btn btn-md btn-warning btn-block">Purchase</a>
            </div>
        </div>
    </section>

    <!-- Pagination -->
    <div class="booking-pagination text-center my-5">
        <a href="{{ route('booking.step2') }}" class="booking-pagination__prev d-inline-block">
            <p class="arrow__text arrow--prev">Previous Step</p>
            <span class="arrow__info">Choose a Seat</span>
        </a>
    </div>
@endsection

@section('javascript')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>window.jQuery || document.write('<script src="{{ asset('js/external/jquery-3.6.0.min.js') }}"><\/script>')</script>
    
    <!-- Bootstrap -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection
