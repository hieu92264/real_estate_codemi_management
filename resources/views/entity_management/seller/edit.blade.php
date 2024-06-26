@extends('home')

@section('content')
    <div class="container rounded h-100 p-4" style="margin: 5pt;">
        <h4 class="mb-4">Chỉnh sửa thông tin người bán</h4>
        @if (isset($seller))
            <form action="{{ route('danh-sach-nguoi-ban.update', $seller->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">Tên:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" name="name" placeholder="Nhập tên"
                            value="{{ $seller->name }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Nhập email"
                            value="{{ $seller->email }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPhone" class="col-sm-2 col-form-label">Số điện thoại:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPhone" name="phone"
                            placeholder="Nhập số điện thoại" value="{{ $seller->phone }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputAddress" class="col-sm-2 col-form-label">Địa chỉ:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputAddress" name="address"
                            placeholder="Nhập địa chỉ" value="{{ $seller->address }}">
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Cập nhật người bán</button>
                </div>

            </form>
        @endif

    </div>
@endsection
