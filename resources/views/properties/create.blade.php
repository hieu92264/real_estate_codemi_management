@extends('home')

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4 text-center">Tạo Bất Động Sản</h1>

            <form action="{{ route('bat-dong-san.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Loại nhà --}}
                <fieldset class="mb-3">
                    <label>Loại</label> <br>
                    <div class="form-check form-check-inline"> <input class="form-check-input" type="radio" name="type"
                            id="type_nha" value="nhà" {{ old('type') == 'nhà' ? 'checked' : '' }}> <label
                            class="form-check-label" for="type_nha">Nhà</label> </div>
                    <div class="form-check form-check-inline"> <input class="form-check-input" type="radio" name="type"
                            id="type_dat_nen" value="đất nền" {{ old('type') == 'đất nền' ? 'checked' : '' }}> <label
                            class="form-check-label" for="type_dat_nen">Đất Nền</label> </div> @error('type')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </fieldset>

                {{-- Trạng thái --}}
                <div class="form-group mb-3">
                    <label>Trạng Thái</label>
                    <div class="custom-select-wrapper">
                        <select name="status" id="status" class="form-control">
                            <option value="available" {{ old('status') == 'avaiable' ? 'checked' : '' }}>Có Sẵn</option>
                            <option value="sold" {{ old('status') == 'sold' ? 'checked' : '' }}>Đã Bán</option>
                            <option value="pending"{{ old('status') == 'pending' ? 'checked' : '' }}>Đang Chờ</option>
                        </select>
                    </div>
                    @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Thông tin chủ sở hữu --}}
                <fieldset class="mb-3">
                    <legend>Thông Tin Chủ Sở Hữu</legend>
                    <div class="form-group">
                        <label for="owner">Chủ Sở Hữu</label>
                        <input type="text" name="owner" class="form-control" id="owner"
                            value="{{ old('owner') }}">
                        @error('owner')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone_number">Số Điện Thoại</label>
                        <input type="text" name="phone_number" class="form-control" id="phone_number"
                            value="{{ old('phone_number') }}">
                        @error('phone_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="gmail">Email</label>
                        <input type="email" name="gmail" value="{{ old('email') }}" class="form-control"
                            id="gmail">
                        @error('gmail')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </fieldset>

                {{-- Thông số nhà --}}
                <fieldset class="mb-3">
                    <legend>Thông số nhà</legend>
                    <div class="form-group">
                        <label for="acreage">Diện Tích</label>
                        <div class="input-group">
                            <input type="number" name="acreage" class="form-control" id="acreage"
                                value="{{ old('acreage') }}">
                            <div class="input-group-append">
                                <span class="input-group-text">m²</span>
                            </div>
                        </div>
                    </div>
                    @error('acreage')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="price">Giá</label>
                        <div class="input-group">
                            <input type="text" name="price" class="form-control" id="price"
                                value="{{ old('prices') }}">
                            <div class="input-group-append">
                                <span class="input-group-text">VND</span>
                            </div>
                        </div>
                    </div>
                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="frontage">Mặt Tiền</label>
                        <div class="input-group">
                            <input type="number" step="1" min="1" max="4" name="frontage"
                                class="form-control" id="frontage">
                            <div class="input-group-append">
                                <span class="input-group-text">m</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="house_direction">Hướng Nhà</label>
                        <div class="custom-select-wrapper">
                            <select name="house_direction" id="house_direction" class="form-control">
                                <option value="0">Chọn hướng nhà</option>
                                <option value="Bắc" {{ old('house_direction') == 'north' }}>Bắc</option>
                                <option value="Đông Bắc" {{ old('house_direction') == 'Đông Bắc' ? 'selected' : '' }}>Đông
                                    Bắc
                                </option>
                                <option value="Đông" {{ old('house_direction') == 'Đông' ? 'selected' : '' }}>Đông
                                </option>
                                <option value="Đông Nam"{{ old('house_direction') == 'Đông Nam' ? 'selected' : '' }}>Đông
                                    Nam</option>
                                <option value="Nam"{{ old('house_direction') == 'Nam' ? 'selected' : '' }}>Nam
                                </option>
                                <option value="Tây Nam"{{ old('house_direction') == 'Tây Nam' ? 'selected' : '' }}>Tây
                                    Nam</option>
                                <option value="Tây"{{ old('house_direction') == 'Tây' ? 'selected' : '' }}>Tây
                                </option>
                                <option value="Tây Bắc"{{ old('house_direction') == 'Tây' ? 'selected' : '' }}>Tây
                                    Bắc</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="floors">Số Tầng</label>
                        <input type="number" name="floors" class="form-control" id="floors"
                            value="{{ old('floors') }}" min="1">
                    </div>

                    <div class="form-group">
                        <label for="bedrooms">Số Phòng Ngủ</label>
                        <input type="number" value="{{ old('bedrooms') }}" name="bedrooms" class="form-control"
                            id="bedrooms" min="0">
                    </div>

                    <div class="form-group">
                        <label for="toilets">Số Phòng Tắm</label>
                        <input type="number" value="{{ old('toilets') }}" name="toilets" class="form-control"
                            id="toilets" min="0">
                    </div>

                    <div class="form-group">
                        <label for="legality">Pháp Lý</label>
                        <div class="custom-select-wrapper">
                            <select name="legality" class="form-control" id="legality">
                                <option value="so_hong" {{ old('legality') == 'so_hong' ? 'selected' : '' }}>Sổ Hồng
                                </option>
                                <option value="so_do" {{ old('legality') == 'so_do' ? 'selected' : '' }}>Sổ Đỏ</option>
                                <option value="giay_phep_xay_dung"
                                    {{ old('legality') == 'giay_phep_xay_dung' ? 'selected' : '' }}>
                                    Giấy phép xây dựng</option>
                                <option value="chung_nhan_quyen_su_dung_dat"
                                    {{ old('legality') == 'chung_nhan_quyen_su_dung_dat' ? 'selected' : '' }}>Chứng nhận
                                    quyền sử dụng đất
                                </option>
                                <option value="khac">Khác</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="furniture">Nội Thất</label>
                        <input type="text" name="furniture" class="form-control" id="furniture">
                    </div>

                    <div class="form-group">
                        <label for="other_description">Mô Tả Khác</label>
                        <textarea name="other_description" class="form-control" id="other_description">{{ $properties->hasDescription->other_description ?? '' }}</textarea>
                    </div>
                </fieldset>

                {{-- Địa Chỉ --}}
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
                        @error('city')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="district">Quận/Huyện</label>
                        <div class="custom-select-wrapper">
                            <select class="form-control" id="district" name="district_id" title="Chọn Quận Huyện">
                                <option value="0">Quận Huyện</option>
                            </select>
                        </div>
                        <input type="hidden" name="district" id="district_name">
                        @error('district')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="ward">Phường/Xã</label>
                        <div class="custom-select-wrapper">
                            <select class="form-control" id="ward" name="ward_id" title="Chọn Phường Xã">
                                <option value="0">Phường Xã</option>
                            </select>
                        </div>
                        <input type="hidden" name="ward" id="ward_name">
                        @error('ward')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="hidden" name="latitude" id="ward_latitude">
                    <input type="hidden" name="longitude" id="ward_longitude">
                    <div class="form-group">
                        <label for="street">Đường</label>
                        <input type="text" name="street" class="form-control" id="street">
                        @error('street')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="full_address">Số nhà</label>
                        <input type="text" name="full_address" class="form-control" id="full_address">
                        @error('full_address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </fieldset>

                {{-- Hình ảnh --}}
                <fieldset class="mb-3">
                    <legend>Một số hình ảnh nhà</legend>
                    <div class="form-group">
                        <label for="images">Hình Ảnh</label>
                        <input type="file" name="images[]" class="form-control" id="images" multiple>
                        @error('images')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </fieldset>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Tạo Mới</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('admin/js/api_viet_nam.js') }}"></script>
    <script src="{{ asset('admin/js/format_currency.js') }}"></script>
    {{-- get lat long --}}
    <script src="{{ asset('admin/js/api_get_lat_lon.js') }}"></script>
@endsection
