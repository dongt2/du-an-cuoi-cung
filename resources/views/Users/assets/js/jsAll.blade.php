<!-- JavaScript-->
<!-- Modernizr -->
<script src="/template/ajax.googleapis.com/js/external/modernizr.custom.js"></script>
<!-- jQuery 1.9.1-->
<script src="/template/ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script>
    window.jQuery || document.write(
        '<script src="/template/amovie.gozha.net/js/external/jquery-1.10.1.min.js"><\/script>')
</script>
<!-- Migrate -->
<script src="/template/amovie.gozha.net/js/external/jquery-migrate-1.2.1.min.js"></script>
<!-- jQuery UI -->
<script src="/template/code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<!-- Bootstrap 3-->
<script src="/template/netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>

<!-- jQuery REVOLUTION Slider -->
<script type="text/javascript" src="/template/amovie.gozha.net/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
<script type="text/javascript" src="/template/amovie.gozha.net/rs-plugin/js/jquery.themepunch.revolution.min.js">
</script>

<!-- Mobile menu -->
<script src="/template/amovie.gozha.net/js/jquery.mobile.menu.js"></script>
<!-- Select -->
<script src="/template/amovie.gozha.net/js/external/jquery.selectbox-0.2.min.js"></script>
<!-- Stars rate -->
<script src="/template/amovie.gozha.net/js/external/jquery.raty.js"></script>

<!-- Form element -->
<script src="/template/amovie.gozha.net/js/external/form-element.js"></script>
<!-- Form validation -->
<script src="/template/amovie.gozha.net/js/form.js"></script>

<!-- Twitter feed -->
<script src="/template/amovie.gozha.net/js/external/twitterfeed.js"></script>

<!-- Custom -->
<script src="/template/amovie.gozha.net/js/custom.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        init_Home();
    });

    $(document).ready(function() {
        init_MovieList();
    });

    function init_Home() {
    "use strict";

    //1. Init revolution slider and add arrows behaviour
    var api = $(".banner").revolution({
        delay: 9000,
        startwidth: 1170,
        startheight: 700,

        onHoverStop: "on",

        hideArrowsOnMobile: "off",

        hideTimerBar: "on",
        hideThumbs: "0",

        keyboardNavigation: "on",

        navigationType: "none",
        navigationArrows: "solo",

        soloArrowLeftHalign: "left",
        soloArrowLeftValign: "center",
        soloArrowLeftHOffset: 0,
        soloArrowLeftVOffset: 0,

        soloArrowRightHalign: "right",
        soloArrowRightValign: "center",
        soloArrowRightHOffset: 0,
        soloArrowRightVOffset: 0,

        touchenabled: "on",
        swipe_velocity: "0.7",
        swipe_max_touches: "1",
        swipe_min_touches: "1",
        drag_block_vertical: "false",

        fullWidth: "off",
        forceFullWidth: "off",
        fullScreen: "off",
    });

    api.bind("revolution.slide.onchange", function (e, data) {
        var slides = $(".banner .slide");
        var currentSlide = data.slideIndex;

        var nextSlide = slides.eq(currentSlide).attr("data-slide");
        var prevSlide = slides.eq(currentSlide - 2).attr("data-slide");

        var lastSlide = slides.length;

        if (currentSlide == lastSlide) {
            var nextSlide = slides.eq(0).attr("data-slide");
        }

        //put onload value for slider navigation
        $(".tp-leftarrow").html(
            '<span class="slider__info">' + prevSlide + "</span>"
        );
        $(".tp-rightarrow").html(
            '<span class="slider__info">' + nextSlide + "</span>"
        );
    });

    //2. Dropdown for authorize button
    //user list option
    $(".auth__show").click(function (e) {
        e.preventDefault();
        $(".auth__function").toggleClass("open-function");
    });

    $(".btn--singin").click(function (e) {
        e.preventDefault();
        $(".auth__function").toggleClass("open-function");
    });

    //3. Mega select with filters (and markers)
    //Mega select interaction
    $(".mega-select__filter").click(function (e) {
        //prevent the default behaviour of the link
        e.preventDefault();
        $(".select__field").val("");

        $(".mega-select__filter").removeClass("filter--active");
        $(this).addClass("filter--active");

        //get the data attribute of the clicked link(which is equal to value filter of our content)
        var filter = $(this).attr("data-filter");

        //Filter buttons
        //show all the list items(this is needed to get the hidden ones shown)
        $(".select__btn a").show();
        $(".select__btn a").css("display", "inline-block");

        /*using the :not attribute and the filter class in it we are selecting
                        only the list items that don't have that class and hide them '*/
        $(".select__btn a:not(." + filter + ")").hide();

        //Filter dropdown
        //show all the list items(this is needed to get the hidden ones shown)
        $(".select__group").removeClass("active-dropdown");
        $(".select__group").show();

        /*using the :not attribute and the filter class in it we are selecting
                        only the list items that don't have that class and hide them '*/
        $(".select__group." + filter).addClass("active-dropdown");
        $(".select__group:not(." + filter + ")").hide();

        //Filter marker
        //show all the list items(this is needed to get the hidden ones shown)
        $(".marker-indecator").show();

        /*using the :not attribute and the filter class in it we are selecting
                        only the list items that don't have that class and hide them '*/
        $(".marker-indecator:not(." + filter + ")").hide();
    });

    $(".filter--active").trigger("click");
    $(".active-dropdown").css("z-index", "-1");

    $(".select__field").focus(function () {
        $(this).parent().find(".active-dropdown").css("opacity", 1);
        $(this).parent().find(".active-dropdown").css("z-index", "50");
    });

    $(".select__field").blur(function () {
        $(this).parent().find(".active-dropdown").css("opacity", 0);
        $(this).parent().find(".active-dropdown").css("z-index", "-1");
    });

    $(".select__variant").click(function (e) {
        e.preventDefault();
        $(this).parent().find(".active-dropdown").css("z-index", "50");
        var value = $(this).attr("data-value");
        $(".select__field").val(value);
        $(this).parent().find(".active-dropdown").css("z-index", "-1");
    });

    $("body").click(function (e) {
        console.log(e.target);
    });

    //4. Rating scrore init
    //Rating star
    $(".score").raty({
        width: 130,
        score: 0,
        path: "/template/amovie.gozha.net/images/rate/",
        starOff: "star-off.svg",
        starOn: "star-on.svg",
    });

    //5. Scroll down navigation function
    //scroll down
    $(".movie-best__check").click(function (ev) {
        ev.preventDefault();
        $("html, body")
            .stop()
            .animate(
                { scrollTop: $("#target").offset().top - 30 },
                900,
                "swing"
            );
    });
}

