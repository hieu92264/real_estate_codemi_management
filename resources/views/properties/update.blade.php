@extends('home')
@section('content')

    <div class="container d-flex justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4 text-center">Sửa Bất Động Sản</h1>

            <form action="{{ route('bat-dong-san.update', $properties->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- Loại nhà --}}
                <fieldset class="mb-3">
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
                </fieldset>

                {{-- Trạng thái --}}
                <fieldset class="mb-3">
                    <label>Trạng Thái</label>
                    <select name="status" id="status" class="form-control">
                        <option value="available" {{ old('status', $properties->status) == 'available' ? 'selected' : '' }}>
                            Có Sẵn</option>
                        <option value="sold" {{ old('status', $properties->status) == 'sold' ? 'selected' : '' }}>Đã Bán
                        </option>
                        <option value="pending" {{ old('status', $properties->status) == 'pending' ? 'selected' : '' }}>Đang
                            Chờ</option>
                    </select>

                </fieldset>

                {{-- Thông tin chủ sở hữu --}}
                <fieldset class="mb-3">
                    <legend>Thông Tin Chủ Sở Hữu</legend>
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
                </fieldset>

                <fieldset class="mb-3">
                    <legend>Thông số nhà</legend>
                    <div class="form-group">
                        <label for="acreage">Diện Tích</label>
                        <input type="number" value="{{ $properties->hasDescription->acreage }}" step="0.01"
                            name="acreage" class="form-control" id="acreage" required>
                    </div>

                    <div class="form-group">
                        <label for="price">Giá</label>
                        <input type="text" value="{{ $properties->hasDescription->price }}" name="price"
                            class="form-control" id="price" required oninput="formatCurrency(this)">
                    </div>

                    <div class="form-group">
                        <label for="frontage">Mặt Tiền</label>
                        <input type="number" value="{{ $properties->hasDescription->frontage }}" step="0.01"
                            name="frontage" class="form-control" id="frontage">
                    </div>

                    <div class="form-group">
                        <label for="house_direction">Hướng Nhà</label>
                        <select name="house_direction" id="house_direction" class="form-control"
                            value="{{ $properties->hasDescription->house_direction }}">
                            <option value="Bắc">Bắc</option>
                            <option value="Đông Bắc">Đông Bắc</option>
                            <option value="Đông">Đông</option>
                            <option value="Đông Nam">Đông Nam</option>
                            <option value="Nam">Nam</option>
                            <option value="Tây Nam">Tây Nam</option>
                            <option value="Tây">Tây</option>
                            <option value="Tây Bắc">Tây Bắc</option>
                        </select>
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
                </fieldset>

                <fieldset class="mb-3">
                    <legend>Địa Chỉ</legend>
                    <div class="form-group">
                        <label for="city">Thành Phố</label>
                        <select class="form-control" id="city" name="city_id" title="Chọn Tỉnh Thành">
                            <option value="0">{{ $properties->hasLocation->city }}</option>
                        </select>
                        <input type="hidden" name="city" id="city_name"
                            value="{{ $properties->hasLocation->city }}">
                    </div>

                    <div class="form-group">
                        <label for="district">Quận/Huyện</label>
                        <select class="form-control" id="district" name="district_id" title="Chọn Quận Huyện">
                            <option value="0">{{ $properties->hasLocation->district }}</option>
                        </select>
                        <input type="hidden" name="district" id="district_name"
                            value="{{ $properties->hasLocation->district }}">
                    </div>

                    <div class="form-group">
                        <label for="ward">Phường/Xã</label>
                        <select class="form-control" id="ward" name="ward_id" title="Chọn Phường Xã">
                            <option value="0">{{ $properties->hasLocation->ward }}</option>
                        </select>
                        <input type="hidden" name="ward" id="ward_name"
                            value="{{ $properties->hasLocation->ward }}">
                    </div>
                    <div class="form-group">
                        <label for="street">Đường</label>
                        <input type="text" value="{{ $properties->hasLocation->street }}" name="street"
                            class="form-control" id="street">
                    </div>

                    <div class="form-group">
                        <label for="full_address">Địa Chỉ Đầy Đủ</label>
                        <input type="text" value="{{ $properties->hasLocation->full_address }}" name="full_address"
                            class="form-control" id="full_address">
                    </div>
                </fieldset>

                <fieldset class="mb-3">
                    <div class="form-group">
                        <legend>Một số hình ảnh nhà</legend>
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
    <script src="{{ asset('admin/js/api_viet_nam.js') }}"></script>
    <script src="{{ asset('admin/js/formatCurrency.js') }}"></script>
@endsection
