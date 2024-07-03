{{-- @extends('home')
@section('content')
    <h6 class="mb-4">Thêm mới bất động sản</h6>
    <div class="container">
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
                <input type="text" name="district" class="form-control" id="district" list="districts">
                <datalist id="districts">
                    @foreach ($districts as $district)
                        <option value="{{ $district }}">
                    @endforeach
                </datalist>
            </div>

            <div class="form-group">
                <label for="ward">Phường/Xã</label>
                <input type="text" name="ward" class="form-control" id="ward" list="wards">
                <datalist id="wards">
                    @foreach ($wards as $ward)
                        <option value="{{ $ward }}">
                    @endforeach
                </datalist>
            </div>

            <div class="form-group">
                <label for="street">Đường</label>
                <input type="text" name="street" class="form-control" id="street" list="streets">
                <datalist id="streets">
                    @foreach ($streets as $street)
                        <option value="{{ $street }}">
                    @endforeach
                </datalist>
            </div>

            <div class="form-group">
                <label for="full_address">Địa Chỉ Đầy Đủ</label>
                <input type="text" name="full_address" class="form-control" id="full_address">
            </div>

            <div class="form-group">
                <label for="images">Hình Ảnh</label>
                <input type="file" name="images[]" class="form-control" id="images" multiple>
            </div>

            <button type="submit" class="btn btn-primary">Tạo Mới</button>
        </form>
    </div>
@endsection --}}
@extends('home')
@section('content')
    <h6 class="mb-4">Thêm mới bất động sản</h6>
    <div class="container">
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
                <select name="city" id="city" class="form-control">
                    <option value="">Chọn Thành Phố</option>
                </select>
            </div>

            <div class="form-group">
                <label for="district">Quận/Huyện</label>
                <select name="district" id="district" class="form-control">
                    <option value="">Chọn Quận/Huyện</option>
                </select>
            </div>

            <div class="form-group">
                <label for="ward">Phường/Xã</label>
                <select name="ward" id="ward" class="form-control">
                    <option value="">Chọn Phường/Xã</option>
                </select>
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

            <button type="submit" class="btn btn-primary">Tạo Mới</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', async function() {
            const citySelect = document.getElementById('city');
            const districtSelect = document.getElementById('district');
            const wardSelect = document.getElementById('ward');

            try {
                // Fetch provinces
                const response = await fetch('https://provinces.open-api.vn/api/?depth=2');
                if (!response.ok) {
                    throw new Error('Failed to fetch provinces');
                }
                const data = await response.json();

                // Populate cities dropdown
                citySelect.innerHTML = '<option value="">Chọn Thành Phố</option>' + data.map(province =>
                    `<option value="${province.name}">${province.name}</option>`).join('');

                // Event listener for city change
                citySelect.addEventListener('change', async function() {
                    const cityName = this.value;

                    // Fetch districts for selected city
                    const districtResponse = await fetch(
                        `https://provinces.open-api.vn/api/p/${cityName}?depth=2`);
                    if (!districtResponse.ok) {
                        throw new Error('Failed to fetch districts');
                    }
                    const districtData = await districtResponse.json();

                    // Populate districts dropdown
                    districtSelect.innerHTML = '<option value="">Chọn Quận/Huyện</option>' +
                        districtData.districts.map(district =>
                            `<option value="${district.name}">${district.name}</option>`).join('');

                    // Reset wards dropdown
                    wardSelect.innerHTML = '<option value="">Chọn Phường/Xã</option>';
                });

                // Event listener for district change
                districtSelect.addEventListener('change', async function() {
                    const districtName = this.value;

                    // Fetch wards for selected district
                    const wardResponse = await fetch(
                        `https://provinces.open-api.vn/api/d/${districtName}?depth=2`);
                    if (!wardResponse.ok) {
                        throw new Error('Failed to fetch wards');
                    }
                    const wardData = await wardResponse.json();

                    // Populate wards dropdown
                    wardSelect.innerHTML = '<option value="">Chọn Phường/Xã</option>' + wardData
                        .wards.map(ward => `<option value="${ward.name}">${ward.name}</option>`)
                        .join('');
                });

            } catch (error) {
                console.error('Error:', error);
            }
        });
    </script>
@endsection
