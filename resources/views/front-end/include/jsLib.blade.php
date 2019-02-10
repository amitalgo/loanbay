<script src="{{ asset('front-end/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('front-end/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('front-end/js/jquery-ui.js') }}"></script>
<script src="{{ asset('front-end/js/popper.min.js') }}"></script>
<script src="{{ asset('front-end/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front-end/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('front-end/js/jquery.stellar.min.js') }}"></script>
<!--   <script src="js/jquery.countdown.min.js"></script> -->
<script src="{{ asset('front-end/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('front-end/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('front-end/js/aos.js') }}"></script>
<script src="{{ asset('front-end/js/slick.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('front-end/js/main.js') }}"></script>
<script src="{{ asset('front-end/js/jquery.validate.js') }}"></script>

<script>
    $(document).ready(function() {
        $(".center").slick({
            dots: true,
            infinite: true,
            centerMode: true,
            autoplay:true,
            slidesToShow: 5,
            slidesToScroll: 3,

            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4
                    }
                },
                {
                    breakpoint: 1008,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                    // settings: "unslick"
                },
                {
                    breakpoint: 414,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },

            ]

        });
        //*****************************
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            margin: 10,
            nav: false,
            loop: true,
            autoplay:true,
            autoplayHoverPause:false,
            autoplayTimeout:4000,
            responsive: {
                0: {
                    items: 1

                },
                768: {
                    items: 3
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        })
    });

</script>