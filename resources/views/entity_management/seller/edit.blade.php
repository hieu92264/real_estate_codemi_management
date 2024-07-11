@extends('home')

@section('content')
    <div class="container rounded p-4" style="margin-top: 20px; max-width: 900px;">
        <h4 class="mb-4 text-center">Chỉnh sửa thông tin người bán</h4>
        @if (isset($seller))
            <form action="{{ route('danh-sach-nguoi-ban.update', $seller->id) }}" method="POST" class="w-100">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="inputName" class="form-label">Tên:</label>
                    <input type="text" class="form-control" id="inputName" name="name" placeholder="Nhập tên"
                        value="{{ $seller->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Nhập email"
                        value="{{ $seller->email }}" required>
                </div>
                <div class="mb-3">
                    <label for="inputPhone" class="form-label">Số điện thoại:</label>
                    <input type="text" class="form-control" id="inputPhone" name="phone"
                        placeholder="Nhập số điện thoại" value="{{ $seller->phone }}" required>
                </div>
                <div class="mb-3">
                    <label for="inputAddress" class="form-label">Địa chỉ:</label>
                    <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Nhập địa chỉ"
                        value="{{ $seller->address }}" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Cập nhật người bán</button>
                </div>
            </form>
        @endif
    </div>
@endsection
