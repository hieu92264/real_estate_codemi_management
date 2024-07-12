
@extends('home')
@section('map_library')
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link rel="stylesheet" href="{{ asset('map/css/MarkerCluster.css') }}">
    <link rel="stylesheet" href="{{ asset('map/css/MarkerCluster.Default.css') }}">
    <script src="{{ asset('map/js/MarkerCluster.js') }}"></script>
    <script src="{{ asset('map/js/leaflet.markerCluster-src.js') }}"></script>
@endsection
@section('content')
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
    <div id="map" style="height: 400px; width: 100%;"></div>
    <script src="{{ asset('admin/js/map/api_get_lat_lon.js') }}"></script>
    <script src="{{ asset('admin/js/api_viet_nam.js') }}"></script>
@endsection
