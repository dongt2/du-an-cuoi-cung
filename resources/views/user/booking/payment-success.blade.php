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


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
                                                                                                                                                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
                                                                                                                                                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js"></script>
                                                                                                                                                                    <![endif]-->
@endsection

@section('content')
    <hr>
    <section class="container">
        <div class="order-container">
            <div class="order">
                <img class="order__images" alt='' src="images/tickets.png">
                <p class="order__title">
                    Cảm ơn <br><span class="order__descript">bạn đã mua vé thành công</span></p>
            </div>

            <div class="ticket">
                <div class="ticket-position">
                    <div class="ticket__indecator indecator--pre"><div class="indecator-text pre--text">Vé online</div> </div>
                    <div class="ticket__inner">

                        <div class="ticket-secondary">
                            <span class="ticket__item">Mã vé <strong class="ticket__number">{{ $ticket->booking->order_code }}</strong></span>
                            <span class="ticket__item ticket__date">{{ $ticket->booking->showtime_date }}</span>
                            <span class="ticket__item ticket__time">{{ $ticket->booking->showtime_time }}</span>
                            <span class="ticket__item">Phòng: <span class="ticket__cinema">{{ $ticket->showtime->screen->screen_name }}</span></span>

                            <span class="ticket__item ticket__price">Giá: <strong class="ticket__cost">{{ number_format($ticket->transaction->total, 0,'.', '.') }}</strong>đ</span>
                        </div>

                        <div class="ticket-primery">
                            <span class="ticket__item ticket__item--primery ticket__film">Tên phim<br><strong class="ticket__movie">{{ $ticket->booking->movie->title }}</strong></span>
                            <span class="ticket__item ticket__item--primery">Chỗ ngồi: <span class="ticket__place">{{ implode(', ', $ticket->seats) }}</span></span>
                        </div>


                    </div>
                    <div class="ticket__indecator indecator--post"><div class="indecator-text post--text">Vé online</div></div>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <img src="{{ \Illuminate\Support\Facades\Storage::url($ticket->qr_code) }}" alt="QR Code">
            </div>

            <div class="ticket-control">

                <a href="{{ route('ticket.download', ['id' => $ticket->ticket_id]) }}" class="watchlist list--download">Tải QR Code</a>
                <a href="{{ route('user.booking1') }}" class="watchlist list--print">Tiếp tục đặt vé</a>
            </div>

        </div>
    </section>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.watchlist').click(function() {
                var url = $(this).attr('href');
                window.open(url, '_blank');
                return false;
            });
        });
    </script>

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