function init_MovieList() {
    "use strict";

    //1. Dropdown init
    //select
    $(".select__sort").selectbox({
        onChange: function (val, inst) {
            $(inst.input[0])
                .children()
                .each(function (item) {
                    $(this).removeAttr("selected");
                });
            $(inst.input[0])
                .find('[value="' + val + '"]')
                .attr("selected", "selected");
        },
    });

    //2. Datepicker init
    $(".datepicker__input").datepicker({
        showOtherMonths: true,
        selectOtherMonths: true,
        showAnim: "fade",
    });

    $(document).click(function (e) {
        var ele = $(e.target);
        if (
            !ele.hasClass("datepicker__input") &&
            !ele.hasClass("ui-datepicker") &&
            !ele.hasClass("ui-icon") &&
            !$(ele).parent().parents(".ui-datepicker").length
        ) {
            $(".datepicker__input").datepicker("hide");
        }
    });

    //3. Rating scrore init
    //Rating star
    $(".score").raty({
        width: 130,
        score: 0,
        path: "/template/amovie.gozha.net/images/rate/",
        starOff: "star-off.svg",
        starOn: "star-on.svg",
    });

    //4. Sorting by category
    // sorting function
    $(".tags__item").click(function (e) {
        //prevent the default behaviour of the link
        e.preventDefault();

        //active sorted item
        $(".tags__item").removeClass("item-active");
        $(this).addClass("item-active");

        var filter = $(this).attr("data-filter");

        //show all the list items(this is needed to get the hidden ones shown)
        $(".movie--preview").show();
        $(".pagination").show();

        /*using the :not attribute and the filter class in it we are selecting
                            only the list items that don't have that class and hide them '*/
        if (filter.toLowerCase() !== "all") {
            $(".movie--preview:not(." + filter + ")").hide();
            //Show pagination on filter = all;
            $(".pagination").hide();
        }
    });

    //5. Toggle function for additional content
    //toggle timetable show
    $(".movie__show-btn").click(function (ev) {
        ev.preventDefault();

        $(this)
            .parents(".movie--preview")
            .find(".time-select")
            .slideToggle(500);
    });

    $(".time-select__item").click(function () {
        $(".time-select__item").removeClass("active");
        $(this).addClass("active");
    });
}

