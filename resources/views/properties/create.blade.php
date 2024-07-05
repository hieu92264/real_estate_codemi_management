@extends('home')

@section('content')
    @php
        $directions = ['Đông', 'Tây', 'Nam', 'Bắc', 'Đông Bắc', 'Đông Nam', 'Tây Bắc', 'Tây Nam'];
    @endphp
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
                        @error('type')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Trạng Thái</label>
                        <select name="status" id="status" class="form-control">
                            <option value="available">Có Sẵn</option>
                            <option value="sold">Đã Bán</option>
                            <option value="pending">Đang Chờ</option>
                        </select>
                        @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="owner">Chủ Sở Hữu</label>
                        <input type="text" name="owner" class="form-control" id="owner">
                        @error('owner')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone_number">Số Điện Thoại</label>
                        <input type="text" name="phone_number" class="form-control" id="phone_number">
                        @error('phone_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="gmail">Email</label>
                        <input type="email" name="gmail" class="form-control" id="gmail">
                        @error('gmail')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="acreage">Diện Tích</label>
                        <input type="number"step="0.01" name="acreage" class="form-control" id="acreage">
                        @error('arceage')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price">Giá</label>
                        <input type="text" name="price" class="form-control" id="price">
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="frontage">Mặt Tiền</label>
                        <input type="number" step="0.01" name="frontage" class="form-control" id="frontage">
                    </div>

                    <div class="form-group">
                        <label for="house_direction">Hướng Nhà</label>
                        <select name="house_direction" class="form-control" id="house_direction">
                            <option value="" checked>Chọn hướng bất động sản</option>
                            @foreach ($directions as $direction)
                                <option value="{{ $direction }}">{{ $direction }}</option>
                            @endforeach
                        </select>
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
                        <textarea name="other_description" class="form-control" id="other_description">{{ $properties->hasDescription->other_description ?? '' }}</textarea>
                    </div>


                    <div class="form-group">
                        <label for="city">Thành Phố</label>
                        <select class="form-control" id="city" name="city_id" title="Chọn Tỉnh Thành">
                            <option value="0">Tỉnh Thành</option>
                        </select>
                        <input type="hidden" name="city" id="city_name">
                        @error('city')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="district">Quận/Huyện</label>
                        <select class="form-control" id="district" name="district_id" title="Chọn Quận Huyện">
                            <option value="0">Quận Huyện</option>
                        </select>
                        <input type="hidden" name="district" id="district_name">
                        @error('district')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="ward">Phường/Xã</label>
                        <select class="form-control" id="ward" name="ward_id" title="Chọn Phường Xã">
                            <option value="0">Phường Xã</option>
                        </select>
                        <input type="hidden" name="ward" id="ward_name">
                        @error('ward')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="street">Đường</label>
                        <input type="text" name="street" class="form-control" id="street">
                        @error('street')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="full_address">Địa Chỉ Đầy Đủ</label>
                        <input type="text" name="full_address" class="form-control" id="full_address">
                        @error('full_address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="images">Hình Ảnh</label>
                        <input type="file" name="images[]" class="form-control" id="images" multiple>
                        @error('images')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Tạo Mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('admin/js/api_viet_nam.js') }}"></script>
@endsection
