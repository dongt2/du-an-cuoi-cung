@extends('user.layout.default')

@section('title')
    @parent
    Ticket Details
@endsection

@section('style')
    <!-- Mobile Specific Metas-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="telephone=no" name="format-detection">

    <!-- Fonts -->
    <!-- Font awesome - icon font -->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!-- Roboto -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet" type="text/css">

    <!-- Stylesheets -->
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="stylesheet">

    <!-- Mobile menu -->
    <link href="{{ asset('css/gozha-nav.css') }}" rel="stylesheet" />
    <!-- Select -->
    <link href="{{ asset('css/external/jquery.selectbox.css') }}" rel="stylesheet" />
    <!-- Swiper slider -->
    <link href="{{ asset('css/external/idangerous.swiper.css') }}" rel="stylesheet" />

    <!-- Custom -->
    <link href="{{ asset('css/style3860.css?v=1') }}" rel="stylesheet" />

    <!-- Modernizr -->
    <script src="{{ asset('js/external/modernizr.custom.js') }}"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js"></script>
    <![endif]-->

    <style>
        .rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
        }

        .rating input {
            display: none;
        }

        .rating label {
            position: relative;
            width: 1em;
            font-size: 3rem;
            color: #FFD700;
            cursor: pointer;
        }

        .rating label::before {
            content: "★";
            position: absolute;
            opacity: 0;
        }

        .rating label:hover:before,
        .rating label:hover ~ label:before {
            opacity: 1 !important;
        }

        .rating input:checked ~ label:before {
            opacity: 1;
        }

        .rating input:checked + label:hover:before,
        .rating input:checked + label:hover ~ label:before,
        .rating input:checked ~ label:hover:before,
        .rating input:checked ~ label:hover ~ label:before,
        .rating label:hover ~ input:checked ~ label:before {
            opacity: 0.4;
        }
    </style>
@endsection

@section('content')
    <section class="container account-container">
        <div class="row">
            <div class="col-md-12">
                <div class="account-info">
                    <h2>Ticket Details</h2>
                    <div class="ticket-details">
                        <p><strong>Ticket ID:</strong> {{ $ticket->ticket_id }}</p>
                        <p><strong>Transaction ID:</strong> {{ $ticket->transaction->transaction_id }}</p>
                        <p><strong>Booking ID:</strong> {{ $ticket->booking_id }}</p>
                        <p><strong>User ID:</strong> {{ $ticket->user_id }}</p>
                        <p><strong>Seats:</strong> {{ $ticket->seats }}</p>
                        <p><strong>QR Code:</strong> <img src="{{ \Illuminate\Support\Facades\Storage::url($ticket->qr_code) }}" alt="QR Code"></p>
                        <p><strong>Created At:</strong> {{ $ticket->created_at }}</p>
                        <p><strong>Updated At:</strong> {{ $ticket->updated_at }}</p>
                        <p><strong>Status:</strong> {{ $ticket->status }}</p>
                        <p><strong>Price:</strong> {{ $ticket->price }}</p>
                        <p><strong>Payment Method:</strong> {{ $ticket->payment_method }}</p>

                        <form action="{{ route('account.comment', $ticket->ticket_id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Comment</label>
                                <input type="text" name="comment">
                            </div>
                            <div class="form-group">
                                <label>Rating</label>
                                <div class="rating">
                                    <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                    <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                    <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                    <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                    <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                </div>
                            </div>
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div>
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

    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

    <!-- Bootstrap 3-->
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>

    <!-- Mobile menu -->
    <script src="{{ asset('js/jquery.mobile.menu.js') }}"></script>

    <!-- Select -->
    <script src="{{ asset('js/external/jquery.selectbox-0.2.min.js') }}"></script>

    <!-- Swiper slider -->
    <script src="{{ asset('js/external/idangerous.swiper.min.js') }}"></script>

    <!-- Form validation -->
    <script src="{{ asset('js/form.js') }}"></script>

    <!-- Custom -->
    <script src="{{ asset('js/custom.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            init_TicketOne();
        });
        function init_TicketOne() {
            // Add your initialization code here
            console.log('init_TicketOne function called');
        }
    </script>
@endsection