function init_MoviePage() {
    "use strict";

    //1. Rating scrore init
    //Rating star
    $(".score").raty({
        width: 130,
        score: 5,
        path: "/template/amovie.gozha.net/images/rate/",
        starOff: "star-off.svg",
        starOn: "star-on.svg",
    });

    //2. Swiper slider
    //Media slider
    //init employee sliders
    var mySwiper = new Swiper(".swiper-container", {
        slidesPerView: 4,
    });

    $(".swiper-slide-active").css({ marginLeft: "-1px" });

    //Media switch
    $(".list--photo").click(function (e) {
        e.preventDefault();

        var mediaFilter = $(this).attr("data-filter");

        $(".swiper-slide").hide();
        $("." + mediaFilter).show();

        $(".swiper-wrapper").css("transform", "translate3d(0px, 0px, 0px)");
        mySwiper.params.slideClass = mediaFilter;

        mySwiper.reInit();
        $(".swiper-slide-active").css({ marginLeft: "-1px" });
    });

    $(".list--video").click(function (e) {
        e.preventDefault();

        var mediaFilter = $(this).attr("data-filter");
        $(".swiper-slide").hide();
        $("." + mediaFilter).show();

        $(".swiper-wrapper").css("transform", "translate3d(0px, 0px, 0px)");
        mySwiper.params.slideClass = mediaFilter;

        mySwiper.reInit();
        $(".swiper-slide-active").css({ marginLeft: "-1px" });
    });

    //media swipe visible slide
    //Onload detect

    if (($(window).width() > 760) & ($(window).width() < 992)) {
        mySwiper.params.slidesPerView = 2;
        mySwiper.resizeFix();
    } else if (($(window).width() < 767) & ($(window).width() > 481)) {
        mySwiper.params.slidesPerView = 3;
        mySwiper.resizeFix();
    } else if (($(window).width() < 480) & ($(window).width() > 361)) {
        mySwiper.params.slidesPerView = 2;
        mySwiper.resizeFix();
    } else if ($(window).width() < 360) {
        mySwiper.params.slidesPerView = 1;
        mySwiper.resizeFix();
    } else {
        mySwiper.params.slidesPerView = 4;
        mySwiper.resizeFix();
    }

    if ($(".swiper-container").width() > 900) {
        mySwiper.params.slidesPerView = 5;
        mySwiper.resizeFix();
    }

    //Resize detect
    $(window).resize(function () {
        if (($(window).width() > 760) & ($(window).width() < 992)) {
            mySwiper.params.slidesPerView = 2;
            mySwiper.reInit();
        } else if (($(window).width() < 767) & ($(window).width() > 481)) {
            mySwiper.params.slidesPerView = 3;
            mySwiper.reInit();
        } else if (($(window).width() < 480) & ($(window).width() > 361)) {
            mySwiper.params.slidesPerView = 2;
            mySwiper.reInit();
        } else if ($(window).width() < 360) {
            mySwiper.params.slidesPerView = 1;
            mySwiper.reInit();
        } else {
            mySwiper.params.slidesPerView = 4;
            mySwiper.reInit();
        }
    });

    //3. Slider item pop up
    //boolian var
    var toggle = true;

    //pop up video media element
    $(".media-video .movie__media-item").magnificPopup({
        //disableOn: 700,
        type: "iframe",
        mainClass: "mfp-fade",
        removalDelay: 160,
        preloader: false,

        fixedContentPos: false,

        gallery: {
            enabled: true,
            preload: [0, 1], // Will preload 0 - before current, and 1 after the current image
        },

        disableOn: function () {
            return toggle;
        },
    });

    //pop up photo media element
    $(".media-photo .movie__media-item").magnificPopup({
        type: "image",
        closeOnContentClick: true,
        mainClass: "mfp-fade",
        image: {
            verticalFit: true,
        },

        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1], // Will preload 0 - before current, and 1 after the current image
        },

        disableOn: function () {
            return toggle;
        },
    });

    //detect if was move after click
    $(".movie__media .swiper-slide").on("mousedown", function (e) {
        toggle = true;
        $(this).on("mousemove", function testMove() {
            toggle = false;
        });
    });

    //4. Dropdown init
    //select
    $("#select-sort").selectbox({
        onChange: function (val, inst) {
            $(inst.input[0])
                .children()
                .each(function (item) {
                    $(this).removeAttr("selected");
                });
            $(inst.input[0])
                .find('[value="' + val + '"]')
                .attr("selected", "selected");
        },
    });

    //5. Datepicker init
    $(".datepicker__input").datepicker({
        showOtherMonths: true,
        selectOtherMonths: true,
        showAnim: "fade",
    });

    $(document).click(function (e) {
        var ele = $(e.target);
        if (
            !ele.hasClass("datepicker__input") &&
            !ele.hasClass("ui-datepicker") &&
            !ele.hasClass("ui-icon") &&
            !$(ele).parent().parents(".ui-datepicker").length
        ) {
            $(".datepicker__input").datepicker("hide");
        }
    });

    //6. Reply comment form
    // button more comments
    $("#hide-comments").hide();

    $(".comment-more").click(function (e) {
        e.preventDefault();
        $("#hide-comments").slideDown(400);
        $(this).hide();
    });

    //reply comment function
    $(".comment__reply").click(function (e) {
        e.preventDefault();

        $(".comment").find(".comment-form").remove();
        $(this).parent().append(
            "<form id='comment-form' class='comment-form' method='post'>\
                            <textarea class='comment-form__text' placeholder='Add you comment here'></textarea>\
                            <label class='comment-form__info'>250 characters left</label>\
                            <button type='submit' class='btn btn-md btn--danger comment-form__btn'>add comment</button>\
                        </form>"
        );
    });

    //7. Timetable active element
    $(".time-select__item").click(function () {
        $(".time-select__item").removeClass("active");
        $(this).addClass("active");
    });

    //8. Toggle between cinemas timetable and map with location
    //change map - ticket list
    $("#map-switch").click(function (ev) {
        ev.preventDefault();

        $(".time-select").slideToggle(500);
        $(".map").slideToggle(500);

        $(".show-map").toggle();
        $(".show-time").toggle();
        $(this).blur();
    });

    $(window).load(function () {
        $(".map").addClass("hide-map");
    });

    //9. Init map with several markers on.
    //Map start init
    var mapOptions = {
        scaleControl: true,
        center: new google.maps.LatLng(51.508798, -0.131687),
        zoom: 15,
        navigationControl: false,
        streetViewControl: false,
        mapTypeControl: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
    };
    var map = new google.maps.Map(
        document.getElementById("cimenas-map"),
        mapOptions
    );
    var marker = new google.maps.Marker({
        map: map,
        position: map.getCenter(),
    });

    var markerB = new google.maps.Marker({
        map: map,
        position: new google.maps.LatLng(51.510838, -0.1304),
    });

    var markerC = new google.maps.Marker({
        map: map,
        position: new google.maps.LatLng(51.512615, -0.130607),
    });

    var markerD = new google.maps.Marker({
        map: map,
        position: new google.maps.LatLng(51.509859, -0.130213),
    });

    var markerE = new google.maps.Marker({
        map: map,
        position: new google.maps.LatLng(51.509194, -0.130091),
    });

    //Custome map style
    var map_style = [
        { stylers: [{ saturation: -100 }, { gamma: 3 }] },
        { elementType: "labels.text.stroke", stylers: [{ visibility: "off" }] },
        {
            featureType: "poi.business",
            elementType: "labels.text",
            stylers: [{ visibility: "off" }],
        },
        {
            featureType: "poi.business",
            elementType: "labels.icon",
            stylers: [{ visibility: "off" }],
        },
        {
            featureType: "poi.place_of_worship",
            elementType: "labels.text",
            stylers: [{ visibility: "off" }],
        },
        {
            featureType: "poi.place_of_worship",
            elementType: "labels.icon",
            stylers: [{ visibility: "off" }],
        },
        {
            featureType: "road",
            elementType: "geometry",
            stylers: [{ visibility: "simplified" }],
        },
        {
            featureType: "water",
            stylers: [
                { visibility: "on" },
                { saturation: 0 },
                { gamma: 2 },
                { hue: "#aaaaaa" },
            ],
        },
        {
            featureType: "administrative.neighborhood",
            elementType: "labels.text.fill",
            stylers: [{ visibility: "off" }],
        },
        {
            featureType: "road.local",
            elementType: "labels.text",
            stylers: [{ visibility: "off" }],
        },
        {
            featureType: "transit.station",
            elementType: "labels.icon",
            stylers: [{ visibility: "off" }],
        },
    ];

    //Then we use this data to create the styles.
    var styled_map = new google.maps.StyledMapType(map_style, {
        name: "Cusmome style",
    });

    map.mapTypes.set("map_styles", styled_map);
    map.setMapTypeId("map_styles");

    //=====================================

    // Maker A

    //=====================================

    //Creates the information to go in the pop-up info box.
    var boxTextA = document.createElement("div");
    boxTextA.innerHTML =
        '<span class="pop_up_box_text">Cineworld, 63-65 Haymarket, London</span>';

    //Sets up the configuration options of the pop-up info box.
    var infoboxOptionsA = {
        content: boxTextA,
        disableAutoPan: false,
        maxWidth: 0,
        pixelOffset: new google.maps.Size(30, -50),
        zIndex: null,
        boxStyle: {
            background: "#4c4145",
            opacity: 1,
            width: "300px",
            color: " #b4b1b2",
            fontSize: "13px",
            padding: "14px 20px 15px",
        },
        closeBoxMargin: "6px 2px 2px 2px",
        infoBoxClearance: new google.maps.Size(1, 1),
        closeBoxURL: "images/components/close.svg",
        isHidden: false,
        pane: "floatPane",
        enableEventPropagation: false,
    };

    //Creates the pop-up infobox for Glastonbury, adding the configuration options set above.
    var infoboxA = new InfoBox(infoboxOptionsA);

    //Add an 'event listener' to the Glastonbury map marker to listen out for when it is clicked.
    google.maps.event.addListener(marker, "click", function (e) {
        //Open the Glastonbury info box.
        infoboxA.open(map, this);
        //Sets the Glastonbury marker to be the center of the map.
        map.setCenter(marker.getPosition());
    });

    //=====================================

    // Maker B

    //=====================================

    //Creates the information to go in the pop-up info box.
    var boxTextB = document.createElement("div");
    boxTextB.innerHTML =
        '<span class="pop_up_box_text">Empire Cinemas, 5-6 Leicester Square, London</span>';

    //Sets up the configuration options of the pop-up info box.
    var infoboxOptionsB = {
        content: boxTextB,
        disableAutoPan: false,
        maxWidth: 0,
        pixelOffset: new google.maps.Size(30, -50),
        zIndex: null,
        boxStyle: {
            background: "#4c4145",
            opacity: 1,
            width: "300px",
            color: " #b4b1b2",
            fontSize: "13px",
            padding: "14px 20px 15px",
        },
        closeBoxMargin: "6px 2px 2px 2px",
        infoBoxClearance: new google.maps.Size(1, 1),
        closeBoxURL: "images/components/close.svg",
        isHidden: false,
        pane: "floatPane",
        enableEventPropagation: false,
    };

    //Creates the pop-up infobox for Glastonbury, adding the configuration options set above.
    var infoboxB = new InfoBox(infoboxOptionsB);

    //Add an 'event listener' to the Glastonbury map marker to listen out for when it is clicked.
    google.maps.event.addListener(markerB, "click", function (e) {
        //Open the Glastonbury info box.
        infoboxB.open(map, this);
        //Sets the Glastonbury marker to be the center of the map.
        map.setCenter(markerB.getPosition());
    });

    //=====================================

    // Maker C

    //=====================================

    //Creates the information to go in the pop-up info box.
    var boxTextC = document.createElement("div");
    boxTextC.innerHTML =
        '<span class="pop_up_box_text">Curzon Soho, 99 Shaftesbury Ave , London</span>';

    //Sets up the configuration options of the pop-up info box.
    var infoboxOptionsC = {
        content: boxTextC,
        disableAutoPan: false,
        maxWidth: 0,
        pixelOffset: new google.maps.Size(30, -50),
        zIndex: null,
        boxStyle: {
            background: "#4c4145",
            opacity: 1,
            width: "300px",
            color: " #b4b1b2",
            fontSize: "13px",
            padding: "14px 20px 15px",
        },
        closeBoxMargin: "6px 2px 2px 2px",
        infoBoxClearance: new google.maps.Size(1, 1),
        closeBoxURL: "images/components/close.svg",
        isHidden: false,
        pane: "floatPane",
        enableEventPropagation: false,
    };

    //Creates the pop-up infobox for Glastonbury, adding the configuration options set above.
    var infoboxC = new InfoBox(infoboxOptionsC);

    //Add an 'event listener' to the Glastonbury map marker to listen out for when it is clicked.
    google.maps.event.addListener(markerC, "click", function (e) {
        //Open the Glastonbury info box.
        infoboxC.open(map, this);
        //Sets the Glastonbury marker to be the center of the map.
        map.setCenter(markerC.getPosition());
    });

    //=====================================

    // Maker D

    //=====================================

    //Creates the information to go in the pop-up info box.
    var boxTextD = document.createElement("div");
    boxTextD.innerHTML =
        '<span class="pop_up_box_text">Odeon Cinema West End, Leicester Square, London</span>';

    //Sets up the configuration options of the pop-up info box.
    var infoboxOptionsD = {
        content: boxTextD,
        disableAutoPan: false,
        maxWidth: 0,
        pixelOffset: new google.maps.Size(30, -50),
        zIndex: null,
        boxStyle: {
            background: "#4c4145",
            opacity: 1,
            width: "300px",
            color: " #b4b1b2",
            fontSize: "13px",
            padding: "14px 20px 15px",
        },
        closeBoxMargin: "6px 2px 2px 2px",
        infoBoxClearance: new google.maps.Size(1, 1),
        closeBoxURL: "images/components/close.svg",
        isHidden: false,
        pane: "floatPane",
        enableEventPropagation: false,
    };

    //Creates the pop-up infobox for Glastonbury, adding the configuration options set above.
    var infoboxD = new InfoBox(infoboxOptionsD);

    //Add an 'event listener' to the Glastonbury map marker to listen out for when it is clicked.
    google.maps.event.addListener(markerD, "click", function (e) {
        //Open the Glastonbury info box.
        infoboxD.open(map, this);
        //Sets the Glastonbury marker to be the center of the map.
        map.setCenter(markerD.getPosition());
    });

    //=====================================

    // Maker E

    //=====================================

    //Creates the information to go in the pop-up info box.
    var boxTextE = document.createElement("div");
    boxTextE.innerHTML =
        '<span class="pop_up_box_text">Picturehouse Cinemas Ltd, Orange Street, London</span>';

    //Sets up the configuration options of the pop-up info box.
    var infoboxOptionsE = {
        content: boxTextE,
        disableAutoPan: false,
        maxWidth: 0,
        pixelOffset: new google.maps.Size(30, -50),
        zIndex: null,
        boxStyle: {
            background: "#4c4145",
            opacity: 1,
            width: "300px",
            color: " #b4b1b2",
            fontSize: "13px",
            padding: "14px 20px 15px",
        },
        closeBoxMargin: "6px 2px 2px 2px",
        infoBoxClearance: new google.maps.Size(1, 1),
        closeBoxURL: "images/components/close.svg",
        isHidden: false,
        pane: "floatPane",
        enableEventPropagation: false,
    };

    //Creates the pop-up infobox for Glastonbury, adding the configuration options set above.
    var infoboxE = new InfoBox(infoboxOptionsE);

    //Add an 'event listener' to the Glastonbury map marker to listen out for when it is clicked.
    google.maps.event.addListener(markerE, "click", function (e) {
        //Open the Glastonbury info box.
        infoboxE.open(map, this);
        //Sets the Glastonbury marker to be the center of the map.
        map.setCenter(markerE.getPosition());
    });

    //10. Scroll down navigation function
    //scroll down
    $(".comment-link").click(function (ev) {
        ev.preventDefault();
        $("html, body")
            .stop()
            .animate(
                { scrollTop: $(".comment-wrapper").offset().top - 90 },
                900,
                "swing"
            );
    });
}

function init_Rates() {
    "use strict";

    //1. Rating fucntion
    //Rating star
    $(".score").raty({
        width: 130,
        score: 0,
        path: "/template/amovie.gozha.net/images/rate/",
        starOff: "star-off.svg",
        starOn: "star-on.svg",
    });

    //After rate callback
    $(".score").click(function () {
        $(this).children().hide();

        $(this).html('<span class="rates__done">Thanks for your vote!<span>');
    });
}
</script>
