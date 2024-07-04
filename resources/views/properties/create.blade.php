@extends('home')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-4 text-center">Tạo Bất Động Sản</h1>

                <form action="{{ route('bat-dong-san.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Loại</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="type_nha" value="nhà">
                            <label class="form-check-label" for="type_nha">Nhà</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="type_dat_nen" value="đất nền">
                            <label class="form-check-label" for="type_dat_nen">Đất Nền</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Trạng Thái</label>
                        <select name="status" id="status" class="form-control">
                            <option value="available">Có Sẵn</option>
                            <option value="sold">Đã Bán</option>
                            <option value="pending">Đang Chờ</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="owner">Chủ Sở Hữu</label>
                        <input type="text" name="owner" class="form-control" id="owner" required>
                    </div>

                    <div class="form-group">
                        <label for="phone_number">Số Điện Thoại</label>
                        <input type="text" name="phone_number" class="form-control" id="phone_number" required>
                    </div>

                    <div class="form-group">
                        <label for="gmail">Email</label>
                        <input type="email" name="gmail" class="form-control" id="gmail" required>
                    </div>

                    <div class="form-group">
                        <label for="acreage">Diện Tích</label>
                        <input type="number" step="0.01" name="acreage" class="form-control" id="acreage" required>
                    </div>

                    <div class="form-group">
                        <label for="price">Giá</label>
                        <input type="text" name="price" class="form-control" id="price" required>
                    </div>

                    <div class="form-group">
                        <label for="frontage">Mặt Tiền</label>
                        <input type="number" step="0.01" name="frontage" class="form-control" id="frontage">
                    </div>

                    <div class="form-group">
                        <label for="house_direction">Hướng Nhà</label>
                        <input type="text" name="house_direction" class="form-control" id="house_direction">
                    </div>

                    <div class="form-group">
                        <label for="floors">Số Tầng</label>
                        <input type="number" name="floors" class="form-control" id="floors">
                    </div>

                    <div class="form-group">
                        <label for="bedrooms">Số Phòng Ngủ</label>
                        <input type="number" name="bedrooms" class="form-control" id="bedrooms">
                    </div>

                    <div class="form-group">
                        <label for="toilets">Số Phòng Tắm</label>
                        <input type="number" name="toilets" class="form-control" id="toilets">
                    </div>

                    <div class="form-group">
                        <label for="legality">Pháp Lý</label>
                        <input type="text" name="legality" class="form-control" id="legality">
                    </div>

                    <div class="form-group">
                        <label for="furniture">Nội Thất</label>
                        <input type="text" name="furniture" class="form-control" id="furniture">
                    </div>

                    <div class="form-group">
                        <label for="other_description">Mô Tả Khác</label>
                        <textarea name="other_description" class="form-control" id="other_description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="city">Thành Phố</label>
                        <select class="form-control" id="city" name="city" title="Chọn Tỉnh Thành">
                            <option value="0">Tỉnh Thành</option>
                        </select>
                        <input type="hidden" name="city_name" id="city_name">
                    </div>

                    <div class="form-group">
                        <label for="district">Quận/Huyện</label>
                        <select class="form-control" id="district" name="district" title="Chọn Quận Huyện">
                            <option value="0">Quận Huyện</option>
                        </select>
                        <input type="hidden" name="district_name" id="district_name">
                    </div>

                    <div class="form-group">
                        <label for="ward">Phường/Xã</label>
                        <select class="form-control" id="ward" name="ward" title="Chọn Phường Xã">
                            <option value="0">Phường Xã</option>
                        </select>
                        <input type="hidden" name="ward_name" id="ward_name">
                    </div>

                    <div class="form-group">
                        <label for="street">Đường</label>
                        <input type="text" name="street" class="form-control" id="street">
                    </div>

                    <div class="form-group">
                        <label for="full_address">Địa Chỉ Đầy Đủ</label>
                        <input type="text" name="full_address" class="form-control" id="full_address">
                    </div>

                    <div class="form-group">
                        <label for="images">Hình Ảnh</label>
                        <input type="file" name="images[]" class="form-control" id="images" multiple>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Tạo Mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Load tỉnh/thành data
            $.getJSON('https://esgoo.net/api-tinhthanh/1/0.htm', function(data_tinh) {
                if (data_tinh.error == 0) {
                    $.each(data_tinh.data, function(key_tinh, val_tinh) {
                        $("#city").append('<option value="' + val_tinh.id + '" data-name="' +
                            val_tinh.full_name + '">' + val_tinh.full_name + '</option>');
                    });

                    // Sự kiện chọn tỉnh/thành
                    $("#city").change(function(e) {
                        var cityName = $("#city option:selected").data("name");
                        $("#city_name").val(cityName);

                        var idtinh = $(this).val();
                        // Reset dropdown quận/huyện và phường/xã
                        $("#district").html('<option value="0">Quận/Huyện</option>');
                        $("#ward").html('<option value="0">Phường/Xã</option>');

                        // Load dữ liệu quận/huyện
                        $.getJSON('https://esgoo.net/api-tinhthanh/2/' + idtinh + '.htm', function(
                            data_quan) {
                            if (data_quan.error == 0) {
                                $.each(data_quan.data, function(key_quan, val_quan) {
                                    $("#district").append('<option value="' +
                                        val_quan.id + '" data-name="' + val_quan
                                        .full_name + '">' + val_quan.full_name +
                                        '</option>');
                                });

                                // Sự kiện chọn quận/huyện
                                $("#district").change(function(e) {
                                    var districtName = $(
                                        "#district option:selected").data(
                                        "name");
                                    $("#district_name").val(districtName);

                                    var idquan = $(this).val();
                                    // Reset dropdown phường/xã
                                    $("#ward").html(
                                        '<option value="0">Phường/Xã</option>');

                                    // Load dữ liệu phường/xã
                                    $.getJSON('https://esgoo.net/api-tinhthanh/3/' +
                                        idquan + '.htm',
                                        function(data_phuong) {
                                            if (data_phuong.error == 0) {
                                                $.each(data_phuong.data,
                                                    function(key_phuong,
                                                        val_phuong) {
                                                        $("#ward").append(
                                                            '<option value="' +
                                                            val_phuong
                                                            .id +
                                                            '" data-name="' +
                                                            val_phuong
                                                            .full_name +
                                                            '">' +
                                                            val_phuong
                                                            .full_name +
                                                            '</option>');
                                                    });

                                                // Sự kiện chọn phường/xã
                                                $("#ward").change(function(e) {
                                                    var wardName = $(
                                                        "#ward option:selected"
                                                    ).data(
                                                        "name");
                                                    $("#ward_name").val(
                                                        wardName);
                                                });
                                            }
                                        });
                                });
                            }
                        });
                    });
                }
            });
        });
    </script>
@endsection
