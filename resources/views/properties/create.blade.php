@extends('home')
@section('content')
    <h6 class="mb-4 text-center">Thêm mới bất động sản</h6>
    <div class="container d-flex justify-content-center">
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
                    <input type="text" name="city" class="form-control" id="city">
                </div>

                <div class="form-group">
                    <label for="district">Quận/Huyện</label>
                    <input type="text" name="district" class="form-control" id="district">
                </div>

                <div class="form-group">
                    <label for="ward">Phường/Xã</label>
                    <input type="text" name="ward" class="form-control" id="ward">
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
                <br>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Tạo Mới</button>
                </div>
            </form>
        </div> 
@endsection
