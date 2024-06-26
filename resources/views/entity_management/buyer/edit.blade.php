@extends('home')

@section('content')
    <div class="container rounded h-100 p-4" style="margin: 5pt;">
        <h4 class="mb-4">Chỉnh sửa thông tin người mua</h4>
        @if (isset($buyer))
            <form action="{{ route('danh-sach-nguoi-mua.update', $buyer->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">Tên:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" name="name" placeholder="Nhập tên"
                            value="{{ $buyer->name }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Nhập email"
                            value="{{ $buyer->email }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPhone" class="col-sm-2 col-form-label">Số điện thoại:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPhone" name="phone"
                            placeholder="Nhập số điện thoại" value="{{ $buyer->phone }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputAddress" class="col-sm-2 col-form-label">Địa chỉ:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputAddress" name="address"
                            placeholder="Nhập địa chỉ" value="{{ $buyer->address }}">
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Cập nhật người mua</button>
                </div>

            </form>
        @endif

    </div>
@endsection
