<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>DASHMIN</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

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
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link rel="stylesheet" href="{{ asset('map/css/MarkerCluster.css') }}">
    <link rel="stylesheet" href="{{ asset('map/css/MarkerCluster.Default.css') }}">
    <script src="{{ asset('map/js/MarkerCluster.js') }}"></script>
    <script src="{{ asset('map/js/leaflet.markerCluster-src.js') }}"></script>

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .custom-select-wrapper {
            width: 100%;
            max-width: 500px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #map {
            height: 800px;
            width: 100%;
            max-width: 1300px;
        }

        fieldset {
            padding: 10px;
            border-radius: 5px;
            border: 2px solid #db5151;
            margin-bottom: 20px;
            width: 100%;
            max-width: 800px;
        }

        .form-group {
            margin-bottom: 5px;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            display: flex;
        }

        .form-control {
            width: 100%;
            max-width: 800px;
            margin: auto
        }

        .form-group input,
        .form-group select {
            width: 100%;
            max-width: 500px;/
        }

        label {
            font-size: 0.9rem;
            margin-right: 420px
        }
    </style>
</head>

<body>
    <fieldset class="mb-3">
        <legend>Địa Chỉ</legend>
        <div class="form-group">
            <label for="city">Thành Phố</label>
            <div class="custom-select-wrapper">
                <select class="form-control" id="city" name="city_id" title="Chọn Tỉnh Thành">
                    <option value="0">Tỉnh Thành</option>
                </select>
            </div>
            <input type="hidden" name="city" id="city_name">
        </div>

        <div class="form-group">
            <label for="district">Quận/Huyện</label>
            <div class="custom-select-wrapper">
                <select class="form-control" id="district" name="district_id" title="Chọn Quận Huyện">
                    <option value="0">Quận Huyện</option>
                </select>
            </div>
            <input type="hidden" name="district" id="district_name">
        </div>

        <div class="form-group">
            <label for="ward">Phường/Xã</label>
            <div class="custom-select-wrapper">
                <select class="form-control" id="ward" name="ward_id" title="Chọn Phường Xã">
                    <option value="0">Phường Xã</option>
                </select>
            </div>
            <input type="hidden" name="ward" id="ward_name">
        </div>
    </fieldset>
    <div id="map"></div>
    <script src="{{ asset('admin/js/map/api_get_lat_lon.js') }}"></script>
    <script src="{{ asset('admin/js/api_viet_nam.js') }}"></script>
</body>

</html>
