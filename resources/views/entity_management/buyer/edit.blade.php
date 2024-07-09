@extends('home')

@section('content')
    <div class="container rounded p-4" style="margin-top: 20px; max-width: 900px;">
        <h4 class="mb-4 text-center">Chỉnh sửa thông tin người mua</h4>
        @if (isset($buyer))
            <form action="{{ route('danh-sach-nguoi-mua.update', $buyer->id) }}" method="POST" class="w-100">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="inputName" class="form-label">Tên:</label>
                    <input type="text" class="form-control" id="inputName" name="name" placeholder="Nhập tên"
                        value="{{ $buyer->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Nhập email"
                        value="{{ $buyer->email }}" required>
                </div>
                <div class="mb-3">
                    <label for="inputPhone" class="form-label">Số điện thoại:</label>
                    <input type="text" class="form-control" id="inputPhone" name="phone"
                        placeholder="Nhập số điện thoại" value="{{ $buyer->phone }}" required>
                </div>
                <div class="mb-3">
                    <label for="inputAddress" class="form-label">Địa chỉ:</label>
                    <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Nhập địa chỉ"
                        value="{{ $buyer->address }}" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Cập nhật người mua</button>
                </div>
            </form>
        @endif
    </div>
@endsection
