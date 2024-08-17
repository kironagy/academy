<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Academy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Description website">
    <meta name="author" content="Maksym Blank">
    <meta name="keywords" content="website, with, meta, tags">
    <meta name="robots" content="noindex, follow">
    <meta name="revisit-after" content="5 month">
    <meta name="image" content="http://mywebsite.com/image.jpg">
    <meta name="og:title" content="Title website">
    <meta name="og:description" content="Description website">
    <meta name="og:image" content="http://mywebsite.com/image.jpg">
    <meta name="og:site_name" content="My Website">
    <meta name="og:type" content="website">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Title website">
    <meta name="twitter:description" content="Description website">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon.ico">
    <!-- Css -->
    <link href="{{ asset('assets/css/plugins/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/plugins/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/plugins/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/plugins/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fonts/flaticon/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fonts/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
    <!-- Preloader Start -->
    <div class="preloader">
        <img src="{{ asset('assets/images/preloader.svg') }}" alt="preloader">
    </div>
    <div class="aside-overlay trigger-right"></div>
    <!-- Canvas End -->
    <!-- Header Start -->
    @include('layouts.nav')
    <!-- Header End -->

    @yield('content')
    <!-- Scripts -->
    <script src="{{ asset('assets/js/plugins/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/imagesloaded.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.inview.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.easypiechart.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>
