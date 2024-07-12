@extends('home')
@section('map_library')
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link rel="stylesheet" href="{{ asset('map/css/MarkerCluster.css') }}">
    <link rel="stylesheet" href="{{ asset('map/css/MarkerCluster.Default.css') }}">
    <script src="{{ asset('map/js/MarkerCluster.js') }}"></script>
    <script src="{{ asset('map/js/leaflet.markerCluster-src.js') }}"></script>
@endsection
@section('content')
    <style>
        .custom-select-wrapper {
            position: relative;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        fieldset {
            border: 1px solid #ced4da;
            padding: 1.5rem;
            border-radius: 0.25rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        legend {
            width: auto;
            padding: 0 10px;
            font-size: 1.2rem;
            font-weight: bold;
        }

        .custom-select-wrapper select {
            height: calc(2.25rem + 2px);
            width: 100%;
        }

        #map {
            height: 600px;
            width: 100%;
            margin-top: 1.5rem;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .form-row {
            display: flex;
            justify-content: space-between;
        }

        .form-group {
            flex: 1;
            margin-right: 1rem;
        }

        .form-group:last-child {
            margin-right: 0;
        }
    </style>
    <div class="container mt-5">
        <fieldset class="mb-3">
            <legend>Địa Chỉ</legend>
            <div class="form-row">
                <div class="form-group">
                    <label for="city">Thành Phố</label>
                    <div class="custom-select-wrapper">
                        <select class="form-control form-control-sm" id="city" name="city_id" title="Chọn Tỉnh Thành">
                            <option value="0">Tỉnh Thành</option>
                        </select>
                    </div>
                    <input type="hidden" name="city" id="city_name">
                </div>

                <div class="form-group">
                    <label for="district">Quận/Huyện</label>
                    <div class="custom-select-wrapper">
                        <select class="form-control form-control-sm" id="district" name="district_id"
                            title="Chọn Quận Huyện">
                            <option value="0">Quận Huyện</option>
                        </select>
                    </div>
                    <input type="hidden" name="district" id="district_name">
                </div>

                <div class="form-group">
                    <label for="ward">Phường/Xã</label>
                    <div class="custom-select-wrapper">
                        <select class="form-control form-control-sm" id="ward" name="ward_id" title="Chọn Phường Xã">
                            <option value="0">Phường Xã</option>
                        </select>
                    </div>
                    <input type="hidden" name="ward" id="ward_name">
                </div>
            </div>
        </fieldset>
        <div id="map"></div>
    </div>
    <script src="{{ asset('admin/js/map/api_get_lat_lon.js') }}"></script>
    <script src="{{ asset('admin/js/api_viet_nam.js') }}"></script>
@endsection
