<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('template_admin/assets/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('template_admin/assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('template_admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link href="{{ url('css/table-responsive.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('template_admin/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('template_admin/assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('template_admin/assets/images/favicon.svg') }}" type="image/x-icon">
    <script src="https://kit.fontawesome.com/9758dae16d.js" crossorigin="anonymous"></script>
    <script src="{{ url('template_admin/assets/js/bootstrap.bundle.min.js') }}"></script>
    <style>
        .laravel-embed__responsive-wrapper {
            position: relative;
            height: 0;
            overflow: hidden;
            max-width: 100%;
        }

        .laravel-embed__fallback {
            background: rgba(0, 0, 0, 0.15);
            color: rgba(0, 0, 0, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .laravel-embed__fallback,
        .laravel-embed__responsive-wrapper iframe,
        .laravel-embed__responsive-wrapper object,
        .laravel-embed__responsive-wrapper embed {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

    </style>
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.css" />
    <script src="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.js"></script>
    <script src="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet/0.0.1-beta.5/esri-leaflet.js"></script>
    <script src="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet-geocoder/0.0.1-beta.5/esri-leaflet-geocoder.js"></script>
    @yield('styles')
    @livewireStyles
</head>

<body>
    <div id="app">
        @include('template_admin.sidebar')
        <div id="main" class='layout-navbar'>
            @include('template_admin.navbar')
            <div id="main-content">
                @yield('content')
                @include('template_admin.footer')
            </div>
        </div>
    </div>
    <script src="{{ asset('template_admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('template_admin/assets/js/main.js') }}"></script>
    <script src="{{ asset('template_admin/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template_admin/assets/vendors/choices.js/choices.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/jquery-mask-min.js') }}"></script>
    @stack('scripts')
    @livewireScripts
</body>
<script type="text/javascript">
    $(document).ready(function(){
        // Format mata uang.
        $( '.uang' ).mask('000.000.000.000', {reverse: true});
    })
</script>
<script type="text/javascript">
    function logout(event){
            event.preventDefault();
            var check = confirm("Yakin Keluar Dari Aplikasi ?");
            if(check){
               document.getElementById('logout-form').submit();
            }
     }
</script>
</html>
