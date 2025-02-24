<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="description" content="Travl - CodeIgniter Hotel Admin Dashboard Bootstrap Template" />
    <meta property="og:title" content="Travl - CodeIgniter Hotel Admin Dashboard Bootstrap Template" />
    <meta property="og:description" content="Travl - CodeIgniter Hotel Admin Dashboard Bootstrap Template" />
    <meta property="og:image" content="../social-image.html" />
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css" rel="stylesheet" />
    <link rel="icon" type="image/png" sizes="16x16" href="public/assets/images/favicon.png">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


    <link href="{{ asset('assets/vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet"
        type="text/css" />

    <link href="{{ asset('assets/vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />



    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    <style>
        .sidebar-right {

            display:none !important;
        }

        .dlab-demo-trigger{

            display:none !important;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <!--*******************
  Preloader start
 ********************-->
    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!--*******************
  Preloader end
 ********************-->

    <div id="main-wrapper">
        @livewire('navigation-menu')

        @livewire('headermenu')

        @livewire('sidebar-menu')

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <!--**********************************
    Footer start
***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="https://dexignlab.com/"
                        target="_blank">DexignLab</a> 2024</p>
            </div>
        </div>
        <!--**********************************
    Footer end
***********************************-->
    </div>

    @stack('modals')

    @livewireScripts

    <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>
    <script src="assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>


    <script src="{{ asset('assets/vendor/apexchart/apexchart.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/dashboard-1.js') }}"></script>
    <script src="{{ asset('assets/vendor/owl-carousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-datetimepicker/js/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>

    <script src="{{ asset('assets/vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>


    <script src="{{ asset('assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/js/dlabnav-init.js') }}"></script>
    <script src="{{ asset('assets/js/demo.js') }}"></script>
    <script src="{{ asset('assets/js/styleSwitcher.js') }}"></script>
    <script>
        function TravlCarousel() {

            /*  testimonial one function by = owl.carousel.js */
            jQuery('.front-view-slider').owlCarousel({
                loop: false,
                margin: 15,
                nav: true,
                autoplaySpeed: 3000,
                navSpeed: 3000,
                paginationSpeed: 3000,
                slideSpeed: 3000,
                smartSpeed: 3000,
                autoplay: false,
                animateOut: 'fadeOut',
                dots: true,
                navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
                responsive: {
                    0: {
                        items: 1
                    },

                    768: {
                        items: 2
                    },

                    1400: {
                        items: 2
                    },
                    1600: {
                        items: 3
                    },
                    1750: {
                        items: 3
                    }
                }
            })
        }

        jQuery(window).on('load', function() {
            setTimeout(function() {
                TravlCarousel();
            }, 1000);
        });
    </script>
    <script>
        $(function() {
            $('#datetimepicker').datetimepicker({
                inline: true,
            });
        });

        $(document).ready(function() {
            $(".booking-calender .fa.fa-clock-o").removeClass(this);
            $(".booking-calender .fa.fa-clock-o").addClass('fa-clock');
        });
    </script>
</body>

</html>
