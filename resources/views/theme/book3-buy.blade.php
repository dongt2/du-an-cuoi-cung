@extends('user.layouts.default')

@section('title')
    AMovie - Booking step 3
@endsection

@section('head')
    <!-- Fonts -->
        <!-- Font awesome - icon font -->
        <link href="../netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <!-- Roboto -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
    
    <!-- Stylesheets -->

        <!-- Mobile menu -->
        <link href="css/gozha-nav.css" rel="stylesheet" />
        <!-- Select -->
        <link href="css/external/jquery.selectbox.css" rel="stylesheet" />
    
        <!-- Custom -->
        <link href="css/style3860.css?v=1" rel="stylesheet" />

        <!-- Modernizr --> 
        <script src="js/external/modernizr.custom.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries --> 
    <!--[if lt IE 9]> 
    	<script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script> 
		<script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js"></script>		
    <![endif]-->
@endsection

@section('content')
    <!-- Search bar -->
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
    <section class="container">
        <div class="order-container">
            <div class="order">
                <img class="order__images" alt='' src="images/tickets.png">
                <p class="order__title">Book a ticket <br><span class="order__descript">and have fun movie time</span></p>
                <div class="order__control">
                    <a href="#" class="order__control-btn active">Purchase</a>
                    <a href="book3-reserve.html" class="order__control-btn">Reserve</a>
                </div>
            </div>
        </div>
            <div class="order-step-area">
                <div class="order-step first--step order-step--disable ">1. What &amp; Where &amp; When</div>
                <div class="order-step second--step order-step--disable">2. Choose a sit</div>
                <div class="order-step third--step">3. Check out</div>
            </div>

        <div class="col-sm-12">
            <div class="checkout-wrapper">
                <h2 class="page-heading">price</h2>
                <ul class="book-result">
                    <li class="book-result__item">Tickets: <span class="book-result__count booking-ticket">3</span></li>
                    <li class="book-result__item">One item price: <span class="book-result__count booking-price">$20</span></li>
                    <li class="book-result__item">Total: <span class="book-result__count booking-cost">$60</span></li>
                </ul>

                <h2 class="page-heading">Choose payment method</h2>
                <div class="payment">
                    <a href="#" class="payment__item">
                        <img alt='' src="images/payment/pay1.png">
                    </a>
                    <a href="#" class="payment__item">
                        <img alt='' src="images/payment/pay2.png">
                    </a>
                    <a href="#" class="payment__item">
                        <img alt='' src="images/payment/pay3.png">
                    </a>
                    <a href="#" class="payment__item">
                        <img alt='' src="images/payment/pay4.png">
                    </a>
                    <a href="#" class="payment__item">
                        <img alt='' src="images/payment/pay5.png">
                    </a>
                    <a href="#" class="payment__item">
                        <img alt='' src="images/payment/pay6.png">
                    </a>
                    <a href="#" class="payment__item">
                        <img alt='' src="images/payment/pay7.png">
                    </a>
                </div>

                <h2 class="page-heading">Contact information</h2>
        
                <form id='contact-info' method='post' novalidate="" class="form contact-info">
                    <div class="contact-info__field contact-info__field-mail">
                        <input type='email' name='user-mail' placeholder='Your email' class="form__mail">
                    </div>
                    <div class="contact-info__field contact-info__field-tel">
                        <input type='tel' name='user-tel' placeholder='Phone number' class="form__mail">
                    </div>
                </form>

            
            </div>
            
            <div class="order">
                <a href="book-final.html" class="btn btn-md btn--warning btn--wide">purchase</a>
            </div>

        </div>

    </section>
    

    <div class="clearfix"></div>

    <div class="booking-pagination">
            <a href="book2.html" class="booking-pagination__prev">
                <p class="arrow__text arrow--prev">prev step</p>
                <span class="arrow__info">choose a sit</span>
            </a>
            <a href="#" class="booking-pagination__next hide--arrow">
                <p class="arrow__text arrow--next">next step</p>
                <span class="arrow__info"></span>
            </a>
    </div>
    
    <div class="clearfix"></div>
@endsection

@section('javascript')
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

   <!-- Form element -->
   <script src="js/external/form-element.js"></script>
   <!-- Form validation -->
   <script src="js/form.js"></script>

   <!-- Custom -->
   <script src="js/custom.js"></script>
@endsection

