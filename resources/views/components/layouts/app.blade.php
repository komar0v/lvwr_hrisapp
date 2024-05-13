<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>{{ $title .' - MNATA' ?? 'MNATA' }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ url(env('ASSETS_LP_URL') . '/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url(env('ASSETS_LP_URL') . '/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ url(env('ASSETS_LP_URL') . '/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ url(env('ASSETS_LP_URL') . '/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ url(env('ASSETS_LP_URL') . '/css/main.css') }}" rel="stylesheet">
    @livewireStyles
</head>

<body>
    {{ $slot }}
    
    <!-- Vendor JS Files -->
    <script src="{{ url(env('ASSETS_LP_URL') . '/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url(env('ASSETS_LP_URL') . '/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ url(env('ASSETS_LP_URL') . '/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ url(env('ASSETS_LP_URL') . '/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ url(env('ASSETS_LP_URL') . '/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ url(env('ASSETS_LP_URL') . '/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ url(env('ASSETS_LP_URL') . '/js/main.js') }}"></script>

    @livewireScripts
</body>

</html>