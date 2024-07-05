@extends('home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-4 text-center">Tạo Bất Động Sản</h1>

                <form action="{{ route('bat-dong-san.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Loại nhà --}}
                    <fieldset class="mb-3">
                        <legend>Loại</legend>
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
                    </fieldset>

                    {{-- Trạng thái --}}
                    <div class="form-group mb-3">
                        <label>Trạng Thái</label>
                        <div class="custom-select-wrapper">
                        <select name="status" id="status" class="form-control">
                            <div class="custom-select-wrapper">
                            <option value="available">Có Sẵn</option>
                            <option value="sold">Đã Bán</option>
                            <option value="pending">Đang Chờ</option>
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
                            <input type="text" name="owner" class="form-control" id="owner" required>
                            @error('owner')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone_number">Số Điện Thoại</label>
                            <input type="text" name="phone_number" class="form-control" id="phone_number" required>
                            @error('phone_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="gmail">Email</label>
                            <input type="email" name="gmail" class="form-control" id="gmail" required>
                            @error('gmail')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </fieldset>

                    <fieldset class="mb-3">
                        <legend>Thông số nhà</legend>
                        <div class="form-group">
                            <label for="acreage">Diện Tích</label>
                            <div class="input-group">
                                <input type="number" step="0.01" name="acreage" class="form-control" id="acreage"
                                    required>
                                <div class="input-group-append">
                                    <span class="input-group-text">m²</span>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="price">Giá</label>
                            <div class="input-group">
                                <input type="text" name="price" class="form-control" id="price" required
                                    oninput="formatCurrency(this)">
                                <div class="input-group-append">
                                    <span class="input-group-text">VND</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="frontage">Mặt Tiền</label>
                            <div class="input-group">
                                <input type="number" step="0.01" name="frontage" class="form-control" id="frontage">
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
                                    <option value="north">Bắc</option>
                                    <option value="northeast">Đông Bắc</option>
                                    <option value="east">Đông</option>
                                    <option value="southeast">Đông Nam</option>
                                    <option value="south">Nam</option>
                                    <option value="southwest">Tây Nam</option>
                                    <option value="west">Tây</option>
                                    <option value="northwest">Tây Bắc</option>
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
                            <div class="custom-select-wrapper">
                                <select name="legality" class="form-control" id="legality">
                                    <option value="so_hong">Sổ Hồng</option>
                                    <option value="so_do">Sổ Đỏ</option>
                                    <option value="giay_phep_xay_dung">Giấy phép xây dựng</option>
                                    <option value="chung_nhan_quyen_su_dung_dat">Chứng nhận quyền sử dụng đất</option>
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
    </div>
    <script src="{{ asset('admin/js/api_viet_nam.js') }}"></script>
    <script src="{{ asset('admin/js/format_currency.js') }}"></script>
@endsection
