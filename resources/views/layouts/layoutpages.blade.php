<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicons/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicons/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicons/favicon-16x16.png') }}" />

    <link rel="manifest" href="{{ asset('images/favicons/site.webmanifest') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&display=swap" rel="stylesheet">

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/animate/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/animate/custom-animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/jarallax/jarallax.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/jquery-magnific-popup/jquery.magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/nouislider/nouislider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/nouislider/nouislider.pips.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/odometer/odometer.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/swiper/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/mellis-icons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/tiny-slider/tiny-slider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/reey-font/stylesheet.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/bxslider/jquery.bxslider.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap-select/css/bootstrap-select.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/vegas/vegas.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/jquery-ui/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/timepicker/timePicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/twenty-twenty/twentytwenty.css') }}" />

     <!-- template styles -->
     <link rel="stylesheet" href="{{ asset('css/bbs_page/mellis.css') }}" />
     <link rel="stylesheet" href="{{ asset('css/bbs_page/mellis-responsive.css') }}" />



</head>

<body>
    <div class="preloader">
        <div class="preloader__image"></div>
    </div>

    <div class="page-wrapper">
        <!-- Header Section -->
        @include('components.page-header')

        <!-- Main Content Section -->
        <main>
            @yield('content')
        </main>

        <!-- Footer Section -->
        @include('components.page-footer')
    </div>
   <!-- jQuery pertama kali -->
<script src="{{ asset('vendors/jquery/jquery-3.6.0.min.js') }}"></script>

<!-- Plugin yang bergantung pada jQuery -->
<script src="{{ asset('vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('vendors/jquery-appear/jquery.appear.min.js') }}"></script>
<script src="{{ asset('vendors/nice-select/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('vendors/jquery-circle-progress/jquery.circle-progress.min.js') }}"></script>
<script src="{{ asset('vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('vendors/jquery-validate/jquery.validate.min.js') }}"></script>
<script src="{{ asset('vendors/bxslider/jquery.bxslider.min.js') }}"></script>
<script src="{{ asset('vendors/jquery-ui/jquery-ui.js') }}"></script>
<script src="{{ asset('vendors/timepicker/timePicker.js') }}"></script>
<script src="{{ asset('vendors/circleType/jquery.circleType.js') }}"></script>
<script src="{{ asset('vendors/circleType/jquery.lettering.min.js') }}"></script>
<script src="{{ asset('vendors/sidebar-content/jquery-sidebar-content.js') }}"></script>
<script src="{{ asset('vendors/twenty-twenty/twentytwenty.js') }}"></script>
<script src="{{ asset('vendors/twenty-twenty/jquery.event.move.js') }}"></script>

<!-- Bootstrap Bundle (termasuk Popper.js) -->
<script src="{{ asset('vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Plugin lain yang tidak tergantung pada jQuery -->
<script src="{{ asset('vendors/jarallax/jarallax.min.js') }}"></script>
<script src="{{ asset('vendors/nouislider/nouislider.min.js') }}"></script>
<script src="{{ asset('vendors/odometer/odometer.min.js') }}"></script>
<script src="{{ asset('vendors/swiper/swiper.min.js') }}"></script>
<script src="{{ asset('vendors/tiny-slider/tiny-slider.min.js') }}"></script>
<script src="{{ asset('vendors/wnumb/wNumb.min.js') }}"></script>
<script src="{{ asset('vendors/wow/wow.js') }}"></script>
<script src="{{ asset('vendors/isotope/isotope.js') }}"></script>
<script src="{{ asset('vendors/countdown/countdown.min.js') }}"></script>
<script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('vendors/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('vendors/vegas/vegas.min.js') }}"></script>
<script src="{{ asset('js/bbs_page/mellis.js') }}"></script>

<script>

$(document).ready(function() {
    // Pastikan hanya satu plugin yang diinisialisasi
    if ($('.selectpicker').length) {
        $('.selectpicker').selectpicker(); // Hanya jika Anda menggunakan bootstrap-select
    }
    if ($('.nice-select').length) {
        $('.nice-select').niceSelect(); // Hanya jika Anda menggunakan nice-select
    }
});

</script>


</body>

</html>
