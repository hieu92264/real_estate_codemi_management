@extends('home')
@section('content')
    <div class="container d-flex justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4 text-center">Sửa Bất Động Sản</h1>

            <form action="{{ route('bat-dong-san.update', $properties->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Loại</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="type" id="type_nha" value="nhà"
                            {{ old('type', $properties->type) == 'nhà' ? 'checked' : '' }}>
                        <label class="form-check-label" for="type_nha">Nhà</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="type" id="type_dat_nen" value="đất nền"
                            {{ old('type', $properties->type) == 'đất nền' ? 'checked' : '' }}>
                        <label class="form-check-label" for="type_dat_nen">Đất Nền</label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Trạng Thái</label>
                    <select name="status" id="status" class="form-control">
                        <option value="available" {{ old('status', $properties->status) == 'available' ? 'selected' : '' }}>
                            Có Sẵn</option>
                        <option value="sold" {{ old('status', $properties->status) == 'sold' ? 'selected' : '' }}>Đã Bán
                        </option>
                        <option value="pending" {{ old('status', $properties->status) == 'pending' ? 'selected' : '' }}>Đang
                            Chờ</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="owner">Chủ Sở Hữu</label>
                    <input type="text" name="owner" class="form-control" id="owner" required
                        value="{{ $properties->hasDescription->owner ?? '' }}">
                </div>

                <div class="form-group">
                    <label for="phone_number">Số Điện Thoại</label>
                    <input value="{{ $properties->hasDescription->phone_number }}" type="text" name="phone_number"
                        class="form-control" id="phone_number" required>
                </div>

                <div class="form-group">
                    <label for="gmail">Email</label>
                    <input type="email" value="{{ $properties->hasDescription->gmail }}" name="gmail"
                        class="form-control" id="gmail" required>
                </div>

                <div class="form-group">
                    <label for="acreage">Diện Tích</label>
                    <input type="number" value="{{ $properties->hasDescription->acreage }}" step="0.01" name="acreage"
                        class="form-control" id="acreage" required>
                </div>

                <div class="form-group">
                    <label for="price">Giá</label>
                    <input type="text" value="{{ $properties->hasDescription->price }}" name="price"
                        class="form-control" id="price" required>
                </div>

                <div class="form-group">
                    <label for="frontage">Mặt Tiền</label>
                    <input type="number" value="{{ $properties->hasDescription->frontage }}" step="0.01"
                        name="frontage" class="form-control" id="frontage">
                </div>

                <div class="form-group">
                    <label for="house_direction">Hướng Nhà</label>
                    <input type="text" value="{{ $properties->hasDescription->house_direction }}" name="house_direction"
                        class="form-control" id="house_direction">
                </div>

                <div class="form-group">
                    <label for="floors">Số Tầng</label>
                    <input type="number" value="{{ $properties->hasDescription->floors }}" name="floors"
                        class="form-control" id="floors">
                </div>

                <div class="form-group">
                    <label for="bedrooms">Số Phòng Ngủ</label>
                    <input type="number" value="{{ $properties->hasDescription->bedrooms }}" name="bedrooms"
                        class="form-control" id="bedrooms">
                </div>

                <div class="form-group">
                    <label for="toilets">Số Phòng Tắm</label>
                    <input type="number" value="{{ $properties->hasDescription->toilets }}" name="toilets"
                        class="form-control" id="toilets">
                </div>

                <div class="form-group">
                    <label for="legality">Pháp Lý</label>
                    <input type="text" value="{{ $properties->hasDescription->legality }}" name="legality"
                        class="form-control" id="legality">
                </div>

                <div class="form-group">
                    <label for="furniture">Nội Thất</label>
                    <input type="text" value="{{ $properties->hasDescription->furniture }}" name="furniture"
                        class="form-control" id="furniture">
                </div>

                <div class="form-group">
                    <label for="other_description">Mô Tả Khác</label>
                    <textarea name="other_description" class="form-control" id="other_description">{{ $properties->hasDescription->other_description ?? '' }}</textarea>
                </div>

                <div class="form-group">
                    <label for="city">Thành Phố</label>
                    <input value="{{ $properties->hasLocation->city ?? '' }}" type="text" name="city"
                        class="form-control" id="city">
                </div>

                <div class="form-group">
                    <label for="district">Quận/Huyện</label>
                    <input value="{{ $properties->hasLocation->district ?? '' }}" type="text" name="district"
                        class="form-control" id="district">
                </div>

                <div class="form-group">
                    <label for="ward">Phường/Xã</label>
                    <input type="text" value="{{ $properties->hasLocation->ward ?? '' }}" name="ward"
                        class="form-control" id="ward">
                </div>

                <div class="form-group">
                    <label for="street">Đường</label>
                    <input type="text" value="{{ $properties->hasLocation->street ?? '' }}" name="street"
                        class="form-control" id="street">
                </div>

                <div class="form-group">
                    <label for="full_address">Địa Chỉ Đầy Đủ</label>
                    <input type="text" value="{{ $properties->hasLocation->full_address ?? '' }}" name="full_address"
                        class="form-control" id="full_address">
                </div>

                <div class="form-group">
                    <label for="images">Hình Ảnh</label>
                    <input type="file" name="images[]" class="form-control" id="images" multiple>
                </div>
                <br>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Sửa bất động sản </button>
                </div>
            </form>
        </div>
    </div>
@endsection
