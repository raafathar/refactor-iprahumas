<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Red_Theme" data-layout="vertical">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/logo.png') }}" />

    <!-- Core Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />

    <title>Ikatan Pranata Humas Indonesia</title>

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{ asset('assets/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/libs/owl.carousel/dist/assets/owl.theme.default.min.css') }}" />

    <style>
        #carouselHero .carousel-item:before {
            content: '';
            display: block;
            position: absolute;
            background-image:
                linear-gradient(to bottom,
                    rgba(0, 0, 0, 0),
                    rgba(0, 0, 0, .8));
            width: 100vw;
            top: 0;
            height: 100vh;
        }

    </style>
</head>

<body>
    @yield('header')
    @yield('contents')
    @yield('footer')

    <!-- Scroll Top -->
    <a href="javascript:void(0)"
        class="top-btn btn btn-primary d-flex align-items-center justify-content-center round-54 p-0 rounded-circle">
        <i class="ti ti-arrow-up fs-7"></i>
    </a>


    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

    <!-- Import Js Files -->
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme/app.init.js') }}"></script>
    <script src="{{ asset('assets/js/theme/theme.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/theme/app.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/js/theme/sidebarmenu.js') }}"></script> --}}
    <script src="{{ asset('assets/js/homepage.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>

</body>

</html>
