<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>codemi</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    {{-- testmap --}}
    @yield('map_library')
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />


    <!-- Include Leaflet JavaScript -->

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('admin/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/places.js@1.19.0/dist/cdn/places.min.css">
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>

</head>

<body>
    <script src="https://esgoo.net/scripts/jquery.js"></script>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <div class="sidebar">
            @include('layouts.sidebar')
        </div>
        <div class="content flex-grow-1 d-flex flex-column">
            @include('layouts.nav')
            <div class="main-content flex-grow-1 d-flex flex-column">
                @yield('content')
                <div class="mt-auto">
                    @include('layouts.footer')
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('admin/lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('admin/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('admin/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('admin/lib/owlcarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('admin/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('admin/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    {{-- <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script> --}}
    <!-- Template Javascript -->
    <script src="{{ asset('admin/js/main.js') }}"></script>
    @yield('script')
</body>

</html>
