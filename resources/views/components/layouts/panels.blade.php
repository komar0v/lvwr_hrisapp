<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>{{ $title .' - MNATA PANELS' ?? 'MNATA' }}</title>

    <!-- Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ url(env('ASSETS_PNL_URL') . '/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url(env('ASSETS_PNL_URL') . '/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ url(env('ASSETS_PNL_URL') . '/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ url(env('ASSETS_PNL_URL') . '/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ url(env('ASSETS_PNL_URL') . '/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ url(env('ASSETS_PNL_URL') . '/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ url(env('ASSETS_PNL_URL') . '/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Main CSS File -->
    <link href="{{ url(env('ASSETS_PNL_URL') . '/css/style.css') }}" rel="stylesheet">
    @livewireStyles
</head>

<body>
    {{ $slot }}

    <!-- Vendor JS Files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ url(env('ASSETS_PNL_URL') . '/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url(env('ASSETS_PNL_URL') . '/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ url(env('ASSETS_PNL_URL') . '/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ url(env('ASSETS_PNL_URL') . '/vendor/quill/quill.js') }}"></script>
    <script src="{{ url(env('ASSETS_PNL_URL') . '/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ url(env('ASSETS_PNL_URL') . '/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ url(env('ASSETS_PNL_URL') . '/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Main JS File -->
    <script src="{{ url(env('ASSETS_PNL_URL') . '/js/main.js') }}"></script>

    <script>
        toastr.options = {
            "progressBar": true,
            "timeOut": "3000",
        }
        <?= session('toastr_message') ?>
    </script>

    @livewireScripts
</body>

</html>